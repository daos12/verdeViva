<?php
session_start();
header('Cache-Control: no-store, no-cache, must-revalidate');

if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

require 'conexao.php';

$resultado = mysqli_query(
    $conexao,
    "SELECT idContato, nome, email, telefone, assunto, mensagem
     FROM contato
     ORDER BY idContato DESC"
);

if (!$resultado) {
    http_response_code(500);
    exit("Não foi possível carregar os contatos.");
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
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Assunto</th>
                        <th scope="col">Mensagem</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($linha = mysqli_fetch_assoc($resultado)): ?>
                    <tr>
                        <td><? $linha["idContato"] ?></td>
                        <td><? $linha["nome"] ?></td>
                        <td><? $linha["email"] ?></td>
                        <td><? $linha["telefone"] ?></td>
                        <td><? $linha["assunto"] ?></td>
                        <td><? $linha["mensagem"] ?></td>
                    </tr>
                    <?php endwhile;?>
                   
                </tbody>
            </table>
        </section>
    </main>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>


</html>