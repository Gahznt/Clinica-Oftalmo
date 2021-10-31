<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paciente;

class ConsultasController extends Controller
{
    public function index($id) {
        $paciente_infos = Paciente::find($id);
        return view ('admin.consultas.new', [
            'paciente_infos' => $paciente_infos
        ]);
    }
}
