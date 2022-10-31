<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
    
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
      integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
  
    <title>Sitema EAD - DEVCURSO</title>
  
  </head>
  <body>
    <header>
      
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <div class="logo">
          <a href='/'><img src="{{ URL::asset('img/logo.png') }}" /></a>
          </div>
          <ul class="menu">
            @yield('menu_principal')  
          </ul>
          <div class="profile">
            <i class="fa-solid fa-circle-user" style="font-size: 24px"></i>
          @if (Auth::check())
          <span>{{Auth::user()->name}}</span>
          <a href="/logout" class="btn btn">Logout</a>
          @else
          <a href="/login"  class="btn btn">Login</a>
          @endif
        </div>
      </nav>  
      
    </header>