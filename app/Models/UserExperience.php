<?php

namespace App\Models;

use App\Enums\User\EJobSituation;
use App\Enums\User\EPosition;
use App\Enums\User\ESalaryType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class UserExperience.
 *
 * @package namespace App\Models;
 * @property int|null $user_id
 * @property int|null $job_collection_id
 * @property int|null $job_category_id
 * @property string|null $company_name
 * @property string|null $job_content
 * @property string|null $start_month
 * @property string|null $start_year
 * @property string|null $end_month
 * @property string|null $end_year
 * @property EJobSituation|null $job_situation
 * @property EPosition|null $position
 * @property ESalaryType|null $salary_type
 * @property string|null $salary
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class UserExperience extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'user_experiences';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'job_collection_id',
        'job_category_id',
        'company_name',
        'job_content',
        'start_month',
        'start_year',
        'end_month',
        'end_year',
        'job_situation',
        'position',
        'salary_type',
        'salary',
    ];

    /**
     * Cast attribute
     * @var array<string,string>
     */
    protected $casts = [
        'job_situation' => EJobSituation::class,
        'position' => EPosition::class,
        'salary_type' => ESalaryType::class,
    ];

    /**
     * Get Collection
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getCollection(): BelongsTo
    {
        return $this->belongsTo(JobCollection::class, 'job_collection_id', 'id');
    }

    /**
     * Get Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function getCategory(): BelongsTo
    {
        return $this->belongsTo(JobCategory::class, 'job_category_id', 'id');
    }
}
