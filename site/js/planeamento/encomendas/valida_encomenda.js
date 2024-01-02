const formEncomenda = document.querySelector('#formEncomenda')

formEncomenda.addEventListener('submit', (e) => {
  // Recuperando os valores dos campos
  const dataEncomenda = document.querySelector('#dataEncomenda').value
  const horaChegada = document.querySelector('#horaChegada').value
  const fornecedorSel = document.querySelector('#FornecedorSel').value

  // Validando se os campos estão preenchidos
  if (dataEncomenda === '' || horaChegada === '' || fornecedorSel === '') {
    e.preventDefault()
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;' >Erro: Preencha o campo fornecedor</p>"
    return
  }


})


