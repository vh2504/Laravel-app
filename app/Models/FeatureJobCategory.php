<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FeatureJobCategory.
 *
 * @package namespace App\Models;
 * @property int|null    $id
 * @property string|null $job_category_id
 * @property int|null    $feature_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class FeatureJobCategory extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'feature_job_category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'job_category_id',
        'feature_id'
    ];
}
