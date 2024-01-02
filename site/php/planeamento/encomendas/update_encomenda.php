<?php
include '../../ligaBD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $idEncomenda = $_POST['idEncomenda'];
    $dataEncomenda = $_POST['dataEncomenda'];
    $horaChegada = $_POST['horaChegada'];
    $idFornecedor = $_POST['FornecedorSel']; // Alterado para corresponder ao nome do campo no formulário

    // Consulta SQL para realizar o UPDATE
    $query = "UPDATE encomendas
              SET dataEncomenda = '$dataEncomenda', horaChegada = '$horaChegada', idFornecedor = $idFornecedor
              WHERE idEncomenda = $idEncomenda";

    // Executa a consulta
    $resultado = registaUser($query);

    if ($resultado) {
        // A atualização foi bem-sucedida
        echo "<script>alert('Atualização bem-sucedida!')</script>";
        echo "<script>window.location='home_encomendas.php';</script>";
    } else {
        // Houve um erro na atualização
        echo "<script>alert('Erro ao tentar atualizar!')</script>";
        echo "<script>window.location='edita_encomenda.php';</script>";
    }
}
?>