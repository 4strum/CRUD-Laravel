@extends('layouts.admin')

@section('content')
<a href="{{route('user.create')}}">Cadastrar</a><br>

<h2>Listar Usuários</h2>

@if (session('success'))
    <p style="color: #086">
        {{ session('success') }}
    </p>

@endif

<table class="table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">NOME</th>
            <th scope="col">E-mail</th>
            <th scope="col" class="text-center">Ações</th>
        </tr>
    </thead>
    <tbody>

    @forelse ($users as $user)
    <tr>
        <th scope="row">{{ $user->id }}</th>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td class="text-center">
                <a class="btn btn-primary btn-sm me-2" href="{{ route('user.show', ['user' => $user->id]) }}">Visualizar</a>
                <a class="btn btn-warning btn-sm me-2" href="{{ route('user.edit', ['user' => $user->id]) }}">Editar</a>
                <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}" class="d-inline">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm me-2" type="submit" onclick="return confirm('Tem certeza que deseja apagar?')">Excluir</button>
                </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="4" class="text-center">Nenhum usuário encontrado.</td>
    </tr>
@endforelse




        @endsection