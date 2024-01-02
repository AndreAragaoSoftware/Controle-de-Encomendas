<?php 
// Verifica se o idEncomenda não está vazio
$idEncomenda = (!empty($_GET['idEncomenda'])) ? intval($_GET['idEncomenda']) : 0;

 ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <title>Visualizar Detalhes de Encomenda</title>
</head>

<body>
    <h1>Detalhes da Encomenda</h1>

    <!-- Criando tabela para exibir detalhes de encomendas -->
    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered">
            <tr>
                <th>Nome do Produto</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
            <?php
            // Conexão com banco de dados
            include '../../ligaBD.php';
            // Inicializa a variável $quantCaixa
            $quantCaixa = 0;

            // Query para buscar detalhes da encomenda
            $query = "SELECT detalhes_encomenda.*, produtos.nome AS nome_produto,
                      encomendas.dataEncomenda, encomendas.horaChegada
                      FROM detalhes_encomenda
                      JOIN produtos ON detalhes_encomenda.idProduto = produtos.idProduto
                      JOIN encomendas ON detalhes_encomenda.idEncomenda = encomendas.idEncomenda
                      WHERE detalhes_encomenda.idEncomenda = $idEncomenda";

            $sql_query = mostraDados($query) or die("Falha na execução do código SQL");

            // Colocando os dados na tabela
            while ($rows = mysqli_fetch_assoc($sql_query)) {
                echo "<tr>
                        <td>" . $rows['nome_produto'] . "</td>
                        <td>" . $rows['quantidade'] . "</td>
                        <td>" . $rows['quantidade'] . "</td>
                      </tr>";
                      // Armazena o valor de horaChegada
                     $horaChegada = $rows['horaChegada'];
                     // Armazena o valor de horaChegada
                     $dataEncomenda = $rows['dataEncomenda'];
                     // Soma a quantidade de caixas
                     $quantCaixa += $rows['quantidade'];
            }

            ?>
            <!--Fim da tabela-->
        </table>
    </div>
    <div class="container">
        <div class="row">
            <label>Previsão de Chegada:</label>
            <label>
                <?php echo"$horaChegada" ?>
            </label>
        </div>
        <div class="row">
            <label>Previsão de Chegada:</label>
            <label>
                <?php echo"$dataEncomenda" ?>
            </label>
        </div>
        <div class="row">
            <label class="text-dark">Total de Caixas:</label>
            <label class="text-danger">
                <?php echo"$quantCaixa caixas" ?>
            </label>
        </div>
    </div>
    <!-- Validação do js -->
    <script src="../../../js/planeamento/apagar.js"></script>

</body>

</html>