<?php

    include_once("conecta.php");

    function retornaCaronas(){
        $sql = "SELECT * FROM carona JOIN usuario ON carona.cpf_usuario = usuario.cpf JOIN veiculo ON usuario.cpf = veiculo.cpf_usuario WHERE data_carona > CURDATE() OR (data_carona = CURDATE() AND horário > CURTIME()) ORDER BY data_carona, horário";
        $conexao = abreConexao();
        $resultado = $conexao->query($sql);
        $conexao->close();
        if(mysqli_num_rows($resultado) > 0){
            while($row = mysqli_fetch_array($resultado)){
                $carona[] = $row;
            }
            return $carona;
        }else{
            return null;
        }
    }

    function retornaCaronasOfertadasUsuario($cpf){
        $sql = "SELECT * FROM carona JOIN usuario ON carona.cpf_usuario = usuario.cpf JOIN veiculo ON usuario.cpf = veiculo.cpf_usuario WHERE cpf = '$cpf' ORDER BY data_carona, horário";
        $conexao = abreConexao();
        $resultado = $conexao->query($sql);
        $conexao->close();
        if(mysqli_num_rows($resultado) > 0){
            while($row = mysqli_fetch_array($resultado)){
                $carona[] = $row;
            }
            return $carona;
        }else{
            return null;
        }
    }

    function retornaCaronasSolicitadasUsuario($cpf){
        $sql = "SELECT * FROM reserva JOIN carona ON reserva.id_carona = carona.id JOIN usuario ON carona.cpf_usuario = usuario.cpf JOIN veiculo ON usuario.cpf = veiculo.cpf_usuario WHERE reserva.cpf_usuario = '$cpf' ORDER BY data_carona, horário";
        $conexao = abreConexao();
        $resultado = $conexao->query($sql);
        $conexao->close();
        if(mysqli_num_rows($resultado) > 0){
            while($row = mysqli_fetch_array($resultado)){
                $carona[] = $row;
            }
            return $carona;
        }else{
            return null;
        }
    }

    function retornaCaronaPorId($id){
        $sql = "SELECT * FROM carona JOIN usuario ON carona.cpf_usuario = usuario.cpf JOIN veiculo ON usuario.cpf = veiculo.cpf_usuario WHERE id = '$id' ORDER BY data_carona, horário";
        $conexao = abreConexao();
        $resultado = $conexao->query($sql);
        $conexao->close();
        if(mysqli_num_rows($resultado) > 0){
            $carona = mysqli_fetch_array($resultado); 
            return $carona;
        }else{
            return null;
        }
    }

    function retornaValorCaronaPorId($id){
        $sql = "SELECT valor FROM carona WHERE id = ".$id;
        $conexao = abreConexao();
        $resultado = $conexao->query($sql);
        $conexao->close();
        if(mysqli_num_rows($resultado) > 0){
            $carona = mysqli_fetch_array($resultado); 
            return $carona['valor'];
        }else{
            return null;
        }
    }

    function retornaIdCarona(){
        $sql = "SELECT MAX(id) AS id_max FROM carona";
        $conexao = abreConexao();
        $resultado = $conexao->query($sql);
        $conexao->close();
        if(mysqli_num_rows($resultado) > 0){
            $carona = mysqli_fetch_array($resultado); 
            return $carona['id_max'];
        }else{
            return null;
        }
    }

    function retornaQuantidadeVagasPorId($id){
        $sql = "SELECT quantidade_vagas FROM carona WHERE id = ".$id;
        $conexao = abreConexao();
        $resultado = $conexao->query($sql);
        $conexao->close();
        if(mysqli_num_rows($resultado) > 0){
            $carona = mysqli_fetch_array($resultado); 
            return $carona['quantidade_vagas'];
        }else{
            return null;
        }
    }

    function insereCarona($valor, $dataCarona, $horario, $quantidadeVagas, $obs, $cpf_usuario){
        $sql = "INSERT INTO carona(valor, data_carona, horário, quantidade_vagas, obs, cpf_usuario) VALUES ('$valor', '$dataCarona', '$horario', '$quantidadeVagas', '$obs', '$cpf_usuario')";
        $conexao = abreConexao();
        $conexao->query($sql);
        $conexao->close();
    }

    function alteraCarona($valor, $dataCarona, $horario, $quantidadeVagas, $obs){
        $sql = "UPDATE carona SET valor = '$valor', data_carona = '$dataCarona', horario = '$horario', quantidade_vagas = '$quantidadeVagas', obs = '$obs' WHERE id = $id";
        $conexao = abreConexao(); 
        $conexao->query($sql);
        $conexao->close();
    }

    function excluiCarona($id){
        $sql = "DELETE FROM carona WHERE id = $id";
        $conexao = abreConexao();
        $conexao->query($sql);
        $conexao->close();
    }

?>