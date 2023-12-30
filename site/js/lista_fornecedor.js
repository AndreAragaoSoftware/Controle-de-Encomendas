const FornecedorSel = document.getElementById('FornecedorSel')

if (FornecedorSel) {
  listarFornecedor()
}

async function listarFornecedor() {
  // Aguarda e faz uma requisição ao php
  const dados = await fetch('listar_fornecedor.php')
  const resposta = await dados.json()

  if (resposta['status']) {
    const fornecedorArray = resposta.dados

    // Limpar opções existentes antes de adicionar novas
    FornecedorSel.innerHTML = '<option value="">Selecione</option>'

    for (var i = 0; i < fornecedorArray.length; i++) {
      const fornecedor = fornecedorArray[i]

      // Adicionar novas opções
      FornecedorSel.innerHTML +=
        '<option value="' +
        fornecedor['id'] +
        '">' +
        fornecedor['nome'] +
        '</option>'
    }
  } else {
    document.getElementById('msgAlertaFornecedor').innerHTML = resposta['msg']
  }
}
