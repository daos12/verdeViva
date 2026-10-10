
<?php
// Inicia ou recupera a sessão do usuário.
session_start();

// Impede que o navegador armazene a página em cache.
// Ajuda a evitar a exibição de conteúdo antigo após o logout.
header('Cache-Control: no-store, no-cache, must-revalidate');

// Verifica se o usuário está autenticado.
// A variável de sessão 'usuario_id' deve ser definida no login.
if (!isset($_SESSION['usuario_id'])) {

    // Redireciona o usuário para a página de login.
    header('Location: login.php');

    // Encerra a execução do código após o redirecionamento.
    exit;
}

// Importa o arquivo responsável pela conexão com o MySQL.
// Esse arquivo deve disponibilizar a variável $conexao.
require 'conexao.php';

// Executa uma consulta SQL no banco de dados.
$resultado = mysqli_query(

    // Conexão com o banco de dados MySQL.
    // Seleciona os campos desejados da tabela contato.
    // ORDER BY organiza os registros pelo ID em ordem decrescente.
    // DESC faz com que os maiores IDs apareçam primeiro.
    $conexao,
    "SELECT idContato, nome, email, telefone, assunto, mensagem
     FROM contato
     ORDER BY idContato DESC"
);

// Verifica se ocorreu algum erro na execução da consulta.
// mysqli_query retorna false quando a consulta falha.
if (!$resultado) {

    // Define o código HTTP 500, indicando erro interno no servidor.
    http_response_code(500);

    // Exibe uma mensagem de erro e encerra a execução.
    exit("Não foi possível carregar os contatos.");
}

// Função auxiliar para exibir informações com segurança no HTML.
// Recebe um valor e converte caracteres especiais em entidades HTML.
// Ajuda a prevenir ataques de Cross-Site Scripting (XSS)
// quando os dados são exibidos no conteúdo da página.
function h($valor)
{
    // Converte o valor recebido para texto (string).
    // ENT_QUOTES converte aspas simples e duplas.
    // ENT_SUBSTITUTE substitui sequências inválidas de caracteres.
    // UTF-8 define a codificação utilizada na conversão.
    return htmlspecialchars(
        (string)$valor,
        ENT_QUOTES | ENT_SUBSTITUTE,
        'UTF-8'
    );
}

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel | VerdeViva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar bg-success navbar-dark">
        <div class="container"><span class="navbar-brand">VerdeViva | Administração</span>
            <form action="logout.php" method="POST"><button class="btn btn-outline-light">Sair</button></form>
        </div>
    </nav>

    <main>
        <section class="container">
            <h1>Mensagens recebidas</h1>
            <p>Olá,
                <?= $_SESSION['usuario_nome']; ?>.
            </p>
        </section>

        <section class="container">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Assunto</th>
                        <th scope="col">Mensagem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($linha = mysqli_fetch_assoc($resultado)): ?>
                        <tr>
                            <td><?= h($linha['idContato']) ?></td>
                            <td><?= h($linha['nome']) ?></td>
                            <td><?= h($linha['email']) ?></td>
                            <td><?= h($linha['telefone']) ?></td>
                            <td><?= h($linha['assunto']) ?></td>
                            <td style="min-width:220px;white-space:pre-wrap"><?= h($linha['mensagem']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>