<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PersonalData extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'uid',
        'first_name',
        'last_name',
        'level',
        'DOB',
        'height',
        'weight',
        'gender',
        'profile_image'
    ];
}
