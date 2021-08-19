@extends('adminlte::page')
@section('title', 'Pacientes')

@section('content_header')
<h1>
    Meus Pacientes
</h1>
@endsection
@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-hover" style="text-align: center;">
            <thead>
                <tr>
                    <td><b>ID</b></td>
                    <td><b>Nome</b></td>
                    <td><b>Telefone</b></td>
                    <td><b>Consultas</b></td>
                    <td><b>Exames</b></td>
                    <td><b>Prontuário</b></td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Fulano</td>
                    <td>(35) 94002-8922</td>
                    <td><a class="btn btn-info btn-sm text-white">Vizualizar</a></a></td>
                    <td><a class="btn btn-info btn-sm text-white">Vizualizar</a></a></td>
                    <td><a class="btn btn-danger btn-sm text-white"><b>Exibir</b></a></a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Beltrano</td>
                    <td>(11) 94002-8922</td>
                    <td><a class="btn btn-info btn-sm text-white">Vizualizar</a></a></td>
                    <td><a class="btn btn-info btn-sm text-white">Vizualizar</a></a></td>
                    <td><a class="btn btn-danger btn-sm text-white"><b>Exibir</b></a></a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Ciclano</td>
                    <td>(19) 94002-8922</td>
                    <td><a class="btn btn-info btn-sm text-white">Vizualizar</a></a></td>
                    <td><a class="btn btn-info btn-sm text-white">Vizualizar</a></a></td>
                    <td><a class="btn btn-danger btn-sm text-white"><b>Exibir</b></a></a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection