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


            <!-- Botão de Submissão -->
            <div class="row">
                <div class="" style="display: flex; justify-content: center;">
                    <button type="submit" class="btn btn-success btn-lg"
                        style="margin: 10px; font-size: 1.25em;">Registar
                        Encomenda</button>
                </div>
            </div>
    </div>
    <span id="msgErro"></span>
    </form>
    <div class="row">
        <div class="" style="display: flex; justify-content: center;">
            <a href="home_encomendas.php"><button class="btn_voltar" type="submit"
                    style="margin: 10px; font-size: 1.25em;">Voltar</button></a>
        </div>
    </div>
    <script src="../../../js/lista_fornecedor.js"></script>
    <script src="../../../js/planeamento/encomendas/valida_encomenda.js"></script>

</body>

</html>