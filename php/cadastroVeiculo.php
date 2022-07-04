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
    <link rel="stylesheet" href="..\style\cadastropage.css">
    <link rel="stylesheet" href="style\index.css">
    <link rel="icon" type="imagem/png" href="..\img\iconeaba.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>
    <script src="https://kit.fontawesome.com/ee60b2dabf.js" crossorigin="anonymous"></script>
    <link rel="icon" type="imagem/png" href="..\img\iconeAba.png">
    <title>Cadastre seu veículo</title>
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

    <div class="wrapper">
        <div class="cardCadastro">
                <form id="formCadastroUsuario" method="POST" action="salvarVeiculo.php">
                    <div class="inputDados">
                        <h2>Qual é a placa?</h2>
                        <input id="placa" type="text" name="placa" placeholder="Placa" style="text-align: center;" required>
                    </div>
                    <div class="inputDados">
                        <h2>Qual é o tipo?</h2>
                        <input type="tipo" id="tipo" name="tipo" placeholder="Tipo" style="text-align: center;" required>
                    </div>
                    <div class="inputDados">
                        <h2>Qual é a marca?</h2>
                        <input type="text" id="marca" name="marca" placeholder="Marca" style="text-align: center;" required>
                    </div>
                    <div class="inputDados">
                        <h2>Qual é o modelo?</h2>
                        <input type="text" id="modelo" name="modelo" placeholder="Modelo" style="text-align: center;" required>
                    </div>
                    <div class="inputDados">
                        <h2>Qual é a cor?</h2>
                        <input type="text" id="cor" name="cor" placeholder="Cor" style="text-align: center;" required>
                    </div>
                    <div class="inputDados">
                        <h2>Qual é o ano de fabricação?</h2>
                        <input id="ano_fabricacao" type="text" name="ano_fabricacao" placeholder="aaaa" style="text-align: center;" required>
                    </div>
                    
                    <div class="botoes">
                        <button type="reset">Limpar</button>
                        <button type="submit" id="buttonCadastrar">Cadastrar</button>
                    </div>
                </form>
                
        </div>
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
<script src="../js/cadastroCarona.js"></script>
</html>