<?php
include '../../ligaBD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $idFornecedor = $_POST['idFornecedor'];
    $nome = $_POST['nomeFornecedor'];
    $morada = $_POST['moradaFornecedor'];
    $contacto = $_POST['contactoFornecedor'];
    $email = $_POST['emailFornecedor'];
    $responsavel = $_POST['responsavel'];

    // Consulta SQL para realizar o UPDATE
    $query = "UPDATE fornecedores
              SET nome = '$nome', morada = '$morada', contacto = '$contacto', email = '$email', responsavel = '$responsavel'
              WHERE idFornecedor = $idFornecedor";

    // Executa a consulta
    $resultado = registaUser($query);

    if ($resultado) {
        // A atualização foi bem-sucedida
        echo "<script>alert('Atualização bem-sucedida!')</script>";
        echo "<script>window.location='home_fornecedor.php';</script>";
    } else {
        // Houve um erro na atualização
        echo "<script>alert('Erro ao tentar atualizar!')</script>";
        echo "<script>window.location='edita_fornecedor.php';</script>";
    }
}
?>