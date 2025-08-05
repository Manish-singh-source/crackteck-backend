<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WarehouseRack extends Model
{
    //
    protected $guarded = [];
    public function warehouse()
    {
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }
}
