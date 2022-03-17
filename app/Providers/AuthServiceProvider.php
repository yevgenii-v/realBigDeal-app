<?php

namespace App\Providers;

use App\Models\Role;
use App\Models\Ticket;
use App\Models\User;
use App\Policies\ControlPanelPolicy;
use App\Policies\TicketPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class     => ControlPanelPolicy::class,
        Ticket::class   => TicketPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('getControlPanel', function (User $user){
            return $user->roles->containsStrict('id', Role::IS_ADMIN) || $user->roles->containsStrict('id', Role::IS_SUPPORT);
        });

        Gate::define('deleteAll', function (User $user){
            return $user->roles->containsStrict('id', Role::IS_ADMIN);
        });
    }
}
