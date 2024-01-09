<?php
// Verifica se o idUtilizadores não está vazio
$idUtilizadores = (!empty($_GET['idUtilizadores'])) ? intval($_GET['idUtilizadores']) : 0;

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
    <title>Cadastro de Escala de Utilizadores</title>
</head>

<body>

    <h2>Cadastro de Escala de Utilizadores</h2>
    <div class="container">
        <form id="formEscalaUtilizadores" method="POST" action="cadastra_escala_utilizadores.php">
            <!-- Data da Escala -->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="dataEscala" class="form-label">Data da Escala</label>
                    <input type="date" class="form-control" id="dataEscala" name="dataEscala" required>
                </div>
            </div>

            <!-- Status da Escala -->
            <div class="row">
                <label for="statusEscala">Status da Escala</label>
                <select name="statusEscala" id="statusEscala">
                    <option value="">Selecione</option>
                    <?php
                    foreach ($statusArray as $status) {
                        echo '<option value="' . $status['idStatusEscala'] . '">' . $status['nomeStatus'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <!-- Botão de Submissão -->
            <div class="row">
                <div class="" style="display: flex; justify-content: center;">
                    <button type="submit" class="btn btn-success btn-lg"
                        style="margin: 10px; font-size: 1.25em;">Cadastrar Escala de Utilizadores</button>
                </div>
            </div>
            <span id="msgErro"></span>
            <div class="row">
                <div class="" style="display: flex; justify-content: center;">
                    <a href="home_encomendas.php"><button class="btn_voltar" type="submit"
                            style="margin: 10px; font-size: 1.25em;">Voltar</button></a>
                </div>
            </div>
            <!-- Enviando o idUtilizadores para a validação -->
            <input type="hidden" name="idUtilizadores" id="idUtilizadores" value="<?php echo $idUtilizadores; ?>">
        </form>
    </div>
    <script src="../../../js/lista_status.js"></script>
</body>

</html>