<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Job.
 *
 * @package namespace App\Models;
 *
 * @property string|null $title
 * @property int|null    $collection_id
 * @property int|null    $category_id
 * @property int|null    $type
 * @property string|null $office_name
 * @property string|null $postal_code
 * @property string|null $prefecture_id
 * @property string|null $city_id
 * @property string|null $access
 * @property array|null  $content
 * @property array|null  $salary
 * @property array|null  $description
 * @property array|null  $service_form
 * @property array|null  $treatment
 * @property array|null  $working_time
 * @property array|null  $holiday
 * @property array|null  $special_leave
 * @property array|null  $requirement
 * @property array|null  $process
 * @property array|null  $address
 * @property int|null    $created_by_id
 * @property int|null    $status
 * @property bool        $is_popular
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 */
class Job extends Model implements Transformable
{
    use HasFactory, TransformableTrait;

    /**
     * @var string
     */
    protected $table = 'jobs';

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'content' => \Illuminate\Database\Eloquent\Casts\AsArrayObject::class,
        'salary' => \Illuminate\Database\Eloquent\Casts\AsArrayObject::class,
        'description' => \Illuminate\Database\Eloquent\Casts\AsArrayObject::class,
        'service_form' => \Illuminate\Database\Eloquent\Casts\AsArrayObject::class,
        'treatment' => \Illuminate\Database\Eloquent\Casts\AsArrayObject::class,
        'working_time' => \Illuminate\Database\Eloquent\Casts\AsArrayObject::class,
        'holiday' => \Illuminate\Database\Eloquent\Casts\AsArrayObject::class,
        'special_leave' => \Illuminate\Database\Eloquent\Casts\AsArrayObject::class,
        'requirement' => \Illuminate\Database\Eloquent\Casts\AsArrayObject::class,
        'address' => \Illuminate\Database\Eloquent\Casts\AsArrayObject::class,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'title',
        'type',
        'office_name',
        'postal_code',
        'prefecture_id',
        'collection_id',
        'category_id',
        'content',
        'salary',
        'description',
        'service_form',
        'treatment',
        'working_time',
        'holiday',
        'special_leave',
        'requirement',
        'process',
        'created_by_id',
        'address',
        'status',
        'is_popular'
    ];

    /**
     * Get the jobCategories of job
     *
     * @return BelongsToMany
     */
    public function jobCategories(): BelongsToMany
    {
        return $this->belongsToMany(JobCategory::class, 'job_category_jobs');
    }

    /**
     * @return HasMany
     */
    public function images(): HasMany
    {
        return $this->hasMany(JobImage::class, 'job_id');
    }

    /**
     * @return HasMany
     */
    public function lineStations(): HasMany
    {
        return $this->hasMany(JobLineStation::class, 'job_id');
    }
}
