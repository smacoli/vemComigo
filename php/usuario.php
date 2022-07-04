<?php

    include_once("conecta.php");

    function retornaUsuario(){
        $sql = "SELECT * FROM usuario ORDER BY primeiro_nome";
        $conexao = abreConexao();
        $resultado = $conexao->query($sql);
        $conexao->close();
        if(mysqli_num_rows($resultado) > 0){
            while($row = mysqli_fetch_array($resultado)){
                $usuario[] = $row;
            }
            return $usuario;
        }else{
            return null;
        }
    }

    function retornaNomeUsuario($email){
        $sql = "SELECT primeiro_nome, sobrenome FROM usuario WHERE email = '$email';";
        $conexao = abreConexao();
        $resultado = $conexao->query($sql);
        $conexao->close();
        if(mysqli_num_rows($resultado) > 0){
            $usuario = mysqli_fetch_array($resultado); 
            return $usuario['primeiro_nome']." ".$usuario['sobrenome'];
        }else{
            return null;
        }
        
    }

    function retornaCpfUsuario($email){
        $sql = "SELECT cpf FROM usuario WHERE email = '$email';";
        $conexao = abreConexao();
        $resultado = $conexao->query($sql);
        $conexao->close();
        if(mysqli_num_rows($resultado) > 0){
            $usuario = mysqli_fetch_array($resultado); 
            return $usuario['cpf'];
        }else{
            return null;
        }
        
    }

    function validaUsuario($email, $senha){
        $sql = "SELECT primeiro_nome, sobrenome, email, senha FROM usuario WHERE email = '".$email."' AND senha = '".$senha."';";
        $conexao = abreConexao();
        $resultado = $conexao->query($sql);
        $conexao->close();
        if(mysqli_num_rows($resultado) > 0){
            $usuario = mysqli_fetch_array($resultado); 
            return $usuario;
        }else{
            return null;
        }
    }

    function retornaUsuarioPorCpf($cpf){
        $sql = "SELECT * FROM usuario WHERE cpf = ".$cpf;
        $conexao = abreConexao();
        $resultado = $conexao->query($sql);
        $conexao->close();
        if(mysqli_num_rows($resultado) > 0){
            $usuario = mysqli_fetch_array($resultado); 
            return $usuario;
        }else{
            return null;
        }
    }

    function insereUsuario($cpf, $primeiroNome, $sobrenome, $email, $telefone, $dataNascimento, $senha){
        $sql = "INSERT INTO usuario(cpf, primeiro_nome, sobrenome, email, telefone, data_nascimento, senha) VALUES ('$cpf', '$primeiroNome', '$sobrenome', '$email', '$telefone', '$dataNascimento', '$senha')";
        $conexao = abreConexao();
        $conexao->query($sql);
        $conexao->close();
    }

    function alteraUsuario($primeiroNome, $sobrenome, $email, $telefone, $dataNascimento, $senha){
        $sql = "UPDATE usuario SET primeiro_nome = '$primeiroNome', sobrenome = '$sobrenome', email = '$email', telefone = '$telefone', data_nascimento = '$dataNascimento', senha = '$senha' WHERE cpf = $cpf";
        $conexao = abreConexao(); 
        $conexao->query($sql);
        $conexao->close();
    }

    function redefinirSenhaUsuario($cpf, $novaSenha){
        $sql = "UPDATE usuario SET senha = '$novaSenha' WHERE cpf = $cpf";
        $conexao = abreConexao(); 
        $conexao->query($sql);
        $conexao->close();
    }

    function excluiUsuario($cpf){
        $sql = "DELETE FROM usuario WHERE cpf = $cpf";
        $conexao = abreConexao();
        $conexao->query($sql);
        $conexao->close();
    }

?>