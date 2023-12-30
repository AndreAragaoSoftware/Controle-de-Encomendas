<?php

// Conexão com o BD
include_once "../../ligaBD.php";

// Query para recuperar registros do banco de dados, ordenados por nome
$query = "SELECT idFornecedor, nome FROM fornecedores ORDER BY nome ASC";

$resultadoFor = mostraDados($query);

if ($resultadoFor && $resultadoFor->num_rows > 0) {
    while ($rows = mysqli_fetch_assoc($resultadoFor)) {
        // Pegando os dados do banco e setando no array
        $dados[] = [
            'id' => $rows['idFornecedor'],
            'nome' => $rows['nome']
        ];
    }
    $dados = ['status' => true, 'dados' => $dados];
} else {    
   
    $dados = ['status' => false, 'msg' => "<div class='alert alert-danger' role='alert'>Erro: Nenhum fornecedor encontrado!</div>"];
}

// Convertendo o array para um objeto JSON
echo json_encode($dados);
?>