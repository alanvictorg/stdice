<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(\App\Repositories\RoleRepository::class, \App\Repositories\RoleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\PermissionRepository::class, \App\Repositories\PermissionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RoleUserRepository::class, \App\Repositories\RoleUserRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RolePermissionRepository::class, \App\Repositories\RolePermissionRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\StateRepository::class, \App\Repositories\StateRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CityRepository::class, \App\Repositories\CityRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ClinicRepository::class, \App\Repositories\ClinicRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\TeacherRepository::class, \App\Repositories\TeacherRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CourseRepository::class, \App\Repositories\CourseRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\StudentRepository::class, \App\Repositories\StudentRepositoryEloquent::class);
        //:end-bindings:
    }
}
