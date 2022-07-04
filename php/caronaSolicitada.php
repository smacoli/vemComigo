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
    <link rel="stylesheet" href="..\style\solicitaCarona.css">
    <link rel="icon" type="imagem/png" href="..\img\iconeaba.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ee60b2dabf.js" crossorigin="anonymous"></script>
    <script src="../js/sweetAlert.js"></script>
    <link rel="icon" type="imagem/png" href="..\img\iconeAba.png">
    <title>Solicite sua carona</title>
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
                    <a class="nav-link active" aria-current="page" href="sair.php">Sair</a>
                </li>
                </ul>
            </div>
            </div>
        </nav>         <!------------------------------------FIM NAV------------------------------------------------->
        <div class="wrapper">
            <div class="cardCarona">
                <p>
                    <?php
                    $id = $_GET['id'];
                    include_once("carona.php");
                    include_once("itinerario.php");
                    include_once("usuario.php");

                    session_start();

                    $cpf = retornaCpfUsuario($_SESSION['email']);

                    $carona = retornaCaronaPorId($id);

                    if($carona != null){
                        $valor = $carona['valor'];
                        $dataCarona = $carona['data_carona'];
                        $horario = $carona['horário'];
                        $quantidadeVagas = $carona['quantidade_vagas'];
                        $obs = $carona['obs'];
                        $nome = $carona['primeiro_nome']." ".$carona['sobrenome'];
                        $email = $carona['email'];
                        $telefone = $carona['telefone'];
                        $placa = $carona['placa'];
                        $modelo = $carona['modelo'];
                        $cor = $carona['cor'];

                        $vetitinerario = retornaItinerario($id);
                        
                    }
                    ?>
                    <h2>Detalhes</h2>
                    <p>Valor: <?php echo $valor ?> </p>
                    <p>Data: <?php echo $dataCarona ?> Horário: <?php echo $horario ?> </p>
                    <p>Vagas: <?php echo $quantidadeVagas ?> </p>
                    <p>Observações: <?php echo $obs ?> </p>
                    <p>Nome: <?php echo $nome ?> </p>
                    <p>E-mail <?php echo $email ?> </p>
                    <p>Contato: <?php echo $telefone ?> </p>
                    <p>Modelo: <?php echo $modelo ?> Placa: <?php echo $placa ?> Cor: <?php echo $cor ?> </p>
                    <p> <?php foreach($vetitinerario as $itinerario){echo "<i class='fa-solid fa-location-dot'></i>  ".$itinerario['nome']."<br>";} ?> </p>

                </p>

                <form id="formReserva" method="POST" action="cadastroReserva.php">
                    <input type="hidden" id="idcarona" name="idcarona" value="<?php echo $id ?>">
                    <input type="hidden" id="cpf_usuario" name="cpf_usuario" value="<?php echo $cpf ?>">
                    <input type="hidden" id="quantidade_vagas" name="quantidade_vagas" value="<?php echo $quantidadeVagas ?>">
                    <label>Origem</label>
                    <select id="localOrigem" name="localOrigem">
                            <option value="" disabled selected hidden >Selecione...</option>
                            <?php
                                include_once("itinerario.php");
                                $vetlocais = retornaItinerario($id);
                                foreach($vetlocais as $local){
                                $nome = $local['nome'];
                                $ordem = $local['ordem'];
                                $idLocal = $local['id_local'];
                            ?>
                            <option value="<?php echo $idLocal ?>"> <?php echo $nome ?> </option>
                            
                        <?php
                                }
                        ?>
                    </select> 
                    <label>Destino</label>
                    <select id="localDestino" name="localDestino">
                            <option value="" disabled selected hidden >Selecione...</option>
                            <?php
                                include_once("local.php");
                                $vetlocais = retornaItinerario($id);
                                foreach($vetlocais as $local){
                                $nome = $local['nome'];
                                $ordem = $local['ordem'];
                                $idLocal = $local['id_local'];
                            ?>
                            <option value="<?php echo $idLocal ?>"> <?php echo $nome ?> </option>
                            
                        <?php
                                }
                        ?>
                    </select>
                    <button id="buttonCalcularValor">Calcular Valor</button>
                    <input type="text" id="valor" name="valor">
                    <br><br>
                    <div class="botoes">
                        <button type="reset">Limpar</button>
                        <button type="submit" id="buttonCadastrar">Reservar</button>
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
<script src="../js/caronaSolicitada.js"></script>
</html>
