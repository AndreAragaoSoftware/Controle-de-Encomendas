<?php
include '../../ligaBD.php';

// Verifica se os campos do formulário foram enviados
if (isset($_POST['dataEncomenda'], $_POST['horaChegada'], $_POST['FornecedorSel'])) {

    // Recupera os valores dos campos do formulário
    $dataEncomenda = $_POST['dataEncomenda'];
    $horaChegada = $_POST['horaChegada'];
    $fornecedorSel = $_POST['FornecedorSel'];

    // Prepara a chamada do procedimento armazenado
    $result_query = InserirEncomenda($fornecedorSel, $dataEncomenda, $horaChegada);

    // Verifica se a inserção foi bem-sucedida
    if ($result_query) {
        echo "<script>alert('Encomenda cadastrada com sucesso.')</script>";
        echo "<script>window.location='home_encomendas.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar encomenda: " . mysqli_error($liga) . "')</script>";
        echo "<script>window.location='formulario_encomendas.php';</script>";
    }

} else {
    echo "<script>alert('Erro: Variáveis nulas.')</script>";
    echo "<script>window.location='sua_pagina.php';</script>";
}

// Feche a conexão (se necessário)
mysqli_close($liga);

