<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}

// Inclui o arquivo de configuração do banco de dados
include_once('config.php');

// Processamento do formulário
if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];

    // Upload das imagens
    $imagens = array();
    $uploadDir = 'uploads/';  // Diretório onde as imagens serão salvas
    foreach ($_FILES['imagens']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['imagens']['name'][$key];
        $file_tmp = $_FILES['imagens']['tmp_name'][$key];

        $targetFile = $uploadDir . $file_name;
        move_uploaded_file($file_tmp, $targetFile);
        $imagens[] = $targetFile;
    }

    // Inserir no banco de dados
    $sql = "INSERT INTO produtos (nome, tipo, valor, descricao, imagens) VALUES ('$nome', '$tipo', '$valor', '$descricao', '" . implode(',', $imagens) . "')";

    if ($conexao->query($sql) === TRUE) {
        echo "Produto adicionado com sucesso";
    } else {
        echo "Erro: " . $sql . "<br>" . $conexao->error;
    }

    $conexao->close();
}
?>