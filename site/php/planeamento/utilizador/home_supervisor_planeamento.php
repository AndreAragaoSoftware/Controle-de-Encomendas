<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>

    <?php include "cabecalho_utilizador.php"?>
    <span id="msgAlerta"></span>

    <!--Criando tabela para exibir utilizadores-->
    <div class=" table-resposive">
        <table class=" table table-striped table-hover table-bordered">
            <tr>
                <Th>Nome</Th>
                <Th>Idade</Th>
                <Th>Morada</Th>
                <Th>Contacto</Th>
                <Th>Email</Th>
                <Th>Função</Th>
                <Th>Login</Th>
                <Th>Password</Th>
                <th>Ações</th>
            </tr>
            <?php
        
        //Conexão com banco de dados
            include '../../ligaBD.php';
        
            // Buscando os campos das tabelas utilizadores, funcao e login
            $query = "SELECT utilizadores.*, funcao.nomeFuncao, nomeUtilizador,pass FROM utilizadores
                      JOIN funcao ON utilizadores.idFuncao = funcao.idFuncao
                      JOIN login ON utilizadores.idLogin = login.idLogin ORDER BY nomeFuncao";
            $sql_query = mostraDados($query) or die("Falha na execução do código SQL");
        
            // Colocando os dados na tabela
            while ($rows = mysqli_fetch_assoc($sql_query)) {
                echo "<tr><td>" . $rows['nome'] . "</td>";
                echo "<td>" . $rows['idade'] . "</td>";
                echo "<td>" . $rows['morada'] . "</td>";
                echo "<td>" . $rows['contacto'] . "</td>";
                echo "<td>" . $rows['email'] . "</td>";
                echo "<td>" . $rows['nomeFuncao'] . "</td>";
                echo "<td>" . $rows['nomeUtilizador'] . "</td>";
                echo "<td>" . $rows['pass'] . "</td>";
                // Botão Update e botão eliminar
                echo "<td> <a class=' btn btn-primary btn-sm' href='edita_utilizador.php?idUtilizadores=" . $rows['idUtilizadores'] . " '> 
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                        class='bi bi-pencil' viewBox='0 0 16 16'>
                        <path
                            d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z' />
                    </svg>
                </a>
                &nbsp;&nbsp;
                <a class='btn btn-danger btn-sm' href='#' onclick='apagarUtilizador(" . $rows['idLogin'] . ")'>

                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                        class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                        <path
                            d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5' />
                    </svg>
                </a>
                      </td></tr>  ";
            }
        
        ?>
            <!--Fim da tabela-->
        </table>
    </div>
    <!--Validação do js-->
    <script src="../../../js/planeamento/apagar.js"></script>

</body>

</html>