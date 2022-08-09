<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class JobFeature.
 *
 * @package namespace App\Models;
 * @property int|null            $feature_type
 * @property int|null            $job_id
 * @property int|null            $feature_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class JobFeature extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'feature_type',
        'job_id',
        'feature_id'
    ];
}
