<?php

    header("Content-Type: application/json");

    $data = file_get_contents("php://input");

    $localObj = json_decode($data);

    echo $localObj->nome;

    include_once("local.php");
    
    insereLocal($localObj->nome);

?>