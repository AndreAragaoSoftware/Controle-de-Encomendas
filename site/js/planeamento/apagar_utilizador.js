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