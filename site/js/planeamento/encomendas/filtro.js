const dataFilter = document.getElementById('dataFilter')
const FilterTabela = document.getElementById('FilterTabela')

dataFilter.addEventListener('change', () => {
  let expressão = dataFilter.value

  let linhas = FilterTabela.getElementsByTagName('tr');

  console.log(linhas)
  //testando pra saber qual posição está a data 
  for(let posicao in linhas) {
    // Se o resultado não for um número não grava
    if(true === isNaN(posicao)) {
        continue;
    }
    let conteudoLinha = linhas[posicao].innerHTML;

    // Teste pra saber se data tem na tabela
    if(true === conteudoLinha.includes(expressão)){
        linhas[posicao].style.display = '';
    }else{
        // caso não tenha o style vai receber none e a linha não aparece
        linhas[posicao].style.display = 'none';
    }
  }
});
