<?php

namespace App\Providers;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Account;
use App\Models\Organization;
use App\Models\Contact;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
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

        //
        Gate::define('delete-accounts', function (User $user) {
            return ($user->hasRole('super_admin'))
                        ? Response::allow()
                        : Response::denyWithStatus(403);
        });
       
        Gate::define('read-accounts',function(User $user,Account $account)
        {
            if($user->hasRole('user')&&($account->id === $user->accounts_id))
            {
                return Response::allow();
            }

            return ($user->hasRole('admin')&&($account->id === $user->accounts_id))
            ? Response::allow()
            : Response::denyWithStatus(403);
            
        });

        Gate::define('create-accounts', function (User $user) {
            return ($user->hasRole('super_admin'))
                        ? Response::allow()
                        : Response::denyWithStatus(403);
        });

        Gate::define('read-organizations',function(User $user, Organization $organization)
        {
            if($user->hasRole('user')&&($organization->accounts_id === $user->accounts_id))
            {
                return Response::allow();
            }

            return ($user->hasRole('admin')&&($organization->accounts_id === $user->accounts_id))
            ? Response::allow()
            : Response::denyWithStatus(403);
            
        });
        
        Gate::define('read-users',function(User $user)
        {

           
          return  $user->id === auth()->id();
          
          
        });

        Gate::define('read-contacts',function(User $user,Contact $contact )
        {
            if($user->hasRole('user')&&($contact->accounts_id === $user->accounts_id)&&($user->organizations_id===$contact->organizations_id))
            {
                return Response::allow();
            }

            return ($user->hasRole('admin')&&($contact->accounts_id === $user->accounts_id)&&($user->organizations_id===$contact->organizations_id))
            ? Response::allow()
            : Response::denyWithStatus(403);
        });

        Gate::define('create-organizations', function (User $user) {
            return ($user->hasRole('admin'))
                        ? Response::allow()
                        : Response::denyWithStatus(403);
        });

        Gate::define('create-contacts', function (User $user) {
            return ($user->hasRole('admin'))
                        ? Response::allow()
                        : Response::denyWithStatus(403);
        });

        Gate::define('update-contacts', function (User $user, Contact $contact) {
            return ($user->hasRole('admin')&& ($user->accounts_id ===$contact->accounts_id)&&($contact->organizations_id=== $user->organizations_id))
                        ? Response::allow()
                        : Response::denyWithStatus(403);
        });
             
        Gate::define('delete-contacts', function (User $user, Contact $contact) {
            return ($user->hasRole('admin')&&  ($user->accounts_id === $contact->accounts_id)&&($contact->organizations_id=== $user->organizations_id))
                        ? Response::allow()
                        : Response::denyWithStatus(404);
        });


        Gate::define('update-organizations', function (User $user,Organization $organization) {
            return ($user->hasRole('admin')&&  ($user->accounts_id ===$organization->accounts_id))
                        ? Response::allow()
                        : Response::denyWithStatus(403);
        });

        Gate::define('delete-organizations', function (User $user,Organization $organization) {
            return ($user->hasRole('admin') &&  ($user->accounts_id ===$organization->accounts_id)&&($organization->id=== $user->organizations_id))
                        ? Response::allow()
                        : Response::denyWithStatus(403);
        });

       

        Gate::before(function($user,$ability)
        {
           return $user->hasRole('super_admin')?true :null;
        });
        
       Gate::define('can-view-own',function(User $user,User $current_user)
       {
          return ($user->id===$current_user->id)||($user->hasRole('admin')&&($user->accounts_id===$current_user->accounts_id));
       });

       Gate::define('can-view-own-cont',function(User $user, Contact $contact)
       {
          return ($user->accounts_id===$contact->accounts_id)&&($user->organizations_id===$contact->organizations_id);
       });

       Gate::define('can-view-own-org',function(User $user, Organization $organization)
       {
          return ($user->accounts_id===$organization->accounts_id);
       });
       
       Gate::define('can-view-own-acc',function(User $user, Account $account)
       {
          return ($user->accounts_id===$account->id);
       });

       Gate::define('show-accounts',function(User $user, Account $account)
       {
          return ($user->accounts_id===$account->id);
       });

       Gate::define('show-organizations',function(User $user, Organization $organization)
       {
          return ($user->accounts_id===$organization->accounts_id)&&($user->organizations_id===$organization->id);
       });


       
        
        
    }
}
