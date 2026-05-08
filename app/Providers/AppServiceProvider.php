<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Login;
use Illuminate\Auth\Events\Logout;

use App\Observers\AuditObserver;
use App\Models\Category;
use App\Models\Project;
use App\Models\Contact;
use App\Models\User;
use App\Models\AuditLog;

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
        // Register model observers for audit logging
        Category::observe(AuditObserver::class);
        Project::observe(AuditObserver::class);
        Contact::observe(AuditObserver::class);
        User::observe(AuditObserver::class);

        // Listen for login/logout events to record auth actions
        Event::listen(Login::class, function (Login $event) {
            try {
                AuditLog::create([
                    'user_id' => $event->user->id ?? null,
                    'action' => 'login',
                    'method' => 'login',
                    'path' => request()?->path() ?? null,
                    'ip' => request()?->ip() ?? null,
                    'user_agent' => substr(request()?->header('User-Agent') ?? '', 0, 1000),
                    'payload' => null,
                ]);
            } catch (\Throwable $e) {
            }
        });

        Event::listen(Logout::class, function (Logout $event) {
            try {
                AuditLog::create([
                    'user_id' => $event->user->id ?? null,
                    'action' => 'logout',
                    'method' => 'logout',
                    'path' => request()?->path() ?? null,
                    'ip' => request()?->ip() ?? null,
                    'user_agent' => substr(request()?->header('User-Agent') ?? '', 0, 1000),
                    'payload' => null,
                ]);
            } catch (\Throwable $e) {
            }
        });
    }
}
