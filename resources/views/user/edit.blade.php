@extends('layouts.admin')

@section('content')

<a href="{{route('user.index')}}">listar</a><br>
<a href="{{route('user.show', ['user' => $user->id])}}">vizualizar</a><br>

<h1>Edtiar Usuario</h1>

@if ($errors->any())

    @foreach ($errors->all() as $error)
        <p style="color: #f00;">
            {{ $error }}<br>
        </p>
    @endforeach

@endif


<h2>Cadastrar usuario</h2>

<form action="{{ route('user-update', ['user' => $user->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="name">Nome:</label>
    <input type="text" name="name" placeholder="Nome completo" value="{{ old('name', $user->name) }}"><br><br>

    <label for="email">E-mail:</label>
    <input type="email" name="email" placeholder="Coloque seu email" value="{{ old('email', $user->email) }}"><br><br>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" placeholder="Senha no minimo 6 caracteres"
        value="{{ old('password') }}"><br><br>

    <button type="submit">Salvar</button>


</form>

@endsection