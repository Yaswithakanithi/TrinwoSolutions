<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // 👈 Needed for login
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'company_name',
        'password',        // 👈 Add this
        'employee_id',     // 👈 Add this
    ];

    protected $hidden = [
        'password',        // 👈 Hide password
        'remember_token',
    ];

    // Optional: Cast password as hashed
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Optional: Define the relationship with Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
