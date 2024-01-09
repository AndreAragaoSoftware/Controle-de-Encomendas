<?php 
// Verifica se o idEncomenda não está vazio
$idEncomenda = (!empty($_GET['idEncomenda'])) ? intval($_GET['idEncomenda']) : 0;

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
    <title>Cadastro de Produto na Encomenda</title>
</head>

<body>

    <h2>Cadastro de Produto na Encomenda</h2>
    <div class="container">
        <form id="formProdutoEncomenda" method="POST" action="cadastra_produto_encomenda.php">
            <!-- Produto -->
            <span id="msgAlertaProduto"></span>
            <!-- Fornecedor -->
            <div class=" row">
                <label for="ProdutoSel">Produto</label>
                <select name="ProdutoSel" id="ProdutoSel">
                    <option value="">Selecione</option>
                </select>
            </div>
            <!-- Quantidade -->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="quantidade" class="form-label">Quantidade de caixas</label>
                    <input type="number" class="form-control" id="quantidade" name="quantidade" required>
                </div>
            </div>

            <!-- Botão de Submissão -->
            <div class="row">
                <div class="" style="display: flex; justify-content: center;">
                    <button type="submit" class="btn btn-success btn-lg"
                        style="margin: 10px; font-size: 1.25em;">Cadastrar Produto na Encomenda</button>
                </div>
            </div>
            <span id="msgErro"></span>
            <div class="row">
                <div class="" style="display: flex; justify-content: center;">
                    <a href="home_encomendas.php"><button class="btn_voltar" type="submit"
                            style="margin: 10px; font-size: 1.25em;">Voltar</button></a>
                </div>
            </div>
            <!-- Enviando o id para a validação -->
            <input type="hidden" name="idEncomendaProduto" id="idEncomendaProduto" value="<?php echo $idEncomenda; ?>">
        </form>
    </div>
    <script src="../../../js/lista_produto.js">
    </script>


</body>

</html>