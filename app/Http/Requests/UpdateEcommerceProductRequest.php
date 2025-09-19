<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEcommerceProductRequest extends FormRequest
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
        $productId = $this->route('id');

        return [
            // Warehouse product reference
            'warehouse_product_id' => 'required|exists:products,id',

            // SKU validation - unique within e-commerce products, ignore current record
            'sku' => [
                'required',
                'string',
                'max:100',
                Rule::unique('ecommerce_products', 'sku')->ignore($productId)
            ],

            // SEO Fields
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:500',
            'meta_product_url_slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('ecommerce_products', 'meta_product_url_slug')->ignore($productId)
            ],
            
            // Installation Options
            'installation_options' => 'nullable|array',
            'installation_options.*' => 'string|max:255',
            
            // Company Warranty
            'company_warranty' => 'nullable|string|max:255',
            
            // E-commerce specific descriptions
            'ecommerce_short_description' => 'nullable|string',
            'ecommerce_full_description' => 'nullable|string',
            'ecommerce_technical_specification' => 'nullable|string',
            
            // Inventory Management
            'min_order_qty' => 'nullable|integer|min:1',
            'max_order_qty' => 'nullable|integer|min:1|gte:min_order_qty',
            
            // Shipping Details
            'product_weight' => 'nullable|string|max:100',
            'product_dimensions' => 'nullable|string|max:255',
            'shipping_charges' => 'nullable|numeric|min:0',
            'shipping_class' => 'nullable|in:Light,Heavy,Fragile',
            
            // E-commerce flags
            'is_featured' => 'nullable|boolean',
            'is_best_seller' => 'nullable|boolean',
            'is_suggested' => 'nullable|boolean',
            'is_todays_deal' => 'nullable|boolean',
            
            // Product Tags
            'product_tags' => 'nullable|array',
            'product_tags.*' => 'string|max:100',
            
            // Status
            'ecommerce_status' => 'nullable|in:active,inactive,draft',
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'warehouse_product_id.required' => 'Please select a warehouse product.',
            'warehouse_product_id.exists' => 'Selected warehouse product does not exist.',
            'sku.required' => 'SKU is required.',
            'sku.unique' => 'Product with this SKU already exists.',
            'meta_product_url_slug.unique' => 'This URL slug is already taken.',
            'max_order_qty.gte' => 'Maximum order quantity must be greater than or equal to minimum order quantity.',
            'min_order_qty.min' => 'Minimum order quantity must be at least 1.',
            'shipping_charges.numeric' => 'Shipping charges must be a valid number.',
            'shipping_charges.min' => 'Shipping charges cannot be negative.',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        // Convert checkbox values to boolean
        $this->merge([
            'is_featured' => $this->boolean('is_featured'),
            'is_best_seller' => $this->boolean('is_best_seller'),
            'is_suggested' => $this->boolean('is_suggested'),
            'is_todays_deal' => $this->boolean('is_todays_deal'),
        ]);

        // Set default values if not provided
        if (!$this->has('ecommerce_status')) {
            $this->merge(['ecommerce_status' => 'active']);
        }

        if (!$this->has('min_order_qty')) {
            $this->merge(['min_order_qty' => 1]);
        }

        if (!$this->has('shipping_class')) {
            $this->merge(['shipping_class' => 'Light']);
        }
    }
}
