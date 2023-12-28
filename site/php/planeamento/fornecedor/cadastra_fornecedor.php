<?php

// Conexão com o banco de dados
include '../../ligaBD.php';

// Buscando dados dos campos
$nomeProduto = $_POST['nomeProduto'];
$tipoAnimal = $_POST['tipoAnimal'];
$tipoProduto = $_POST['tipoProduto'];

if (isset($_POST['nomeProduto'], $_POST['tipoAnimal'], $_POST['tipoProduto'])) {



// Query para verificar se o produto já existe
$sqlVerificacaoProduto = "SELECT COUNT(*) AS total FROM produtos WHERE nome = '$nomeProduto' AND tipoAnimal = '$tipoAnimal' AND tipoProduto = '$tipoProduto'";
$resultado = mostraDados($sqlVerificacaoProduto);

if ($resultado) {
    $row = mysqli_fetch_assoc($resultado);
    $total = $row['total'];

    if ($total > 0) {
        echo "<script>alert('Erro: Produto já existe.')</script>";
        echo "<script>window.location='supervisor_planeamento_produto.php';</script>";
    } else {
    // Query para inserir o produto
    $sqlInserirProduto = "INSERT INTO produtos (nome, tipoAnimal, tipoProduto) VALUES ('$nomeProduto', '$tipoAnimal', '$tipoProduto')";
    $result_query = registaUser( $sqlInserirProduto);
    }if ($result_query) {
        echo "<script>alert('Produto cadastrado com sucesso.')</script>";
        echo "<script>window.location='supervisor_planeamento_produto.php';</script>";
    } else {
        echo "<script>alert('Erro: Ao cadastra Produto.')</script>";
        echo "<script>window.location='supervisor_planeamento_produto.php';</script>";
    }
}
}else {
    echo "<script>alert('Erro: Variaveis null.')</script>";
        echo "<script>window.location='supervisor_planeamento_produto.php';</script>";
}

?>