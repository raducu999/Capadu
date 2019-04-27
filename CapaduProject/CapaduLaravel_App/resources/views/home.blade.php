@extends('layouts.dashbord')

@section('menus')

<!-- Sidebar -->
  <ul class="sidebar navbar-nav" id="dashbord-shield">
      <li class="nav-item active">
          <a class="nav-link" href="/profesor">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
          </a>
      </li>
      <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Login Screens:</h6>
          <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Logout
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
          </form>
          <div class="dropdown-divider"></div>
          <h6 class="dropdown-header">Other Pages:</h6>
          <a class="dropdown-item" href="/home">Home</a>
          <a class="dropdown-item" href="/forums">Forum</a>
          <a class="dropdown-item" href="/">Camera Capadu</a>
          </div>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="http://capapp:3000/create/?tocken={{ Auth::user()->connection_token }}">
          <i class="fas fa-play"></i>
          <span>Proneste un Capadu</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="http://capapp:3000/create/quiz-creator/?tocken={{ Auth::user()->connection_token }}">
          <i class="fas fa-folder-plus"></i>
          <span>Creeaza un Capasu</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="/capapage">
          <i class="fas fa-file"></i>
          <span>Pagina proprie</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="/upload">
          <i class="fas fa-database"></i>
          <span>Incarca resurse</span>
          </a>
      </li>
  </ul>

@endsection

@section('content')

  <div id="dashbord_data">

    <div class="text-center">
        <br><br>
        <img src="/Panel_Page_Assets/img/user.png" width="100px" height="100px"/>
        <br><br>
        <h1>Buna ziua <b>{{{ Auth::user()->name }}}</b></h1>
        <br><br><br>
        <p><font size ="5">Bine ati venit pe CapaBord, de aici puteti creea un proiect Capadu sau sa porniti o camera bazata pe un proiect deja existent. Nu uitati ca platforma contine si un forum unde puteti adresa orice intrebare sau lasa o sugestie.</font></p>
    </div>

  </div>

@endsection