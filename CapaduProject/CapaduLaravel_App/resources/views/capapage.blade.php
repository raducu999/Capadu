@auth
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pagina de control a platformei CAPADU">
    <meta name="author" content="Radu Mihalache">

    <title>CapaBord</title>

    <!-- Bootstrap core CSS-->
    <link href="/Panel_Page_Assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link href="/Panel_Page_Assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->
    <link href="/Panel_Page_Assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/Panel_Page_Assets/css/sb-admin.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="/home">Capadu</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <div class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></div>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{{ Auth::user()->name }}}
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

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
            <a class="nav-link" href="hhttp://capapp:3000/create/quiz-creator/?tocken={{ Auth::user()->connection_token }}">
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
        @if ($user_page)
        <li class="nav-item">
            <a class="nav-link" href="/capares">
            <i class="fas fa-database"></i>
            <span>Resurse pagina</span>
            </a>
        </li>
        @endif
    </ul>


    <div id="content-wrapper">

        <center>
            <div id="front_shield">

                <img src="/Panel_Page_Assets/img/page.png" width = "150" height = "150"></img>
                <form id="bord" role="form" method="POST" action="{{ route('capacreate_control') }}" enctype="multipart/form-data">
                            
                  {{ csrf_field() }}
                    
                  <br><br>
                  <h4> <input id="checkbox1" type="radio" name="options" value="" > &nbsp; &nbsp; &nbsp; Detin deja o pagina proprie si as vrea sa redirectionez utilizatorii la urmatoarea adresa </h4> 
                  <br><br><br> 
                  <textarea class="hiddenfields1 input_text1" id="input1" rows="1" cols="40" name="pageredirect">@if ($user_page) {{ $user_page->redirect_to }} @endif </textarea> 
                  <br><br><br><br><br><br>
                  <h4> <input id="checkbox2" type="radio" name="options" value=""> &nbsp; &nbsp; &nbsp; Vreau sa imi creez o pagina folosind platforma Capadu si instrumentele puse la dispozitie</h4> 
                  <br><br><br>
                  <h4 class="hiddenfields2"> Calea de acces : &nbsp; &nbsp; &nbsp; </h4> <br> <textarea rows="1" cols="40" id="input2" class="hiddenfields2 input_text2" name="ruta" >@if ($user_page) {{ $user_page->route }} @endif </textarea>  
                  <br><br><br><br><br>
                  <h4 class="hiddenfields2"> Descriere : &nbsp; &nbsp; &nbsp; </h4>

                </form>
                <br><br>
                <textarea class="hiddenfields2 input_text" id="input3" rows="10" cols="120" form="bord" name="description"> @if ($user_page) {{ $user_page->description }} @endif </textarea>
                <br><br><br>
                <button type="submit" class="buton1" form="bord" >Trimite</button>

                <br><br>

                @if ($allert_data)

                <div class="alert">
                  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                  <strong>Eroare </strong> {{ $allert_data }}
                </div>

                @endif

            </div>

        </center>

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Capadu 2019</span>
            </div>
          </div>
        </footer>

    </div>
    <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="/Panel_Page_Assets/vendor/jquery/jquery.min.js"></script>
    <script src="/Panel_Page_Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/Panel_Page_Assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Page level plugin JavaScript-->
    <script src="/Panel_Page_Assets/vendor/chart.js/Chart.min.js"></script>
    <script src="/Panel_Page_Assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="/Panel_Page_Assets/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/Panel_Page_Assets/js/sb-admin.js"></script>

    <!-- Demo scripts for this page-->
    <script src="/Panel_Page_Assets/js/demo/datatables-demo.js"></script>
    <script src="/Panel_Page_Assets/js/demo/chart-area-demo.js"></script>

  </body>

</html>
@endauth