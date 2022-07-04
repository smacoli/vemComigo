<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\style\cadastropage.css">
    <link rel="icon" type="imagem/png" href="..\img\iconeaba.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>
    <script src="https://kit.fontawesome.com/ee60b2dabf.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="icon" type="imagem/png" href="..\img\iconeAba.png">
    <title>Cadastre-se</title>
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
                <form id="formCadastroUsuario" method="POST" action="salvarUsuario.php">
                    <div class="inputDados">
                        <h4>Qual é o seu e-mail?</h4>
                        <input type="email" placeholder="E-mail" id="email" name="email" style="text-align: center;" required>
                    </div>
                    <div class="inputDados">
                        <h4>Qual a sua data de nascimento?</h4>
                        <input id="data_nascimento" type="date" name="data_nascimento" style="text-align: center;" required>
                    </div>
                    <div class="inputDados">
                        <h4>Qual o seu CPF?</h4>
                        <input type="number" id="cpf" name="cpf" placeholder="CPF" style="text-align: center;" required>
                    </div>
                    <div class="inputDados">
                        <h4>Qual o seu nome?</h4>
                        <input type="text" id="primeiro_nome" name="primeiro_nome" placeholder="Nome" style="text-align: center;" required><br>
                        <input type="text" id="sobrenome" name="sobrenome" placeholder="Sobrenome" style="text-align: center;" required>
                    </div>
                    <div class="inputDados">
                        <h4>Número de telefone</h4>
                        <input type="tel" id="telefone" name="telefone" placeholder="(DDD) 9 9999 - 9999" style="text-align: center;" required>
                    </div>
                    <div class="inputDados">
                        <h4>Insira sua senha</h4>
                        <input type="password" id="senha" name="senha" placeholder="Senha" style="text-align: center;" required>
                        <h4>Confirme sua senha</h4> 
                        <input type="password" id="confirmaSenha" name="confirmaSenha" placeholder="Senha" style="text-align: center;" required>
                    </div>
                    <div class="botoes">
                        <button type="reset">Limpar</button>
                        <button type="submit" id="buttonCadastrar">Cadastrar</button>
                    </div>
                </form>
                
        </div>
    </div>
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
<script src="../js/sweetAlert.js"></script>
<script src="../js/cadastro.js"></script>
</html>