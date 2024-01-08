<?php

//Conexão com banco de dados
include 'ligaBD.php';


//Teste para saber se os campos então preencidos
if(isset($_POST['nomeUtilizador']) || isset($_POST['pass'])){
    

    
    //Buscando dados do campos
    $nomeUtilizador = $_POST['nomeUtilizador'];
    $pass = $_POST['pass'];
    
    //Verificando se o login e pass existe no banco de dados
    $query = "SELECT * FROM login WHERE nomeUtilizador = '$nomeUtilizador' AND pass = '$pass'";
    $sql_query = mostraDados($query) or die("Falha na execução do código SQL");

    //Verificando o número de linha correspondente ao login
    $quantidade = $sql_query->num_rows;

    // Caso o login e senha sejam compativeis
    if ($quantidade == 1) {
        
        // Buscando o idLogin do utilizador:
        $row = $sql_query->fetch_assoc();
        $login = $row['idLogin'];
        // Start na session
        session_start();
        $_SESSION['idLogin'] = $login;
        
        //Buscando a função
        $query = "SELECT * FROM utilizadores WHERE idLogin = $login";
        $sql_query = mostraDados($query) or die("Falha na execução do código SQL");
        $row = $sql_query->fetch_assoc();
        $funcao = $row['idFuncao'];
        $_SESSION['idFuncao'] = $funcao;

        // Redirecionamento com base na função do usuário
        switch ($funcao) {
            case 1:
                header("Location: qualidade/encomendas/home_encomendas.php");
                break;
            case 2:
                header("Location: ../html/home_supervisor_qualidade.html");
                break;
            case 5:
                header("Location: planeamento/encomendas/home_encomendas.php");
                break;
            default:
                header("Location: ../index.html");
            }
        
        exit();
        
    }else {
        // Caso o login ou senha estejam errados  
        echo"<script>alert('Error: Login ou senha incorretos')</script>";
        echo"<script>window.location='../index.html';</script>)";
         exit();
    }
    }

    