<?php

$nome             = $_POST['nome'];
$data_nascimento  = $_POST['data_nascimento'];
$email             = $_POST['email'];

print_r("<h3>Os dados recebidos foram:</h3>");
print_r("<b>Nome:</b> {$nome}. <br>");
print_r("<b>Data Nascimento:</b> {$data_nascimento}.<br>");
print_r("<b>E-mail:</b> {$email}.<br>");
