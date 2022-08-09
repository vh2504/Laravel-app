<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PasswordReset.
 *
 * @property string $email
 * @property string $token
 */
class PasswordReset extends Model
{
    use HasFactory;

    // trang forgot pass không tìm được mail
    // protected $primaryKey = 'email';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'email',
        'token'
    ];

    /**
     * @var boolean
     */
    public $timestamps = false;
}
