<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>

<body>
    <?php include"cabecalho_fornecedor.php" ?>

    <!--Alerta-->
    <span id="msgAlerta"></span>

    <!--Criando tabela para exibir utilizadores-->
    <div class=" table-resposive">
        <table class=" table table-striped table-hover table-bordered">
            <tr>
                <Th>Nome do Fornecedor</Th>
                <Th>Morada</Th>
                <Th>Email</Th>
                <Th>Responsável</Th>
                <Th>Contacto</Th>
                <th>Ações</th>
            </tr>
            <?php
        
        //Conexão com banco de dados
            include '../../ligaBD.php';
        
            // Buscando os campos das tabelas utilizadores, funcao e login
            $query = "SELECT * FROM fornecedores";
            $sql_query = mostraDados($query) or die("Falha na execução do código SQL");
        
            // Colocando os dados na tabela
            while ($rows = mysqli_fetch_assoc($sql_query)) {
                echo "<tr><td>" . $rows['nome'] . "</td>";
                echo "<td>" . $rows['morada'] . "</td>";
                echo "<td>" . $rows['email'] . "</td>";
                echo "<td>" . $rows['responsavel'] . "</td>";
                echo "<td>" . $rows['contacto'] . "</td>";

                // Botão Update e botão eliminar
                echo "<td> <a class=' btn btn-primary btn-sm' href='edita_fornecedor.php?idFornecedor=" . $rows['idFornecedor'] . " '> 
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                        class='bi bi-pencil' viewBox='0 0 16 16'>
                        <path
                            d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z' />
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