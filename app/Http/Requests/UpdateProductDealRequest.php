<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\EcommerceProduct;

class UpdateProductDealRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'ecommerce_product_id' => [
                'required',
                'exists:ecommerce_products,id',
                function ($attribute, $value, $fail) {
                    $product = EcommerceProduct::with('warehouseProduct')
                        ->where('id', $value)
                        ->where('ecommerce_status', 'active')
                        ->whereHas('warehouseProduct', function ($query) {
                            $query->where('status', 'active');
                        })
                        ->first();
                    
                    if (!$product) {
                        $fail('The selected product is not available for deals.');
                    }
                }
            ],
            'deal_title' => [
                'required',
                'string',
                'max:255',
                'min:3'
            ],
            'discount_type' => [
                'required',
                'in:price,percentage'
            ],
            'discount_value' => [
                'required',
                'numeric',
                'min:0.01',
                function ($attribute, $value, $fail) {
                    $discountType = $this->input('discount_type');
                    $productId = $this->input('ecommerce_product_id');
                    
                    if ($productId && $discountType) {
                        $product = EcommerceProduct::with('warehouseProduct')->find($productId);
                        
                        if ($product) {
                            $originalPrice = $product->warehouseProduct->selling_price;
                            
                            if ($discountType === 'percentage') {
                                if ($value > 100) {
                                    $fail('Discount percentage cannot exceed 100%.');
                                }
                            } elseif ($discountType === 'price') {
                                if ($value > $originalPrice) {
                                    $fail('Discount amount cannot exceed the original price of ₹' . number_format($originalPrice, 2) . '.');
                                }
                            }
                            
                            // Calculate offer price to ensure it's not negative
                            $offerPrice = $discountType === 'percentage' 
                                ? $originalPrice - ($originalPrice * $value / 100)
                                : $originalPrice - $value;
                                
                            if ($offerPrice < 0) {
                                $fail('The calculated offer price cannot be negative.');
                            }
                        }
                    }
                }
            ],
            'start_date' => [
                'required',
                'date'
            ],
            'end_date' => [
                'required',
                'date',
                'after:start_date'
            ],
            'status' => [
                'required',
                'in:active,inactive'
            ]
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'ecommerce_product_id.required' => 'Please select a product for this deal.',
            'ecommerce_product_id.exists' => 'The selected product does not exist.',
            'deal_title.required' => 'Deal title is required.',
            'deal_title.min' => 'Deal title must be at least 3 characters long.',
            'deal_title.max' => 'Deal title cannot exceed 255 characters.',
            'discount_type.required' => 'Please select a discount type.',
            'discount_type.in' => 'Discount type must be either "By Price" or "By Percentage".',
            'discount_value.required' => 'Discount value is required.',
            'discount_value.numeric' => 'Discount value must be a valid number.',
            'discount_value.min' => 'Discount value must be greater than 0.',
            'start_date.required' => 'Start date is required.',
            'start_date.date' => 'Start date must be a valid date.',
            'end_date.required' => 'End date is required.',
            'end_date.date' => 'End date must be a valid date.',
            'end_date.after' => 'End date must be after the start date.',
            'status.required' => 'Please select a status for this deal.',
            'status.in' => 'Status must be either "Active" or "Inactive".'
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'ecommerce_product_id' => 'product',
            'deal_title' => 'deal title',
            'discount_type' => 'discount type',
            'discount_value' => 'discount value',
            'start_date' => 'start date',
            'end_date' => 'end date',
            'status' => 'status'
        ];
    }
}
