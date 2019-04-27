<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pagina principala a platformei CAPADU">
    <meta name="author" content="Radu Mihalache">

    <title>Capadu</title>

    <!-- Bootstrap core CSS -->
    <link href="/Common/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/Front_Page_Assets/css/one-page-wonder.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Capadu</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/">{{ Lang::get('home_page.menu1') }}</a>
            </li>

            @guest
            <li class="nav-item">
              <a class="nav-link" href="/register">{{ Lang::get('home_page.menu2') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/login">{{ Lang::get('home_page.menu3') }}</a>
            </li>
            @endguest
            
            @auth
            <li class="nav-item">
                <a class="nav-link" href="/profesor">{{ Lang::get('home_page.menu4') }}</a>
            </li>
            @endauth

            <li class="nav-item">
              <a class="nav-link" href="#about">{{ Lang::get('home_page.menu5') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">{{ Lang::get('home_page.menu6') }}</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="masthead text-center text-white">
      <div id="capadu">

      <div class="text-center"> <img src="/Common/img/capadu.png" width="500px" height="500px"/> </div>
      
      </div>
      <div class="masthead-content">
        <div class="container">
          <h1 class="masthead-heading mb-0">CAPADU</h1>
          <h2 class="masthead-subheading mb-0">{{ Lang::get('home_page.platform') }}</h2>
          <a href="/" class="btn btn-primary btn-xl rounded-pill mt-5">{{ Lang::get('home_page.access') }}</a>
        </div>
      </div>
      <div class="bg-circle-1 bg-circle"></div>
      <div class="bg-circle-2 bg-circle"></div>
      <div class="bg-circle-3 bg-circle"></div>

    </header>

    <div id="shield">

      <table style="width:100%">
            
        <tr>
          <td id="section1">

            <div class="text-center">
              <br><br>
              <h1 class="subsection">{{ Lang::get('home_page.st_text1') }}</h1>
              <br><br><br>
              <a href="/" class="btn rounded-pill red text-white">{{ Lang::get('home_page.st_text2') }}</a>
              <p class="subsection infotext">{{ Lang::get('home_page.st_text3') }}</p>
            </div>

          </td>

          <td id="devider"></td>

          <td id="section2">

            <div class="text-center">
              <br><br>
              <h1 class="subsection">{{ Lang::get('home_page.dr_text1') }}</h1>
              <br><br><br>
              <a href="/login" class="btn rounded-pill orange text-white">{{ Lang::get('home_page.dr_text2') }}</a>
              <p class="subsection infotext">{{ Lang::get('home_page.dr_text3') }}</p>
            </div>

          </td>
        </tr>

      </table>


      <!-- About Section -->
      <div class="container" id="about">
        <br><br><br><br><br><br>
        <h2 class="text-center infotext2" style="color: #bd0716;">{{ Lang::get('home_page.descriptionTitle') }}</h2>
        <hr class="blackunderline">
        <br><br>
        <div class="row">
          <div class="col-lg-4 ml-auto">
            <p class="infotext1">{{ Lang::get('home_page.description_text1') }}</p>
          </div>
          <div class="col-lg-4 mr-auto">
            <p class="infotext1">{{ Lang::get('home_page.description_text2') }}</p>
          </div>
        </div>
        <br><br><br><br><br><br>
      </div>

      <div class="features" id="features">
          <div class="text-center">
            <div class="container">
              <div class="section-heading text-center">
                  <h2 class="text-black infotext2" style="color: #bd0716;">{{ Lang::get('home_page.phoneTitle') }}</h2>
                <hr class="blackunderline">
              </div>
              <br><br><br>
              <div class="row">
                <div class="col-lg-4 my-auto">
                  <div class="device-container">
                    <div class="">
                      <div class="device">
                        <div class="screen">
                          <img src="/Front_Page_Assets/img/phone.png" class="img-fluid" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-8 my-auto">
                  <div class="container-fluid">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="feature-item">
                          <i class="fa fa-mobile figurine" style="font-size:100px;color: #bd0716;"></i>
                          <h3>{{ Lang::get('home_page.phone_1') }}</h3>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="feature-item">
                          <i class="fa fa-brain figurine" style="font-size:100px;color: #bd0716;"></i>
                          <h3>{{ Lang::get('home_page.phone_2') }}</h3>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="feature-item">
                          <i class="fas fa-check-circle figurine" style="font-size:100px;color: #bd0716;"></i>
                          <h3>{{ Lang::get('home_page.phone_3') }}</h3>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="feature-item">
                          <i class="fab fa-accusoft figurine" style="font-size:100px;color: #bd0716;"></i>
                          <h3>{{ Lang::get('home_page.phone_4') }}</h3>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <br><br><br><br><br>
      </div>


      
      <div class="bg-trinery">
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto text-center">
                <br><br><br><br><br>
                <h2 class="section-heading text-white">{{ Lang::get('home_page.HGMTitle') }}</h2>
                <hr class="whiteunderline">
                <br><br>
                <h6 class="text-white mb-4">{{ Lang::get('home_page.HGM_text') }}</h6>
                <br><br>
                <button class="btn rounded-pill red">HGMMain</button>
                <br><br><br><br><br>
              </div>
            </div>
          </div>
      </div>

      <div id="contact">
          <br><br><br>

          <div class="text-center">
            <h1 class="text-white">Contact</h1>
            <br><br>
            <h3 class="text-white">Email  :  radustefan1302@gmail.com</h3>
          </div>

          <!--
          <ul>

            <li><i class="fab fa-facebook-f"></i></li>

            <li><i class="fab fa-facebook-f"></i></li>

          </ul>
          -->

      </div>
      
      <div id="particles-js">
        <!-- Footer -->
        <div class="py-5 bg-black">
           <div class="container">
              <p class="m-0 text-center text-white small">Copyright &copy; Capadu 2019</p>
            </div>
          <!-- /.container -->
        </div>
      </div>

      <!-- scripts -->
      <script src="/Common/js/particles.js"></script>
      <script src="/Main_Page_Assets/js/app.js"></script>



    </div>



    <!-- Bootstrap core JavaScript -->
    <script src="/Common/jquery/jquery.min.js"></script>
    <script src="/Common/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
