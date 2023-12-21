//Selecionando o formulário de Login
const formLogin = document.querySelector('#formLogin');

//Recuperando o valor do campo
formLogin.addEventListener('submit', (evento) => {
  //Capturando o campo login
  var login = document.querySelector('#nomeUtilizador').value
  var pass = document.querySelector('#pass').value

  //varificando se o campo do login está vazio
  if (login == '') {
    evento.preventDefault()
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;' >Erro: Preencha o Login</p>"
    return
  }

  //varificando se o campo do pass está vazio
  if (pass == '') {
    evento.preventDefault()
    document.getElementById('msgErro').innerHTML =
      "<p style='color: #f00; font-size: 12px;' >Erro: Preencha o Password</p>"
    return
  }

  // caso os campos estejam preenchidos, executa a action do formulário.
  formLogin.submit()
})// Fim Formulário de Login