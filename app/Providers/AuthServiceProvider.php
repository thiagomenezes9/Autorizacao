<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Post' => 'App\Policies\PostPolicy',

    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //





        Gate::define('admin',function ($user){
            return $user->type == User::_TYPEADMIN;
        });


        /*Gate::before(function ($user){
            if($user->type == User::_TYPEADMIN){
                return true;
            }
        });





        Gate::define('update-post',function($user,$post){
            return $user->id === $post->user->id;
        });*/

    }
}
