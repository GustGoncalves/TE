<?php

if (!isset($_COOKIE["nome_usuario"])) {
    header("Location: login.html");
    exit;
}

$usuario = htmlspecialchars(
    $_COOKIE["nome_usuario"],
    ENT_QUOTES,
    "UTF-8"
);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home - Sistema IF</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>

        body {
            margin: 0;
            background: #f1f5f9;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background: #064e3b;
            padding: 18px 40px;
        }

        .navbar-brand {
            color: white;
            font-weight: bold;
            font-size: 22px;
        }

        .navbar-brand:hover {
            color: #d1fae5;
        }

        .welcome {
            min-height: 75vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 30px;
        }

        .welcome-card {
            background: white;
            padding: 55px 40px;
            border-radius: 20px;
            max-width: 650px;
            width: 100%;
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
        }

        .welcome-card h1 {
            color: #065f46;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .welcome-card p {
            color: #64748b;
            font-size: 17px;
        }

        .icon {
            font-size: 55px;
            margin-bottom: 20px;
        }

        .btn-sair {
            background: #dc2626;
            color: white;
            padding: 12px 35px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
        }

        .btn-sair:hover {
            background: #991b1b;
            color: white;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #94a3b8;
        }

    </style>

</head>

<body>

    <nav class="navbar">

        <div class="container">

            <a class="navbar-brand" href="home.php">
                SISTEMA IF
            </a>

            <span class="text-white">
                Área do usuário
            </span>

        </div>

    </nav>

    <main class="welcome">

        <div class="welcome-card">

            <div class="icon">
                👋
            </div>

            <h1>
                Seja bem-vindo(a), <?php echo $usuario; ?>!
            </h1>

            <p>
                É muito bom ter você aqui!
                <br>
                Você realizou o login com sucesso.
            </p>

            <p>
                Aproveite o ambiente do nosso sistema.
            </p>

            <a href="logout.php" class="btn-sair">
                Sair do sistema
            </a>

        </div>

    </main>

    <footer>
        © 2026 - Sistema IF | Instituto Federal
    </footer>

</body>

</html>