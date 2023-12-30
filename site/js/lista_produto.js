const ProdutoSel = document.getElementById('ProdutoSel')

if (ProdutoSel) {
  listarProdutos()
}

async function listarProdutos() {
  // Aguarda e faz uma requisição ao PHP
  const dados = await fetch('listar_produtos.php')
  const resposta = await dados.json()

  if (resposta['status']) {
    for (var i = 0; i < resposta.dados.length; i++) {
      ProdutoSel.innerHTML =
        ProdutoSel.innerHTML +
        '<option value="' +
        resposta.dados[i]['id'] +
        '">' +
        resposta.dados[i]['nome'] +
        '</option>'
    }
  } else {
    document.getElementById('msgAlertaProduto').innerHTML = resposta['msg']
  }
}
