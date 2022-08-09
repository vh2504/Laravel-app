<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Station.
 *
 * @package namespace App\Models;
 * @property string|null         $name
 * @property string|null         $code
 * @property string|null         $line_code
 * @property string|null         $postal_code
 * @property string|null         $address
 * @property string|null         $lat
 * @property string|null         $lon
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class Station extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'code',
        'line_code',
        'postal_code',
        'address',
        'lat',
        'lon'
    ];
}
