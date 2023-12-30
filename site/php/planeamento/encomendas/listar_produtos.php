<?php

// Conexão com o BD
include_once "../../ligaBD.php";

// Query para recuperar registros do banco de dados, ordenados por nome
$query = "SELECT idProduto, nome FROM produtos ORDER BY nome ASC";

$resultadoProd = mostraDados($query);

if ($resultadoProd && $resultadoProd->num_rows > 0) {
    while ($rows = mysqli_fetch_assoc($resultadoProd)) {
        // Pegando os dados do banco e setando no array
        $dados[] = [
            'id' => $rows['idProduto'],
            'nome' => $rows['nome']
        ];
    }
    $dados = ['status' => true, 'dados' => $dados];
} else {    
    $dados = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum produto encontrado!</div>"];
}

// Convertendo o array para um objeto JSON
echo json_encode($dados);

?>