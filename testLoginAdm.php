<?php
session_start(); // Inicia a sessão PHP

// Verifica se o formulário foi submetido e se os campos estão preenchidos
if (isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['senha'])) {
    // Inclui o arquivo de configuração do banco de dados
    include_once('config.php');

    // Obtém os dados do formulário
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // Consulta SQL para verificar se o administrador existe
    $sql = "SELECT * FROM adm WHERE nome = '$nome' and senha = '$senha'";
    $result = $conexao->query($sql);

    // Verifica se encontrou algum administrador com o nome e senha fornecidos
    if (mysqli_num_rows($result) < 1) {
        // Se não encontrou, redireciona para a página inicial (home.php)
        header('Location: home.php');
    } else {
        // Se encontrou, inicia a sessão para o administrador
        $_SESSION['nome'] = $nome;
        $_SESSION['senha'] = $senha;
        // Redireciona para a página do sistema (sistema.php)
        header('location: sistema.php');
    }
} else {
    // Se não foi submetido ou campos estão vazios, redireciona para a página de login do administrador (adm.php)
    header('Location: adm.php');
}
?>