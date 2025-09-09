<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model
{
    //

    public function lead(){
        return $this->belongsTo(Lead::class,'lead_id','id');
    }
}
