# Controle de Encomendas

# Sobre o projeto

O projeto "Controle de Encomendas" foi desenvolvido com o propósito de proporcionar uma solução eficiente para a organização e gerenciamento dos recebimentos de encomendas. A aplicação oferece diversas funcionalidades para otimizar o processo logístico, desde o cadastro de utilizadores até o cálculo automatizado do tempo necessário para liberar os caminhões com base na quantidade de caixas de cada encomenda.

# Tecnologias utilizadas

## Front end

- HTML
- CSS
- JavaScript

## Back End

- PHP
- JavaScript

## Base de Dados

- SQL

# Como executar o projeto: História de André Oliveira Aragão

André Oliveira Aragão é o Supervisor de Planejamento na fábrica de carne onde trabalha. Com a crescente demanda por uma gestão mais eficiente dos recebimentos de encomendas, André decide implementar o sistema "Controle de Encomendas" para otimizar o processo logístico.

## História
André inicia a jornada de implementação do sistema, consciente de que ele facilitará a organização e o gerenciamento do recebimento de mercadorias. Ao acessar a primeira tela de login, ele utiliza suas credenciais fornecidas pela empresa:

### Login: andre
### Password: admin
André é alertado para preencher todos os campos obrigatórios caso esqueça de informar algum durante o login. Com as credenciais corretas, ele prossegue para a validação na base de dados.

<div align="center">
<img src="https://github.com/AndreAragaoSoftware/Controle-de-Encomendas/assets/64162795/179c3454-ad7b-4511-adce-179580874ad2" width="300px" />
</div>
Se, por acaso, André introduzir informações incorretas, um alerta amigável informa que o login ou a senha está errado. No entanto, ao fornecer as informações corretas, o sistema o direciona automaticamente para uma página personalizada com base na função previamente cadastrada.

<div align="center">
<img src="https://github.com/AndreAragaoSoftware/Controle-de-Encomendas/assets/64162795/813cd755-5210-48d0-a22e-8b520d977fa5" width="600px" />
</div>

## Explorando as Encomendas
André se depara com uma interface amigável que lista todas as encomendas recentes. Cada encomenda é detalhada com informações essenciais, como o fornecedor, a data de chegada, o status atual e outros detalhes relevantes. Ele tem a liberdade de:

#### Buscando Encomendas por Data
André descobre um recurso valioso: o filtro por data. Agora, ele tem a capacidade de buscar encomendas específicas com base em datas específicas. Esse filtro proporciona uma visão mais precisa das atividades logísticas, permitindo que André e sua equipe acessem rapidamente as informações relevantes.
<div align="center">
<img src="https://github.com/AndreAragaoSoftware/Controle-de-Encomendas/assets/64162795/0e2b5a11-3771-4c3e-b855-7da60bbdb07a" width="700px" />
</div>
#### Adicionar Nova Encomenda
Ao se deparar com uma nova encomenda, André utiliza a função "Adicionar Encomenda". Um formulário intuitivo é apresentado, solicitando informações cruciais:
<div align="center">
<img src="https://github.com/AndreAragaoSoftware/Controle-de-Encomendas/assets/64162795/5ce18aec-0a42-4962-9277-a5eb47800531" width="300px" />
</div>

Fornecedor: André escolhe o fornecedor da lista ou adiciona um novo, se necessário.
Data de Chegada: Ele insere a data programada para a chegada da encomenda.
Hora de Chegada: André especifica o horário estimado para a chegada.
Validação dos Campos:
O sistema assegura que todos os campos obrigatórios sejam preenchidos antes de permitir o envio do formulário. Se algum campo estiver em branco ou com informações incorretas, um alerta amigável orienta André a corrigir os dados antes de prosseguir.
<div align="center">
<img src="https://github.com/AndreAragaoSoftware/Controle-de-Encomendas/assets/64162795/6ae7db0e-cb71-4fab-99f5-0942e2d7dd3c" width="300px" />
</div>

#### Editar Encomendas
Se necessário, André pode editar as encomendas existentes para refletir mudanças ou atualizações. Por exemplo, correções do fornecedor.

#### Visualizar Encomendas
André pode navegar facilmente pelos detalhes de cada encomenda clicando na entrada correspondente. Aqui, ele encontra informações detalhadas sobre os produtos, a quantidade de caixas e outros dados relevantes.

#### Adição de Produtos
Ao navegar pela interface de encomendas, André percebe uma nova funcionalidade vital: a capacidade de adicionar produtos diretamente a uma encomenda.
Selecionar o Produto: Uma lista de produtos disponíveis é apresentada, permitindo que André escolha o produto desejado.
Inserir Quantidade de Caixas: André especifica a quantidade de caixas desse produto na encomenda.

#### Cálculo Automatizado
Ao cadastrar um produto na encomenda, André percebe que o sistema agora realiza automaticamente o cálculo do tempo necessário para liberar o carro. Isso leva em consideração a quantidade de caixas adicionadas.

#### Melhorias Futuras
####Comprometimento do Desenvolvedor
O desenvolvedor do sistema demonstra um comprometimento contínuo com a melhoria da funcionalidade de cálculo do tempo de liberação do carro. André é informado sobre futuras atualizações planejadas para tornar essa função ainda mais precisa e abrangente.

#### Acesso à Funcionalidade de Exclusão
Ao navegar pela lista de encomendas, André percebe a opção de exclusão disponível para cada registro. Essa funcionalidade permite que ele remova encomendas que não são mais relevantes ou foram cadastradas erroneamente.

#### Alerta de Confirmação
Ao selecionar a opção de exclusão, o sistema exibe um alerta de confirmação. Esse alerta informa André sobre a ação que está prestes a realizar e solicita uma confirmação antes de proceder com a exclusão.

Escolha Consciente do Utilizador
André, consciente da importância de manter registros precisos, avalia cuidadosamente se a encomenda deve ser deletada. O alerta de confirmação oferece duas opções:

Cancelar: Caso André tenha clicado em "Excluir" por engano ou decida manter a encomenda, clicar em "Cancelar" interrompe o processo de exclusão.

Sim, Excluir: Se André está certo de que a encomenda deve ser removida, ele clica em "Sim, Excluir". Nesse caso, o sistema realiza a exclusão da encomenda, atualizando imediatamente os registros.

### Cadastro de Utilizadores
André descobre que o sistema permite cadastrar utilizadores, atribuindo a cada um uma função específica. Isso facilita a gestão de permissões e garante que cada utilizador tenha acesso apenas às funcionalidades relevantes ao seu papel na fábrica de carne.

### Cadastro de Produtos
Ao explorar a funcionalidade de cadastro de produtos, André percebe a versatilidade do sistema. Ele pode adicionar novos produtos, especificando detalhes como nome, tipo, quantidade em estoque e outras informações relevantes. Essa funcionalidade simplifica o processo de manter um inventário atualizado e preciso.

### Cadastro de Fornecedores
André também encontra a opção de cadastrar fornecedores. Ao adicionar informações como nome, contato e detalhes adicionais, o sistema proporciona uma visão abrangente dos relacionamentos com os fornecedores. Isso é crucial para garantir uma cadeia de abastecimento eficiente e confiável.

### Olhando para o Futuro
André, animado com a eficiência proporcionada pelo sistema, antecipa ainda mais melhorias e funcionalidades que podem ser adicionadas ao longo do tempo. Ele está confiante de que o sistema "Controle de Encomendas" continuará a evoluir, adaptando-se às necessidades dinâmicas da fábrica e contribuindo para uma gestão logística cada vez mais eficiente.

Essa conclusão marca não apenas o fim da exploração inicial de André no sistema, mas também o início de uma nova fase na gestão logística da fábrica de carne, impulsionada pelo poder e abrangência do sistema "Controle de Encomendas".

# Pré-requisitos: npm / yarn

```bash
# clonar repositório
git clone https://github.com/AndreAragaoSoftware/Controle-de-Encomendas

# entrar na pasta do projeto Controle de Encomendas
cd Controle-de-Encomendas

# instalar dependências
yarn install

# executar o projeto
yarn start
```

# Autores

- André Oliveira Aragão
- Ismael Santos
- Saliu Baldé

# Linkedin

https://www.linkedin.com/in/andrearagaodeveloper/
