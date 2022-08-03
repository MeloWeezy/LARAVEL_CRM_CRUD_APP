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
        Gate::define('delete-account', function (User $user) {
            return ($user->hasRole('super_admin'))
                        ? Response::allow()
                        : Response::denyWithStatus(403);
        });
       
        Gate::define('read-account',function(User $user,Account $account)
        {
            if($user->hasRole('user')&&($account->id === $user->account_id))
            {
                return Response::allow();
            }

            return ($user->hasRole('admin')&&($account->id === $user->account_id))
            ? Response::allow()
            : Response::denyWithStatus(403);
            
        });

        Gate::define('create-account', function (User $user) {
            return ($user->hasRole('super_admin'))
                        ? Response::allow()
                        : Response::denyWithStatus(403);
        });

        Gate::define('update-account', function (User $user) {
            return ($user->hasRole('super_admin'))
                        ? Response::allow()
                        : Response::denyWithStatus(403);
        });

        Gate::define('store-account', function (User $user) {
            return ($user->hasRole('super_admin'))
                        ? Response::allow()
                        : Response::denyWithStatus(403);
        });

        Gate::define('read-organization',function(User $user, Organization $organization)
        {
         return (($user->hasRole('super_admin')
                     ? Response::allow()
                     : $user->hasRole('admin')&&($organization->account_id === $user->account_id)))
                     ? Response::allow()
                     :($user->hasRole('user')&&($organization->id === $user->organization_id)
                     ?Response::allow()
                     : Response::denyWithStatus(403));

                  
            
        });
        
      

        Gate::define('edit-user',function(User $user, User $current_user)
        {
            if($user->hasRole('admin')&&($current_user->account_id === $user->account_id))
            {
                return Response::allow();
            }

            return ($user->id === $current_user->id)
            ? Response::allow()
            : Response::denyWithStatus(403);
            
        });

        Gate::define('read-contact',function(User $user,Contact $contact )
        {
            if($user->hasRole('user')&&($user->organization_id===$contact->organization_id))
            {
                return Response::allow();
            }

            return ($user->hasRole('admin')&&($contact->account_id === $user->account_id)&&($user->organization_id===$contact->organization_id))
            ? Response::allow()
            : Response::denyWithStatus(403);
        });

        Gate::define('create-organization', function (User $user) {
            return ($user->hasRole('admin'))
                        ? Response::allow()
                        : Response::denyWithStatus(403);
        });

        Gate::define('create-contact', function (User $user) {
            return ($user->hasRole('admin'))
                        ? Response::allow()
                        : Response::denyWithStatus(403);
        });

        Gate::define('update-contact', function (User $user, Contact $contact) {
            return ($user->hasRole('admin')&& ($user->account_id ===$contact->account_id)&&($contact->organization_id=== $user->organization_id))
                        ? Response::allow()
                        : Response::denyWithStatus(403);
        });
             
        Gate::define('delete-contact', function (User $user, Contact $contact) {
            return ($user->hasRole('admin')&&  ($user->account_id === $contact->account_id)&&($contact->organization_id=== $user->organization_id))
                        ? Response::allow()
                        : Response::denyWithStatus(403);
        });

        Gate::define('store-contact', function (User $user, Contact $contact) {
            return ($user->hasRole('admin'))
                        ? Response::allow()
                        : Response::denyWithStatus(403);
        });


        Gate::define('update-organization', function (User $user,Organization $organization) {
            return ($user->hasRole('admin')&&  ($user->account_id ===$organization->account_id))
                        ? Response::allow()
                        : Response::denyWithStatus(403);
        });

        Gate::define('delete-organization', function (User $user,Organization $organization) {
            return ($user->hasRole('admin') &&  ($user->account_id ===$organization->account_id))
                        ? Response::allow()
                        : Response::denyWithStatus(403);
        });
        Gate::define('store-organization', function (User $user,Organization $organization) {
            return ($user->hasRole('admin'))
                        ? Response::allow()
                        : Response::denyWithStatus(403);
        });

       

        Gate::before(function($user,$ability)
        {
           return $user->hasRole('super_admin')?true :null;
        });
        
       Gate::define('can-view-own',function(User $user,User $current_user)
       {
          return ($user->id===$current_user->id)||($user->hasRole('admin')&&($user->account_id===$current_user->account_id));
       });

       Gate::define('can-view-own-cont',function(User $user, Contact $contact)
       {
          return ($user->account_id===$contact->account_id)&&($user->organization_id===$contact->organization_id);
       });

       Gate::define('can-view-own-org',function(User $user, Organization $organization)
       {
          return ($user->account_id===$organization->account_id);
       });
       
       Gate::define('can-view-own-acc',function(User $user, Account $account)
       {
          return ($user->account_id===$account->id);
       });

       Gate::define('show-accounts',function(User $user, Account $account)
       {
          return ($user->account_id===$account->id);
       });

       Gate::define('show-organizations',function(User $user, Organization $organization)
       {
          return ($user->account_id===$organization->account_id)&&($user->organization_id===$organization->id);
       });

      
       
        
        
    }
}
