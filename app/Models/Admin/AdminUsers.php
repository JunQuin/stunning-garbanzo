<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class AdminUsers extends Authenticatable
{
    use HasFactory;
    protected $guard = 'admin_users';
}
