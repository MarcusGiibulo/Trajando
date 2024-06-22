<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
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
            text-align: center;
        }

        #tela-login {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 15px;
            width: 90%;
            max-width: 400px;
            box-sizing: border-box;
        }

        input {
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
    <a href="login2.php">voltar</a>
    <div id="tela-login">
        <h1>Login</h1>
        <form action="testLogin.php" method="POST">
            <input type="text" name="email" placeholder="E-mail">
            <input type="password" name="senha" placeholder="Senha">
            <input type="submit" class="inputSubmit" name="submit" value="Enviar">
        </form>
    </div>
</body>
</html>