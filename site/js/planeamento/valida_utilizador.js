// Validação do campos do formulário de Utilizadores
const formUtilizadores = document.querySelector('#formUtilizadores')

// Recuperando os valores dos campos
formUtilizadores.addEventListener('submit', (e) => {
  // Validando se os campos estão preenchidos
  var nome = document.querySelector('#nome').value
  var idade = document.querySelector('#idade').value
  var morada = document.querySelector('#morada').value
  var contacto = document.querySelector('#contacto').value
  var email = document.querySelector('#email').value
  var funcao = document.querySelector('#funcao').value
  var loginUtilizadores = document.querySelector('#loginUtilizadores').value
  var passCadastro = document.querySelector('#passCadastro').value

  // Verificando se o campo do nome está vazio
  if (nome == '') {
    e.preventDefault()
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;' >Erro: Preencha o Nome</p>"
    return
  }

  // Verificando se o campo do idade está vazio
  if (idade == '') {
    e.preventDefault()
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;' >Erro: Preencha a Idade</p>"
    return
  }

  // Verificando se o campo do morada está vazio
  if (morada == '') {
    e.preventDefault()
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;' >Erro: Preencha a orada</p>"
    return
  }

  // Verificando se o campo do contacto está vazio
  if (contacto == '') {
    e.preventDefault()
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;' >Erro: Preencha o Contacto</p>"
    return
  }

  // Verificando se o campo do email está vazio
  if (email == '') {
    e.preventDefault()
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;' >Erro: Preencha o Email</p>"
    return
  }

  // Verificando se o formato do e-mail é válido usando uma expressão regular
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/
  if (!emailRegex.test(email)) {
    e.preventDefault() // Evita que o formulário seja enviado
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;'>Erro: E-mail inválido</p>"
    return
  }

  // Verificando se o campo do funcao está vazio
  if (funcao == '') {
    e.preventDefault()
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;' >Erro: Preencha o Funcao</p>"
    return
  }

  // Verificando se o campo do nomeUtilizador está vazio
  if (loginUtilizadores == '') {
    e.preventDefault()
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;' >Erro: Preencha o nome utilizador</p>"
    return
  }

  // Verificando se o campo do pass está vazio
  if (passCadastro == '') {
    e.preventDefault()
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;' >Erro: Preencha o Password</p>"
    return
  }
})
