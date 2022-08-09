<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Notice.
 *
 * @package namespace App\Models;
 * @property int|null    $id
 * @property string|null $title
 * @property string|null $content
 * @property Carbon|null $published_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Notice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'title',
        'content',
        'published_at'
    ];

    /**
     * add attribute status_view
     * @return string
     */
    public function getStatusViewAttribute(): string
    {
        $timePublish = $this->published_at ? strtotime($this->published_at) : 0;
        if ($timePublish && $timePublish  <= time()) {
            return "<span class='text-success'>" . (string)__('notice.status.published') . "</span>";
        }
        return  "<span class='text-info'>" . (string)__('notice.status.pending') . "</span>";
    }
}
