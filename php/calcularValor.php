<?php

    header("Content-Type: application/json");

    $data = file_get_contents("php://input");

    $origemDestino = json_decode($data);

    include_once("carona.php");
    include_once("itinerario.php");

    $valorCarona = retornaValorCaronaPorId($origemDestino->id, $origemDestino->origem, $origemDestino->destino);

    $ordemOrigem = retornaOrdem($origemDestino->id, $origemDestino->origem);
    $ordemDestino = retornaOrdem($origemDestino->id, $origemDestino->destino);

    $quantidadeTotalLocais = retornaQuantidadeLocais($origemDestino->id);

    $quantidadeLocaisEntreOrigemDestino = retornaQuantidadeLocaisEntreOrigemDestino($origemDestino->id, $ordemOrigem, $ordemDestino);

    $valorTotal = ($valorCarona / ($quantidadeTotalLocais - 1) * ($quantidadeLocaisEntreOrigemDestino - 1));

    echo number_format($valorTotal, 2);

?>