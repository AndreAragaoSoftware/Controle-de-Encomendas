// Selecionando o formulário de Login
const formLogin = document.querySelector('#formLogin')

// Validando se os campos estão preenchidos
formLogin.addEventListener('submit', (evento) => {
  // Recuperando os valores dos campos
  var login = document.querySelector('#nomeUtilizador').value
  var pass = document.querySelector('#pass').value

  // Verificando se o campo do login está vazio
  if (login == '') {
    evento.preventDefault()
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;' >Erro: Preencha o Login</p>"
    return
  }

  // Verificando se o campo do pass está vazio
  if (pass == '') {
    evento.preventDefault()
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;' >Erro: Preencha o Password</p>"
    return
  }

  // Caso os campos estejam preenchidos, executa a action do formulário.
  formLogin.submit()
}) // Fim Formulário de Login

