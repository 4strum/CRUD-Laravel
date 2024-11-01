@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Visualizar Usuário</h2>
        <div>
            <a href="{{ route('user.index') }}" class="btn btn-secondary me-2">Listar</a>
            <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-warning me-2">Editar</a>
            <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja apagar?')">Excluir</button>
            </form>
        </div>
    </div>

    @if (session('success'))
        <p class="alert alert-success">
            {{ session('success') }}
        </p>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Detalhes do Usuário</h5>
            <p class="card-text"><strong>ID:</strong> {{ $user->id }}</p>
            <p class="card-text"><strong>Nome:</strong> {{ $user->name }}</p>
            <p class="card-text"><strong>E-mail:</strong> {{ $user->email }}</p>
            <p class="card-text"><strong>Cadastrado em:</strong> {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i') }}</p>
            <p class="card-text"><strong>Editado em:</strong> {{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i') }}</p>
        </div>
    </div>
</div>
@endsection
