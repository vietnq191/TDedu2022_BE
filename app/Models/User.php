<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\Filterable;
use App\Traits\Paginatable;
use App\Traits\Sortable;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Bannable, HasRoles;
    use Paginatable, SoftDeletes, Filterable, Sortable;

    /**
     * The "booted" method of the model.
     *
     * @return void
     */
    protected static function booted()
    {
        static::addGlobalScope('softDelete', function ($builder) {
            return $builder->whereNull('deleted_at');
        });

        static::addGlobalScope('order', function ($builder) {
            return $builder->orderBy('created_at', 'desc');
        });
    }

    protected $appends = ['role', 'permissions'];

    protected $filterable = [
        'email', 'status', 'role', 'created_from', 'created_to'
    ];

    public $sortables = ['created_at'];

    public function getRoleAttribute()
    {
        $this->makeHidden('roles');
        return $this->getRoleNames();
    }

    public function getPermissionsAttribute()
    {
        return $this->getPermissionsViaRoles()->pluck('name');
    }

    public function filterEmail($query, $value)
    {
        return $query->where('email', 'LIKE', '%' . $value . '%');
    }

    public function filterStatus($query, $value)
    {
        return $query->where('status', $value);
    }

    public function filterRole($query, $value)
    {
        return $query->role($value);
    }

    public function filterCreatedFrom($query, $value)
    {
        return $query->whereBetween('created_at', [$value, now()->toDateString()]);
    }

    public function filterCreatedTo($query, $value)
    {
        $createFrom = $query->getQuery()->bindings['where'][2] ?? null;
        if (!$createFrom) {
            return $query->whereDate('created_at', '<=', $value);
        }

        return $query->whereDate('created_at', '>=', $createFrom)->whereDate('created_at', '<=', $value);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'bearer_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getProfiles()
    {
        return $this->belongsTo(UserProfile::class, 'id', 'user_id')->whereNull('user_profiles.deleted_at');
    }
}
