<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Choroba extends Model
{
    use HasFactory;

    protected $table = 'choroba';

    protected $fillable = [
        'nazwa',
    ];
}
