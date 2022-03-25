<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\HasApiTokens;

class Book extends Model
{
    use HasFactory, HasApiTokens, Notifiable;

    protected $table = 'book';

    protected $fillable = [
        'page_number',
        'book_name',
        'description',
        'author',
        'image_url',
        'published_date'
    ];

    public function getUrlAttribute()
    {
        return Storage::url($this->image_url);
    }
}
