<?php

namespace App\Models;

use App\Enums\User\ECertificate;
use App\Enums\User\EDegree;
use App\Enums\User\EDegreesType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserDegrees.
 *
 * @package namespace App\Models;
 * @property int|null $user_id
 * @property EDegreesType|null $degrees_type
 * @property string|null $school_name
 * @property string|null $department
 * @property string|null $major
 * @property EDegree|null $degree
 * @property string|null $graduation_year
 * @property string|null $graduation_month
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class UserDegrees extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'user_degreess';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id ',
        'degrees_type',
        'school_name',
        'department',
        'major',
        'degree',
        'graduation_year',
        'graduation_month',
    ];

    /**
     * Cast attribute
     * @var array<string,string>
     */
    protected $casts = [
        'degrees_type' => EDegreesType::class,
        'degree' => EDegree::class,
    ];
}
