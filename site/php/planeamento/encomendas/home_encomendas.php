<?php include 'cabecalho_econmendas.php'; 
$quantCaixa = 0;
$idEncomenda = 0;
$horaChegada = 0;
$horaChegadaPr = 0;
$tempoLiberacao = 0;
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
                <th>Previsão de liberação</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody id="FilterTabela">
                <?php
                include '../../ligaBD.php';

                $query = "SELECT encomendas.idEncomenda, encomendas.dataEncomenda, encomendas.horaChegada, fornecedores.nome AS nomeFornecedor
           FROM encomendas
           INNER JOIN fornecedores ON encomendas.idFornecedor = fornecedores.idFornecedor
           ORDER BY encomendas.dataEncomenda ASC, TIME(encomendas.horaChegada) ASC";


                $sql_query = mostraDados($query) or die("Falha na execução do código SQL");

                while ($rows = mysqli_fetch_assoc($sql_query)) {
                    echo "<tr>
                            <td>{$rows['dataEncomenda']}</td>
                            <td>{$rows['horaChegada']}</td>
                            <td>{$rows['nomeFornecedor']}</td>";
                            
                    $horaChegada = $rows['horaChegada'];
                            
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

                      echo "<td>$quantCaixa</td>";     

                        // Calculando o tempo para liberar
                        $tempoLiberacao = ceil($quantCaixa / 1000) * 20; // Arredondando para cima

                
                    $horaChegadaPr = new DateTime($horaChegada);
                    $horaChegadaPr->add(new DateInterval("PT{$tempoLiberacao}M"));

   
                   echo " <td>{$horaChegadaPr->format('H:i')}</td>
    
                            <td>
                             <a class=' btn btn-primary btn-sm' href='edita_encomenda.php?idEncomenda=" . $rows['idEncomenda'] . " '> 
                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor'
                                class='bi bi-pencil' viewBox='0 0 16 16'>
                        <path
                            d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z' />
                    </svg>
                </a>
                
                &nbsp;&nbsp;
                
                <a class=' btn btn-secondary btn-sm' href='visualiza_encomenda.php?idEncomenda=" . $rows['idEncomenda'] . " '> 
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-eye' viewBox='0 0 16 16'>
                <path d='M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z'/>
                <path d='M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0'/>
                </svg>
                </a>
                
                &nbsp;&nbsp;
                
                <a class=' btn btn-success btn-sm' href='add_produto_encomenda.php?idEncomenda=" . $rows['idEncomenda'] . " '> 
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus-circle' viewBox='0 0 16 16'>
                <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16'/>
                 <path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4'/>
                </svg>
                </a>
                  
                &nbsp;&nbsp;

            <a class='btn btn-danger btn-sm' href='#' onclick='apagarEncomenda(" . $rows['idEncomenda'] . ")'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3-fill' viewBox='0 0 16 16'>
                 <path d='M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5' />
                 </svg>
            </a>

               
                      </td></tr>  ";
                      
                    // Zerando o valor das caixas.
                    $quantCaixa = 0;
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Validação do js -->
    <script src="../../../js/planeamento/apagar.js"></script>
    <!-- Validação do js -->
    <script src="../../../js/planeamento/encomendas/filtro.js">
    </script>

</body>

</html>