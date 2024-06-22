<?php
// Verifica se o formulário foi submetido
if (isset($_POST['submit'])) {

    // Inclui o arquivo de configuração do banco de dados
    include_once('config.php');

    // Obtém os valores enviados pelo formulário via método POST
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $genero = $_POST['genero'];
    $data_nasc = $_POST['data_nascimento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $endereco = $_POST['endereco'];

    // Insere os dados na tabela 'usuarios'
    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, senha, email, telefone, sexo, data_nasc, cidade, estado, endereço) 
        VALUES ('$nome', '$senha', '$email', '$telefone', '$genero', '$data_nasc', '$cidade', '$estado', '$endereco')");

    // Redireciona para a página de login (login.php) após a inserção
    header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario|TRAJANDO</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 63, 71));
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
        }

        .box {
            background-color: rgba(0, 0, 0, 0.9);
            padding: 20px;
            border-radius: 15px;
            width: 90%;
            max-width: 500px;
            box-sizing: border-box;
            text-align: center;
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
            padding: 10px;
            border-radius: 15px;
            text-align: center;
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

        #data_nascimento {
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
            background-color: white;
            color: black;
            width: calc(100% - 16px);
            /* Adjust for padding */
            margin-top: 10px;
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

        .radioGroup {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
        }

        .radioGroup label {
            margin-left: 5px;
        }
    </style>
</head>

<body>
    <a href="home.php">voltar</a>
    <div class="box">
        <form action="formulario.php" method="POST">
            <fieldset>
                <legend>
                    <b>Formulario de Cadastro</b>
                </legend>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelinput">Nome Completo</label>
                </div>
                <div class="inputBox">
                    <input type="password" name="senha" id="senha" class="inputUser" required>
                    <label for="senha" class="labelinput">Senha</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelinput">E-mail</label>
                </div>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelinput">Telefone</label>
                </div>
                <div class="radioGroup">
                    <label for="feminino">
                        <input type="radio" id="feminino" name="genero" value="feminino" required> Feminino
                    </label>
                    <label for="masculino">
                        <input type="radio" id="masculino" name="genero" value="masculino" required> Masculino
                    </label>
                    <label for="outro">
                        <input type="radio" id="outro" name="genero" value="outro" required> Outro
                    </label>
                </div>
                <br>
                <label for="data_nascimento"><b>Data de Nascimento:</b></label>
                <input type="date" name="data_nascimento" id="data_nascimento" required>
                <br><br><br>
                <div class="inputBox">
                    <input type="text" name="cep" id="cep" class="inputUser" required>
                    <label for="cep" class="labelinput">CEP</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="rua" id="rua" class="inputUser" required>
                    <label for="rua" class="labelinput">Rua + Numero</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="cidade" id="cidade" class="inputUser" required>
                    <label for="cidade" class="labelinput">Cidade</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="estado" id="estado" class="inputUser" required>
                    <label for="estado" class="labelinput">Estado</label>
                </div>
                <div class="inputBox">
                    <input type="text" name="endereco" id="endereco" class="inputUser" required>
                    <label for="endereco" class="labelinput">Endereço</label>
                </div>
                <input type="submit" id="submit" name="submit">
            </fieldset>
        </form>
    </div>
    <script>


        document.getElementById('cep').addEventListener('blur', function () {
            const cep = this.value.replace(/\D/g, '');
            if (cep.length !== 8) return;

            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => response.json())
                .then(data => {
                    if (data.erro) {
                        alert('CEP não encontrado!');
                        return;
                    }

                    document.getElementById('rua').value = data.logradouro;
                    document.getElementById('cidade').value = data.localidade;
                    document.getElementById('estado').value = data.uf;
                })
                .catch(error => console.error('Erro ao buscar CEP:', error));
        });
    </script>
</body>

</html>