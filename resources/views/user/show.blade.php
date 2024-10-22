<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show usuario</title>
</head>

<body>


    <a href="{{route('user.index')}}">listar</a><br>
    <a href="{{route('user.edit', ['user' => $user->id])}}">Editar</a><br>

    <h2>Visualizar Usuário</h2>
    
    @if (session('success'))
        <p style="color: #086">
            {{ session('success') }}
        </p>
    
    @endif

    ID : {{ $user->id}} <br>
    name : {{ $user->name}} <br>
    email : {{ $user->email}} <br>
    Cadastrado : {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i') }} <br>
    Editado : {{ \Carbon\Carbon::parse($user->updated_at)->format('d/m/Y H:i') }} <br>
</body>

</html>