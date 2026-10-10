<?php

//Conecta ao banco de dados
$conexao = mysqli_connect(
    "localhost",
    "root",
    "",
    "verdeViva",
    3307
);

if (!$conexao) {
    die("Erro ao conectar ao banco de dados.");
}

//Configura caracteres especiais
mysqli_set_charset($conexao, "utf8mb4");

?>
