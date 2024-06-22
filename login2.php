<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITE|TRAJANDO</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, rgb(20, 147, 220), rgb(17, 63, 71));
            text-align: center;
            color: white;
            margin: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .box {
            background-color: rgba(0, 0, 0, 0.6);
            padding: 30px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 90%;
            max-width: 400px;
            box-sizing: border-box;
        }

        a {
            text-decoration: none;
            color: white;
            border: 3px solid blue;
            border-radius: 10px;
            padding: 10px;
            display: block;
        }

        a:hover {
            background-color: dodgerblue;
        }

        .voltar {
            position: absolute;
            top: 10px;
            left: 10px;
        }
    </style>
</head>

<body>
    <a href="home.php" class="voltar">voltar</a>
    <h1>Bem vindo!</h1>
    <div class="box">
        <a href="login.php">Cliente</a>
        <a href="colaborador.php">Colaborador</a>
        <a href="adm.php">Administrador</a>
    </div>  
</body>

</html>