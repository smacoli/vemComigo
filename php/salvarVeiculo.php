<?php

    include_once("usuario.php");

    $placa = $_POST['placa'];
    $tipo = $_POST['tipo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $cor = $_POST['cor'];
    $anoFabricacao = $_POST['ano_fabricacao'];

    session_start();

    $cpf_usuario = retornaCpfUsuario($_SESSION['email']);
    
    include_once("veiculoTeste.php");

    // echo "Cheguei aqui?";

    insereVeiculo($placa, $tipo, $marca, $modelo, $cor, $anoFabricacao, $cpf_usuario);

    header("Location:cadastroVeiculo.php"); 

?>