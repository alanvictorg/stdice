<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Entities\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','verification_code','confirmed','password_default','imagepath'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_users');
    }

    public function isSuperAdmin()
    {

        return $this->roles->first()->slug == "admin" ? true : false ;
    }
    
    public function permissions()
    {
        $roles = $this->roles()->get();
        $role_permission = \App\Entities\RolePermission::whereIn('role_id', $roles)->with('permissions')->pluck('permission_id');
        return  \App\Entities\Permission::whereIn('id', $role_permission)->get();
    }
    public function hasPermission($permission)
    {
        $permissions = $this->permissions()->where('id', $permission->id);
        return $permissions->isEmpty() ? false : true;
    }
}
