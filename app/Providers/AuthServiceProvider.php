<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    // سياسة التصريح التي يجب عليه استخدامها للسماح بإجراء مّا (أو رفضه) على النموذج Task
    protected $policies = [
        'App\Task' => 'App\Policies\TaskPolicy',
        'App\User' => 'App\Policies\TaskPolicy',
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
    }
}
