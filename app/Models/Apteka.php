<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apteka extends Model
{
    use HasFactory;

    protected $table = 'apteka';

    protected $fillable = [
        'miasto',
        'ulica',
        'numer',
        'telefon',
        'email',
    ];
}
