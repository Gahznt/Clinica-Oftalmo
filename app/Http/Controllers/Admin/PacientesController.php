<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Paciente;

class PacientesController extends Controller
{
    public function index() {
        $pacientes = Paciente::paginate(20);
        return view('admin.pacientes.index', [
            'pacientes' => $pacientes
        ]);
    }

    public function index_filtro(Request $request) {

        $data = $request->only([
            'search'
        ]);

        $pacientes = Paciente::where('name', 'like', '%'.$data['search'].'%')->orWhere('cpf', 'like', '%'.$data['search'].'%')->orWhere('telefone', 'like', '%'.$data['search'].'%')->orWhere('convenio', 'like', '%'.$data['search'].'%')->get();

        return view('admin.pacientes.index_filtro', [
            'pacientes' => $pacientes
        ]);
    }
    public function cadastro() {
        return view('admin.pacientes.cadastro');
    }

    public function cadastro_post(Request $request) {
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
        Paciente::create($insercao);
        return redirect()->route('admin');
    }
}
