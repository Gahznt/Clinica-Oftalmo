<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Consulta;
use App\Paciente;

class homeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index() {
        $consultas = Consulta::all();
        foreach ($consultas as $consulta ) {
            $name = Paciente::where('id', $consulta->paciente_id)->get('name');
            $consulta->nomepaciente = $name;
        }
        return view('admin.index', [
            'consultas' => $consultas
        ]);
    }
}
