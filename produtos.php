<?php
session_start();
include_once('config.php');

// Verifica se não há uma sessão de email e senha
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    // Limpa a sessão de email e senha
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    // Redireciona para a página de login de administrador (adm.php)
    header('Location: login2.php');
}

// Obtém o email do usuário logado da sessão
$logado = $_SESSION['email'];

// Consulta todos os produtos ordenados por ID de forma descendente
$sql = "SELECT * FROM produtos ORDER BY id DESC";
$result = $conexao->query($sql);

// Verifica se há produtos no resultado da consulta
if ($result->num_rows > 0) {
    // Obtém todos os produtos como um array associativo
    $produtos = $result->fetch_all(MYSQLI_ASSOC);
} else {
    // Se não houver produtos, define um array vazio
    $produtos = [];
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 63, 71));
            margin: 0;
            padding: 20px;
            color: white;
        }

        .produto {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .produto:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .produto h2 {
            margin-top: 0;
            font-size: 24px;
        }

        .produto img {
            width: 100%;
            max-width: 200px;
            height: auto;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .sair {
            margin-bottom: 20px; /* Adicionei margem inferior para distanciar do conteúdo abaixo */
        }

        a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 10px 20px;
            border-radius: 10px;
            display: inline-block; /* Para que não seja posicionado absolutamente */
            margin-bottom: 10px; /* Adicionei margem inferior para distanciar dos demais elementos */
        }

        a:hover {
            text-decoration: underline;
            background-color: rgba(0, 0, 0, 0.8);
        }
    </style>
</head>

<body>
    <div class="sair">
        <a href="sair.php">Sair</a>
    </div>
    <h1>Lista de Produtos</h1>
    <?php if (empty($produtos)): ?>
        <p>Nenhum produto encontrado.</p>
    <?php else: ?>
        <?php foreach ($produtos as $produto): ?>
            <div class="produto" onclick="window.location.href='detalhesProduto.php?id=<?php echo $produto['id']; ?>'">
                <h2><?php echo $produto['nome']; ?></h2>
                <img src="<?php echo implode(',', explode(',', $produto['imagens'])); ?>" alt="<?php echo $produto['nome']; ?>">
                <p><strong>Tipo:</strong> <?php echo ucfirst($produto['tipo']); ?></p>
                <p><strong>Valor:</strong> R$ <?php echo number_format($produto['valor'], 2, ',', '.'); ?></p>
                <p><strong>Descrição:</strong> <?php echo $produto['descricao']; ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>