<?php

setcookie(
    "nome_usuario",
    "",
    time() - 3600,
    "/"
);

header("Location: home.php");
exit;

?>