<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pacjent extends Model
{
    use HasFactory;

    protected $table = 'pacjent';

    protected $fillable = [
        'user_id',
        'imie',
        'nazwisko',
        'pesel',
        'telefon',
        'data_urodzenia',
        'id_lekarz'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function pacjenci()
    {
        return $this->hasMany(Pacjent::class, 'id_lekarz');
    }

    public function wizyty()
    {
        return $this->hasMany(Wizyta::class, 'id_lekarz');
    }
    public function getVisitCount()
    {
        $result = DB::select('SELECT GetVisitCountForPatient(?) AS count', [$this->id]);
        return $result[0]->count;
    }

    public function getVisitDetails()
    {
        return DB::select('CALL GetPatientVisitsDetails(?)', [$this->id]);
    }
}
