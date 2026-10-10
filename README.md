# VerdeViva — Plantas & Jardinagem

**Projeto educacional de desenvolvimento web**, construído passo a passo em sala de aula para simular o site de uma loja de plantas e jardinagem. A aplicação começou com **HTML5 e Bootstrap 5** e evoluiu para integrar **PHP, MySQL, formulário de contato, login administrativo e painel de mensagens**.

> **Finalidade:** aprendizagem e demonstração de tecnologias web. A VerdeViva é uma empresa fictícia; o projeto não implementa vendas, pagamentos ou gestão de pedidos reais.

## Sobre o projeto

A proposta é aplicar, em um único projeto, os conceitos de interface responsiva, componentes Bootstrap, formulários HTML, processamento de dados no servidor, consultas SQL, autenticação e controle de sessões. O desenvolvimento foi realizado de forma progressiva, permitindo observar a integração entre front-end, back-end e banco de dados.

## Tecnologias utilizadas

| Tecnologia | Aplicação no projeto |
| --- | --- |
| **HTML5** | Estrutura e formulários das páginas |
| **Bootstrap 5.3.8** | Layout responsivo e componentes visuais |
| **Bootstrap Icons** | Ícones da interface |
| **JavaScript (Bootstrap Bundle)** | Interatividade dos componentes Bootstrap |
| **PHP** | Recebimento de formulários, autenticação e sessões |
| **MySQL / MySQLi** | Armazenamento e consulta de usuários e contatos |
| **Apache / XAMPP** | Ambiente local para executar o PHP |
| **Git e GitHub** | Versionamento e compartilhamento do código |

Bootstrap e Bootstrap Icons são carregados por CDN. Para utilizar as funcionalidades em PHP, é necessário executar o projeto por um servidor com PHP; **abrir `index.html` diretamente ou usar apenas o Live Server não executa o back-end**.

## Funcionalidades

### Página pública

- Barra de navegação responsiva com links internos e acesso ao login.
- Carrossel promocional, alertas e apresentação de categorias.
- Cards de produtos com imagens, descrições, preços e elementos visuais.
- Modal de detalhes, FAQ com accordion e seções informativas.
- Formulário de contato com nome, e-mail, telefone, assunto e mensagem.
- Links demonstrativos para WhatsApp e Instagram.

### Contato com banco de dados

O formulário da página inicial envia os dados via **POST** para `cadastroContato.php`. O PHP utiliza uma **consulta preparada** para inserir as informações na tabela `contato` e apresenta uma mensagem de confirmação antes de retornar à página inicial.

### Área administrativa

- Página de login em `login.php`.
- Validação de credenciais em `autenticar.php` usando consulta preparada e `password_verify()`.
- Sessão PHP para manter a autenticação e restringir o acesso ao painel.
- Painel em `painel.php` que consulta e apresenta as mensagens recebidas, ordenadas das mais recentes para as mais antigas.
- Saída da sessão por `logout.php`.
- Página de configuração inicial `criar_admin.php` para cadastrar um administrador localmente.

**Observação:** o painel é de **visualização de mensagens**. O repositório não contém um CRUD completo de contatos nem gerenciamento de pedidos.

## Estrutura do projeto

```text
verdeViva-main/
├── img/
│   ├── costaAdao.jpg
│   ├── espada.jpg
│   └── kitJardinagem.jpg
├── index.html            # Página pública da loja
├── cadastroContato.php   # Recebe e salva mensagens
├── conexao.php           # Conexão com o MySQL
├── login.php             # Formulário de acesso administrativo
├── autenticar.php        # Confere usuário e senha
├── painel.php            # Exibe as mensagens cadastradas
├── logout.php            # Encerra a sessão
├── criar_admin.php       # Cadastro inicial: REMOVER após o uso
├── gerar_hash.php        # Utilitário temporário: REMOVER
└── README.md             # Documentação do projeto
```

## Como executar localmente

### 1. Pré-requisitos

- **XAMPP** com Apache, PHP e MySQL/MariaDB funcionando.
- Navegador atualizado.
- Editor de código, como Visual Studio Code (opcional).

### 2. Copiar os arquivos

Baixe ou clone o repositório e coloque a pasta do projeto dentro de `htdocs`. Exemplo no Windows:

```text
C:\xampp\htdocs\vivaVerde\
```

Se o nome da pasta for diferente, ajuste o endereço utilizado no navegador.

### 3. Iniciar os serviços

Abra o painel do XAMPP e inicie **Apache** e **MySQL**. Acesse o phpMyAdmin em `http://localhost/phpmyadmin/`.

### 4. Criar o banco e as tabelas

O ZIP analisado **não contém um arquivo `.sql` de instalação**. O script a seguir representa as colunas consultadas e gravadas pelos arquivos PHP presentes no repositório:

```sql
CREATE DATABASE IF NOT EXISTS verdeViva
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;

USE verdeViva;

CREATE TABLE IF NOT EXISTS contato (
    idContato INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    telefone VARCHAR(20),
    assunto VARCHAR(100),
    mensagem TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS usuario (
    idUsuario INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    senha_hash VARCHAR(255) NOT NULL
);
```

> Se as tabelas já existirem, **verifique sua estrutura antes de executar alterações**. O código atual utiliza `usuario` (singular), `idUsuario` e `senha_hash`; para mensagens, utiliza `contato` e `idContato`.

### 5. Configurar a conexão

Confira `conexao.php`. **Na versão enviada**, os parâmetros estão configurados como:

```php
$conexao = mysqli_connect(
    "localhost", // Servidor
    "root",      // Usuário do MySQL
    "root",      // Senha do MySQL nesta instalação
    "verdeViva", // Banco de dados
    3306         // Porta
);
```

Esses valores **não são universais**: ajuste usuário, senha e porta de acordo com sua instalação. Evite publicar credenciais reais no GitHub. Para uma versão destinada à produção, utilize configurações externas ao repositório e um usuário MySQL com permissões limitadas.

### 6. Cadastrar o administrador inicial

Em ambiente **local de testes**, acesse:

```text
http://localhost/vivaVerde/criar_admin.php
```

Informe nome, e-mail e uma senha de pelo menos **12 caracteres**. O arquivo usa `password_hash()` para armazenar a senha de forma segura. **Exclua `criar_admin.php` e `gerar_hash.php` depois da configuração.** Nunca disponibilize essas páginas em um servidor público.

### 7. Abrir o site e testar

Página pública:

```text
http://localhost/vivaVerde/index.html
```

Login administrativo:

```text
http://localhost/vivaVerde/login.php
```

Fluxo sugerido de teste:

1. Envie uma mensagem pelo formulário de contato.
2. Verifique o registro na tabela `contato` pelo phpMyAdmin.
3. Entre em `login.php` com o administrador cadastrado.
4. Confira se a mensagem aparece em `painel.php`.
5. Clique em **Sair** e tente abrir `painel.php` novamente para verificar o redirecionamento ao login.

## Como funciona a autenticação

```text
login.php
    │ formulário POST (email e senha)
    ▼
autenticar.php
    │ consulta a tabela usuario por email
    │ confere a senha com password_verify()
    ├── credenciais válidas → cria sessão → painel.php
    └── credenciais inválidas → login.php?erro=1

painel.php → consulta tabela contato → lista mensagens
logout.php → encerra sessão → login.php
```

Se a URL terminar em `login.php?erro=1`, o formulário foi processado, mas **o e-mail não foi encontrado ou a senha não corresponde ao hash armazenado**. Verifique o cadastro na tabela `usuario` e confirme que a senha foi gerada com `password_hash()`.

## Problemas comuns

| Situação | O que verificar |
| --- | --- |
| PHP aparece como texto ou não executa | Acesse pelo `http://localhost/...` com Apache ativo, não apenas pelo Live Server. |
| Erro de conexão com MySQL | Revise servidor, usuário, senha, banco e porta em `conexao.php`. |
| `mysqli_prepare()` retorna `false` | Confirme os nomes de tabelas e colunas usados no SQL. |
| Login retorna `?erro=1` | Confirme o e-mail e o hash de senha da tabela `usuario`. |
| Painel redireciona para login | Verifique se a sessão foi criada após a autenticação. |
| Mensagens não aparecem | Confirme que os dados foram inseridos na tabela `contato`. |

## Cuidados de segurança e limitações

Este repositório é um **exemplo didático**, não uma aplicação pronta para publicação. Antes de disponibilizá-lo na internet, é necessário:

- **Remover** `criar_admin.php` e `gerar_hash.php` do ambiente publicado e do histórico público quando contiverem informações sensíveis.
- **Não manter senhas ou credenciais do banco no código versionado**; substituir credenciais expostas e usar configuração segura.
- Utilizar HTTPS, cookies de sessão seguros, proteção contra CSRF e limitação de tentativas de login.
- Validar e limitar os dados recebidos pelos formulários no servidor.
- Revisar permissões do banco e o tratamento de erros.
- Revisar a tabela HTML do painel: o cabeçalho apresenta cinco colunas, mas as linhas exibem seis valores (incluindo telefone). Ajustar o cabeçalho para incluir **Telefone**.
- Escapar também o nome do usuário exibido no painel com `htmlspecialchars()`.

O código já demonstra conceitos importantes, como **consultas preparadas**, `password_hash()`, `password_verify()`, sessões PHP e escaping de mensagens com `htmlspecialchars()`.

## Conceitos trabalhados em aula

Estrutura semântica HTML, Bootstrap Grid, responsividade, navbar, cards, carousel, modal, accordion, classes utilitárias, formulários com POST, integração PHP/MySQL, consultas `INSERT` e `SELECT`, prepared statements, hash de senhas, sessões, redirecionamentos, controle de acesso e versionamento com Git/GitHub.

## Possíveis evoluções

- Pesquisa, filtros e paginação das mensagens no painel.
- Marcação de mensagens como lidas ou respondidas.
- Melhorias na validação de formulários e no feedback visual.
- Cadastro e gerenciamento de produtos com banco de dados.
- Controle de perfis e permissões de administradores.
- Testes automatizados e separação das configurações por ambiente.

## Referências

- [Documentação oficial do Bootstrap](https://getbootstrap.com/docs/5.3/getting-started/introduction/)
- [Bootstrap Icons](https://icons.getbootstrap.com/)
- [Manual do PHP](https://www.php.net/manual/pt_BR/)
- [Documentação do MySQL](https://dev.mysql.com/doc/)

## Autoria e finalidade educacional

Projeto desenvolvido **em sala de aula, passo a passo, com os alunos do Senac**, sob orientação do **Professor Diego Antonio**, para fins de aprendizagem e prática de desenvolvimento web.

---

**VerdeViva — da interface responsiva à integração com banco de dados.**
