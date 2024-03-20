<?php

namespace App\Providers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Opcodes\LogViewer\Facades\LogViewer;
use Opcodes\LogViewer\LogFile;
use Opcodes\LogViewer\LogFolder;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        LogViewer::auth(function ($request) {
            return $request->user()
                && in_array($request->user()->email, [
                    'gabrielmpxx@gmail.com',
                ]);
        });

        Gate::define('deleteLogFile', function (?User $user, LogFile $file) {
            // return true if the user is allowed to delete the specific log file.
        });

        Gate::define('deleteLogFolder', function (?User $user, LogFolder $folder) {
            // return true if the user is allowed to delete the whole folder.
        });
    }
}
