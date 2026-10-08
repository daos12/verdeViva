<?php
//Verificar se o formulário foi 
// enviado usando POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Receber os dados enviados pelo formulário
    $nome       =   $_POST["nome"];
    $email      =   $_POST["email"];
    $telefone   =   $_POST["telefone"];
    $assunto    =   $_POST["assunto"];
    $mensagem   =   $_POST["mensagem"];

    //Importar a conexão com o banco
    require("conexao.php");

    //Prepara o comando SQL
    $sql = "INSERT INTO contato (nome, email, telefone, assunto, mensagem) VALUES (?,?,?,?,?)";

    //Prepara o comando
    $stmt = mysqli_prepare($conexao, $sql);

    //Vincula os valores aos ?
    mysqli_stmt_bind_param(
        $stmt,
        "sssss",
        $nome,
        $email,
        $telefone,
        $assunto,
        $mensagem
    );

    // Executa
    if (mysqli_stmt_execute($stmt)) {
        echo "
            <script>
                alert('Mensagem enviada com sucesso!');
                window.location.href = 'index.html';
            </script>
        ";
    } else {
        echo "Erro ao enviar mensagem.";
    }

    // Fecha o comando
    mysqli_stmt_close($stmt);

    // Fecha a conexão
    mysqli_close($conexao);
}
