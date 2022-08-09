<?php

namespace App\Models;

use App\Enums\Post\EPostStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Post.
 *
 * @package namespace App\Models;
 * @property int|null    $id
 * @property int|null    $creator_id
 * @property int|null    $approved_by
 * @property string|null $title
 * @property string|null $image
 * @property string|null $slug
 * @property string|null $summary
 * @property string|null $content
 * @property int|null    $view_count
 * @property EPostStatus $status
 * @property string|null $reason
 * @property int|null    $is_popular
 * @property string|null $published_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 */
class Post extends Model
{
    use HasFactory, SoftDeletes;

    const MAX_POPULAR = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'creator_id',
        'approved_by',
        'title',
        'image',
        'slug',
        'summary',
        'content',
        'view_count',
        'status',
        'reason',
        'published_at',
        'is_popular'
    ];

    /**
     * Cast attribute
     * @var array<string,string>
     */
    protected $casts = [
        'status' => EPostStatus::class
    ];

    /**
     * Get the categories
     * @return BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Get the job_categories
     *
     * @return BelongsToMany
     */
    public function jobCategories(): BelongsToMany
    {
        return $this->belongsToMany(JobCategory::class);
    }

    /**
     * Get the creator of user
     *
     * @return BelongsTo
     */
    public function creator(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * add attribute status_view
     * @return string
     */
    public function getStatusViewAttribute(): string
    {
        switch ($this->status) {
            case EPostStatus::Rejected:
                return "<span class='text-danger'>" . (string)__('post.status.' . $this->status->name) . "</span>";
            case EPostStatus::Pending:
                return "<span class='text-warning'>" . (string)__('post.status.' . $this->status->name) . "</span>";
            case EPostStatus::Approved:
                $timePublish = $this->published_at ? strtotime($this->published_at) : 0;
                if ($timePublish && $timePublish  <= time()) {
                    return "<span class='text-success'>" . (string)__('post.status.Published') . "</span>";
                }
                return  "<span class='text-info'>" . (string)__('post.status.NotPulished') . "</span>";
            case EPostStatus::Hidden:
                return "<span class='text-dark'>" . (string)__('post.status.' . $this->status->name) . "</span>";
            case EPostStatus::Draft:
                return "<span class='text-muted'>" . (string)__('post.status.' . $this->status->name) . "</span>";
        }
        return "";
    }

    /**
     * add attribute status_text
     * @return string
     */
    public function getStatusTextAttribute(): string
    {
        $name = (string)__('post.status.' . $this->status->name);
        if ($this->status == EPostStatus::Approved) {
            $timePublish = $this->published_at ? strtotime($this->published_at) : 0;
            if ($timePublish && $timePublish  <= time()) {
                $name = (string)__('post.status.Published');
            } else {
                $name = (string)__('post.status.NotPulished');
            }
        }
        return $name;
    }
}
