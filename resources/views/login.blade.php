@extends('layout.main')

@section('title' , 'Login')

@section('content')
    <div style="max-width: 540px" class="p-5 m-auto shadow rounded">
        <p class="text-center fs-2">Login</p>
        <form action="/login" method="get">
            @csrf
            <div class="form-floating mb-3">
                <input type="text" name="user" class="form-control" id="floatingInput">
                <label for="floatingInput">Usuário</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPassword">
                <label for="floatingPassword">Senha</label>
            </div>
            <button type="submit" class="btn btn-dark w-100 mb-3">Entrar</button>
            <p class="text-center w-100 ">Não possui cadastro? <a href="/register">Clique aqui.</a> </p>
        </form>
    </div>
@endsection
