<?php

// Inclua o arquivo de conexão com o banco de dados e outras configurações necessárias
include_once "../../ligaBD.php";

// Query para recuperar registros da tabela de status de escala
$query = "SELECT idStatusEscala, nome FROM status_escala ORDER BY nome ASC";
$resultado = mostraDados($query);

if ($resultado && $resultado->num_rows > 0) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $dados[] = [
            'id' => $row['idStatusEscala'],
            'nome' => $row['nome']
        ];
    }
    $dados = ['status' => true, 'dados' => $dados];
} else {
    $dados = ['status' => false, 'msg' => 'Nenhum status de escala encontrado.'];
}

// Convertendo o array para um objeto JSON
echo json_encode($dados);

?>