<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function (User $user) {
//            return $post->user()->is($user);
            if ($user->status != "admin"){
                return false;
            }
            else{
                return true;
            }
        });
        Gate::define('student', function (User $user) {
            if ($user->status == "lecturer"){
                return false;
            }
            else{
                return true;
            }
        });
        Gate::define('lecturer', function (User $user) {
            if ($user->status == "student"){
                return false;
            }
            else{
                return true;
            }
        });
        Gate::define('own', function (User $user) {
            if (!empty($user)) {
                if ($user === Auth::user() || Auth::user()->status == 'admin')  {
                    return true;
                }else{
                    return false;
                }
            }
        });


    }
}
