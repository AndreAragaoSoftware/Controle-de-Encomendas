<?php

//Conexão com banco de dados
include 'ligaBD.php';


//Teste para saber se os campos então preencidos
if(isset($_POST['nomeUtilizador']) || isset($_POST['pass'])){
    
if (strlen($_POST['nomeUtilizador']) == 0) {
    echo "Preencha o login";
}elseif(strlen($_POST['pass'])== 0){
    echo "Preencha seu password";
}else {
    
    //Buscando dados do campos
    $nomeUtilizador = $_POST['nomeUtilizador'];
    $pass = $_POST['pass'];
    
    //Verificando se o login e pass existe no banco de dados
    $query = "SELECT * FROM login WHERE nomeUtilizador = '$nomeUtilizador' AND pass = '$pass'";
    $sql_query = mostraDados($query) or die("Falha na execução do código SQL");

    //Verificando o número de linha correspondente ao login
    $quantidade = $sql_query->num_rows;

    if ($quantidade == 1) {
        
        
        $row = $sql_query->fetch_assoc();
        $login = $row['idLogin'];
        //if(!isset($_SESSION)){
            session_start();
        //}
        
        $_SESSION['idLogin'] = $login;
        
        $query = "SELECT * FROM utilizadores WHERE idLogin = $login";
        $sql_query = mostraDados($query) or die("Falha na execução do código SQL");
        $row = $sql_query->fetch_assoc();
        $funcao = $row['idFuncao'];
        $_SESSION['idFuncao'] = $funcao;

        if($funcao == 1){
            header("Location: ../html/home.html");
        }elseif($funcao == 2){
            header("Location: ../html/home_supervisor_qualidade.html");
        }elseif($funcao == 5){
            header("Location: ../html/home_supervisor_planeamento.html");
        }
        else {
            header("Location: home.php");
        }
        
        
        
    }else {
        echo"<script>alert('Error: Login ou senha incorretos')</script>";
        echo"<script>window.location='../html/tela_de_login.html';</script>)";
    }
    }

    
}