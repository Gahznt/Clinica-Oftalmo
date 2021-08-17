@extends('adminlte::page')
@section('title', 'Acessos')

@section('content_header')
    <h1>
        Meus Usuários
        <a href="{{route('users.create')}}" class="btn btn-sm btn-success">Novo Usuário</a>
    </h1>
@endsection
@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-hover">
        <thead>
            <tr>
                <td><b>ID</b></td>
                <td><b>Nome</b></td>
                <td><b>E-mail</b></td>
                <td><b>Admin</b></td>
                <td><b>Ações</b></td>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    @if ($user->admin == 1) 
                        <td class="text-success">Sim</td>
                        @else <td class="text-danger">Não</td>
                    @endif
                    <td>
                    @if ($loggedId !== intval($user->id))
                    <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-sm btn-primary">Editar</a>
                    <form method="POST" class="d-inline" action="{{route('users.destroy', ['user' => $user->id])}}" onsubmit="return confirm('Deseja deletar este usuário? Está ação não poderá ser desfeita')">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                    @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
        </table>
    </div>
</div>
    {{ $users->links() }}
@endsection