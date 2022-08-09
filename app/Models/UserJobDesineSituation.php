<?php

namespace App\Models;

use App\Enums\User\EJobSituation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserJobDesineSituation.
 *
 * @package namespace App\Models;
 * @property int|null $user_job_desine_id
 * @property EJobSituation|null $job_situation
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class UserJobDesineSituation extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'user_job_desine_situation';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_job_desine_id',
        'job_situation',
    ];

    /**
     * Cast attribute
     * @var array<string,string>
     */
    protected $casts = [
        'job_situation' => EJobSituation::class
    ];
}
