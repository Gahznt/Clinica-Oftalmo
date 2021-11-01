<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paciente;
use App\Consulta;
use DateTime;

class AgendaController extends Controller
{
    public function index($id) {
        $paciente_infos = Paciente::find($id);
        return view('admin.fullcalendar.master', [
            'paciente_infos' => $paciente_infos
        ]);
    }

    public function agendamento_post(Request $request) {
        $data = $request->only([
            'id',
            'inicio',
            'fim'
        ]);



        $insercao = [
            'paciente_id' => $data['id'],
            'inicio' => Consulta::convertDate($data['inicio']),
            'fim' => Consulta::convertDate($data['fim']),
        ];

        Consulta::create($insercao);
        return redirect()->back();
    }

    
}
