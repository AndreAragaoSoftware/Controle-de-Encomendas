<?php include 'cabecalho_econmendas.php'; ?>

<body>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered text-center table-sm table-md">
            <thead>
                <tr>
                    <th>Data da Entrega</th>
                    <th>Hora de Chegada</th>
                    <th>Fornecedor</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../../ligaBD.php';

                $query = "SELECT encomendas.idEncomenda, encomendas.dataEncomenda, encomendas.horaChegada, fornecedores.nome AS nomeFornecedor
                    FROM encomendas
                    INNER JOIN fornecedores ON encomendas.idFornecedor = fornecedores.idFornecedor";
                $sql_query = mostraDados($query) or die("Falha na execução do código SQL");

                while ($rows = mysqli_fetch_assoc($sql_query)) {
                    echo "<tr>
                            <td>{$rows['dataEncomenda']}</td>
                            <td>{$rows['horaChegada']}</td>
                            <td>{$rows['nomeFornecedor']}</td>
                            <td> <a class=' btn btn-primary btn-sm' href='edita_encomenda.php?idEncomenda=" . $rows['idEncomenda'] . " '> 
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                        class='bi bi-pencil' viewBox='0 0 16 16'>
                        <path
                            d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z' />
                    </svg>
                </a>
                &nbsp;&nbsp;
                <a class='btn btn-danger btn-sm' href='#' onclick='apagarEncomenda(" . $rows['idEncomenda'] . ")'>

                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                        class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                        <path
                            d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5' />
                    </svg>
                </a>
                      </td></tr>  ";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!--Validação do js-->
    <script src="../../js/planeamento/apagar.js"></script>

</body>

</html>