<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SduiSetting extends Model
{
    use HasFactory;

    protected $table = 'sdui_settings';

    protected $fillable = [
        'key',
        'value',
        'type',
        'description',
        'group',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the value with proper type casting
     */
    public function getTypedValue()
    {
        switch ($this->type) {
            case 'json':
                return json_decode($this->value, true);
            case 'boolean':
                return filter_var($this->value, FILTER_VALIDATE_BOOLEAN);
            case 'integer':
                return (int) $this->value;
            case 'float':
                return (float) $this->value;
            default:
                return $this->value;
        }
    }

    /**
     * Set the value with proper type handling
     */
    public function setTypedValue($value): void
    {
        switch ($this->type) {
            case 'json':
                $this->value = is_string($value) ? $value : json_encode($value);
                break;
            case 'boolean':
                $this->value = $value ? '1' : '0';
                break;
            default:
                $this->value = (string) $value;
        }
    }

    /**
     * Get setting by key
     */
    public static function get(string $key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        
        return $setting ? $setting->getTypedValue() : $default;
    }

    /**
     * Set setting by key
     */
    public static function set(string $key, $value, string $type = 'string', string $group = 'general'): void
    {
        $setting = static::firstOrNew(['key' => $key]);
        $setting->type = $type;
        $setting->group = $group;
        $setting->setTypedValue($value);
        $setting->save();
    }

    /**
     * Scope to get settings by group
     */
    public function scopeByGroup($query, $group)
    {
        return $query->where('group', $group);
    }
}

