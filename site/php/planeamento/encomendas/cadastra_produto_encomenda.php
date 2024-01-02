<?php
include '../../ligaBD.php';

// Verifica se os campos do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Recupera os valores dos campos do formulário
    $produtoSel = $_POST['ProdutoSel'];
    $quantidade = $_POST['quantidade'];
    $idEncomendas = $_POST['idEncomendaProduto'];

    // Verifica se o idEncomenda existe na tabela encomendas
    $verificaEncomenda = "SELECT idEncomenda FROM encomendas WHERE idEncomenda = $idEncomendas";

    $resultVerificacao = mostraDados($verificaEncomenda);

    // Após a verificação de existência da encomenda
if ($resultVerificacao->num_rows < 0) {
    // O idEncomenda não existe
    echo "<script>alert('Erro: A encomenda especificada não existe.')</script>";
    echo "<script>window.location='home_encomendas.php';</script>";
    exit(); // Encerra o script para evitar a execução do código abaixo em caso de erro
} 

    // Query para inserir o produto na encomenda
    $sqlInserirProdutoEncomenda = "INSERT INTO detalhes_encomenda (idProduto, quantidade, idEncomenda) VALUES ('$produtoSel', '$quantidade', '$idEncomendas')";

    // Executa a query
    $result_query = registaUser($sqlInserirProdutoEncomenda);

    // Após a tentativa de inserir o produto na encomenda
    if ($result_query) {
    echo "<script>alert('Produto cadastrado na encomenda com sucesso.')</script>";
    echo "<script>window.location='home_encomendas.php';</script>";
    } else {
    echo "<script>alert('Erro ao cadastrar produto na encomenda.')</script>";
    echo "<script>window.location='add_produto_encomenda.php.php';</script>";
}

} else {
    echo "<script>alert('Erro: Variáveis nulas.)</script>";
    echo "<script>window.location='home_encomendas.php';</script>";
}
?>