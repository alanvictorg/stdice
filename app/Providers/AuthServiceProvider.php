<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use App\Entities\Permission;
use Laravel\Passport\Passport;
use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate, Request $request)
    {
        $this->registerPolicies();
        Passport::routes();

        $gate->before(function($user)
        {  
            $permisssions = Permission::all();
            //dd($permisssions);
            foreach ($permisssions as $permisssion)
            {   

                Gate::define($permisssion->slug, function ($user) use ($permisssion) {
                   
                    return $user->hasPermission($permisssion);
                });
            } 
            if ($user->isSuperAdmin()){
                return true;
            } 
        });
    }
}
