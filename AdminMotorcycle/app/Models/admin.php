<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class admin extends Model
{
    use HasFactory, Notifiable;
    protected  $table = 'admins';
    protected $fillable=([
        'username',
        'password',
        'fullName',
        'company',
        'job',
        'country',
        'address',
        'phone',
        'email',
        'about',
        'image',
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
    ]);

}
