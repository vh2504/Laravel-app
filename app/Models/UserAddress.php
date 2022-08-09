<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class UserAddress .
 *
 * @package namespace App\Models;
 * @property int|null $user_id
 * @property string|null $zipcode
 * @property int|null $pre_id
 * @property int|null $city_id
 * @property string|null $address
 * @property string|null $town
 * @property string|null $address_hira
 * @property string|null $number_phone
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class UserAddress extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'zipcode',
        'pre_id',
        'city_id',
        'address',
        'town',
        'address_hira',
        'number_phone',
    ];

    /**
     * Get city
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    /**
     * Get prefecture
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prefecture(): BelongsTo
    {
        return $this->belongsTo(Prefecture::class, 'pre_id', 'id');
    }
}
