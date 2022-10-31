@extends('layouts.app')
@section('conteudo')
  <body>

        <div class="container mt-4">
            <div class="row">
              <div class="col-4"> 
                <form action="{{ route('pesquisar-curso') }}" method="POST">
                    @csrf
                    <div class="pageheaderbg">
                        <div class="input-group mb-3">
                            <input type="text" name="nome" class="form-control" placeholder="Pesquisar o Curso" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Pesquisar</button>
                        </div>
                    </div>
                </form>
               </div>
            </div>
        </div>

        <div class="cards mt-4">
        @foreach($cursos as $curso)

            <div class="card">
                <a href="/curso/{{ $curso->id }}"><img class="card_image" src="{{ URL::asset($curso->imagem) }}" alt=""></a>
                    <div class="card_content">
                        <h1 class="title_card"> {{ $curso->nome }} </h1>
                            <a>{{ $curso->descricao }}
                        </a>
                    </div>
                    <div class="card_info">
                        R$ {{ $curso->valor }}
                        <a href="/curso/{{ $curso->id }}" class="form-control col-md-6"style="text-align: center;background-color: white; padding: 6px;">Acessar</a>
                    </div>
            </div>

        @endforeach 
        </div>
       
    </div>
    <div class="container" style="margin-top: 20px;left:-5">
        {!! $cursos->links() !!}
        </div>
  </body>
@endsection('conteudo')
@include('layouts.partials.menu')
