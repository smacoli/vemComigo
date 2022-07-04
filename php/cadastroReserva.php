<?php
    
    $idCarona = $_POST['idcarona'];
    $cpfUsuario = $_POST['cpf_usuario'];
    $idOrigem = $_POST['localOrigem']; 
    $idDestino = $_POST['localDestino']; 
    $valor = $_POST['valor'];

    include_once("reserva.php");
    include_once("carona.php");

    $quantidadeVagas = retornaQuantidadeVagasPorId($idCarona);

    if($quantidadeVagas == 0){
        header("Location:erroReserva.php"); 
    }else{
        insereReserva($cpfUsuario, $idCarona, $idOrigem, $idDestino, $valor);
        header("Location:consulta.php");    
    }

    
    

?>