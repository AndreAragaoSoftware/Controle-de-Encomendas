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
    <title>Registo de Encomendas</title>
</head>

<body>

    <h2>Registo de Encomendas</h2>
    <div class="container">
        <form id="formEncomenda" method="POST" action="cadastra_encomenda.php">
            <!-- Data da Encomenda -->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="dataEncomenda" class="form-label">Data da Encomenda</label>
                    <input type="date" class="form-control" id="dataEncomenda" name="dataEncomenda" required>
                </div>
            </div>

            <!-- Hora de Chegada -->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="horaChegada" class="form-label">Hora de Chegada</label>
                    <input type="time" class="form-control" id="horaChegada" name="horaChegada" required>
                </div>
            </div>
            <span id="msgAlertaFornecedor"></span>
            <!-- Fornecedor -->
            <div class=" row">
                <label for="FornecedorSel">Fornecedor</label>
                <select name="FornecedorSel" id="FornecedorSel">
                    <option value="">Selecione</option>
                </select>
            </div>


            <!-- Detalhes dos Produtos (pode adicionar dinamicamente com JavaScript) -->
            <!-- Produto 1 -->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="nomeProduto1" class="form-label">Produto 1</label>
                    <input type="text" class="form-control" id="nomeProduto1" name="nomeProduto1"
                        placeholder="Nome do Produto" required>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="quantidade1" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" id="quantidade1" name="quantidade1" required>
                </div>
            </div>

            <!-- Produto 2 (adicionar mais conforme necessário) -->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="nomeProduto2" class="form-label">Produto 2</label>
                    <input type="text" class="form-control" id="nomeProduto2" name="nomeProduto2"
                        placeholder="Nome do Produto" required>
                </div>
                <div class="col-md-6 col-sm-12">
                    <label for="quantidade2" class="form-label">Quantidade</label>
                    <input type="number" class="form-control" id="quantidade2" name="quantidade2" required>
                </div>
            </div>

            <!-- Adicionar mais produtos conforme necessário -->

            <!-- Botão de Submissão -->
            <div class="row">
                <div class="" style="display: flex; justify-content: center;">
                    <button type="submit" class="btn btn-success" style="margin: 10px;">Registar Encomenda</button>
                </div>
            </div>
        </form>
    </div>
    <script src="../../../js/custom.js"></script>
    <!-- Validação do JavaScript <script src="../../../js/planeamento/encomenda/valida_encomenda.js"></script>  -->

</body>

</html>