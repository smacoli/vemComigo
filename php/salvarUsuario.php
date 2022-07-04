<?php

    $email = $_POST['email'];
    $dataNascimento = $_POST['data_nascimento'];
    $cpf = $_POST['cpf'];
    $primeiroNome = $_POST['primeiro_nome'];
    $sobrenome = $_POST['sobrenome'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    
    include_once("usuario.php");

    insereUsuario($cpf, $primeiroNome, $sobrenome, $email, $telefone, $dataNascimento, md5($senha));

    header("Location:cadastro.php");

?>