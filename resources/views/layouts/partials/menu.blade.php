@section('menu_principal')

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="container">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/cursos">Cursos</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="/contato">Quem Somos / Contato</a>
                </li> 
                @if (Auth::check())
                <li class="nav-item dropdown" style="z-index: 10000;">
                    <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        Central do Professor
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="/cadastro/cursos" class="dropdown-item" style="color: gray" href="#">Cadastrar Curso</a>
                            <a href="/cadastro/modulos" class="dropdown-item" style="color: gray" href="#">Cadastrar Modulos</a>
                            <a href="/cadastro/aulas" class="dropdown-item" style="color: gray" href="#">Cadastrar Aulas</a>
                        </li>
                    </ul>
                </li>
                @else
                @endif
                

            </ul>
        </div>
    </div>

  @endsection
