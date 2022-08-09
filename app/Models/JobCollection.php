<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class JobCollection.
 *
 * @package namespace App\Models;
 * @property int|null    $id
 * @property string|null $name
 * @property string|null $image
 * @property string|null $summary
 * @property int|null    $priority
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string|null $icon
 */
class JobCollection extends Model implements Transformable
{
    use TransformableTrait;
    use SoftDeletes;
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'job_collections';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'image',
        'summary',
        'priority',
        'icon'
    ];

    /**
     * @return void
     */
    public function setPriorityAttribute(): void
    {
        $this->priority = (int)$this->priority;
    }

    /**
     * Get the job_categories
     *
     * @return BelongsToMany
     */
    public function jobCategories(): BelongsToMany
    {
        return $this->belongsToMany(JobCategory::class, 'job_category_job_collections');
    }
}
