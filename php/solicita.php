<?php

include_once("conecta.php");

function retornaCarona(){
    $sql = SELECT usuario.primeiro_nome, reserva.id_carona FROM usuario JOIN reserva WHERE cpf = cpf_usuario;
    $conexao = abreConexao();
    $resultado = $conexao->query($sql);
    $conexao->close();
        if(mysqli_num_rows($resultado) > 0){
            while ($row = mysqli_fetch_array($resultado)){
                $carona[] = $row;
            }
            return $carona[];
        }
            else{
                return null;
            }
}
?>