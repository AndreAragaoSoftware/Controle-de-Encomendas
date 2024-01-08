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

    <?php include "cabecalho_equipa.php"?>
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
                <Th>Ações</Th>
            </tr>
            <?php
        
        //Conexão com banco de dados
            include '../../ligaBD.php';
        
            // Buscando os campos das tabelas utilizadores, funcao(Só seleciona as ligadas a qualidade)
            $query = "SELECT utilizadores.*, funcao.nomeFuncao, login.nomeUtilizador, login.pass FROM  utilizadores
                        JOIN 
                            funcao ON utilizadores.idFuncao = funcao.idFuncao
                        JOIN 
                            login ON utilizadores.idLogin = login.idLogin
                        WHERE 
                            utilizadores.idFuncao IN (1, 2);";
            $sql_query = mostraDados($query) or die("Falha na execução do código SQL");
        
            // Colocando os dados na tabela
            while ($rows = mysqli_fetch_assoc($sql_query)) {
                echo "<tr><td>" . $rows['nome'] . "</td>";
                echo "<td>" . $rows['idade'] . "</td>";
                echo "<td>" . $rows['morada'] . "</td>";
                echo "<td>" . $rows['contacto'] . "</td>";
                echo "<td>" . $rows['email'] . "</td>";
                echo "<td>" . $rows['nomeFuncao'] . "</td>";
                echo"<td>
                <a class=' btn btn-secondary btn-sm' href='visualiza_funcionario.php?idEncomenda=" . $rows['idUtilizadores'] . " '> 
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                    <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                    <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0'/>
                    </svg>
                </a>
                </td>
               </tr>";
            }
        
        ?>
            <!--Fim da tabela-->
        </table>
    </div>

</body>

</html>