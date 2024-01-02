<?php
include '../../ligaBD.php';

// Verifica se o idEncomenda não está vazio
if (!empty($_GET['idEncomenda'])) {
    // Obtém o id da encomenda selecionada
    $idEncomenda = $_GET['idEncomenda'];

    // Consulta o banco de dados para obter os detalhes da encomenda
    $query = "SELECT * FROM encomendas WHERE idEncomenda = $idEncomenda";
    $resultado = mostraDados($query);

    if (mysqli_num_rows($resultado) > 0) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            $dataEncomenda = $row['dataEncomenda'];
            $horaChegada = $row['horaChegada'];
            $idFornecedor = $row['idFornecedor'];
        }
    } else {
        // Caso não haja resultados para o idEncomenda fornecido
        echo "<script>alert('Encomenda não encontrada.')</script>";
        echo "<script>window.location='home_encomenda.php';</script>";
    }
} else {
    // Caso o idEncomenda esteja vazio
    echo "<script>alert('Erro ao identificar a Encomenda.')</script>";
    echo "<script>window.location='home_encomenda.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../css/style.css">
    <style type="text/css">
    .tijolo {
        background-color: tomato;
        color: white;
    }
    </style>
    <title>Editar Encomenda</title>
</head>

<body>

    <h2>Editar Encomenda</h2>
    <div class="container">
        <form id="formEncomenda" method="POST" action="update_encomenda.php">
            <!-- Data da Encomenda -->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="dataEncomenda" class="form-label">Data da Encomenda</label>
                    <input type="date" class="form-control" id="dataEncomenda" name="dataEncomenda"
                        value="<?php echo $dataEncomenda; ?>" required>
                </div>
            </div>
            <!-- Hora de Chegada -->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="horaChegada" class="form-label">Hora de Chegada</label>
                    <input type="time" class="form-control" id="horaChegada" name="horaChegada"
                        value="<?php echo $horaChegada; ?>" required>
                </div>
            </div>
            <!-- Fornecedor -->
            <div class="row">
                <label for="FornecedorSel">Fornecedor</label>
                <select name="FornecedorSel" id="FornecedorSel">
                    <?php
                    // Consulta para obter a lista de fornecedores
                    $queryFornecedores = "SELECT idFornecedor, nome FROM fornecedores";
                    $resultFornecedores = mostraDados($queryFornecedores);

                    while ($rowFornecedor = mysqli_fetch_assoc($resultFornecedores)) {
                        $selected = ($rowFornecedor['idFornecedor'] == $idFornecedor) ? "selected" : "";
                        echo "<option value='{$rowFornecedor['idFornecedor']}' $selected>{$rowFornecedor['nome']}</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Enviando o id para a validação -->
            <input type="hidden" name="idEncomenda" value="<?php echo $idEncomenda; ?>">

            <!-- Botão de Submissão -->
            <div class="row">
                <div class="" style="display: flex; justify-content: center;">
                    <button type="submit" class="btn btn-success btn-lg"
                        style="margin: 10px; font-size: 1.25em;">Atualizar Encomenda</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Script de validação JS, se necessário -->
    <script src="../../../js/planeamento/encomendas/valida_encomenda.js"></script>

</body>

</html>