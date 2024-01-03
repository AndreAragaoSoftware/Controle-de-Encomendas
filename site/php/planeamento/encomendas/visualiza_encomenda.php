<?php 
// Verifica se o idEncomenda não está vazio
$idEncomenda = (!empty($_GET['idEncomenda'])) ? intval($_GET['idEncomenda']) : 0;
 include 'cabecalho_econmendas.php'; 
?>


<body>
    <!-- Criando tabela para exibir detalhes de encomendas -->
    <div class="row justify-content-center">
        <table
            class="table table-responsive table-striped table-hover table-bordered table-sm align-middle text-center  w-75">
            <tr>
                <th>Nome do Produto</th>
                <th>Quantidade</th>
                <th>Ações</th>
            </tr>
            <?php
            // Conexão com banco de dados
            include '../../ligaBD.php';
            // Inicializa a variável $quantCaixa
            $quantCaixa = 0;

             // Query para verificar se o fornecedor já existe
             $sqlVerificacaoProdutos = "SELECT COUNT(*) AS total FROM detalhes_encomenda WHERE idEncomenda = '$idEncomenda'";
             $resultadoVerificacao = mostraDados($sqlVerificacaoProdutos);
                    
            $row = mysqli_fetch_assoc($resultadoVerificacao);
            $total = $row['total'];

            if ($total > 0) {
            
            // Query para buscar detalhes da encomenda
            $query = "SELECT detalhes_encomenda.*, produtos.nome AS nome_produto,
                      encomendas.dataEncomenda, encomendas.horaChegada
                      FROM detalhes_encomenda
                      JOIN produtos ON detalhes_encomenda.idProduto = produtos.idProduto
                      JOIN encomendas ON detalhes_encomenda.idEncomenda = encomendas.idEncomenda
                      WHERE detalhes_encomenda.idEncomenda = $idEncomenda";

            $sql_query = mostraDados($query) or die("Falha na execução do código SQL");
    
            
            // Colocando os dados na tabela
            while ($rows = mysqli_fetch_assoc($sql_query)) {
                echo "<tr>
                        <td>" . $rows['nome_produto'] . "</td>
                        <td>" . $rows['quantidade'] . "</td>
                        <td>" . $rows['quantidade'] . "</td>
                      </tr>";
                      // Armazena o valor de horaChegada
                     $horaChegada = $rows['horaChegada'];
                     // Armazena o valor de horaChegada
                     $dataEncomenda = $rows['dataEncomenda'];
                     // Soma a quantidade de caixas
                     $quantCaixa += $rows['quantidade'];
            }
        }else{
            echo "<script>alert('Não tem produto cadastrado na encomenda.')</script>";
            echo "<script>window.location='home_encomendas.php';</script>";
            exit();
        }

            ?>
            <!--Fim da tabela-->
        </table>
        <table class="table table-responsive  table-bordered table-sm align-middle text-center table-secondary w-75">
            <tr>
                <td>Data da chegada</td>
                <td><?php echo"$dataEncomenda" ?></td>
            </tr>
            <tr>
                <td>Previsão de Chegada:</td>
                <td><?php echo"$horaChegada" ?></td>
            </tr>
            <tr>
                <td>Total de Caixas:</td>
                <td><?php echo"$quantCaixa" ?></td>
            </tr>
        </table>
        <!-- Validação do js -->
        <script src="../../../js/planeamento/apagar.js"></script>

</body>

</html>