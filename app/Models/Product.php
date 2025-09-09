<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    
    public function parentCategorie()
    {
        return $this->belongsTo(ParentCategorie::class);
    }
    
    public function subCategorie()
    {
        return $this->belongsTo(SubCategorie::class);
    }

    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class);
    }

    public function warehouseRack()
    {
        return $this->belongsTo(WarehouseRack::class);
    }
}
