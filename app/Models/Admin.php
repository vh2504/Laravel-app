<?php

namespace App\Models;

use App\Enums\User\ETypeAdmin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class JobCollection.
 *
 * @package namespace App\Models;
 * @property string|null     $name
 * @property string|null     $email
 * @property string|null     $password
 * @property string|null     $picture
 * @property ETypeAdmin|null $type
 * @property Carbon|null     $created_at
 * @property Carbon|null     $updated_at
 * @property Carbon|null     $deleted_at
 */
class Admin extends Authenticatable
{
    use HasFactory, SoftDeletes;

    /**
     * @var string
     */
    protected string $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'picture',
        'type'
    ];

    /**
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Cast attribute
     *
     * @var array<string,string>
     */
    protected $casts = [
        'type' => ETypeAdmin::class
    ];

    /**
     * Get the role of the user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * @return bool
     */
    public function isSuperAdmin(): bool
    {
        if (!isset($this->type)) {
            return false;
        }

        return ETypeAdmin::SuperAdmin->value === $this->type->value;
    }

    /**
     * @return bool
     */
    public function isAdmin(): bool
    {
        if (!isset($this->type)) {
            return false;
        }

        return ETypeAdmin::Admin->value === $this->type->value;
    }

    /**
     * @param int $id
     *
     * @return bool
     */
    public function isMyself(int $id): bool
    {
        if ($this->id == $id) {
            return true;
        }

        return true;
    }
}
