<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CityUserJobDesine.
 *
 * @package namespace App\Models;
 * @property int|null $user_job_desine_id
 * @property int|null $city_id
 * @property int|null $prefecture_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class CityUserJobDesine extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'user_job_city_desine';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_job_desine_id',
        'city_id',
        'prefecture_id'
    ];
}
