<?php

//Conexão com banco de dados
include 'ligaBD.php';

//Buscando dados do campos
$nome = $_POST['nome'];
$idade = $_POST['idade'];
$morada = $_POST['morada'];
$contacto = $_POST['contacto'];
$email = $_POST['email'];
$idFuncao = $_POST['idFuncao'];
$nomeUtilizador = $_POST['nomeUtilizador'];
$pass = $_POST['pass'];

// Verificando se o nome de usuário já existe
$sqlVerificaUsuario = "SELECT * FROM login WHERE nomeUtilizador = '$nomeUtilizador'";
$resultVerificaUsuario = mostraDados($sqlVerificaUsuario);

if ($resultVerificaUsuario->num_rows > 0) {
    echo 'Nome de usuário já existe. Escolha outro.';
    exit;
}

// Verificando se o nome de utizador já existe
$sqlVerificaUtilizador = "SELECT * FROM utilizadores WHERE nome = '$nome'";
$resultVerificaUsuario = mostraDados($sqlVerificaUtilizador);

if ($resultVerificaUsuario->num_rows > 0) {
    echo 'Nome de usuário já existe. Escolha outro.';
    exit;
}


$query = "INSERT INTO login (nomeUtilizador, pass) VALUES ('$nomeUtilizador', '$pass')";
$result_query = registaUser( $query);

//Verificando se o login e pass existe no banco de dados
$query = "SELECT * FROM login WHERE nomeUtilizador = '$nomeUtilizador' AND pass = '$pass'";
$result_query = mostraDados($query) or die ("Falha na execução do código SQL");

//Verificando o número de linha correspondente ao login
    $quantidade = $result_query->num_rows;
    if ($quantidade == 1) {
        
        
        $row = $result_query->fetch_assoc();
        $login = $row['idLogin'];
        //if(!isset($_SESSION)){
            session_start();
        //}
        
        $_SESSION['idLogin'] = $login;
        
//Inserindo dados na tabela utiliadoresz
  if ($login > 0) {
    $sqlInserirUtilizador = "INSERT INTO utilizadores (nome, idade, morada, contacto, email, idFuncao, idLogin) 
                             VALUES ('$nome', $idade, '$morada', '$contacto', '$email', '$idFuncao', $login)";

    if (registaUser($sqlInserirUtilizador)) {
        echo "Dados inseridos com sucesso no banco de dados.";
    } else {
        echo "Erro ao inserir dados na tabela de utilizadores.";
    }
} else {
    echo "Erro ao obter o ID de login.";
}}