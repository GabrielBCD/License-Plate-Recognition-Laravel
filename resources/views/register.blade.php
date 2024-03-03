@extends('main')

@section('title' , 'Register')

@section('content')
    <div class="p-5 m-auto shadow rounded register">
        <p class="text-center fs-2">Registro</p>
        <form action="/register" method="get">
            <div class="form-floating mb-3">
                <input type="text" name="name" class="form-control" id="input_name">
                <label for="input_name">Nome Completo</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="user" class="form-control" id="input_user">
                <label for="input_user">Matrícula</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" name="mail" class="form-control" id="input_mail">
                <label for="input_mail">E-mail</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="input_pass">
                <label for="input_password">Senha</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="confirm_password" class="form-control" id="input_confirm_pass">
                <label for="input_confirm_pass">Confirme a Senha</label>
            </div>
            <button type="submit" class="btn btn-dark w-100">Registrar</button>
        </form>
    </div>
@endsection
