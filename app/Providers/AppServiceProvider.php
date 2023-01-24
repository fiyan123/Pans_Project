<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }
    
    public function boot()
    {
        Paginator::useBootstrap();

        Gate::define('admin' , function(User $user){
            return $user->is_admin;
        });

        Gate::define('guru' , function(User $user){
            return $user->is_guru;
        });
    }
}
