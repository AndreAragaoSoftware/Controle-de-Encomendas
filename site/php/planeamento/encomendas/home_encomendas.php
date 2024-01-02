<?php include 'cabecalho_econmendas.php'; ?>

<body>

    <div class="table-responsive">
        <table class="table table-striped table-hover table-bordered text-center">
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
                            <td>
                                <button class='btn btn-danger btn-sm' onclick='confirmarExclusao({$rows['idEncomenda']})'>Excluir</button>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
    function confirmarExclusao(idEncomenda) {
        if (confirm("Tem certeza de que deseja excluir esta encomenda?")) {
            window.location.href = 'apagar_encomenda.php?idEncomenda=' + idEncomenda;
        }
    }
    </script>
</body>

</html>