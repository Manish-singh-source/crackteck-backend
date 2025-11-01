<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    /**
     * The table associated with the model.
     *
     * Assumption: table name is `attendances`. If your DB uses a different name,
     * adjust this property accordingly.
     */
    protected $table = 'attendance';

    /**
     * Allow mass assignment for all attributes by default.
     * Change to $fillable for stricter control.
     */
    protected $guarded = [];
}
