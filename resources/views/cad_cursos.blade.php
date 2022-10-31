@extends('layouts.app')
@section('conteudo')
<body>
    <div class="form_cursos">
        <form style="margin-left: 400px;margin-top: 100px" method="POST" action="{{ route('salvar_curso') }}">
            @csrf
            <h1 style="text-align: center; font-weight: bold; margin-bottom:50px">Cadastre o curso</h1>
            
            @if(session('success'))
            <div class="alert">{{session('success')}}</div>
            @endif
   
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">Nome do curso</label>
                    <input type="text" name="nome" class="form-control" id="inputName" placeholder="Nome">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputImagem">Imagem do curso</label>
                    <input type="text" name="imagem" class="form-control" id="inputImagem" placeholder="Link da Imagem">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputDesc">Descricao do curso</label>
                    <input type="text" name="descricao" class="form-control" id="inputDesc" placeholder="Descreva o seu curso">
                </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputRequisitos">Requisitos do curso</label>
              <input type="text" name="requisitos" class="form-control" id="inputRequisitos" placeholder="O que é necessario para fazer o curso?">
          </div>
          <div class="form-group col-md-6">
            <label for="inputVideo">URL do Vimeo ou Youtube</label>
            <input type="text" name="video" class="form-control" id="inputVideo" placeholder="Link do video">
        </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-2">
          <label for="inputValor">Preço do curso</label>
          <input type="money" name="valor" class="form-control" id="inputValor" placeholder="100">
        </div>
  
        <div class="form-group col-md-2">
          <label for="inputExpiracao">Tempo Expiracao</label>
          <input type="date" name="tempo_expiracao" class="form-control" id="inputExpiracao" placeholder="">
        </div>
        
        <div class="form-group col-md-8">
        <label for="inputExpiracao">Selecione o professor</label>
        <select class="form-control" name="professor_id" required>
          <option value="">Selecione...</option>
          @foreach($professores as $professor)
            <option value="{{$professor->id}}">{{$professor->name}}</option>
          @endforeach
        </select>
    </div>
</div>
              <button class="form-control btn-primary" type="submit"    >Salvar</button>
        </form>
    </div>
  </body>
@endsection('conteudo')
@include('layouts.partials.menu')
