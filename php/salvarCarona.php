<?php

    $dataCarona = $_POST['data_partida'];
    $horario = $_POST['horario_partida'];
    $tipo = $_POST['tipo_veiculo'];
    $quantidadeVagas = $_POST['quantidade_vagas'];
    $valor = $_POST['preco'];
    $itinerario = $_POST['itinerario'];
    $obs = $_POST['obs'];

    include_once("carona.php");
    include_once("local.php");
    include_once("itinerario.php");
    include_once("usuario.php");

    session_start();

    $cpf_usuario = retornaCpfUsuario($_SESSION['email']);

    insereCarona($valor, $dataCarona, $horario, $quantidadeVagas, $obs, $cpf_usuario);

    $idCarona = retornaIdCarona();

    $locais = explode(",", $itinerario);

   

    for($i = 0; $i < sizeof($locais); $i++){
        $nomeLocal = $locais[$i];
        $idLocal = retornaLocalPorNome($nomeLocal);

        insereItinerario($idCarona, $idLocal, $i + 1);

    }

    

    header("location:consulta.php");
    
?>