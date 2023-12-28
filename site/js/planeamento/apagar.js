// Apagar o utilizador no BD
async function apagarUtilizador(idLogin) {
    
    //Alerta de confirmação.
    var confirmar = confirm("Tem certeza que deseja excluir o Utilizador?")

    if (confirmar == true) {
      // Requisição para o elimina_utilizador.php e envia o paranmetro idUtilizadores
      const dados = await fetch('elimina_utilizador.php?idLogin=' + idLogin)
      // Lendo a resposta do php
      const resposta = await dados.json()
      console.log(resposta)

      // resposta for false
      if (!resposta['status']) {
        document.getElementById('msgAlerta').innerHTML = resposta['msg']
      } else {
        location.reload()
        
      }
    }
   
  
}

// Produto
async function apagarProduto(idProduto) {
  //Alerta de confirmação.
  var confirmar = confirm('Tem certeza que deseja excluir o Produto?')
  if (confirmar == true) {
    // Requisição para o elimina_utilizador.php e envia o paranmetro idUtilizadores
    const dados = await fetch('elimina_produto.php?idProduto=' + idProduto)
    // Lendo a resposta do php
    const resposta = await dados.json()
    console.log(resposta)

    // resposta for false
    if (!resposta['status']) {
      document.getElementById('msgAlerta').innerHTML = resposta['msg']
    } else {
      location.reload()
    }
  }
}

  // Fornecedor
  async function apagarFornecedor(idFornecedor) {
  //Alerta de confirmação.
  var confirmar = confirm('Tem certeza que deseja excluir o Fornecedor?')

  if (confirmar == true) {
    // Requisição para o elimina_utilizador.php e envia o paranmetro idUtilizadores
    const dados = await fetch(
      'elimina_fornecedor.php?idFornecedor=' + idFornecedor
    )
    // Lendo a resposta do php
    const resposta = await dados.json()
    console.log(resposta)

    // resposta for false
    if (!resposta['status']) {
      document.getElementById('msgAlerta').innerHTML = resposta['msg']
    } else {
      location.reload()
    }
  }
}