<?php

try {

    if ($_SERVER["REQUEST_METHOD"] != "POST") {
        throw new Exception("Acesso inválido!");
    }

    $usuario = trim($_POST["usuario"] ?? "");
    $senha = $_POST["senha"] ?? "";

    if (empty($usuario) || empty($senha)) {
        throw new Exception("Preencha todos os campos!");
    }

    define("SENHA_CORRETA", "08d73df56eabed0bb5dec9346fd8570b");

    $senha_criptografada = md5($senha);

    if ($senha_criptografada === SENHA_CORRETA) {

        setcookie(
            "nome_usuario",
            $usuario,
            time() + 3600,
            "/"
        );

        header("Location: home.php");
        exit;

    } else {

        throw new Exception("Usuário ou senha incorretos!");

    }

} catch (Exception $erro) {

    echo "<script>
        alert('" . addslashes($erro->getMessage()) . "');
        window.location.href = 'login.html';
    </script>";

    exit;
}

?>