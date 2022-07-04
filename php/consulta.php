<?php

    session_start();

    if($_SESSION['login'] == false){
        header("Location:loginusuario.php");
    }

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\style\cadastro.css">
    <link rel="stylesheet" href="style\index.css">
    <link rel="stylesheet" href="..\style\consulta.css" type="text/css">
    <link rel="icon" type="imagem/png" href="..\img\iconeaba.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ee60b2dabf.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>
    <link rel="icon" type="imagem/png" href="..\img\iconeAba.png">
    <title>Caronas</title>
    <link rel="stylesheet" href="..\style\bootstrap.min.css" type="text/css">
    
</head>
<body>
                                <!------------------------------------INICIO NAV------------------------------------------------->
        <nav class="navbar navbar-dark bg-primary">
            <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="..\img\pedindo-carona.png" alt="" width="40" height="34" class="d-inline-block align-text-top">
                VemComigo
                </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="sair.php">Sair</a>
                </li>
                </ul>
            </div>
            </div>
        </nav>         <!------------------------------------FIM NAV------------------------------------------------->
        <nav class="navbar">
            <form class="form-inline">
              <button class="btnCad" type="button"><a href="cadastroVeiculo.php?email='$email'">Cadastrar Veículo</a></button>
              <button class="btnCad" type="button"><a href="cadastroCarona.php">Oferta</a></button>
              <button class="btnCad" type="button"><a href="historicoCaronasOfertadas.php">Histórico Oferta</a></button>
              <button class="btnCad" type="button"><a href="historicoCaronasSolicitadas.php">Histórico Solicitação</a></button>
            </form>
          </nav>
        <div class="wrapper">
        <h2><?php 
            session_start();
            include_once("usuario.php");
            $nome = retornaNomeUsuario($_SESSION['email']);
            echo "Olá, ".$nome."! Escolha a carona que dá match com você!"
            ?></h2>
        <?php 

            include_once("carona.php");
            include_once("itinerario.php");

            $vetcaronas = retornaCaronas();
            if($vetcaronas != null){
                foreach($vetcaronas as $carona){
                    $valor = $carona['valor'];
                    $dataCarona = $carona['data_carona'];
                    $horario = $carona['horário'];
                    $tipo = $carona['tipo'];
                    $quantidadeVagas = $carona['quantidade_vagas'];
                    $obs = $carona['obs'];
                    $nome = $carona['primeiro_nome']." ".$carona['sobrenome'];
                    $idcarona = $carona['id'];

                    $vetitinerario = retornaItinerario($idcarona);
                    
                    
        ?>
        <div class="card w-75">
            <div class="card-body">
                <h5 class="card-title"><?php echo $nome ?></h5>
                <div id="alinhaConteudoCard">
                <div id="itinerario">
                <p class="card-text"><?php foreach($vetitinerario as $itinerario){echo "<i class='fa-solid fa-location-dot'></i>  ".$itinerario['nome']."<br>";} ?></p>
                
                </div>
                <div id="veiculo">
                <p class="card-text"><?php echo $tipo ?></p>
                <p class="card-text"><?php echo "Vagas: ".$quantidadeVagas ?></p>
                </div>
                <div id="info">
                
                <p class="card-text"><?php echo $dataCarona." - ".$horario ?></p>
                <p class="card-text"><?php echo $obs ?></p>
                </div>
                
                
                
                <p id="preco" class="card-text"><?php echo "R$ ".$valor ?></p>
            </div>
                <?php
                echo ('<a href="caronaSolicitada.php?id= '.$idcarona.'" class="btn btn-primary">Detalhar</a>');
                ?>
            </div>
        </div>
        <?php
                }
            }
        ?>
    </div>
    <br><br>
    <footer class="bg-light text-center text-white">
        <div class="container p-4 pb-0" style="width: 100%;">
          <section class="mb-4">
            <a
                class="btn btn-primary btn-floating m-1"
                style="background-color: #3b5998;"
                href="https://www.facebook.com"
                role="button"
                ><i class="fab fa-facebook-f"></i
            ></a>
            <a
                class="btn btn-primary btn-floating m-1"
                style="background-color: #55acee;"
                href="https://www.twitter.com"
                role="button"
                ><i class="fab fa-twitter"></i
            ></a>
            <a
                class="btn btn-primary btn-floating m-1"
                style="background-color: #ac2bac;"
                href="https://www.instagram.com"
                role="button"
                ><i class="fab fa-instagram"></i
            ></a>
        </section>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2022 Copyright: VemComigo Caronas
        </div>
      </footer>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script type="text/javascript" src="..\js\bootstrap.min.js"></script>
<script type="text/javascript" src="..\js\jquery-3.6.0.min.js"></script>
<script src="js\cadastroUsuario.js"></script>
</html>

