<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EcommerceOrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'ecommerce_order_id',
        'ecommerce_product_id',
        'product_name',
        'product_sku',
        'product_image',
        'unit_price',
        'quantity',
        'total_price',
        'hsn_sac_code',
        'tax_percentage',
        'taxable_value',
        'igst_amount',
        'final_amount',
        'shipping_charges',
        'free_shipping'
    ];

    protected $casts = [
        'unit_price' => 'decimal:2',
        'quantity' => 'integer',
        'total_price' => 'decimal:2',
        'tax_percentage' => 'decimal:2',
        'taxable_value' => 'decimal:2',
        'igst_amount' => 'decimal:2',
        'final_amount' => 'decimal:2',
        'shipping_charges' => 'decimal:2',
        'free_shipping' => 'boolean',
    ];

    /**
     * Boot method for model events.
     */
    protected static function boot()
    {
        parent::boot();

        // Remove automatic total_price calculation since we handle it manually with tax calculations
    }

    /**
     * Get the order that owns this item.
     */
    public function ecommerceOrder()
    {
        return $this->belongsTo(EcommerceOrder::class);
    }

    /**
     * Get the product for this order item.
     */
    public function ecommerceProduct()
    {
        return $this->belongsTo(EcommerceProduct::class);
    }

    /**
     * Get the warehouse product through ecommerce product.
     */
    public function warehouseProduct()
    {
        return $this->hasOneThrough(
            Product::class,
            EcommerceProduct::class,
            'id',
            'id',
            'ecommerce_product_id',
            'warehouse_product_id'
        );
    }

    /**
     * Get formatted unit price.
     */
    public function getFormattedUnitPriceAttribute()
    {
        return '₹' . number_format($this->unit_price, 2);
    }

    /**
     * Get formatted total price.
     */
    public function getFormattedTotalPriceAttribute()
    {
        return '₹' . number_format($this->total_price, 2);
    }

    /**
     * Get formatted shipping charges.
     */
    public function getFormattedShippingChargesAttribute()
    {
        if ($this->free_shipping || $this->shipping_charges == 0) {
            return 'Free Shipping';
        }
        return '₹' . number_format($this->shipping_charges, 2);
    }

    /**
     * Calculate tax information for order item.
     */
    private static function calculateTaxInfo($warehouseProduct, $quantity)
    {
        $unitPrice = $warehouseProduct->selling_price;
        $totalPrice = $unitPrice * $quantity;
        $taxPercentage = $warehouseProduct->tax ?? 18; // Default to 18% GST
        $hsnCode = $warehouseProduct->hsn_code ?? 'N/A';

        $taxableValue = $totalPrice;
        $igstAmount = ($taxableValue * $taxPercentage) / 100;
        $finalAmount = $taxableValue + $igstAmount;

        return [
            'total_price' => $totalPrice,
            'hsn_sac_code' => $hsnCode,
            'tax_percentage' => $taxPercentage,
            'taxable_value' => $taxableValue,
            'igst_amount' => $igstAmount,
            'final_amount' => $finalAmount
        ];
    }

    /**
     * Create order item from cart item.
     */
    public static function createFromCartItem(Cart $cartItem, $orderId)
    {
        $product = $cartItem->ecommerceProduct;
        $warehouseProduct = $product->warehouseProduct;
        $taxInfo = self::calculateTaxInfo($warehouseProduct, $cartItem->quantity);

        return self::create([
            'ecommerce_order_id' => $orderId,
            'ecommerce_product_id' => $product->id,
            'product_name' => $warehouseProduct->product_name,
            'product_sku' => $product->sku ?? $warehouseProduct->sku,
            'product_image' => $warehouseProduct->main_product_image,
            'unit_price' => $warehouseProduct->selling_price,
            'quantity' => $cartItem->quantity,
            'total_price' => $taxInfo['total_price'],
            'hsn_sac_code' => $taxInfo['hsn_sac_code'],
            'tax_percentage' => $taxInfo['tax_percentage'],
            'taxable_value' => $taxInfo['taxable_value'],
            'igst_amount' => $taxInfo['igst_amount'],
            'final_amount' => $taxInfo['final_amount'],
            'shipping_charges' => $product->shipping_charges ?? 0,
            'free_shipping' => ($product->shipping_charges ?? 0) == 0
        ]);
    }

    /**
     * Create order item from product (for buy now).
     */
    public static function createFromProduct(EcommerceProduct $product, $quantity, $orderId)
    {
        $warehouseProduct = $product->warehouseProduct;
        $taxInfo = self::calculateTaxInfo($warehouseProduct, $quantity);

        return self::create([
            'ecommerce_order_id' => $orderId,
            'ecommerce_product_id' => $product->id,
            'product_name' => $warehouseProduct->product_name,
            'product_sku' => $product->sku ?? $warehouseProduct->sku,
            'product_image' => $warehouseProduct->main_product_image,
            'unit_price' => $warehouseProduct->selling_price,
            'quantity' => $quantity,
            'total_price' => $taxInfo['total_price'],
            'hsn_sac_code' => $taxInfo['hsn_sac_code'],
            'tax_percentage' => $taxInfo['tax_percentage'],
            'taxable_value' => $taxInfo['taxable_value'],
            'igst_amount' => $taxInfo['igst_amount'],
            'final_amount' => $taxInfo['final_amount'],
            'shipping_charges' => $product->shipping_charges ?? 0,
            'free_shipping' => ($product->shipping_charges ?? 0) == 0
        ]);
    }
}
