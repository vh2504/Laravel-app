<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class UserVoice.
 *
 * @package namespace App\Models;
 * @property int|null    $id
 * @property int|null    $user_id
 * @property int|null    $rate
 * @property string|null $note
 * @property string|null $comment
 * @property int|null    $job_id
 * @property int|null    $is_popular
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class UserVoice extends Model
{
    use HasFactory;

    const MAX_POPULAR = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'rate',
        'note',
        'comment',
        'job_id',
        'is_popular'
    ];

    /**
     * Get the user of uservoice
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user of uservoice
     *
     * @return BelongsTo
     */
    public function job(): BelongsTo
    {
        return $this->belongsTo(Job::class);
    }
}
