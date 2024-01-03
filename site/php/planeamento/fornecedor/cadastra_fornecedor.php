<?php
include '../../ligaBD.php';

// Verifica se os campos do formulário foram enviados
if (isset($_POST['nomeFornecedor'], $_POST['moradaFornecedor'], $_POST['contactoFornecedor'], $_POST['emailFornecedor'], $_POST['responsavel'])) {

    // Recupera os valores dos campos do formulário
    $nomeFornecedor = $_POST['nomeFornecedor'];
    $moradaFornecedor = $_POST['moradaFornecedor'];
    $contactoFornecedor = $_POST['contactoFornecedor'];
    $emailFornecedor = $_POST['emailFornecedor'];
    $responsavel = $_POST['responsavel'];

    // Query para verificar se o fornecedor já existe
    $sqlVerificacaoFornecedor = "SELECT COUNT(*) AS total FROM fornecedores WHERE nome = '$nomeFornecedor'";
    $resultadoVerificacao = mostraDados($sqlVerificacaoFornecedor);
    
    if ($resultadoVerificacao) {
        $row = mysqli_fetch_assoc($resultadoVerificacao);
        $total = $row['total'];

        if ($total > 0) {
            echo "<script>alert('Erro: Fornecedor já existe.')</script>";
            echo "<script>window.location='formulario_cadastro_fornecedor.php';</script>";
            exit(); // Encerra o script para evitar a execução do restante do código
        }
    }

    // Query para inserir o fornecedor
    $sqlInserirFornecedor = "INSERT INTO fornecedores (nome, morada, contacto, email, responsavel) VALUES ('$nomeFornecedor', '$moradaFornecedor', '$contactoFornecedor', '$emailFornecedor', '$responsavel')";

    // Executa a query
    $result_query = registaUser($sqlInserirFornecedor);

    // Verifica se a inserção foi bem-sucedida
    if ($result_query) {
        echo "<script>alert('Fornecedor cadastrado com sucesso.')</script>";
        echo "<script>window.location='home_fornecedor.php';</script>";
    } else {
        echo "<script>alert('Erro ao cadastrar fornecedor.')</script>";
        echo "<script>window.location='formulario_cadastro_fornecedor.php';</script>";
    }

} else {
    echo "<script>alert('Erro: Variáveis nulas.')</script>";
    echo "<script>window.location='formulario_cadastro_fornecedor.php';</script>";
}
?>