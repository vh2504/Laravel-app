<?php

namespace App\Models;

use App\Enums\User\EJobSituation;
use App\Enums\User\EMarital;
use App\Enums\User\ESex;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class User.
 *
 * @package namespace App\Models;
 * @property int|null $status
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $first_name_hira
 * @property string|null $last_name_hira
 * @property date|null $birthday
 * @property object|null $sex
 * @property string|null $email2
 * @property string|null $note
 * @property object|null $job_situation
 * @property int|null $dependant
 * @property int|null $marital_status
 * @property string|null $info
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property string $password
 * @property string|null $picture
 */
class User extends Authenticatable
{
    use Notifiable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'picture',
        'status',
        'first_name',
        'last_name',
        'first_name_hira',
        'last_name_hira',
        'sex',
        'email2',
        'note',
        'job_situation',
        'dependant',
        'marital_status',
        'info',
        'birthday'
    ];

    /**
     * Cast attribute
     * @var array<string,string>
     */
    protected $casts = [
        'sex' => ESex::class,
        'marital_status' => EMarital::class,
        'job_situation' => EJobSituation::class
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
     * Get the path to the profile picture
     *
     * @return string
     */
    public function profilePicture()
    {
        if ($this->picture) {
            return "/{$this->picture}";
        }

        return 'http://i.pravatar.cc/200';
    }

    /**
     * Get job apply
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getJobApplyIds(): HasMany
    {
        return $this->hasMany(UserJobApply::class, 'user_id', 'id');
    }

    /**
     * Get job apply
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function getUserJobApplys(): BelongsToMany
    {
        return $this->belongsToMany(Job::class, 'user_job_apply');
    }

    /**
     * Get UserDegrees
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function getUserDegrees(): HasOne
    {
        return $this->hasOne(UserDegrees::class, 'user_id', 'id');
    }

    /**
     * Get UserExperience
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getUserExperience(): HasMany
    {
        return $this->hasMany(UserExperience::class, 'user_id', 'id');
    }

    /**
     * Get UserJobDesine
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getUserJobDesine(): HasMany
    {
        return $this->hasMany(UserJobDesine::class, 'user_id', 'id');
    }

    /**
     * Get UserJobDesine
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function getUserAddress(): HasMany
    {
        return $this->hasMany(UserAddress::class, 'user_id', 'id');
    }



    /**
     * Check if the user has admin role
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return true;
        //$this->role_id == 1;
    }

    /**
     * Check if the user has creator role
     *
     * @return boolean
     */
    public function isCreator()
    {
        return false;
        //$this->role_id == 2;
    }

    /**
     * Check if the user has user role
     *
     * @return boolean
     */
    public function isMember()
    {
        return false;
        //return $this->role_id == 3;
    }
}
