// Validação do campos do formulário de Utilizadores
const formFornecedor = document.querySelector('#formFornecedor')

// Recuperando os valores dos campos
formFornecedor.addEventListener('submit', (e) => {
  // Validando se os campos estão preenchidos
  var nomeFornecedor = document.querySelector('#nomeFornecedor').value
  var moradaFornecedor = document.querySelector('#moradaFornecedor').value
  var contactoFornecedor = document.querySelector('#contactoFornecedor').value
  var emailFornecedor = document.querySelector('#emailFornecedor').value
  var responsavel = document.querySelector('#responsavel').value

  // Verificando se o campo do nome está vazio
  if (nomeFornecedor == '') {
    e.preventDefault()
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;' >Erro: Preencha o Nome</p>"
    return
  }

  // Verificando se o campo do morada está vazio
  if (moradaFornecedor == '') {
    e.preventDefault()
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;' >Erro: Preencha a morada</p>"
    return
  }

  // Verificando se o campo do contacto está vazio
  if (contactoFornecedor == '') {
    e.preventDefault()
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;' >Erro: Preencha o Contacto</p>"
    return
  }

  // Verificando se o campo do email está vazio
  if (emailFornecedor == '') {
    e.preventDefault()
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;' >Erro: Preencha o Email</p>"
    return
  }

  // Verificando se o formato do e-mail é válido usando uma expressão regular
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  if (!emailRegex.test(emailFornecedor)) {
    e.preventDefault() // Evita que o formulário seja enviado
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;'>Erro: E-mail inválido</p>"
    return
  }

  // Verificando se o campo do responsável está vazio
  if (responsavel == '') {
    e.preventDefault()
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;' >Erro: Preencha o Responsável</p>"
    return
  }
})
