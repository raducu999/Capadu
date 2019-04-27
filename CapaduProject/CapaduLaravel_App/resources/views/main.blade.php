<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Pagina principala a platformei CAPADU">
    <meta name="author" content="Radu Mihalache">

    <title>Capadu</title>

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="/Main_Page_Assets/css/main.css" rel="stylesheet">

    <!-- Bootstrap core CSS-->
    <link href="/Common/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<!-- <div id="overlay"></div> -->


<img id="logo" src="/Common/img/capadu.png" width="300px" height="300px"></img>


<div id="ForumSection">
    <form action="http://capapp:3000/player/">
        <div class="block">
            <input class = "infield" type = "text" name= "name" placeholder="Numele" autofocus/>
        </div>
        <br>
        <div class="block">
            <input class = "infield" type= "text" name= "pin" placeholder="ID-ul" autofocus/>
        </div>
        <br>
        <div class="block">
            <button id = "joinButton">Join</button>
        </div>
    </form>
</div>


<div id="text" class="text-center">

    <p id="text1">Creaza o camera gratis la platforma <a href="/home" id="text2"> Capadu </a> </p>

</div>

<div id="particles-js"></div>



<!-- scripts -->
<script src="/Common/js/particles.js"></script>
<script src="/Main_Page_Assets/js/app.js"></script>

</body>

</html>
