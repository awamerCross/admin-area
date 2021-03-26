<?php

namespace App\Providers;

use App\Repositories\Eloquent\RoleRepository;
use App\Repositories\Eloquent\SettingRepository;
use App\Repositories\Eloquent\UserRepository;
use App\Repositories\Interfaces\IRole;
use App\Repositories\Interfaces\ISetting;
use App\Repositories\Interfaces\IUser;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(IRole::class       , RoleRepository::class);
        $this->app->bind(IUser::class       , UserRepository::class);
        $this->app->bind(ISetting::class    , SettingRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
