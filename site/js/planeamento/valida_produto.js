// Validação do campos do formulário de Produtos
const formProdutos = document.querySelector('#formProdutos');

// Recuperando os valores dos campos
formProdutos.addEventListener('submit', (e) => {
  // Validando se os campos estão preenchidos
  var nomeProduto = document.querySelector('#nomeProduto').value
  

  if (nomeProduto == '') {
    e.preventDefault()
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;' >Erro: Preencha o nome do Produto</p>"
    return
  }
})