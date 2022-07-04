<?php 

    include_once("conecta.php"); 

    function insereVeiculo($placa, $tipo, $marca, $modelo, $cor, $ano_fabricacao, $cpf_usuario) {
        $sql = "INSERT INTO veiculo(placa, tipo, marca, modelo, cor, ano_fabricacao, cpf_usuario) 
            VALUES('$placa', '$tipo', '$marca', '$modelo', '$cor', '$ano_fabricacao', '$cpf_usuario')";
        $conexao = abreConexao(); 
        $conexao->query($sql); 
        $conexao->close(); 	
    }

?>
    