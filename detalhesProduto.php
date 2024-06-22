<?php
session_start();

// Verifica se o colaborador está logado
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
}

// Verifica se o parâmetro 'id' foi passado na URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Inclui o arquivo de configuração do banco de dados
    include_once ('config.php');

    // Consulta para obter os detalhes do produto pelo ID
    $sql = "SELECT * FROM produtos WHERE id = $id";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        $produto = $result->fetch_assoc();
    } else {
        // Se não encontrar o produto, redireciona de volta para a lista de produtos
        header('Location: produtos.php');
        exit;
    }

    $conexao->close();
} else {
    // Se o parâmetro 'id' não foi passado, redireciona de volta para a lista de produtos
    header('Location: produtos.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto</title>
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
            cursor: pointer;
            top: 20px;
        }

        .produto h2 {
            margin-top: 0;
            font-size: 24px;
            top: 20px;
        }

        .produto img {
            width: 100%;
            max-width: 400px;
            height: auto;
            margin-bottom: 10px;
            border-radius: 5px;
            top: 20px;
        }

        .voltar {
            margin-bottom: 20px; /* Adicionei margem inferior para distanciar do conteúdo abaixo */
        }

        a {
            text-decoration: none;
            color: white;
            font-size: 12px;
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
    <div class="voltar">
        <a href="produtos.php">Voltar para a Lista de Produtos</a>
    </div>

    <div class="produto">
        <h2><?php echo $produto['nome']; ?></h2>
        <img src="<?php echo implode(',', explode(',', $produto['imagens'])); ?>" alt="<?php echo $produto['nome']; ?>">
        <p><strong>Tipo:</strong> <?php echo ucfirst($produto['tipo']); ?></p>
        <p><strong>Valor:</strong> R$ <?php echo number_format($produto['valor'], 2, ',', '.'); ?></p>
        <p><strong>Descrição:</strong> <?php echo $produto['descricao']; ?></p>
        <p><strong>Imagens:</strong></p>
        <?php
        $imagens = explode(',', $produto['imagens']);
        foreach ($imagens as $imagem) {
            echo '<img src="' . $imagem . '" style="max-width: 200px; margin-right: 10px; margin-bottom: 10px; border-radius: 5px;" alt="' . $produto['nome'] . '">';
        }
        ?>
    </div>
</body>

</html>