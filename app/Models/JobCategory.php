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
 * Class JobCategory.
 *
 * @package namespace App\Models;
 * @property string|null $name
 * @property string|null $alias
 * @property string|null $image
 * @property bool|null $is_popular
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string|null $icon
 */
class JobCategory extends Model implements Transformable
{
    use HasFactory;
    use TransformableTrait;
    use SoftDeletes;

    /**
     * @var string
     */
    protected $table = 'job_categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'alias',
        'image',
        'is_popular',
        'icon'
    ];

    /**
     * Get the job collections
     *
     * @return BelongsToMany
     */
    public function jobCollections(): BelongsToMany
    {
        return $this->belongsToMany(JobCollection::class, 'job_category_job_collections');
    }
}
