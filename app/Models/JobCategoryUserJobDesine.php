<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class JobCategoryUserJobDesine.
 *
 * @package namespace App\Models;
 * @property int|null $user_job_desine_id
 * @property int|null $job_category_id
 * @property int|null $career_year
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class JobCategoryUserJobDesine extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'user_job_category_job_desine';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_job_desine_id',
        'job_category_id',
        'career_year'
    ];
}
