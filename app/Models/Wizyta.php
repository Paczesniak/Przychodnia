<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Wizyta extends Model
{
    use HasFactory;

    protected $table = 'wizyta';

    protected $fillable = [
        'id_pacjent',
        'id_lekarz',
        'data_wizyty',
        'opis',
        'choroba_id',
        'leczenie_id',
    ];

    public function pacjent()
    {
        return $this->belongsTo(Pacjent::class, 'id_pacjent');
    }

    public function lekarz()
    {
        return $this->belongsTo(Lekarz::class, 'id_lekarz');
    }

    public function choroba()
    {
        return $this->belongsTo(Choroba::class, 'choroba_id');
    }

    public function leczenie()
    {
        return $this->belongsTo(Lekarstwo::class, 'leczenie_id');
    }
    public static function scheduleAppointment($pacjent_id, $lekarz_id, $data_wizyty, $opis, $choroba_id = null, $leczenie_id = null)
    {
        DB::statement('CALL ScheduleAppointment(?, ?, ?, ?, ?, ?)', [
            $pacjent_id,
            $lekarz_id,
            $data_wizyty,
            $opis,
            $choroba_id,
            $leczenie_id
        ]);
    }
    public static function editAppointment($id, $pacjent_id, $lekarz_id, $data_wizyty, $opis, $choroba_id = null, $leczenie_id = null)
    {
        DB::statement('CALL EditAppointment(?, ?, ?, ?, ?, ?, ?)', [
            $id,
            $pacjent_id,
            $lekarz_id,
            $data_wizyty,
            $opis,
            $choroba_id,
            $leczenie_id
        ]);
    }
    public static function deleteAppointment($id)
    {
        DB::statement('CALL DeleteAppointment(?)', [
            $id
        ]);
    }
}
