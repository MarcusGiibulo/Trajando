<!DOCTYPE html>
<html lang="en">

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
        }

        a {
            text-decoration: none;
            color: white;
            border: 3px solid blue;
            border-radius: 10px;
            padding: 10px;
            margin: 10px;
            display: inline-block;
            transition: background-color 0.3s;
        }

        a:hover {
            background-color: dodgerblue;
        }
    </style>
</head>

<body>
    <div>
        <h1>Bem vindo!</h1>
    </div>
    <div class="box">
        <a href="login2.php">Login</a>
        <a href="escolhaCadastro.php">Cadastre-se</a>
    </div>
</body>

</html>