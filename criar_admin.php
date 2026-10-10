<?php
// APENAS CONFIGURAÇÃO INICIAL LOCAL. EXCLUA ESTE ARQUIVO APÓS CRIAR O ADMINISTRADOR.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require 'conexao.php';
    $nome = trim($_POST['nome'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $senha = $_POST['senha'] ?? '';
    if ($nome === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($senha) < 12) {
        $aviso = 'Informe nome, e-mail válido e senha com pelo menos 12 caracteres.';
    } else {
        $hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = mysqli_prepare($conexao, 'INSERT INTO usuario (nome,email,senha_hash) VALUES (?,?,?)');
        mysqli_stmt_bind_param($stmt, 'sss', $nome, $email, $hash);
        $aviso = mysqli_stmt_execute($stmt) ? 'Administrador criado! Exclua agora o arquivo criar_admin.php.' : 'Não foi possível cadastrar: confira se o e-mail já existe.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Criar administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container py-5">
    <h1>Criar administrador (uso local)</h1>
    <p class="text-danger">Exclua este arquivo imediatamente após criar o usuário. Nunca publique esta página.</p><?php if (isset($aviso)): ?><div class="alert alert-info"><?= htmlspecialchars($aviso, ENT_QUOTES, 'UTF-8') ?></div><?php endif; ?><form method="POST" style="max-width:400px"><label class="form-label">Nome</label><input class="form-control mb-3" name="nome" required><label class="form-label">E-mail</label><input type="email" class="form-control mb-3" name="email" required><label class="form-label">Senha (mínimo 12 caracteres)</label><input type="password" class="form-control mb-3" name="senha" minlength="12" required><button class="btn btn-success">Criar usuário</button></form>
</body>

</html>
