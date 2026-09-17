<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ToolIssue;
class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'picture',
        'mechanic_level',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function toolIssues()
    {
        return $this->hasMany(ToolIssue::class);
    }
}