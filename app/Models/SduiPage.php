<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Permission\Models\Role;

class SduiPage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'sdui_pages';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'screen_type',
        'json_schema',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected $casts = [
        'json_schema' => 'array',
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    /**
     * Boot method to handle model events
     */
    protected static function boot()
    {
        parent::boot();

        // Create version on update
        static::updated(function ($page) {
            $page->createVersion();
        });

        // Create initial version on create
        static::created(function ($page) {
            $page->createVersion();
        });
    }

    /**
     * Get the user who created this page
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Get the user who last updated this page
     */
    public function updater(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /**
     * Get roles assigned to this page
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'sdui_page_role', 'page_id', 'role_id')
            ->withTimestamps();
    }

    /**
     * Get all versions of this page
     */
    public function versions(): HasMany
    {
        return $this->hasMany(SduiPageVersion::class, 'page_id')->orderBy('version_number', 'desc');
    }

    /**
     * Create a new version of this page
     */
    public function createVersion(): void
    {
        $latestVersion = $this->versions()->max('version_number') ?? 0;

        SduiPageVersion::create([
            'page_id' => $this->id,
            'version_number' => $latestVersion + 1,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'screen_type' => $this->screen_type,
            'is_active' => $this->is_active,
            'version_data' => [
                'page' => $this->toArray(),
                'roles' => $this->roles->pluck('id')->toArray(),
                'json_schema' => $this->json_schema,
            ],
            'created_by' => auth()->user()?->id ?? 1,
        ]);
    }

    /**
     * Revert to a specific version
     */
    public function revertToVersion(int $versionNumber): bool
    {
        $version = $this->versions()->where('version_number', $versionNumber)->first();

        if (!$version) {
            return false;
        }

        $versionData = $version->version_data;

        // Update page data including json_schema
        $this->update([
            'title' => $version->title,
            'slug' => $version->slug,
            'description' => $version->description,
            'screen_type' => $version->screen_type,
            'is_active' => $version->is_active,
            'json_schema' => $versionData['json_schema'] ?? null,
            'updated_by' => auth()->user()?->id ?? 1,
        ]);

        // Sync roles
        if (isset($versionData['roles'])) {
            $this->roles()->sync($versionData['roles']);
        }

        return true;
    }

    /**
     * Scope to get pages by role
     */
    public function scopeForRole($query, $roleId)
    {
        return $query->whereHas('roles', function ($q) use ($roleId) {
            $q->where('role_id', $roleId);
        });
    }

    /**
     * Scope to get pages by screen type
     */
    public function scopeByScreenType($query, $screenType)
    {
        return $query->where('screen_type', $screenType);
    }

    /**
     * Scope to get active pages
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Validate the JSON schema structure
     */
    public function validateJsonSchema(): array
    {
        $errors = [];
        $schema = $this->json_schema;

        if (empty($schema)) {
            $errors[] = 'JSON schema is required';
            return $errors;
        }

        // Check required top-level fields
        if (!isset($schema['version'])) {
            $errors[] = 'JSON schema must include a "version" field';
        }

        // if (!isset($schema['components']) || !is_array($schema['components'])) {
        //     $errors[] = 'JSON schema must include a "components" array';
        // } else {
        //     // Validate each component
        //     foreach ($schema['components'] as $index => $component) {
        //         if (!isset($component['id'])) {
        //             $errors[] = "Component at index {$index} is missing required 'id' field";
        //         }
        //         if (!isset($component['type'])) {
        //             $errors[] = "Component at index {$index} is missing required 'type' field";
        //         }
        //         if (!isset($component['order']) && $component['order'] !== 0) {
        //             $errors[] = "Component at index {$index} is missing required 'order' field";
        //         }
        //         if (!isset($component['props'])) {
        //             $errors[] = "Component at index {$index} is missing required 'props' field";
        //         }
        //     }
        // }

        return $errors;
    }

    /**
     * Get a default JSON schema template
     */
    public static function getDefaultSchema(): array
    {
        return [
            'version' => '1.0',
            'metadata' => [
                'title' => '',
                'description' => '',
            ],
            'components' => [],
            'layout' => [
                'type' => 'vertical',
                'spacing' => 16,
            ],
        ];
    }
}
