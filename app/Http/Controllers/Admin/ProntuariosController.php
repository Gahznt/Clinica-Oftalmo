<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paciente;
use App\Consulta;

class ProntuariosController extends Controller
{
    public function index($id) {
        $paciente_infos = Paciente::find($id);
        $consultas = Consulta::where('paciente_id', $paciente_infos->id)->get();
        return view('admin.pacientes.prontuario', [
            'paciente_infos' => $paciente_infos,
            'consultas' => $consultas
        ]);
    }

    public function edit(Request $request, $id) {
        $data = $request->only([
            'nome',
            'data_nascimento',
            'sexo',
            'cpf',
            'endereco',
            'telefone',
            'convenio'
        ]);

        $insercao = [
            'name' => $data['nome'],
            'dat_nascimento' => $data['data_nascimento'],
            'sexo' => $data['sexo'],
            'cpf' => $data['cpf'],
            'endereco' => $data['endereco'],
            'telefone' => $data['telefone'],
            'convenio' => $data['convenio']
        ];

        $paciente = Paciente::find($id);
        $paciente->update($insercao);
        return redirect()->back();
    }
}
