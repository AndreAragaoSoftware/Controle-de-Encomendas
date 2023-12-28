<?php
// Ligação ao banco
include '../../ligaBD.php';

// Teste para saber se o idFornecedor está vazio
if(!empty($_GET['idFornecedor'])){
    // Pegando o id do utilizador selecionado na pag: home_supervisor_planeamento.php
    $idFornecedor = $_GET['idFornecedor'];
    
    // Consulta do banco de dados na tabela fornecedor atraves do idFornecedor
    $query = "SELECT * FROM fornecedores WHERE idFornecedor = $idFornecedor";

$resultado = mostraDados($query);

if (mysqli_num_rows($resultado) > 0) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $nome = $row['nome'];
        $morada = $row['morada'];
        $email = $row['email'];
        $responsavel = $row['responsavel'];
        $contacto = $row['contacto'];
        $idFornecedor = $row['idFornecedor'];
    }
}
// Erro caso o idFornecedor esteja vazio
}else {
    echo"<script>alert('Erro ao tentar identificar o Fornecedor.')</script>";
        echo"<script>window.location='edita_fornecedor.php';</script>)";
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
    <title>Registo fornececor</title>
</head>

<body>

    <h2>Registo</h2>
    <div class="container">
        <form id="formFornecedor" method="POST" action="update_fornecedor.php">
            <!--nome-->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nomeFornecedor" name="nomeFornecedor"
                        value="<?php echo $nome ?>">
                </div>

                <!-- morada -->
                <div class="row">
                    <div class="col">
                        <label for="morada" class="form-label">Morada</label>
                        <input type="text" class="form-control" id="moradaFornecedor" name="moradaFornecedor"
                            value="<?php echo $morada ?>">
                    </div>
                </div>

                <!-- contacto -->
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <label for="contacto" class="form-label">Contacto</label>
                        <input type="text" class="form-control" id="contactoFornecedor" name="contactoFornecedor"
                            value="<?php echo $contacto ?>">
                    </div>

                    <!-- email -->
                    <div class="row">
                        <div class="col">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="emailFornecedor" name="emailFornecedor"
                                value="<?php echo $email ?>">
                        </div>
                    </div>

                    <!--responsável-->
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label for="responsavel" class="form-label">Responsável</label>
                            <input type="text" class="form-control" id="responsavel" name="responsavel"
                                value="<?php echo $responsavel ?>">
                        </div>
                    </div>

                    <!--Span caso campos não estejam preenchidos-->
                    <span id="msgErro"></span>
                    <!-- Enviando o id para a validação -->
                    <input type="hidden" name="idFornecedor" value="<?php echo $idFornecedor ?>">
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