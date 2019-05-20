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

    <div class="text-center">
        <br><br>
        <img src="/Panel_Page_Assets/img/upload.png" width = "100" height = "100"></img>
        <h1 id="text1"><font size ="5">Platforma Capadu vă oferă posibilitatea să dețineți o pagină prorie pentru a stoca materiale educationale ce pot fi accesate de oricine după configurarea acesteia.</font></h1>
        <br><br>

        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
            <strong>Ultima Actiune : </strong> {{{ Auth::user()->upload_activity }}}
        </div>

        <br><br>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6><b>Capacitate de stocare disponibila</b></h6>
                </div>
                <div class="card-body text-center">
                    <div class="input-group mb-3">
                        <h5>Disponibil/Total : {{$data["usedcapacity"]."/".$data["totalcapacity"]}}</h5>
                    </div>

                    <div class="input-group mb-3">
                        <div class="progress" style="width:70%">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{$data['percent']}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$data['percent'].'%'}};">
                                {{$data['percent'].'%'}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 ">
            <div class="card shadow mb-4">
            
                <div class="card-header py-3">
                    <div class="row">
                        <h6 style="margin:10px;" ><b>Incarca materiale</b></h6>

                        <div id="upload-progress" class="progress" style="width:60%; margin-left: 7px; margin-right: 7px; margin-top: 14px;">
                            <div id="upload-bar" class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                                0%
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-body text-center">
                    <div class="input-group mb-3">
                        <form method="post" action="/action-upload" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            Selecteaza un material:
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" class="btn btn-primary btn-block" value="Incarca Materialul" name="submit" style="width:70%; margin-top: 10px;">
                        </form>
                    </div>
                </div>
                
            </div>
        </div>

    </div>

    <div class="col-13">
        <div class="card shadow mb-4">

            <div class="card-header text-center py-3">
                <h6><b>Lista materialelor</b></h6>
            </div>
            
            <div class="card-body">

                <div class="table-responsive">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Nume</th>
                        <th>Marime</th>
                        <th>Data Incarcarii</th>
                        <th>Copiaza Link-ul</th>
                        <th>Descarca</th>
                        <th>Sterge</th>
                    </tr>
                    </thead>

                    <tfoot>
                    <tr>
                        <th>Nume</th>
                        <th>Marime</th>
                        <th>Data Incarcarii</th>
                        <th>Copiaza Link-ul</th>
                        <th>Descarca</th>
                        <th>Sterge</th>
                    </tr>
                    </tfoot>

                    <tbody>
                    
                    @foreach($data['files'] as $file)
                        <tr>
                            <td>{{$file->nume}}</td>
                            <td>{{$file->marime}} MB</td>
                            <td>{{$file->created_at}}</td>
                            <td>{{$file->ruta}}</td>
                            <td>
                            
                            <form method="post" action="/action-delete/{{$file->ruta}}">
                                {{ csrf_field() }}

                                <input type="submit" class="btn btn-primary btn-block" value="Sterge">
                            </form>

                            </td>
                            <td>$320,800</td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>

                </div>

            </div>
        </div>
    </div>

    

</div>

@endsection

@section('js_dashbord')

<!-- CommonScripts-->
<script src="/Common/jquery/jquery.js"></script>

<!-- RealtimeUpload-->
<script src="/Common/ajaxForm/jquery.form.js"></script>
<script src="/Common/ajaxForm/plugin.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="/Panel_Page_Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/Panel_Page_Assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->
<script src="/Panel_Page_Assets/vendor/chart.js/Chart.min.js"></script>
<script src="/Panel_Page_Assets/vendor/datatables/jquery.dataTables.js"></script>
<script src="/Panel_Page_Assets/vendor/datatables/dataTables.bootstrap4.js"></script>

<!-- Custom scripts for all pages-->
<script src="/Panel_Page_Assets/js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="/Panel_Page_Assets/js/demo/datatables-demo.js"></script>
<script src="/Panel_Page_Assets/js/demo/chart-area-demo.js"></script>


@endsection