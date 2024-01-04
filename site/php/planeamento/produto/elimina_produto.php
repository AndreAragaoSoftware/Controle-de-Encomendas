<?php

include '../../ligaBD.php';

$idProduto = filter_input(INPUT_GET, "idProduto", FILTER_SANITIZE_NUMBER_INT);

if (!empty($idProduto)) {
    $query_produto = "DELETE FROM produtos WHERE idProduto= $idProduto";

    // Use da função apagaDados
    if (apagaDados($query_produto)) {
            $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Utilizador apagado com sucesso!</div>"];
        } else {
            $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Login não foi apagado!</div>"];
        }
    }

echo json_encode($retorna);

?>