@extends('layouts.app')
@section('conteudo')
<body>
    <div class="form_modulos">
        <form style="margin-left: 400px;margin-top: 100px" method="POST" action="{{ route('salvar_modulo') }}">
            @csrf

            <h1 style="text-align: center; font-weight: bold; margin-bottom:50px">Cadastre o modulo</h1>

            @if(session('success'))
            <div class="alert">{{session('success')}}</div>
            @endif

          <div class="form-row">
            <div class="form-group col-md-6">
              <label class="details">Selecione o curso</label><br>
              <select name="cursos_id" class="form-control" required>

                  <option value="" class="form-control">Selecione...</option>
                  @foreach($cursos as $curso)
                      <option value="{{$curso->id}}">{{$curso->nome}}</option>
                  @endforeach
              </select>
            </div>
              <div class="form-group col-md-6">
                <label class="details">Nome</label> <br>
                <input type="text" name="nome" class="form-control"/><br>
            </div>
          
        </div>
              <button class="form-control btn-primary" type="submit">Salvar</button>
        </form>
    </div>
  </body>
@endsection('conteudo')
@include('layouts.partials.menu')