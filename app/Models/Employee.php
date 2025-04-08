<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',  // Keep this if used
        'employee_id', // Ensure login is using this
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
    ];
    public function getAuthIdentifierName()
{
    return 'employee_id';
}
public function clients()
{
    return $this->hasMany(Client::class);
}

}
