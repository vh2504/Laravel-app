<?php

namespace App\Models;

use App\Enums\User\EExpectation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class UserJobDesine.
 *
 * @package namespace App\Models;
 * @property int|null $user_id
 * @property string|null $salary
 * @property EExpectation|null $expectation
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class UserJobDesine extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'user_job_desines';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'salary',
        'expectation'
    ];

    /**
     * Cast attribute
     * @var array<string,string>
     */
    protected $casts = [
        'expectation' => EExpectation::class
    ];

    /**
     * Get JobDesineFeature
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getJobDesineFeatures(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'feature_user_job_desine');
    }

    /**
     * Get JobDesineCity
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getJobDesineCity(): BelongsToMany
    {
        return $this->belongsToMany(City::class, 'user_job_city_desine');
    }

    /**
     * Get JobCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getJobCategory(): BelongsToMany
    {
        return $this->belongsToMany(JobCategory::class, 'user_job_category_job_desine');
    }

    /**
     * Get UserJobDesineSituation
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getUserJobDesineSituation(): HasMany
    {
        return $this->hasMany(UserJobDesineSituation::class);
    }

    /**
     * Get CityJobDesine
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getCityUserJobDesine(): HasMany
    {
        return $this->hasMany(CityUserJobDesine::class, 'user_job_desine_id', 'id');
    }
}
