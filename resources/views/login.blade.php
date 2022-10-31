@extends('layouts.app')
@section('conteudo')
<body>
  <div class="form_login">
        <form method="POST" action="{{ route('auth') }}">
            @csrf
            <div class="container" style="margin-top: 250px; margin-left:400px">
            <div class="simple-login-container">
                <h2>Realize o login</h2>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input name="email" type="text" class="form-control" placeholder="E-mail">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input name="password" type="password" placeholder="Senha" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 form-group">
                        <input type="submit" value="Entrar" class="btn-primary btn-block btn-login">
                    </div>
                </div>
                <a href="/cadastro/user" class="btn btn">Não possui cadastro?</a>
            </div>
        </div>
      </form>
  </div>
</body>
@endsection('conteudo')
@include('layouts.partials.menu')
