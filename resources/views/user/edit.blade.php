@extends('layouts.admin')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between mb-3">
        <h1>Editar Usuário</h1>
        <div>
            <a href="{{ route('user.index') }}" class="btn btn-secondary me-2">Listar</a>
            <a href="{{ route('user.show', ['user' => $user->id]) }}" class="btn btn-info">Visualizar</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('user-update', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nome:</label>
            <input type="text" class="form-control" name="name" placeholder="Nome completo" value="{{ old('name', $user->name) }}">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" name="email" placeholder="Coloque seu email" value="{{ old('email', $user->email) }}">
        </div>

        <div class="mb-3">
            <label for="senha" class="form-label">Senha:</label>
            <input type="password" class="form-control" name="senha" placeholder="Senha no mínimo 6 caracteres" value="{{ old('password') }}">
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection
