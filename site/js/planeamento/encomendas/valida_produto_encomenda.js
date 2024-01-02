const formProdutoEncomenda = document.querySelector('#formProdutoEncomenda')

formProdutoEncomenda.addEventListener('submit', (e) => {
  // Recuperando os valores dos campos
  const produtoSel = document.querySelector('#ProdutoSel').value
  const quantidade = document.querySelector('#quantidade').value
  const idEncomendaProduto = document.querySelector('#idEncomendaProduto').value

  // Validando se os campos estão preenchidos
  if (produtoSel === '' || quantidade === '' || idEncomendaProduto === '') {
    e.preventDefault()
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;' >Erro: Preencha o campo Fornecedor.</p>"
    return
  }
})
