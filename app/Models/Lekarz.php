<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lekarz extends Model
{
    use HasFactory;

    protected $table = 'lekarz';

    protected $fillable = [
        'user_id',
        'imie',
        'nazwisko',
        'telefon',
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
    public function getPatientCount()
    {
        $result = DB::select('SELECT GetPatientCountForDoctor(?) AS count', [$this->id]);
        return $result[0]->count;
    }
    public function getVisitsForDay($date)
    {
        return DB::select('CALL GetDoctorVisitsForDay(?, ?)', [$this->id, $date]);
    }

}
