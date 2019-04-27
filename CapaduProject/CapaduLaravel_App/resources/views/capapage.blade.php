@extends('layouts.dashbord')

@section('menus')

<!-- Sidebar -->
  <ul class="sidebar navbar-nav" id="dashbord-shield">
      <li class="nav-item">
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
      <li class="nav-item active">
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

  <div class="text-center">
      <br><br>
      <img src="/Panel_Page_Assets/img/page.png" width = "100" height = "100"/>
      <h1 id="text1">
      <font size ="5">
      
      Platforma Capadu vă oferă posibilitatea să dețineți o pagină prorie pentru a 
      stoca materiale educationale ce pot fi accesate de oricine după configurarea acesteia.
      
      </font></h1>
      
      <a class="buton1" href="/first_capacreate">Configurare</a>
  </div>

@endsection