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
    <title>Registo Fornececor</title>
</head>

<body>

    <h2>Registo</h2>
    <div class="container">
        <form id="formFornecedor" method="POST" action="cadastra_fornecedor.php">
            <!--nome-->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nomeFornecedor" name="nomeFornecedor"
                        placeholder="Insira o nome do fornecedor">
                </div>

                <!-- morada -->
                <div class="row">
                    <div class="col">
                        <label for="morada" class="form-label">Morada</label>
                        <input type="text" class="form-control" id="moradaFornecedor" name="moradaFornecedor"
                            placeholder="Insira a morada">
                    </div>
                </div>

                <!-- contacto -->
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label for="contacto" class="form-label">Contacto</label>
                        <input type="text" class="form-control" id="contactoFornecedor" name="contactoFornecedor"
                            placeholder="Insira o contacto">
                    </div>

                    <!-- email -->
                    <div class="row">
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="emailFornecedor" name="emailFornecedor"
                                placeholder="Insira o email">
                        </div>
                    </div>

                    <!--responsável-->
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label for="responsavel" class="form-label">Responsável</label>
                            <input type="text" class="form-control" id="responsavel" name="responsavel"
                                placeholder="Insira o nome do responsavel">
                        </div>
                    </div>

                    <!--Span caso campos não estejam preenchidos-->
                    <span id="msgErro"></span>

                    <div class="row">
                        <div class="" style="display: flex; justify-content: center;">
                            <button type="submit" class="btn btn-success" style="margin: 10px;">Registar</button>
                        </div>
                    </div>
        </form>
    </div>
    <!--Validação do js-->
    <script src="../../../js/planeamento/fornecedor/valida_fornrcedor.js"></script>
</body>

</html>