@extends('layouts.paginas')
@include('layouts.partials.menu')

@section('conteudo')
<div class="container-fluid h-100">
    <div class="row h-100">
        <div class="col-lg-3 col-12" style="background-color: rgb(218, 218, 218); padding: 30px;">
            <nav>
                <h4 class="course_title">{{$curso[0]->nome}}</h4>

                @foreach($curso as $cursos_detalhe)
                    <!-- Módulo -->
                    @foreach($cursos_detalhe->modulos_exibir as $modulos)
                        <div class="module">
                            <h5 class="module_title">{{ $modulos->nome }}</h5>
                            <ul class="module_list">
                            <!-- Aulas-->
                                @foreach($modulos->aulas_exibir as $aulas)
                                <li><a href="/aulas/{{ $aulas->id }}">{{ $aulas->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <br><br>
                    @endforeach
                @endforeach
            </nav>
        </div>
        
        <div class="col-lg-9 col-12" style="background-color: rgb(232, 232, 255); padding: 20px;">
                @if(!empty($aula))
                <div class="content">
                    <input type="hidden" id="aula_id" value="{{$aula->id}}"/>
                    <h2>{{ $aula->name }}</h2>
                    <div id="video_youtube">
                        <iframe width="800" height="500"
                            src="https://www.youtube.com/embed/{{ $aula->video }}">
                        </iframe>   
                    </div>
        
                    <div class="links">
                        <h3>Links de Apoio</h3>
                        <ul>
                            @foreach($aula->anexos_exibir as $anexos)
                            <li><a href="{{$anexos->link}}">{{ $anexos->nome }}</a></li>
                            @endforeach
                        </ul>
                        <br><br>
                    </div>
  
                    <div id="montarCard">

                    </div>
                     
                    

                    <form id="frm-comentar" method="POST" action="{{route('comentar')}}" class="mt-4">
                        <div class="form-row">
                          <div class="col-12">
                            <h6 for="Comentario">Comentário</h6>
                            <textarea class="form-control" name="comentario" id="comentario" rows="5"></textarea>
                          </div>
                        </div>
                        <button type="submit" class="mt-2 btn btn-primary mb-2">Comentar</button>
                      </form>
    
                </div>
            @else
                Nenhuma aula cadastrada!   
            @endif 
        </div>
    </div>
</div>
  
@endsection


@section('javascript')
<script>
    $('#frm-comentar').submit(function(e){
        e.preventDefault();
        let comentario = $('#comentario').val();
        let aula_id = $('#aula_id').val();
    
        fetch(`/comentar`, {
            method: 'POST',
            body: JSON.stringify({
                comentario,
                aula_id
            }),
            headers: {"Content-type": "application/json; charset=UTF-8"},
        })
        .then(res => res.json())
        .then(res => {
            montarCard(res);
        })
    });


function montarCard(res) {
     $('#montarCard').html(`<div class='card'>
        <h6 class='card-header'>${res.created_at} - ${res.aluno_id}</h6>
       
        <div class='card-body'>
            <p class='card-text'>${res.descricao}</p></div>
        </div>`); 
}

</script>
@endsection