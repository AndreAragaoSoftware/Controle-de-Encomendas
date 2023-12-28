<?php

include '../../ligaBD.php';

// Verifica se o parâmetro idFornecedor foi passado via GET
$idFornecedor = filter_input(INPUT_GET, "idFornecedor", FILTER_SANITIZE_NUMBER_INT);

if (!empty($idFornecedor)) {
    // Query para excluir fornecedor
    $queryExcluir = "DELETE FROM fornecedores WHERE idFornecedor = $idFornecedor";
    // Executa a consulta
    if (apagaDados($queryExcluir)) {
        $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Fornecedor excluído com sucesso!</div>"];
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Fornecedor não foi excluído!</div>"];
    }

} else {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Parâmetro idFornecedor não foi fornecido!</div>"];
}

// Retorna a resposta em formato JSON
echo json_encode($retorna);

?>