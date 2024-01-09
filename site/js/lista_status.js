const statusEscalaSel = document.getElementById('statusEscala')

if (statusEscalaSel) {
  listarStatusEscala()
}

async function listarStatusEscala() {
  // Aguarda e faz uma requisição ao PHP para obter a lista de status
  const dados = await fetch('lista_status.php')
  const resposta = await dados.json()

  if (resposta['status']) {
    const statusArray = resposta.dados

    // Limpar opções existentes antes de adicionar novas
    statusEscalaSel.innerHTML = '<option value="">Selecione</option>'

    for (var i = 0; i < statusArray.length; i++) {
      const status = statusArray[i]

      // Adicionar novas opções
      statusEscalaSel.innerHTML +=
        '<option value="' + status['id'] + '">' + status['nome'] + '</option>'
    }
  } else {
    // Exibir mensagem de erro, se houver
    document.getElementById('msgErro').innerHTML = resposta['msg']
  }
}
