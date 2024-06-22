<?php
// Verifica se o formulário foi submetido
if (isset($_POST['submit'])) {

    // Inclui o arquivo de configuração do banco de dados
    include_once('config.php');

    // Obtém os valores enviados pelo formulário via método POST
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    // Insere os dados na tabela 'adm'
    $result = mysqli_query($conexao, "INSERT INTO adm(nome, senha) 
        VALUES ('$nome', '$senha')");

    // Redireciona para a página home.php após a inserção
    header('Location: home.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario|Administrador</title>
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

        .box {
            background-color: rgba(0, 0, 0, 0.9);
            padding: 20px;
            border-radius: 15px;
            width: 90%;
            max-width: 400px;
            box-sizing: border-box;
        }

        fieldset {
            border: 3px solid;
            border-image-slice: 1;
            border-image-source: linear-gradient(45deg, rgb(20, 94, 252), rgb(0, 60, 255));
            padding: 0 10px 10px 10px;
        }

        legend {
            border: 3px solid;
            border-image-slice: 1;
            border-image-source: linear-gradient(45deg, rgb(20, 94, 252), rgb(0, 60, 255));
            text-align: center;
            padding: 10px;
            border-radius: 15px;
        }

        .inputBox {
            position: relative;
            margin-bottom: 20px;
        }

        .inputUser {
            background: none;
            border: none;
            outline: none;
            border-bottom: 1px solid white;
            width: 100%;
            letter-spacing: 2px;
            color: white;
            font-size: 15px;
            padding: 10px 0;
        }

        .labelinput {
            position: absolute;
            top: 10px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }

        .inputUser:focus~.labelinput,
        .inputUser:valid~.labelinput {
            top: -20px;
            font-size: 12px;
            color: cyan;
        }

        #submit {
            background-image: linear-gradient(45deg, rgb(20, 94, 252), rgb(0, 60, 255));
            padding: 10px;
            border-radius: 8px;
            width: 100%;
            border: none;
            font-size: 18px;
            cursor: pointer;
            color: white;
        }

        #submit:hover {
            background-image: linear-gradient(45deg, rgb(15, 80, 220), rgb(0, 50, 200));
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
    <a href="home.php">voltar</a>
    <div class="box">
        <form action="formadm.php" method="POST">
            <fieldset>
                <legend>
                    <b>Formulario de Cadastro de Administradores</b>
                </legend>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelinput">USUARIO</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelinput">Senha</label>
                </div>
                <input type="submit" id="submit" name="submit">
            </fieldset>
        </form>
    </div>
</body>

</html>