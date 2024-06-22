<?php
session_start(); // Inicia a sessão PHP

// Verifica se o formulário foi submetido e se os campos estão preenchidos
if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    // Inclui o arquivo de configuração do banco de dados
    include_once('config.php');

    // Obtém os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta SQL para verificar se o usuário existe
    $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = $conexao->query($sql);

    // Verifica se encontrou algum usuário com o email e senha fornecidos
    if (mysqli_num_rows($result) < 1) {
        // Se não encontrou, redireciona de volta para a página de login
        header('Location: login2.php');
    } else {
        // Se encontrou, inicia a sessão para o usuário
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        // Redireciona para a página de produtos
        header('location: produtos.php');
    }
} else {
    // Se não foi submetido ou campos estão vazios, redireciona para a página de login
    header('Location: login2.php');
}
?>
