<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isSuperAdmin()
    {
        return $this->role === 'super-admin';
    }

    public function sendPasswordResetNotification($token): void
    {
        // $url = 'http://127.0.0.1:8000/password.reset?token='.$token;

        // $this->notify(new ResetPasswordNotification($url));

    //     $url = URL::signedRoute(
    //         'password.reset',
    //         ['token' => $token, 'email' => $this->getEmailForPasswordReset()]
    //     );

    //     $this->notify(new ResetPasswordNotification($url));
    }
}
