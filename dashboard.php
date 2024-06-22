<?php
session_start();

// Verifica se o usuário está logado
if ((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)) {
    header('Location: login.php');
    exit;
}

// Inclui o arquivo de configuração do banco de dados
include_once('config.php');

// Processa o formulário quando enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];
    $imagens = [];

    // Diretório para salvar as imagens
    $uploadPath = 'uploads/';

    // Verifica se o diretório de uploads existe
    if (!file_exists($uploadPath)) {
        mkdir($uploadPath, 0777, true);
    }

    // Verifica se foram enviadas imagens
    if (!empty(array_filter($_FILES['imagens']['name']))) {
        $totalFiles = count($_FILES['imagens']['name']);

        // Loop through each file
        for ($i = 0; $i < $totalFiles; $i++) {
            $fileName = $_FILES['imagens']['name'][$i];
            $fileTmpName = $_FILES['imagens']['tmp_name'][$i];
            $fileType = $_FILES['imagens']['type'][$i];
            $fileError = $_FILES['imagens']['error'][$i];
            $fileSize = $_FILES['imagens']['size'][$i];

            // Verifica se o arquivo é uma imagem
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($fileExt, $allowedExtensions)) {
                // Gera um nome único para o arquivo
                $newFileName = uniqid('', true) . '.' . $fileExt;
                $filePath = $uploadPath . $newFileName;

                // Move o arquivo para o diretório de uploads
                if (move_uploaded_file($fileTmpName, $filePath)) {
                    $imagens[] = $filePath;
                } else {
                    echo "Erro ao fazer upload do arquivo $fileName.";
                }
            } else {
                echo "Erro: formato de arquivo não suportado para $fileName.";
            }
        }
    }

    // Salva no banco de dados se pelo menos uma imagem foi carregada
    if (!empty($imagens)) {
        $imagensStr = implode(',', $imagens);

        $sql = "INSERT INTO produtos (nome, tipo, valor, descricao, imagens) VALUES ('$nome', '$tipo', '$valor', '$descricao', '$imagensStr')";
        if ($conexao->query($sql) === TRUE) {
            echo "Produto cadastrado com sucesso.";
        } else {
            echo "Erro ao cadastrar o produto: " . $conexao->error;
        }
    } else {
        echo "Pelo menos uma imagem deve ser carregada.";
    }

    $conexao->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 63, 71));
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
        }

        #tela-produtos {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 800px;
            box-sizing: border-box;
        }

        input, textarea {
            width: 100%;
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        select {
            width: 100%;
            padding: 15px;
            border: none;
            outline: none;
            font-size: 15px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        .inputSubmit {
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            border-radius: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            width: 100%;
        }

        .inputSubmit:hover {
            background-color: deepskyblue;
        }

        a {
            position: absolute;
            top: 10px;
            left: 10px;
            text-decoration: none;
            color: white;
            font-size: 16px;
            background-color: rgba(0, 0, 0, 0.6);
            padding: 10px 20px;
            border-radius: 10px;
        }

        a:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }
    </style>
</head>
<body>
    <a href="sair.php">Sair</a>
    <div id="tela-produtos">
        <h1>Adicionar Produto</h1>
        <form action="processaProduto.php" method="POST" enctype="multipart/form-data">
            <input type="text" name="nome" placeholder="Nome do Produto" required>
            <select name="tipo" required>
                <option value="">Selecione o Tipo de Produto</option>
                <option value="calca">Calça</option>
                <option value="blusa">Blusa</option>
                <option value="camisa">Camisa</option>
                <option value="vestido">Vestido</option>
                <option value="casaco">Casaco</option>
                <option value="sapato">Sapato</option>
            </select>
            <input type="text" name="valor" placeholder="Valor" required>
            <textarea name="descricao" placeholder="Descrição" required></textarea>
            <input type="file" name="imagens[]" multiple accept="image/*">
            <input type="submit" class="inputSubmit" name="submit" value="Adicionar Produto">
        </form>
    </div>
</body>
</html>
