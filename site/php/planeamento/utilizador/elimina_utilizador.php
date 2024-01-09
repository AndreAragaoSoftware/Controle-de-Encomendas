<?php

include '../../ligaBD.php';

$idLogin = filter_input(INPUT_GET, "idLogin", FILTER_SANITIZE_NUMBER_INT);

if (!empty($idLogin)) {
    $query_utilizador = "DELETE FROM utilizadores WHERE idLogin= $idLogin";

    // Use da função apagaDados
    if (apagaDados($query_utilizador)) {
        $query_login = "DELETE FROM login WHERE idLogin=$idLogin";
        if (apagaDados($query_login)) {
            $retorna = ['status' => true, 'msg' => "<div class='alert alert-success' role='alert'>Utilizador apagado com sucesso!</div>"];
        } else {
            $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Login não foi apagado!</div>"];
        }
    } else {
        $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Utlizador não foi apagado!</div>"];
    }
} else {
    $retorna = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nem um utilizador encontrado!</div>"];
}

echo json_encode($retorna);

?>