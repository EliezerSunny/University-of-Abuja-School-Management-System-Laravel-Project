<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Admin;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        // Verify your email  before logging in
        VerifyEmail::toMailUsing(function (object $notifiable, string $url) 
        {
            return (new MailMessage)
            ->subject('Verify Email Address')
            ->line('Click the button below to verify your email address.')
            ->action('Verify Email Address', $url);
        });


        
        // Reset password for User
        ResetPassword::createUrlUsing(function ($notifiable, string $token) {
            if ($notifiable instanceof User) {
                return 'http://127.0.0.1:8000/reset_password?token=' . $token;
            } elseif ($notifiable instanceof Lecturer) {
                return 'http://127.0.0.1:8000/lecturer/reset_password?token=' . $token;
            } elseif ($notifiable instanceof Admin) {
                return 'http://127.0.0.1:8000/lecturer/admin/reset_password?token=' . $token;
            }
        });
        
        


        // $this->registerPolicies();



        // Gate::define('add admin', function(Admin $admin) {
        //     return $admin->hasPermissionTo('add admin', 'admin');
            
        // });

        // Gate::define('lecturer', function(Lecturer $lecturer) {
        //         return true;
        // });

        // Gate::define('user', function(User $user) {
        //         return true;
        // });


    }
}
