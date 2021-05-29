<?php
include('session.php');
$sql = "SELECT IdUtente FROM utente WHERE username = '$login_session'";
$result = mysqli_query($db, $sql);
$IdUtente = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Concorsi esposizioni cani e gatti</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
        body {
            font: 400 15px/1.8 Lato, sans-serif;
            color: #777;
        }
        h3, h4 {
            margin: 10px 0 30px 0;
            letter-spacing: 10px;      
            font-size: 20px;
            color: #111;
        }
        .container {
            padding: 80px 120px;
        }
        .person {
            border: 10px solid transparent;
            margin-bottom: 25px;
            width: 80%;
            height: 80%;
            opacity: 0.7;
        }
        .person:hover {
            border-color: #f1f1f1;
        }
        .carousel-inner img {
            /*-webkit-filter: grayscale(90%);
            /*filter: grayscale(90%);  make all photos black and white */ 
            width: 100%; /* Set width to 100% */
            margin: auto;
        }
        .carousel-caption h3 {
            color: #fff !important;
        }
        @media (max-width: 600px) {
            .carousel-caption {
            display: none; /* Hide the carousel text when the screen is less than 600 pixels wide */
            }
        }
        .bg-1 {
            background: #2d2d30;
            color: #bdbdbd;
        }
        .bg-1 h3 {color: #fff;}
        .bg-1 p {font-style: italic;}
        .list-group-item:first-child {
            border-top-right-radius: 0;
            border-top-left-radius: 0;
        }
        .list-group-item:last-child {
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        .thumbnail {
            padding: 0 0 15px 0;
            border: none;
            border-radius: 0;
        }
        .thumbnail p {
            margin-top: 15px;
            color: #555;
        }
        .btn {
            padding: 10px 20px;
            background-color: #333;
            color: #f1f1f1;
            border-radius: 0;
            transition: .2s;
        }
        .btn:hover, .btn:focus {
            border: 1px solid #333;
            background-color: #fff;
            color: #000;
        }
        .modal-header, h4, .close {
            background-color: #333;
            color: #fff !important;
            text-align: center;
            font-size: 30px;
        }
        .modal-header, .modal-body {
            padding: 40px 50px;
        }
        .nav-tabs li a {
            color: #777;
        }
        #googleMap {
            width: 100%;
            height: 400px;
            -webkit-filter: grayscale(100%);
            filter: grayscale(100%);
        }  
        .navbar {
            font-family: Montserrat, sans-serif;
            margin-bottom: 0;
            background-color: #2d2d30;
            border: 0;
            font-size: 11px !important;
            letter-spacing: 4px;
            opacity: 0.9;
        }
        .navbar li a, .navbar .navbar-brand { 
            color: #d5d5d5 !important;
        }
        .navbar-nav li a:hover {
            color: #fff !important;
        }
        .navbar-nav li.active a {
            color: #fff !important;
            background-color: #29292c !important;
        }
        .navbar-default .navbar-toggle {
            border-color: transparent;
        }
        .open .dropdown-toggle {
            color: #fff;
            background-color: #555 !important;
        }
        .dropdown-menu li a {
            color: #000 !important;
        }
        .dropdown-menu li a:hover {
            background-color: red !important;
        }
        footer {
            background-color: #2d2d30;
            color: #f5f5f5;
            padding: 32px;
        }
        footer a {
            color: #f5f5f5;
        }
        footer a:hover {
            color: #777;
            text-decoration: none;
        }  
        .form-control {
            border-radius: 0;
        }
        textarea {
            resize: none;
        }
        </style>
    </head>
    <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

        <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
            </button>
            <a class="navbar-brand" href="#myPage">Super Animals</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#myPage">Home</a></li>
                <li><a href="#Concorsi">Concorsi</a></li>
                <li><a href="./login.php">Logout</a></li>
            </ul>
            </div>
        </div>
        </nav>
        <!-- Container (Concorsi Section) -->
        <div id="Concorsi" class="bg-1">
        <div class="container">
            <h3 class="text-center">CONCORSI</h3>
            <div class="text-center">
            <a type="button" class='btn text-center' href="./welcome_user.php#myPage">Ritorna alla tua area personale!</a>
            </div>
            <p class="text-center">Ricorda di iscrivere il tuo migliore amico!</p>
            <ul class="list-group">
            <?php
                $sql = "SELECT COUNT(*) as numeroDiConcorsi FROM concorso WHERE data = CURDATE()";
                $result = mysqli_query($db, $sql);
                if ($row = mysqli_fetch_assoc($result)){
                echo "<li class='list-group-item'>". date("F")." <span class='badge'>Concorsi disponibili: ".$row["numeroDiConcorsi"]."</span></li>";
                }
            ?>
            </ul>
            <?php
            $current_date = date ("Y-m-d");
            $sql = "SELECT * FROM concorso";
            $result = mysqli_query($db, $sql);
            $count = 0;
            echo "<div class='row text-center'>\n";
            while($row = mysqli_fetch_assoc($result)){
                $count++;
                $IdConcorso = $row["IdConcorso"];
                $descrizione = $row["descrizione"];
                $immagine = $row["immagine"];
                $animale = $row["animale"];
                $categorira = $row["categoria"];
                $luogo = $row["luogo"];
                $data = $row["data"];
                echo "<div class='col-sm-4'>\n";
                echo "<div class='thumbnail'>\n";
                echo "<img src='./images/" . $immagine . "' alt='". $luogo . "' style='width: 300px; height: 350px'>\n";
                echo "<p><strong>IdConcorso: " . $IdConcorso . "</strong></p>\n";
                echo "<p>Descrizione: " . $descrizione . "</p>\n";
                echo "<p>Categoria: " . $descrizione . "</p>\n";
                echo "<p>Data: " . $data . "</p>\n";
                echo "<p>Luogo: " . $luogo . "</p>\n";
                if (strtotime($row["data"]) > strtotime($current_date)){
                    if ($animale == "cani"){
                        echo "<button class='btn' data-toggle='modal' data-target='#myModal'>Iscrivi il tuo cane!</button>\n";
                        //echo "<a type='button' class='btn text-center' href='#Login'>Iscrivi il tuo cane!</a>";
                    }else{
                        echo "<button class='btn' data-toggle='modal' data-target='#myModal'>Iscrivi il tuo gatto!</button>\n";
                        //echo "<a type='button' class='btn text-center' href='#Login'>Iscrivi il tuo gatto!</a>";
                    }
                }else{
                    echo "<span class='label label-danger'>Expired!</span>";
                }
                echo "</div>\n";
                echo "</div>\n";
                if ($count == 3){
                    $count = 0;
                    echo "</div>\n";
                    echo "<div class='row text-center'>\n";
                }

            }
            ?>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4><span class="glyphicon glyphicon-lock"></span>Iscrizione</h4>
                </div>
                <div class="modal-body">
                <form role="form" method="POST" action="welcome_user.php" enctype="multipart/form-data">
                    <div class="form-group">
                    <label for="nomeAnimale"><span class="glyphicon glyphicon-user"></span>Nome animale</label>
                    <input type="text" class="form-control" id="nomeAnimale" name="nomeAnimale" placeholder="Inserisci il nome del tuo animale">
                    </div>
                    <div class="form-group">
                    <label for="categoriaConcorso"><span class="glyphicon glyphicon-user"></span>Categoria concorso</label>
                    <select class="form-select" aria-label="Default select example" id="categoriaConcorso" name="categoriaConcorso">
                        <option selected>Seleziona...</option>
                        <option value="cane">cane</option>
                        <option value="gatto">gatto</option>
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="genereAnimale"><span class="glyphicon glyphicon-user"></span>Genere</label>
                    <input type="text" class="form-control" id="genereAnimale" name="genereAnimale" placeholder="Genere animale">
                    </div>
                    <div class="form-group">
                    <label for="razzaAnimale"><span class="glyphicon glyphicon-user"></span>Razza</label>
                    <input type="text" class="form-control" id="razzaAnimale" name="razzaAnimale" placeholder="Inserisci la razza del tuo animale">
                    </div>
                    <div class="form-group">
                    <label><span class="glyphicon glyphicon-user"></span>Immagine animale: </label><input type="file" id="immagineAnimale" name="immagineAnimale" />
                    </div>
                    <button type="submit" class="btn btn-block" id="confermaIscrizione" name="confermaIscrizione">Conferma 
                    <span class="glyphicon glyphicon-ok"></span>
                    </button>
                </form>
                </div>
                <div class="modal-footer">
                <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal">
                    <span class="glyphicon glyphicon-remove"></span> Cancel
                </button>
                <p>Need <a href="#">help?</a></p>
                </div>
            </div>
            </div>
        </div>
        </div>
        <!-- Footer -->
        <footer class="text-center">
        <a class="up-arrow" href="#myPage" data-toggle="tooltip" title="TO TOP">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a><br><br>
        <p>Copyright 2021 © All rights reserved. Powered by Bonfante Stefano</p> 
        </footer>
    </body>
</html>
