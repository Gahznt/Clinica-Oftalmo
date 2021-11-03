@extends('adminlte::page')
@section('title', 'Pacientes')

@section('content_header')
<h1>
    Meus Pacientes
</h1>

@endsection
@section('content')
<a class="btn btn-primary text-light mb-2" href="{{route('pacientes')}}">Voltar</a>
<div class="card">
    <div class="card-body">
        <table class="table table-hover" style="text-align: center;">
            <thead>
                <tr>
                    <td><b>Nome</b></td>
                    <td><b>CPF</b></td>
                    <td><b>Telefone</b></td>
                    <td><b>Prontuário</b></td>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes as $paciente)
                <tr>
                    <td>{{$paciente->name}}</td>
                    <td>{{$paciente->cpf}}</td>
                    <td>{{$paciente->telefone}}</td>
                    <td><a class="btn btn-info btn-sm text-white" href="{{ route('prontuario', $paciente->id) }}"><b>Exibir</b></a></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection