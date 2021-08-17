@extends('adminlte::page')
@section('title', 'Novo usuário')

@section('content_header')
    <h1>Novo Usuário</h1>
@endsection

@section('content')

    @if($errors->any())
    <div class="callout callout-danger">
        <ul>
        <i class="fa fa-bullhorn"></i>
        <h5>Ops!</h5>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif

<div class="card">
    <div class="card-body">
        <form action="{{route('users.store')}}" method="POST" class="form-horizontal">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nome completo:</label>
                    <div class="col-sm-6">
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-user"></i></span>
                        </div>
                        <input type="text" value="{{old('name')}}" name="name" class="form-control @error('name') is-invalid @enderror" > 
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Email:</label>
                    <div class="col-sm-6">
                        <div class="input-group mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                        <input type="email" value="{{old('email')}}" name="email" class="form-control @error('email') is-invalid @enderror"> 
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Senha:</label>
                    <div class="col-sm-6">
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"> 
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Confirmar senha:</label>
                    <div class="col-sm-6">
                    <div class="input-group mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror"> 
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-success" value="Cadastrar"> 
                    </div>
            </div>
        </form>
    </div>
</div>
@endsection