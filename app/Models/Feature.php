<?php

namespace App\Models;

use App\Enums\Feature\EType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Feature.
 *
 * @package namespace App\Models;
 * @property int|null    $id
 * @property string|null $name
 * @property int|null    $type_group
 * @property int|null    $is_popular
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Feature extends Model implements Transformable
{
    use TransformableTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'type_group',
        'is_popular'
    ];

    /**
     * Cast attribute
     * @var array<string,string>
     */
    protected $casts = [
        'type_group' => EType::class
    ];

    /**
     * Get the job_categories
     *
     * @return BelongsToMany
     */
    public function jobCategories(): BelongsToMany
    {
        return $this->belongsToMany(JobCategory::class);
    }
}
