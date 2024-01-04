<?php
// Ligação ao banco
include '../../ligaBD.php';

// Teste para saber se o idProduto está vazio
if(!empty($_GET['idProduto'])){
    // Pegando o id do utilizador selecionado na pag: home_supervisor_planeamento.php
    $idProduto = $_GET['idProduto'];
    
    // Consulta do banco de dados na tabela produtos atraves do idProduto 
    $query = "SELECT * FROM produtos WHERE idProduto = $idProduto";

$resultado = mostraDados($query);

if (mysqli_num_rows($resultado) > 0) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $nome = $row['nome'];
        $tipoProduto = $row['tipoProduto'];
        $tipoAnimal = $row['tipoAnimal'];
        $idProduto = $row['idProduto'];
    }
}
// Erro caso o idProduto esteja vazio
}else {
    echo"<script>alert('Erro ao tentar identificar o IP.')</script>";
        echo"<script>window.location='supervisor_planeamento_produto.php';</script>)";
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../css/style.css">
    <style type="text/css">
    .tijolo {
        background-color: tomato;
        color: white;
    }
    </style>
    <title>Registar_produto</title>
</head>

<body>

    <h2>Registo de produtos</h2>
    <div class="container">
        <form id="formProdutos" method="POST" action="update_produto.php">
            <!-- Nome -->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="nomeProduto" class="form-label">Nome do Produto</label>
                    <input type="text" class="form-control" id="nomeProduto" name="nome" value="<?php echo $nome ?>">
                </div>
            </div>

            <!-- Tipo de animal -->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="tipoAnimal" class="form-label">Tipo de Animal</label>
                    <select class="form-control" id="tipoAnimal" name="tipoAnimal" required>
                        <option value="Vaca" <?php echo ($tipoAnimal == 'Vaca') ? 'selected' : ''; ?>>Vaca</option>
                        <option value="Frango" <?php echo ($tipoAnimal == 'Frango') ? 'selected' : ''; ?>>Frango
                        </option>
                        <option value="Frango do Campo"
                            <?php echo ($tipoAnimal == 'Frango do Campo') ? 'selected' : ''; ?>>Frango do Campo</option>
                        <option value="Pato" <?php echo ($tipoAnimal == 'Pato') ? 'selected' : ''; ?>>Pato</option>
                        <option value="Borrego" <?php echo ($tipoAnimal == 'Borrego') ? 'selected' : ''; ?>>Borrego
                        </option>
                        <option value="Cabrito" <?php echo ($tipoAnimal == 'Cabrito') ? 'selected' : ''; ?>>Cabrito
                        </option>
                    </select>
                </div>
            </div>


            <!-- Tipo de produto -->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="tipoProduto" class="form-label">Tipo de Produto</label>
                    <select class="form-control" id="tipoProduto" name="tipoProduto" required>
                        <option value="Granel" <?php echo ($tipoProduto == 'Granel') ? 'selected' : ''; ?>>Granel
                        </option>
                        <option value="Vácuo" <?php echo ($tipoProduto == 'Vácuo') ? 'selected' : ''; ?>>Vácuo</option>
                    </select>
                </div>
            </div>


            <!-- Span caso campos não estejam preenchidos -->
            <span id="msgErro"></span>
            <!-- Enviando o id para a validação -->
            <input type="hidden" name="idProduto" value="<?php echo $idProduto ?>">
            <div class="row">
                <div class="text-center">
                    <button type="submit" class="btn btn-success" style="margin: 10px;">Update</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Validação do JavaScript -->
    <script src="../../../js/planeamento/valida_produto.js"></script>
</body>

</html>