<?php 

    include_once("conecta.php"); // Inclui a classe conecta
    
    function retornaLocais() {
        $sql = "SELECT * FROM locais ORDER BY nome";
        $conexao = abreConexao(); # Abre a conexão com o BD
        $resultado = $conexao->query($sql);
        $conexao->close(); // Fecha a conexão com o BD
        if (mysqli_num_rows($resultado) > 0) {
            while ($row = mysqli_fetch_array($resultado)) {
                $locais[] = $row;
            }
            return $locais;
        } else {
            return null;
        } 
    }

    function retornaLocaisItinerario() {
        $sql = "SELECT * FROM locais ORDER BY nome";
        $conexao = abreConexao(); # Abre a conexão com o BD
        $resultado = $conexao->query($sql);
        $conexao->close(); // Fecha a conexão com o BD
        if (mysqli_num_rows($resultado) > 0) {
            while ($row = mysqli_fetch_array($resultado)) {
                $locais[] = $row;
            }
            return $locais;
        } else {
            return null;
        } 
    }

    function retornaLocalPorId($id) {
        $sql = "SELECT * FROM local WHERE id = ".$id;
        $conexao = abreConexao(); // Abre a conexão com o BD
        $resultado = $conexao->query($sql);
        $conexao->close(); // Fecha a conexão com o BD
        if (mysqli_num_rows($resultado) > 0) {
             $local = mysqli_fetch_array($resultado);
             return $local;
        } else {
             return null;
        } 
    }

    function retornaLocalPorNome($nome) {
        $sql = "SELECT id FROM locais WHERE nome = '$nome';";
        $conexao = abreConexao(); // Abre a conexão com o BD
        $resultado = $conexao->query($sql);
        $conexao->close(); // Fecha a conexão com o BD
        if (mysqli_num_rows($resultado) > 0) {
             $local = mysqli_fetch_array($resultado);
             return $local['id'];
        } else {
             return null;
        } 
    }

    function insereLocal($nome) {
        echo "Aqui insere";
        // Define o comando SQL  (insert)
        $sql = "INSERT INTO locais(nome) 
            VALUES('$nome')";
        $conexao = abreConexao(); // Abre a conexão com o BD
        $conexao->query($sql); // Executa o comando SQL
        $conexao->close(); 	// Fecha a conexão com o BD
    }

    function alteraLocal($nome) {
        // Define o comando SQL  (update)
        $sql = "UPDATE local SET nome = '$nome' WHERE id = $id"; 
        $conexao = abreConexao(); // Abre a conexão com o BD
        $conexao->query($sql);	 // Executa o comando SQL
        $conexao->close(); // Fecha a conexão com o BD
    }

    function excluiLocal($id) {
        // Define o comando SQL  (delete)
        $sql = "DELETE FROM local WHERE id = $id"; 
        $conexao = abreConexao(); // Abre a conexão com o BD
        $conexao->query($sql); // Executa o comando SQL
        $conexao->close(); // Fecha a conexão com o BD 
    }
    ?>
    