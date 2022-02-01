<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'role'];
    
    const ADMIN = 'admin';
    const MANAGER = 'manager';
    const USER = 'user';
}
