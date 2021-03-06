@extends('adminlte::page')
@section('title', 'Pacientes')

@section('content_header')
<h1>
    Meus Pacientes
</h1>

@endsection
@section('content')
<form action="{{route('pacientes-filtro')}}" method="GET">
    @csrf
    <div class="row">
        <div class="form-group col-sm-3">
            <input class="form-control" type="text" name="search" placeholder="Pesquisar"></input>
        </div>
        <div class="form-group col-sm-3">
            <button class="btn btn-info" type="submit"><i class="fas fa-search"></i> Pesquisar</button>
        </div>
    </div>
</form>
<div class="card">
    <div class="card-body">

        <table class="table table-hover" style="text-align: center;">
            <thead>
                <a class="btn btn-success text-light" href="{{route('cadastro-de-paciente')}}">Cadastrar</a>
                <tr>
                    <td><b>Nome</b></td>
                    <td><b>CPF</b></td>
                    <td><b>Telefone</b></td>
                    <td><b>Convênio</b></td>
                    <td><b>Prontuário</b></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes as $paciente)
                <tr>
                    <td>{{$paciente->name}}</td>
                    <td>{{$paciente->cpf}}</td>
                    <td>{{$paciente->telefone}}</td>
                    <td>{{$paciente->convenio}}</td>
                    <td><a class="btn btn-info btn-sm text-white" href="{{ route('prontuario', $paciente->id) }}"><b>Exibir</b></a></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection