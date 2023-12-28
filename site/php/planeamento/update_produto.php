<?php
include '../ligaBD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $idProduto = $_POST['idProduto'];
    $nome = $_POST['nome'];
    $tipoProduto = $_POST['tipoProduto'];
    $tipoAnimal = $_POST['tipoAnimal'];


    // Consulta SQL para realizar o UPDATE
    $query = "UPDATE produtos
          SET nome = '$nome', tipoProduto = '$tipoProduto', tipoAnimal = '$tipoAnimal'
          WHERE idProduto = $idProduto";


    // Executa a consulta
    $resultado = registaUser($query);

    if ($resultado) {
        // A atualização foi bem-sucedida
        echo"<script>alert('Atualização bem-sucedida!')</script>";
        echo"<script>window.location='supervisor_planeamento_produto.php';</script>)";
    } else {
        // Houve um erro na atualização
        echo"<script>alert('Erro ao tentar Utdate!')</script>";
        echo"<script>window.location='edita_produto.php';</script>)";
        
    }
}
?>