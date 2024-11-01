@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="text-end mb-3">
        <a href="{{ route('user.create') }}" class="btn btn-success">Cadastrar</a>
    </div>

    <h2 class="text-center mb-4">Listar Usuários</h2>

    @if (session('success'))
        <p class="alert alert-success">
            {{ session('success') }}
        </p>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped text-center">
            <thead class="table-light">
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

            </tbody>
        </table>
    </div>
</div>
@endsection
