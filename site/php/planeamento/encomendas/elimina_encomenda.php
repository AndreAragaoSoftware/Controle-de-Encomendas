<?php

include '../../ligaBD.php';

$idEncomenda = filter_input(INPUT_GET, "idEncomenda", FILTER_SANITIZE_NUMBER_INT);

if (!empty($idEncomenda)) {
    $query_destalhe_encomenda = "DELETE FROM detalhes_encomenda WHERE idEncomenda= $idEncomenda";

    // Use da função apagaDados
    if (apagaDados($query_destalhe_encomenda)) {
        $query_encomendas = "DELETE FROM encomendas WHERE idEncomenda = $idEncomenda";
        if (apagaDados($query_encomendas)) {
            $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Encomenda apagada com sucesso!</div>"];
        } else {
            $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Encomenda não foi apagada!</div>"];
        }
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Encomenda não foi apagada!</div>"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nem uma Encomenda encontrada!</div>"];
}

echo json_encode($retorna);

?>