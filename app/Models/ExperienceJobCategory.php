<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ExperienceJobCategory.
 *
 * @package namespace App\Models;
 * @property int|null $experience_id
 * @property int|null $job_category_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class ExperienceJobCategory extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'experience_job_category';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'experience_id',
        'job_category_id',
    ];
}
