<?php

    session_start();

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $_SESSION['mensagemError'] = "";

    include_once("usuario.php");

    $login = validaUsuario($email, md5($senha));
    
    if($login == null){ 
        $_SESSION['login'] = false; 
        $_SESSION['mensagemError'] = "error";
        header("Location:loginusuario.php");
    }else{  
        $_SESSION['login'] = true;
        $_SESSION['email'] = $email;
        header("Location:consulta.php");    
    }

?>