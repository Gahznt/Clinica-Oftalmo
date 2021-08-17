@extends('adminlte::page')
@section('title', 'Editar usuário')

@section('content_header')
    <h1>Editar Usuário</h1>
@endsection

@section('content')

    @if($errors->any())
    <div class="callout callout-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

<div class="card">
    <div class="card-body">
        <form action="{{route('users.update', ['user'=>$user->id]) }}" method="POST" class="form-horizontal">
            @method('PUT')
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nome completo:</label>
                    <div class="col-sm-6">
                        <input type="text" value="{{$user->name}}" name="name" class="form-control @error('name') is-invalid @enderror" > 
                    </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-6">
                        <input type="email" value="{{$user->email}}" name="email" class="form-control @error('email') is-invalid @enderror"> 
                    </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nova Senha:</label>
                    <div class="col-sm-6">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"> 
                    </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Confirmar senha:</label>
                    <div class="col-sm-6">
                        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror"> 
                    </div>
            </div>
            <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Permissão de Admin</label>
                    <div class="col-sm-6">
                        <select class="custom-select" name="admin">
                        @if ($user->admin == 1)
                        <option value="{{$user->admin}}">Sim</option>
                        @else <option value="{{$user->admin}}">Não</option>
                        @endelse
                        @endif
                          @if ($user->admin == 1) 
                          <option value="0">Não</option>
                          @else <option value="1">Sim</option>
                          @endelse
                          @endif
                        </select>
                    </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-2">
                        <input type="submit" class="btn btn-block bg-gradient-success" value="Salvar"> 
                    </div>
            </div>
        </form>
    </div>
</div>
@endsection