<?php

//Conexão com banco de dados
include 'ligaBD.php';



    
if (strlen($_POST['nomeUtilizador']) == 0) {
    echo "Preencha o login";
}elseif(strlen($_POST['pass'])== 0){
    echo "Preencha seu password";
}else {

    $nomeUtilizador = $_POST['nomeUtilizador'];
    $pass = $_POST['pass'];
    
    //Verificando se o login e pass existe no banco de dados
    $query = "SELECT * FROM login WHERE nomeUtilizador = '$nomeUtilizador' AND pass = '$pass'";
    $sql_query = mostraDados($query) or die("Falha na execução do código SQL");

    //Verificando o número de linha correspondente ao login
    $quantidade = $sql_query->num_rows;

    if ($quantidade == 1) {
        
        
        $login = $sql_query->fetch_assoc();
        
        if(!isset($_SESSION)){
            session_start();
        }
        
        $_SESSION['id'] = $login['id'];
        header("Location: ../html/home.html");
        
        
    }else {
        echo"<script>alert('Error: Login ou senha incorretos')</script>";
        echo"<script>window.location='../html/tela_de_login.html';</script>)";
    }
    }

    