<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class JobLineStation.
 *
 * @package namespace App\Models;
 * @property int|null            $job_id
 * @property int|null            $line_id
 * @property int|null            $station_id
 * @property string|null         $distance
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class JobLineStation extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'job_id',
        'line_id',
        'station_id',
        'distance'
    ];
}
