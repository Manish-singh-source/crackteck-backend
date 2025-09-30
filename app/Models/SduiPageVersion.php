<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SduiPageVersion extends Model
{
    use HasFactory;

    protected $table = 'sdui_page_versions';

    public $timestamps = false;

    protected $fillable = [
        'page_id',
        'version_number',
        'title',
        'slug',
        'description',
        'screen_type',
        'is_active',
        'version_data',
        'created_by',
        'created_at',
    ];

    protected $casts = [
        'version_data' => 'array',
        'is_active' => 'boolean',
        'version_number' => 'integer',
        'created_at' => 'datetime',
    ];

    /**
     * Boot method to set created_at automatically
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (!$model->created_at) {
                $model->created_at = now();
            }
        });
    }

    /**
     * Get the page this version belongs to
     */
    public function page(): BelongsTo
    {
        return $this->belongsTo(SduiPage::class, 'page_id');
    }

    /**
     * Get the user who created this version
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

