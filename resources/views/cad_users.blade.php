@extends('layouts.app')
@section('conteudo')
<body>
    <form  style="margin-left: 400px;margin-top: 100px" method="POST" action="{{ route('salvar_user') }}">  
     @csrf

    @if(session('success'))
        <div class="alert">{{session('success')}}</div>
    @endif

    <h1 style="text-align: center; font-weight: bold; margin-bottom:50px">Realize seu cadastro</h1>

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputName">Name</label>
            <input type="text" name="name" class="form-control" id="inputName" placeholder="Nome">
        </div>
        <div class="form-group col-md-4">
            <label for="inputEmail">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email">
        </div>

        <div class="form-group col-md-4">
            <label for="inputPassword4">Senha</label>
            <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Senha">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-8">
        <label for="inputGrupo">Grupo</label><br>
        <select name="grupo" class="form-control" required>
            <option value="">Selecione...</option>
            <option value="admin" >admin</option>
            <option value="professor_admin" >professor_admin</option>
            <option value="professor" >professor</option>
            <option value="aluno" >aluno</option>
        </select>
        </div> 
        <div class="form-group col-md-4">
            <label for="inputCPF">CPF</label>
            <input type="text" name="cpf" class="form-control" id="inputCPF" placeholder="000.000.000-00">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-4" >
            <label for="inputRG">RG</label>
            <input type="text" name="rg" class="form-control" id="inputRG" placeholder="00.000.000-0">
        </div>
    
        <div class="form-group col-md-4">
            <label for="inputOrgao">ORGÃO</label>
            <input type="text" name="orgao" class="form-control" id="inputOrgao" placeholder="">
        </div>
        <div class="form-group col-md-4">
            <label for="inputDataExpedicao">Data de expedição</label><br>
            <input type="date" name="data_expedicao" id="inputDataExpedicao" class="form-control"/><br>
        </div>  
    </div> 

    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputCEP">CEP</label>
            <input type="text" name="cep" class="form-control" id="inputCEP" placeholder="00.000.000">
        </div>
        <div class="form-group col-md-4">
            <label for="inputLogadouro">Logadouro</label>
            <input type="text" name="logradouro" class="form-control" id="inputLogadouro">
        </div>
        <div class="form-group col-md-2">
            <label for="inputNumero">Numero</label>
            <input type="text" name="numero" class="form-control" id="inputNumero">
        </div>
        <div class="form-group col-md-2">
            <label for="inputUF">UF</label>
            <input type="text" name="uf" class="form-control" id="inputUF">
        </div>
        <div class="form-group col-md-4">
            <label for="inputBairro">Bairro</label>
            <input type="text" name="bairro" class="form-control" id="inputBairro">
        </div>
        <div class="form-group col-md-6">
            <label for="inputCity">Cidade</label>
            <input type="text" name="cidade" class="form-control" id="inputCity">
        </div>
        <button type="submit" class="form-control btn-primary" style="height: 38px;margin-top:32px">Cadastrar</button>
    </div>

</form>

@endsection('conteudo')
@include('layouts.partials.menu')