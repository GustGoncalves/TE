
<?php

function validarCadastro($dados)
{
    $erros = [];

    $nome = trim($dados['nome_completo'] ?? '');
    $email = trim($dados['email'] ?? '');
    $senha = $dados['senha'] ?? '';
    $idade = trim($dados['idade'] ?? '');
    $genero = $dados['genero'] ?? '';
    $cidade = trim($dados['cidade'] ?? '');
    $estado = $dados['estado'] ?? '';
    $termos = $dados['termos_uso'] ?? '';

    $generos_permitidos = [
        'masculino',
        'feminino',
        'prefiro_nao_opinar'
    ];

    $estados_permitidos = [
        'AC', 'AL', 'AP', 'AM', 'BA', 'CE',
        'DF', 'ES', 'GO', 'MA', 'MT', 'MS',
        'MG', 'PA', 'PB', 'PR', 'PE', 'PI',
        'RJ', 'RN', 'RS', 'RO', 'RR', 'SC',
        'SP', 'SE', 'TO'
    ];

    if ($nome === '') {
        $erros[] = 'O nome completo é obrigatório.';
    }

    if ($email === '') {
        $erros[] = 'O e-mail é obrigatório.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = 'O formato do e-mail é inválido.';
    }

    if ($senha === '') {
        $erros[] = 'A senha é obrigatória.';
    } elseif (strlen($senha) < 6) {
        $erros[] = 'A senha deve conter no mínimo 6 caracteres.';
    }

    if ($idade === '') {
        $erros[] = 'A idade é obrigatória.';
    } elseif (filter_var($idade, FILTER_VALIDATE_INT) === false) {
        $erros[] = 'A idade deve ser um número inteiro.';
    } elseif ((int)$idade < 10 || (int)$idade > 120) {
        $erros[] = 'A idade deve estar entre 10 e 120 anos.';
    }

    if (!in_array($genero, $generos_permitidos, true)) {
        $erros[] = 'Selecione uma opção de gênero válida.';
    }

    if ($cidade === '') {
        $erros[] = 'A cidade é obrigatória.';
    }

    if (!in_array($estado, $estados_permitidos, true)) {
        $erros[] = 'Selecione um estado válido.';
    }

    if ($termos !== 'aceito') {
        $erros[] = 'É obrigatório aceitar os termos de uso.';
    }

    return $erros;
}

?>
