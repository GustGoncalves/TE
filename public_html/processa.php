
<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit('Erro: formulário enviado de maneira inválida.');
}

$nome_completo = trim($_POST['nome_completo'] ?? '');
$email         = trim($_POST['email'] ?? '');
$senha         = $_POST['senha'] ?? '';
$idade         = trim($_POST['idade'] ?? '');
$genero        = $_POST['genero'] ?? '';
$cidade        = trim($_POST['cidade'] ?? '');
$estado        = $_POST['estado'] ?? '';
$termos_uso    = $_POST['termos_uso'] ?? '';

$generos_permitidos = [
    'masculino',
    'feminino',
    'prefiro_nao_opinar'
];

$estados_permitidos = [
    'AC',
    'AL',
    'AP',
    'AM',
    'BA',
    'CE',
    'DF',
    'ES',
    'GO',
    'MA',
    'MT',
    'MS',
    'MG',
    'PA',
    'PB',
    'PR',
    'PE',
    'PI',
    'RJ',
    'RN',
    'RS',
    'RO',
    'RR',
    'SC',
    'SP',
    'SE',
    'TO'
];

$erros = [];

if ($nome_completo === '') {
    $erros[] = 'O nome completo é obrigatório.';
}

if ($email === '') {
    $erros[] = 'O e-mail é obrigatório.';
}

if ($senha === '') {
    $erros[] = 'A senha é obrigatória.';
}

if ($idade === '') {
    $erros[] = 'A idade é obrigatória.';
}

if ($genero === '') {
    $erros[] = 'Selecione uma opção de gênero.';
}

if ($cidade === '') {
    $erros[] = 'A cidade é obrigatória.';
}

if ($estado === '') {
    $erros[] = 'Selecione um estado.';
}

if ($termos_uso !== 'aceito') {
    $erros[] = 'É obrigatório aceitar os termos de uso.';
}

if (
    $email !== '' &&
    filter_var($email, FILTER_VALIDATE_EMAIL) === false
) {
    $erros[] = 'O formato do e-mail é inválido.';
}

if (strlen($senha) < 6) {
    $erros[] = 'A senha deve conter no mínimo 6 caracteres.';
}

if (
    $idade !== '' &&
    filter_var($idade, FILTER_VALIDATE_INT) === false
) {
    $erros[] = 'A idade deve ser um número inteiro.';
} elseif (
    $idade !== '' &&
    ((int) $idade < 10 || (int) $idade > 120)
) {
    $erros[] = 'A idade deve estar entre 10 e 120 anos.';
}

if (
    $genero !== '' &&
    !in_array($genero, $generos_permitidos, true)
) {
    $erros[] = 'A opção de gênero selecionada é inválida.';
}

if (
    $estado !== '' &&
    !in_array($estado, $estados_permitidos, true)
) {
    $erros[] = 'O estado selecionado é inválido.';
}

if (!empty($erros)) {
    echo '<h2>Não foi possível realizar o cadastro.</h2>';
    echo '<p>Verifique os seguintes problemas:</p>';
    echo '<ul>';

    foreach ($erros as $erro) {
        echo '<li>' .
            htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') .
            '</li>';
    }

    echo '</ul>';
    echo '<a href="cadastro.html">Voltar ao formulário</a>';

    exit;
}

$senha_hash = md5($senha);

$valores_formularios = [
    'nome_completo' => $nome_completo,
    'email'         => $email,
    'senha'          => $senha_hash,
    'idade'          => (int) $idade,
    'genero'         => $genero,
    'cidade'         => $cidade,
    'estado'         => $estado,
    'termos_uso'     => $termos_uso
];

echo '<!DOCTYPE html>';
echo '<html lang="pt-BR">';
echo '<head>';
echo '<meta charset="UTF-8">';
echo '<title>Cadastro realizado</title>';
echo '</head>';
echo '<body>';

echo '<h1>Cadastro realizado com sucesso!</h1>';
echo '<p>Parabéns! Seus dados foram validados corretamente.</p>';

echo '<h2>Dados cadastrados:</h2>';

echo '<p><strong>Nome:</strong> ' .
    htmlspecialchars($valores_formularios['nome_completo'], ENT_QUOTES, 'UTF-8') .
    '</p>';

echo '<p><strong>E-mail:</strong> ' .
    htmlspecialchars($valores_formularios['email'], ENT_QUOTES, 'UTF-8') .
    '</p>';

echo '<p><strong>Idade:</strong> ' .
    $valores_formularios['idade'] .
    ' anos</p>';

echo '<p><strong>Gênero:</strong> ' .
    htmlspecialchars($valores_formularios['genero'], ENT_QUOTES, 'UTF-8') .
    '</p>';

echo '<p><strong>Cidade:</strong> ' .
    htmlspecialchars($valores_formularios['cidade'], ENT_QUOTES, 'UTF-8') .
    '</p>';

echo '<p><strong>Estado:</strong> ' .
    htmlspecialchars($valores_formularios['estado'], ENT_QUOTES, 'UTF-8') .
    '</p>';

echo '<p>Obrigado por realizar seu cadastro!</p>';

echo '<a href="cadastro.html">Voltar ao início</a>';

echo '</body>';
echo '</html>';

?>