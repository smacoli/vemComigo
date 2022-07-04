<?php 

    include_once("conecta.php");

    function insereReserva($cpfUsuario, $idCarona, $origem, $destino, $valor) {
        $sql = "INSERT INTO reserva(cpf_usuario, id_carona, origem, destino, valor) 
            VALUES('$cpfUsuario', $idCarona, $origem, $destino, $valor);";
        $conexao = abreConexao(); // Abre a conexão com o BD
        $conexao->query($sql); // Executa o comando SQL
        $conexao->close(); 	// Fecha a conexão com o BD
    }

?>