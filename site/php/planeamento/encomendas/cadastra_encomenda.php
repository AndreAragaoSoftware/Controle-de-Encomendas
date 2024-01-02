<?php
include '../../ligaBD.php';

// Verifica se os campos do formulário foram enviados
if (isset($_POST['dataEncomenda'], $_POST['horaChegada'], $_POST['FornecedorSel'])) {

    // Recupera os valores dos campos do formulário
    $dataEncomenda = $_POST['dataEncomenda'];
    $horaChegada = $_POST['horaChegada'];
    $fornecedorSel = $_POST['FornecedorSel'];

    // Query para inserir a encomenda
    $sqlInserirEncomenda = "INSERT INTO encomendas (dataEncomenda, horaChegada, idFornecedor) VALUES ('$dataEncomenda', '$horaChegada', '$fornecedorSel')";

    // Executa a query
    $result_query = registaUser($sqlInserirEncomenda);

    // Verifica se a inserção foi bem-sucedida
    if ($result_query) {
        echo "<script>alert('Encomenda cadastrada com sucesso.')</script>";
        echo "<script>window.location='home_encomendas.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar encomenda.')</script>";
        echo "<script>window.location='formulario_enconmendas.php.php';</script>";
    }

} else {
    echo "<script>alert('Erro: Variáveis nulas.')</script>";
    echo "<script>window.location='sua_pagina.php';</script>";
}
?>