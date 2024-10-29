@extends('layouts.admin')

@section('content')
<a href="{{route('user.index')}}">Lista</a><br>

@if ($errors->any())

    @foreach ($errors->all() as $error)
        <p style="color: #f00;">
            {{ $error }}<br>
        </p>
    @endforeach

@endif


<h2>Cadastrar usuario</h2>

<form action="{{ route('user-store') }}" method="POST">
    @csrf
    @method('POST')

    <label for="name">Nome:</label>
    <input type="text" name="name" placeholder="Nome completo" value="{{ old('name') }}"><br><br>

    <label for="email">E-mail:</label>
    <input type="email" name="email" placeholder="Coloque seu email" value="{{ old('email') }}"><br><br>

    <label for="senha">Senha:</label>
    <input type="password" name="senha" placeholder="Senha no minimo 6 caracteres"
        value="{{ old('password') }}"><br><br>

    <button type="submit">Cadastrar</button>


</form>
@endsection