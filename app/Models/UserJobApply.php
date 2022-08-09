<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserJobApply.
 *
 * @package namespace App\Models;
 * @property int|null $user_id
 * @property int|null $job_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class UserJobApply extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'user_job_apply';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'job_id'
    ];
}
