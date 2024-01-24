<?php
include '../../ligaBD.php';

// Inicie a sessão
session_start();

// Função para obter mensagens do trigger
function obterMensagensTrigger() {
    // Consulta a tabela de notificações para obter mensagens do trigger
    $sqlConsultaNotificacoes = "SELECT * FROM notificacoes";
    $resultConsultaNotificacoes = mostraDados($sqlConsultaNotificacoes);

    // Exibe mensagens do trigger
    while ($row = $resultConsultaNotificacoes->fetch_assoc()) {
        echo "<script>alert('" . $row['mensagem'] . "')</script>";
    }
}

// Verifica se os campos do formulário foram enviados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os valores dos campos do formulário
    $produtoSel = $_POST['ProdutoSel'];
    $quantidade = $_POST['quantidade'];

    // Verifica se o idEncomendas foi passado via POST
    if (isset($_POST['idEncomendaProduto']) && $_POST['idEncomendaProduto'] != 0) {
        $idEncomendas = $_POST['idEncomendaProduto'];
        $_SESSION['idEncomendas'] = $idEncomendas;
    } else {
        $idEncomendas = $_SESSION['idEncomendas'];
    }

    // Verifica se a encomenda é válida
    if (empty($idEncomendas)) {
        echo "<script>alert('Erro: A encomenda especificada não existe.')</script>";
        // Adicione aqui o redirecionamento ou ação apropriada
    } else {
        // Verifica se o idEncomenda existe na tabela encomendas
        $verificaEncomenda = "SELECT idEncomenda FROM encomendas WHERE idEncomenda = $idEncomendas";
        $resultVerificacao = mostraDados($verificaEncomenda);

        // Após a verificação de existência da encomenda
        if ($resultVerificacao->num_rows == 0) {
            // O idEncomenda não existe
            echo "<script>alert('Erro: A encomenda especificada não existe.')</script>";
            echo "<script>window.location='home_encomendas.php?';</script>";
            exit(); // Encerra o script para evitar a execução do código abaixo em caso de erro
        }

        // Query para inserir o produto na encomenda
        $sqlInserirProdutoEncomenda = "INSERT INTO detalhes_encomenda (idProduto, quantidade, idEncomenda) VALUES ('$produtoSel', '$quantidade', '$idEncomendas')";

        // Executa a query
        $result_query = registaUser($sqlInserirProdutoEncomenda);

        // Após a tentativa de inserir o produto na encomenda
        if ($result_query) {
            // Aciona o trigger e obtém mensagens
            obterMensagensTrigger();

            // Consulta a tabela de notificações para verificar se há mensagens do trigger
            $sqlConsultaNotificacoes = "SELECT COUNT(*) as total FROM notificacoes";
            $resultConsultaNotificacoes = mostraDados($sqlConsultaNotificacoes);
            $row = $resultConsultaNotificacoes->fetch_assoc();
            $totalNotificacoes = $row['total'];

            // Se ultrapassar a capacidade máxima de caixas
            if ($totalNotificacoes > 0) {
                $sqlRemoverProduto = "DELETE FROM detalhes_encomenda WHERE idProduto = '$produtoSel' AND idEncomenda = '$idEncomendas'";
                registaUser($sqlRemoverProduto);
                // Limpa a tabela temporária após consultar as mensagens
                $limparTabelaNot = "TRUNCATE TABLE notificacoes";
                registaUser($limparTabelaNot);

                echo "<script>window.location='add_produto_encomenda.php';</script>";
            } else {
                // Se não houver notificações, o produto foi cadastrado com sucesso
                echo "<script>alert('Produto cadastrado na encomenda com sucesso.')</script>";
                echo "<script>window.location='home_encomendas.php';</script>";
            }
        } else {
            echo "<script>alert('Erro ao inserir produto na encomenda.')</script>";
            echo "<script>window.location='add_produto_encomenda.php';</script>";
        }
    }
} else {
    echo "<script>alert('Erro ao inserir produto na encomenda.')</script>";
    echo "<script>window.location='add_produto_encomenda.php';</script>";
}

