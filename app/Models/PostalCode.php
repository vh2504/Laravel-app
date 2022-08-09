<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class PostalCode.
 *
 * @package namespace App\Models;
 * @property int|null            $city_id
 * @property string|null         $name
 * @property string|null         $first_code
 * @property string|null         $last_code
 * @property string|null         $postal_code
 * @property string|null         $zip_code
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class PostalCode extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'city_id',
        'name',
        'first_code',
        'last_code',
        'postal_code',
        'zip_code',
    ];
}
