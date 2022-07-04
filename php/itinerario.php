<?php 

    include_once("conecta.php");

    function retornaItinerario($id){
        $sql = "SELECT nome, ordem, id_local FROM itinerario JOIN locais ON id_local = id WHERE id_carona = ".$id;
        
        $conexao = abreConexao();
        $resultado = $conexao->query($sql);
        $conexao->close();
        if(mysqli_num_rows($resultado) > 0){
            while($row = mysqli_fetch_array($resultado)){
                $itinerario[] = $row;
            }
            return $itinerario;
        }else{
            return null;
        }
    }

    function retornaOrdem($id, $idLocal){
        $sql = "SELECT ordem FROM itinerario WHERE id_carona = ".$id." AND id_local = ".$idLocal;
        $conexao = abreConexao();
        $resultado = $conexao->query($sql);
        $conexao->close();
        if(mysqli_num_rows($resultado) > 0){
            $itinerario = mysqli_fetch_array($resultado); 
            return $itinerario['ordem'];
        }else{
            return null;
        }
    }

    function retornaQuantidadeLocais($id){
        $sql = "SELECT COUNT(*) AS total FROM itinerario JOIN carona ON id = id_carona WHERE id = ".$id;
        
        $conexao = abreConexao();
        $resultado = $conexao->query($sql);
        $conexao->close();
        if(mysqli_num_rows($resultado) > 0){
            $itinerario = mysqli_fetch_array($resultado); 
            return $itinerario['total'];
        }else{
            return null;
        }
    }

    function retornaQuantidadeLocaisEntreOrigemDestino($id, $origem, $destino){
        $sql = "SELECT COUNT(*) AS total FROM itinerario JOIN carona ON id = id_carona WHERE id = ".$id." AND ordem BETWEEN ".$origem." AND ".$destino;
        
        $conexao = abreConexao();
        $resultado = $conexao->query($sql);
        $conexao->close();
        if(mysqli_num_rows($resultado) > 0){
            $itinerario = mysqli_fetch_array($resultado); 
            return $itinerario['total'];
        }else{
            return null;
        }
    }


    function insereItinerario($idCarona, $idLocal, $ordem) {
        $sql = "INSERT INTO itinerario(id_carona, id_local, ordem) VALUES('$idCarona', '$idLocal', '$ordem')";
        $conexao = abreConexao(); // Abre a conexão com o BD
        $conexao->query($sql); // Executa o comando SQL
        $conexao->close(); 	// Fecha a conexão com o BD
    }

?>