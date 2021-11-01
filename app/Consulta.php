<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    public $timestamps = false;
    protected $fillable = [
       'paciente_id', 'inicio', 'fim', 'queixa', 'diagnostico', 'rdod', 'rdoe', 'rdad', 'reod' ,'reoe', 'read'
    ];

    public static function convertDate($dateParameter){
        $date = explode(" ",$dateParameter)[0];
        $dia = explode("/",$date)[0];
        $mes = explode("/",$date)[1];
        $ano = explode("/",$date)[2];

        $time = explode(" ",$dateParameter)[1];
        $hora = explode(":",$time)[0];
        $minuto = explode(":",$time)[1];

        return $ano.'-'.$mes.'-'.$dia.' '.$hora.':'.$minuto.':00';
    }
}
