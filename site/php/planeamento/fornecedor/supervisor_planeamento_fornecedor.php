<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <style type="text/css">
    .tijolo {
        background-color: tomato;
        color: white;
    }
    </style>
    <title>Registo_fornececor</title>
</head>

<body>

    <h2>Registo</h2>
    <div id="" class="container">
        <form id="formUtilizadores" method="POST" action="../php/registo_fornecedor.php">
            <!--nome-->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome"
                        placeholder="Insira o nome do fornecedor">
                </div>

                <!-- morada -->
                <div class="row">
                    <div class="col">
                        <label for="morada" class="form-label">Morada</label>
                        <input type="text" class="form-control" id="morada" name="morada" placeholder="Insira a morada">
                    </div>
                </div>

                <!-- contacto -->
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label for="contacto" class="form-label">Contacto</label>
                        <input type="text" class="form-control" id="contacto" name="contacto"
                            placeholder="Insira ocontacto">
                    </div>

                    <!-- email -->
                    <div class="row">
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="email" name="email"
                                placeholder="Insira o email">
                        </div>
                    </div>

                    <!--responsável-->
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label for="nome" class="form-label">Responsável</label>
                            <input type="text" class="form-control" id="nome" name="responsavel"
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
    <script src="../js/valida_utilizador.js"></script>
</body>

</html>