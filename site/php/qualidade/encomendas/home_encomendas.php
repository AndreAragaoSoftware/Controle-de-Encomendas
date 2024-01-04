<?php 
include 'cabecalho_econmenda_qualidade.php'; 
$quantCaixa = 0;
$idEncomenda = 0;
?>

<body>
    <!--Alerta-->
    <span id="msgAlerta"></span>
    <label for="">Filtra por data</label>
    <input type="date" id="dataFilter" class=" mt-3 mb-3 mr-2">

    <div class=" table-responsive">
        <table class="table table-striped table-hover table-bordered text-center table-sm table-md" <thead>
            <tr>
                <th>Data da Entrega</th>
                <th>Hora de Chegada</th>
                <th>Fornecedor</th>
                <th>Quantidade de caixas</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody id="FilterTabela">
                <?php
                include '../../ligaBD.php';
                // Selecionando o id das encomendas
                $query = "SELECT encomendas.idEncomenda, encomendas.dataEncomenda, encomendas.horaChegada, fornecedores.nome AS nomeFornecedor
                    FROM encomendas
                    INNER JOIN fornecedores ON encomendas.idFornecedor = fornecedores.idFornecedor";
                $sql_query = mostraDados($query) or die("Falha na execução do código SQL");

                while ($rows = mysqli_fetch_assoc($sql_query)) {
                    echo "<tr>
                            <td>{$rows['dataEncomenda']}</td>
                            <td>{$rows['horaChegada']}</td>
                            <td>{$rows['nomeFornecedor']}</td>";
                            
                    // Armazena o valor de idEncomenda
                    $idEncomenda = $rows['idEncomenda'];

                    $queryQuant = "SELECT detalhes_encomenda.*, produtos.nome AS nome_produto,
                      encomendas.dataEncomenda, encomendas.horaChegada
                      FROM detalhes_encomenda
                      JOIN produtos ON detalhes_encomenda.idProduto = produtos.idProduto
                      JOIN encomendas ON detalhes_encomenda.idEncomenda = encomendas.idEncomenda
                      WHERE detalhes_encomenda.idEncomenda = $idEncomenda";

                    $sql_queryQuant = mostraDados($queryQuant) or die("Falha na execução do código SQL");

                    // Colocando os dados na tabela
                    while ($rowsQuant = mysqli_fetch_assoc($sql_queryQuant)) {
                        $quantCaixa += $rowsQuant['quantidade'];
                    }

                      echo "<td>$quantCaixa</td>      
                            <td>
                
                <a class=' btn btn-secondary btn-sm' href='visualiza_encomenda.php?idEncomenda=" . $rows['idEncomenda'] . " '> 
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0'/>
                </svg>
                </a>
                
                &nbsp;&nbsp;
                  
                      </td></tr>  ";
                      
                    // Zerando o valor das caixas.
                    $quantCaixa = 0;
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Validação do js -->
    <script src="../../../js/planeamento/encomendas/filtro.js">
    </script>

</body>

</html>