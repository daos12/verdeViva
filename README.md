# VerdeViva - Plantas & Jardinagem

Projeto Web educacional desenvolvido em conjunto com os alunos durante as aulas, com o objetivo de praticar a construção de páginas modernas e responsivas utilizando HTML5 e Bootstrap 5.

O projeto simula o site de uma loja fictícia chamada VerdeViva, especializada em plantas, vasos, ferramentas e acessórios para jardinagem.

## Objetivo do projeto

O principal objetivo deste projeto foi aprender, de forma prática, como utilizar os recursos e componentes disponíveis no Bootstrap para construir uma página Web completa.

Durante o desenvolvimento, os componentes foram pesquisados na documentação oficial do Bootstrap, adicionados ao projeto e posteriormente personalizados de acordo com a proposta da loja.

A atividade também permitiu compreender como diferentes componentes podem ser combinados para criar uma interface organizada, responsiva e funcional.

## Tecnologias utilizadas

- HTML5
- Bootstrap 5
- Bootstrap Icons
- JavaScript do Bootstrap
- Git
- GitHub

## Recursos desenvolvidos

O projeto utiliza diferentes recursos do Bootstrap, incluindo:

- Navbar responsiva
- Carousel
- Alerts
- Sistema de Grid
- Cards
- Badges
- Buttons
- Modal
- Accordion
- Formulários
- Bootstrap Icons
- Classes utilitárias
- Flexbox
- Espaçamentos
- Responsividade
- Links internos
- Integração com WhatsApp
- Integração com Instagram

## Estrutura da página

### Navbar

Foi criada uma barra de navegação responsiva contendo o nome VerdeViva e links para diferentes áreas da página:

- Início
- Categorias
- Produtos
- Dúvidas
- Contato

Em dispositivos menores, o menu é adaptado automaticamente utilizando o recurso de Navbar responsiva do Bootstrap.

### Carousel

A página possui um Carousel utilizado como banner principal.

Foram criados diferentes slides apresentando chamadas como:

- Deixe sua casa mais verde
- Semana dos Vasos
- Seu jardim começa aqui

Cada slide possui textos e botões que direcionam o usuário para outras áreas da página.

### Alert

Foi utilizado o componente Alert para apresentar informações importantes ao visitante, como promoções e condições de frete.

### Categorias

O sistema de Grid do Bootstrap foi utilizado para organizar as principais categorias da loja:

- Plantas
- Vasos
- Ferramentas
- Acessórios

A utilização das classes responsivas permite modificar automaticamente a distribuição dos elementos de acordo com o tamanho da tela.

## Produtos

Os produtos foram organizados utilizando Cards do Bootstrap.

Cada produto pode apresentar:

- Imagem
- Nome
- Descrição
- Preço
- Preço promocional
- Badge
- Botões de ação

Entre os produtos utilizados no exemplo estão:

- Costela-de-Adão
- Espada-de-São-Jorge
- Kit Jardinagem

## Badges

Os Badges foram utilizados para destacar determinadas características dos produtos, como:

- Oferta
- Mais vendido
- Novidade

Isso demonstra como pequenas informações podem receber destaque visual utilizando classes prontas do Bootstrap.

## Modal

O componente Modal foi utilizado para apresentar informações adicionais sobre um produto sem a necessidade de abrir uma nova página.

No exemplo da Costela-de-Adão, o usuário pode consultar informações como:

- Ambiente recomendado
- Iluminação
- Frequência de rega
- Tamanho aproximado
- Preço

O Modal também possui um botão para iniciar o processo de compra.

## WhatsApp

Os produtos possuem botões de contato pelo WhatsApp.

Ao clicar no botão, o usuário é direcionado para uma conversa contendo uma mensagem previamente configurada de acordo com o produto escolhido.

Exemplo de funcionamento:

Comprar pelo WhatsApp → abrir conversa → mensagem sobre o produto.

Esse recurso demonstra uma aplicação prática de links externos em um projeto comercial.

## Instagram

Também foi adicionada uma opção para acessar o perfil da empresa no Instagram.

O objetivo foi demonstrar como integrar redes sociais a uma página Web utilizando links, botões e Bootstrap Icons.

## Seção de benefícios

Foi criada uma área para apresentar alguns diferenciais da empresa:

- Entrega
- Compra segura
- Suporte

Essa seção utiliza Grid, classes utilitárias e Bootstrap Icons.

## Perguntas Frequentes

O componente Accordion foi utilizado para criar uma seção de perguntas frequentes.

Entre as perguntas apresentadas estão:

- Vocês realizam entrega?
- Como escolher uma planta?
- Quais são as formas de pagamento?
- Posso retirar meu pedido na loja?

O Accordion permite mostrar e ocultar as respostas de forma interativa.

## Formulário de contato

Foi desenvolvido um formulário contendo:

- Nome
- E-mail
- Telefone
- Assunto
- Mensagem
- Botão de envio

Nesta versão do projeto, o formulário possui finalidade visual e educacional.

O envio e armazenamento das informações poderá ser implementado futuramente utilizando tecnologias de Back-End e banco de dados.

## Responsividade

Um dos principais conteúdos praticados durante o desenvolvimento foi a responsividade.

Foram utilizadas classes como:

`container`

`row`

`col-12`

`col-md-4`

`col-md-6`

`col-md-7`

`col-6`

Além dessas classes, foram utilizados recursos de Flexbox e classes utilitárias do Bootstrap.

Com isso, os elementos da página conseguem se reorganizar conforme o tamanho da tela.

## Bootstrap Icons

O projeto utiliza Bootstrap Icons para complementar visualmente diferentes elementos da interface.

Foram utilizados ícones relacionados a:

- Plantas
- Ferramentas
- Entrega
- Segurança
- Atendimento
- WhatsApp
- Instagram
- Visualização
- Envio de mensagens

## Estrutura básica do projeto

```text
verdeviva-bootstrap/
│
├── index.html
└── README.md

O Bootstrap e o Bootstrap Icons são carregados por CDN, não sendo necessário instalar essas bibliotecas localmente.
Como executar o projeto
1. Faça o download ou clone este repositório.
2. Abra a pasta do projeto.
3. Localize o arquivo index.html.
4. Abra o arquivo utilizando um navegador.
5. Também é possível executar o projeto utilizando a extensão Live Server do Visual Studio Code.
Clonando o repositório
git clone URL-DO-REPOSITORIO

Depois:
cd verdeviva-bootstrap

Abra o projeto no Visual Studio Code:
code .

Conceitos praticados
Durante o desenvolvimento deste projeto foram praticados conceitos importantes para o desenvolvimento Web, como:
- Estruturação de páginas com HTML
- Utilização de frameworks CSS
- Bootstrap 5
- Sistema de Grid
- Responsividade
- Componentes reutilizáveis
- Classes utilitárias
- Flexbox
- Navegação por âncoras
- Formulários
- Cards
- Modais
- Carrosséis
- Accordions
- Ícones
- Links externos
- Integração com redes sociais
- Organização de código
- Utilização da documentação oficial
- Versionamento com Git
- Publicação de projetos no GitHub
Metodologia utilizada em aula
O projeto foi construído passo a passo em conjunto com os alunos.
Durante o desenvolvimento, cada componente foi apresentado individualmente, pesquisado na documentação do Bootstrap e posteriormente incorporado ao projeto.
A proposta foi mostrar que não é necessário memorizar todas as classes e componentes do framework. O mais importante é compreender sua estrutura, saber consultar a documentação e conseguir adaptar os exemplos às necessidades de cada projeto.
Os alunos puderam acompanhar a evolução da página, testar alterações no código e observar em tempo real o comportamento dos componentes e da responsividade.
Possíveis melhorias futuras
O projeto poderá evoluir com a implementação de novos recursos, como:
- JavaScript personalizado
- Validação do formulário
- Carrinho de compras
- Pesquisa de produtos
- Filtros por categoria
- Cadastro de clientes
- Banco de dados
- Sistema de login
- Área administrativa
- Back-End
- Integração com APIs
Documentação utilizada
Durante as aulas, os componentes podem ser consultados diretamente na documentação oficial do Bootstrap:
Bootstrap:
https://getbootstrap.com/
Bootstrap Icons:
https://icons.getbootstrap.com/
Finalidade educacional
Este projeto foi desenvolvido exclusivamente para fins educacionais, como material de apoio às aulas de Desenvolvimento Web.
A empresa VerdeViva e os produtos apresentados são utilizados apenas como exemplos para contextualizar a aplicação dos recursos estudados.
O projeto tem como objetivo permitir que os alunos aprendam por meio da prática, experimentação, modificação do código e consulta à documentação oficial.
Autor e desenvolvimento
Projeto desenvolvido em sala de aula em conjunto com os alunos.
Professor Diego Antonio
Material destinado ao estudo e à prática de Desenvolvimento Web.

O README está alinhado ao código: inclusive deixa claro que o formulário ainda é apenas visual e que uma implementaçã
