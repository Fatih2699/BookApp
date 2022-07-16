<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Phone extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'phone_data';

    protected $fillable = [
        'number',
        'name',
        'calltype',
        'duration',
        'begin_date'
    ];
}
