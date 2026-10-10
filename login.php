<?php

//Inicia a sessão PHP
session_start();

//Verifica se o usuário já esta logado
if (isset($_SESSION["usuario_id"])) {
    header("Location: painel.php");
    exit;
}

//Verifica se houve erro na tentativa de login
$erro = isset($_GET["erro"]);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <section class="container ">
        <div class="row justify-content-center">
            <div class="col-6 ">
                <form action="autenticar.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">Nunca compartilharemos seu e-mail com mais ninguém.</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Senha</label>
                        <input type="password" class="form-control" name="senha" >
                    </div>

                    <div class="justify-content-center text-center">
                        <button type="submit" class="btn btn-success justify-">Entrar</button>
                    </div>
                </form>
                

                <!-- Voltar ao site -->
                <a href="index.html" class=" mt-3 btn btn-primary justify-content-center ">
                    Voltar ao site
                </a>

            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>