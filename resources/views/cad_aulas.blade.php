@extends('layouts.app')
@section('conteudo')
<body>
    
  <div class="form_users">
      <form style="margin-left: 400px;margin-top: 100px" method="POST" action="{{ route('salvar_aula') }}">
        
        <h1 style="text-align: center; font-weight: bold; margin-bottom:50px">Cadastre as aulas</h1>

        @if(session('success'))
            <div class="alert">{{session('success')}}</div>
        @endif

            @csrf
            <div class="form-row">
            <div class="form-group col-md-12">
                <label class="details">Selecione o curso</label><br>
                <select name="cursos_id" id="cursos_id" class="form-control" required>
  
                    <option value="" class="form-control">Selecione...</option>
                    @foreach($cursos as $curso)
                        <option value="{{$curso->id}}">{{$curso->nome}}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
                <label class="details">Selecione o modulo</label><br>
                <select name="modulos_id" id="modulos_id" class="form-control" required>

                    <option class="form-control"value=""></option>
                  
                </select>
            </div> 
            <div class="form-group col-md-6">
                <label class="details">Nome</label> <br>
                <input type="text" name="name" class="form-control"/><br>
            </div>
            </div>
            <div class="form-row">
            <div class="form-group col-md-6">
                <label class="details">Video</label> <br>
                <input type="text" name="video" class="form-control"/><br>
            </div>
            <div class="form-group col-md-6">
                <label class="details">Tempo</label><br>
                <input type="date" name="tempo" class="form-control"/><br>
            </div>
            </div>

            <div class="form-group">   
                <label class="details">Descricão</label><br>
                <input type="text" name="descricao" class="form-control"/><br>
            </div>
           
       
            <button type="submit" class="form-control btn-primary">Salvar</button>
      </form>
      
  </div>
  <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script>
       $(document).ready(function () {
            $('#cursos_id').on('change', function () {
                var cursosid = this.value;
                $('#modulos_id').html('');
                $.ajax({
                    type: 'GET',
                    url: '{{ route('GetModule') }}?cursos_id='+cursosid,
                    success: function (res) {
                        $('#modulos_id').html('<option value="">Selecione o modulo</option>');
                        $.each(res, function (key, value) {
                            $('#modulos_id').append('<option value="' + value.id + '">' + value.nome + '</option>');
                        });
                    }
                });
            });
        });
</script>
</body>
@endsection('conteudo')
@include('layouts.partials.menu')
