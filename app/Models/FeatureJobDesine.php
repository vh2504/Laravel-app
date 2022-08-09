<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class FeatureJobDesine.
 *
 * @package namespace App\Models;
 * @property int|null $job_desine_id
 * @property int|null $feature_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class FeatureJobDesine extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'feature_job_desine';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'job_desine_id',
        'feature_id',
    ];
}
