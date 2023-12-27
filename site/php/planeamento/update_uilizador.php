<?php
include '../ligaBD.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $idUtilizadores = $_POST['idUtilizadores'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $morada = $_POST['morada'];
    $contacto = $_POST['contacto'];
    $email = $_POST['email'];
    $nomeFuncao = $_POST['nomeFuncao'];
    $nomeUtilizador = $_POST['nomeUtilizador'];
    $pass = $_POST['pass'];

    // Consulta SQL para realizar o UPDATE
    $query = "UPDATE utilizadores
          SET nome = '$nome', idade = '$idade', morada = '$morada', contacto = '$contacto',
              email = '$email', idFuncao = (SELECT idFuncao FROM funcao WHERE nomeFuncao = '$nomeFuncao'),
              idLogin = (SELECT idLogin FROM login WHERE nomeUtilizador = '$nomeUtilizador')
          WHERE idUtilizadores = $idUtilizadores";


    // Executa a consulta
    $resultado = registaUser($query);

    if ($resultado) {
        // A atualização foi bem-sucedida
        echo"<script>alert('Atualização bem-sucedida!')</script>";
        echo"<script>window.location='home_supervisor_planeamento.php';</script>)";
    } else {
        // Houve um erro na atualização
        echo"<script>alert('Erro ao tentar Utdate!')</script>";
        echo"<script>window.location='edita_utilizador.php';</script>)";
        
    }
}
?>