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
      <li class="nav-item">
          <a class="nav-link" href="/capapage">
          <i class="fas fa-file"></i>
          <span>Pagina proprie</span>
          </a>
      </li>
      <li class="nav-item active">
          <a class="nav-link" href="/upload">
          <i class="fas fa-database"></i>
          <span>Incarca resurse</span>
          </a>
      </li>
  </ul>

@endsection

@section('content')

<div class="container">

    <center>
        <br><br>
        <img src="/Panel_Page_Assets/img/page.png" width = "100" height = "100"></img>
        <h1 id="text1"><font size ="5">Platforma Capadu vă oferă posibilitatea să dețineți o pagină prorie pentru a stoca materiale educationale ce pot fi accesate de oricine după configurarea acesteia.</font></h1>
        <br><br>
    </center>

    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6><b>Capacitate de stocare disponibila</b></h6>
                </div>
                <div class="card-body text-center">
                    <div class="input-group mb-3">
                        <h5>Disponibil/Total :</h5>
                    </div>

                    <div class="input-group mb-3">
                        <div class="progress" style="width:70%">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; background-color: red;">
                                70%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6><b>Incarca materiale</b></h6>
                </div>
                <div class="card-body text-center">
                    <div class="input-group mb-3">
                        <h5>Disponibil/Total :</h5>
                    </div>

                    <div class="input-group mb-3">
                        <div class="progress" style="width:70%">
                            <div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; background-color: red;">
                                70%
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    

</div>

@endsection