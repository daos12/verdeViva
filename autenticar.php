<?php

// Inicia a sessão
session_start();

// Permite somente requisições POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: login.php");
    exit;
}

// Recebe os dados do formulário
$email = trim($_POST["email"] ?? "");
$senha = $_POST["senha"] ?? "";

// Importa a conexão com o banco
require("conexao.php");

// Consulta o usuário pelo e-mail
$sql = "SELECT idUsuario, nome, senha_hash
        FROM usuario
        WHERE email = ?
        LIMIT 1";

// Prepara a consulta
$stmt = mysqli_prepare($conexao, $sql);

// Vincula o e-mail ao parâmetro
mysqli_stmt_bind_param($stmt, "s", $email);

// Executa a consulta
mysqli_stmt_execute($stmt);

// Obtém o resultado
$resultado = mysqli_stmt_get_result($stmt);

// Recupera o usuário encontrado
$usuario = mysqli_fetch_assoc($resultado);

// Verifica se o usuário existe e se a senha confere
if ($usuario && password_verify($senha, $usuario["senha_hash"])) {

    // Renova o identificador da sessão
    session_regenerate_id(true);

    // Armazena os dados na sessão
    $_SESSION["usuario_id"] = $usuario["idUsuario"];
    $_SESSION["usuario_nome"] = $usuario["nome"];

    // Redireciona para o painel
    header("Location: painel.php");
    exit;

}

// Login incorreto
header("Location: login.php?erro=1");
exit;

?>
