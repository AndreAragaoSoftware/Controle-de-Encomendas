<?php
// Ligação ao banco
include 'ligaBD.php';

// Teste para saber se o idUtilizadores está vazio
if(!empty($_GET['idUtilizadores'])){
    // Pegando o id do utilizador selecionado na pag: home_supervisor_planeamento.php
    $idUtilizadores = $_GET['idUtilizadores'];
    
    // Consulta do banco de dados na tabela utilizadores atraves do idUtilizadores 
    $query = "SELECT utilizadores.*, funcao.nomeFuncao, login.nomeUtilizador, login.pass
              FROM utilizadores
              JOIN funcao ON utilizadores.idFuncao = funcao.idFuncao
              JOIN login ON utilizadores.idLogin = login.idLogin
              WHERE utilizadores.idUtilizadores = $idUtilizadores";

$resultado = mostraDados($query);

if (mysqli_num_rows($resultado) > 0) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $nome = $row['nome'];
        $idade = $row['idade'];
        $morada = $row['morada'];
        $contacto = $row['contacto'];
        $email = $row['email'];
        $nomeFuncao = $row['nomeFuncao'];
        $nomeUtilizador = $row['nomeUtilizador'];
        $pass = $row['pass'];
    }
}
// Erro caso o idUtilizadores esteja vazio
}else {
    echo"<script>alert('Erro ao tentar identificar o IP.')</script>";
        echo"<script>window.location='home_supervisor_planeamento.php';</script>)";
}
?>

<!DOCTYPE html>
<html lang="pt-br">

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
    <title>Tela de Registo</title>
</head>

<body>
    <h2>Registo</h2>
    <div id="form_utilizadores" class="container">
        <form id="formUtilizadores" method="POST" action="update_uilizador.php">
            <!-- nome -->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="nome" class="form-label">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $nome ?>">
                </div>
            </div>

            <!-- idade -->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="idade" class="form-label">Idade</label>
                    <input type="text" class="form-control" id="idade" name="idade" value="<?php echo $idade ?>">
                </div>
            </div>

            <!-- morada -->
            <div class="row">
                <div class="col">
                    <label for="morada" class="form-label">Morada</label>
                    <input type="text" class="form-control" id="morada" name="morada" value="<?php echo $morada ?>">
                </div>
            </div>

            <!-- contacto -->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="contacto" class="form-label">Contacto</label>
                    <input type="text" class="form-control" id="contacto" name="contacto"
                        value="<?php echo $contacto ?>">
                </div>
            </div>

            <!-- email -->
            <div class="row">
                <div class="col">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $email ?>">
                </div>
            </div>

            <!-- funcao -->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="nomeFuncao" class="form-label">Função</label>
                    <input type="text" class="form-control" id="nomeFuncao" name="nomeFuncao"
                        value="<?php echo $nomeFuncao ?>">
                </div>
            </div>

            <!-- login -->
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <label for="nomeUtilizador" class="form-label">Nome de Utilizador</label>
                    <input type="text" class="form-control" id="loginUtilizadores" name="nomeUtilizador"
                        value="<?php echo $nomeUtilizador ?>">
                </div>

                <!-- Pass -->
                <div class="col-md-6 col-sm-12">
                    <label for="pass" class="form-label">Password</label>
                    <input type="text" class="form-control" id="passCadastro" name="pass" value="<?php echo $pass ?>">
                </div>
            </div>

            <!-- Span caso campos não estejam preenchidos -->
            <span id="msgErro"></span>
            <input type="hidden" name="idUtilizadores" value="<?php echo $idUtilizadores ?>">

            <div class="row">
                <div class="" style="display: flex; justify-content: center;">
                    <button type="submit" class="btn btn-success" style="margin: 10px;">Utdate</button>
                </div>
            </div>
        </form>
    </div>
    <!-- Validação do js -->
    <script src="../js/valida_utilizador.js"></script>
</body>

</html>