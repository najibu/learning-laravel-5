<?php

namespace App\Providers;

use App\Permission;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // \App\Post::class => \App\Policies\PostPolicy::class
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
         parent::registerPolicies($gate);

        foreach ($this->getPermissions() as $permission) 
        {
            $gate->define($permission->name, function($user) use ($permission) {
                return $user->hasRole($permission->roles);
            });
        }
        
        // $role->define('manager', 'Site Manager');
        // $role->define('editor', 'Site Editor');

        // $gate->define('edit_forum', function($user){
        //     return $user->hasRole('manager');
        // });
        // $this->registerPolicies($gate);

        // $gate->define('update-post', function($user, $post)
        // {
        //     return $user->owns($post);
        // });

    }

    /**
     * Fetch the collection of site permissions.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function getPermissions()
    {
        return Permission::with('roles')->get();
    }
}
