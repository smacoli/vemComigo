<?php
    session_start();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\style\loginusuario.css">
    <link rel="icon" type="imagem/png" href="..\img\iconeaba.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style\index.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>
    <script src="../js/sweetAlert.js"></script>
    <script src="https://kit.fontawesome.com/ee60b2dabf.js" crossorigin="anonymous"></script>
    <link rel="icon" type="imagem/png" href="..\img\iconeAba.png">
    <title>Login</title>
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
                    <a class="nav-link active" aria-current="page" href="..\index.html">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="loginusuario.php">Entre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cadastro.php">Cadastre-se</a>
                </li>
                </ul>
            </div>
            </div>
        </nav>         <!------------------------------------FIM NAV------------------------------------------------->

    <div class="wrapper">
            <div class="cardCadastro">
            <form id="formLoginUsuario" method="POST" action="autenticar.php">
                    
                <?php
                    if ($_SESSION['mensagemError'] == 'error'){
                        ?>
                            <script>
                                
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: 'Senha ou usuário inválidos!', 
                                    width: '400px'
                                })
                                
                            </script>
                        <?php
                    }
                ?>
                <div class="inputDados">
                    <h2>E-mail</h2>
                    <input type="email" placeholder="E-mail" id="email" name="email" style="text-align: center;" required>
                </div>
                <div class="inputDados">
                    <h2>Senha</h2>
                    <input id="senha" type="password" name="senha" placeholder="Senha" style="text-align: center;" required>
                </div>
                <div class="botoes">
                    <button type="submit" id="buttonCadastrar">Login</button>
                </div>
            </form>
        </div> 
        </div>
    </div>
    <br>
    <footer class="bg-light text-center text-white">
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
          © 2022 Copyright: VemComigo Caronas
        </div>
      </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="../js/sweetAlert.js"></script>
    <script src="../js/login.js"></script>
</body>

</html>