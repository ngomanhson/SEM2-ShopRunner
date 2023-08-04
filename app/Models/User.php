<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        'avatar',

        'description',

        'company_name',
        'country',
        'street_address',
        'postcode_zip',
        'town_city',
        'phone'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * @var mixed
     */


    public  function roles(){
        return $this->belongsToMany(Role::class,'user_role');
    }
    public function permissions(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Permission::class, 'role_permission', 'role_id', 'permission_id')
            ->leftJoin('roles', 'roles.id', '=', 'role_permission.role_id');
    }


    public function hasPermission($permissionSlug)
    {
        foreach ($this->permissions as $perm) {
            // Kiểm tra xem quyền có slug nhất định có trong danh sách quyền của người dùng đăng nhập không
            if ($perm->slug === $permissionSlug) {
                return true;
            }
        }

        return false;
    }

}
