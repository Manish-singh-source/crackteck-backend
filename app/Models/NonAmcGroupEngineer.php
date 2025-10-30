<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NonAmcGroupEngineer extends Model
{
    //
    protected $table = 'non_amc_group_engineers';

    protected $fillable = [
        'assignment_id',
        'engineer_id',
        'is_supervisor',
    ];

    protected $casts = [
        'is_supervisor' => 'boolean',
    ];

    /**
     * Get the assignment
     */
    public function assignment()
    {
        return $this->belongsTo(NonAmcEngineerAssignment::class, 'assignment_id');
    }

    /**
     * Get the engineer
     */
    public function engineer()
    {
        return $this->belongsTo(Engineer::class, 'engineer_id');
    }   
}
