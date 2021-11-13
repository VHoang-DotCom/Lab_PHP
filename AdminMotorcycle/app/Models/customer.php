<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    use HasFactory;
    public $fillable=([
        'username',
        'password',
        'firstName',
        'lastName',
        'address',
        'email',
        'phone',
    ]);
}
