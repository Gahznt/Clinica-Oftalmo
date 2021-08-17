@extends('adminlte::page')
@section('title', 'Perfil')

@section('content_header')
@endsection

@section('content')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="w-100">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                <h1>Meu Perfil</h1>
                </div>
                <h3 class="profile-username text-center">{{$user['name']}}</h3>
                <p class="text-muted text-center">{{$user['email']}}</p>
                <hr>
                @if($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      <h5><i class="icon fas fa-ban"></i>Ocorreu um erro!</h5>
                      @foreach($errors->all() as $erro)
                        <li>{{$erro}}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                @if(session('warning'))
                <div class="alert alert-success">
                <i class="icon fas fa-check"></i> {{session('warning')}}
                </div>
                @endif
                <h5>Alterar informações</h5>
                <form action="{{route('profile.save')}}" method="POST">
                @method('PUT')
                @csrf
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group">
                    <label class="col-sm-2 col-form-label">Nome:</label>
                    <input type="text" value="{{$user->name}}" name="name" class="form-control @error('name') is-invalid @enderror" > 
                  </li>
                    <li class="list-group">
                    <label class="col-sm-2 col-form-label">Email:</label>
                  <input type="email" value="{{$user->email}}" name="email" class="form-control @error('email') is-invalid @enderror"> 
                  </li>
                  <li class="list-group">
                    <label class="col-sm-2 col-form-label">Nova Senha:</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"> 
                  </li>
                  <li class="list-group">
                    <label class="col-sm-4 col-form-label">Confirmar nova senha:</label>
                    <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror"> 
                  </li>
                    <div class="text-center">
                    <input type="submit" class=" mt-3 btn btn-success col-sm-2" value="Salvar"> 
                  </div>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
@endsection