<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lekarstwo extends Model
{
    use HasFactory;

    protected $table = 'lekarstwo';

    protected $fillable = [
        'nazwa',
        'dostepnosc',
    ];
}
