<?php

require_once 'validador.php';

// Limpar todos os cookies de cadastro
if (isset($_GET['limpar_cookies'])) {

    foreach ($_COOKIE as $nome => $valor) {

        setcookie(
            $nome,
            '',
            time() - 3600,
            '/'
        );
    }

    header('Location: cadastro.php');
    exit;
}

$erros = [];
$sucesso = isset($_GET['sucesso']);

function escapar($valor)
{
    return htmlspecialchars(
        (string)$valor,
        ENT_QUOTES,
        'UTF-8'
    );
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $erros = validarCadastro($_POST);

    if (empty($erros)) {

        $valores_formularios = [
            'nome'         => trim($_POST['nome_completo']),
            'email'        => trim($_POST['email']),
            'idade'        => (int)$_POST['idade'],
            'genero'       => $_POST['genero'],
            'cidade'       => trim($_POST['cidade']),
            'estado'       => $_POST['estado'],
            'termos_uso'   => $_POST['termos_uso']
        ];

        $nome_cookie = preg_replace(
            '/[^a-zA-Z0-9_-]/',
            '_',
            $valores_formularios['nome']
        );

        $nome_cookie = trim($nome_cookie, '_');

        if ($nome_cookie === '') {
            $nome_cookie = 'usuario';
        }

        setcookie(
            $nome_cookie,
            serialize($valores_formularios),
            [
                'expires' => time() + (86400 * 30),
                'path' => '/',
                'httponly' => true,
                'secure' => !empty($_SERVER['HTTPS']),
                'samesite' => 'Lax'
            ]
        );

        header('Location: cadastro.php?sucesso=1');
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro de Usuário - IFNMG</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

    <style>
        body {
            background-color: #f1f4f2;
        }

        .container-principal {
            max-width: 750px;
            margin: 40px auto;
        }

        .card {
            border: none;
            border-radius: 15px;
        }

        .logo-ifnmg {
            max-width: 100px;
            width: 100%;
            height: auto;
            margin-bottom: 15px;
        }

        .titulo {
            color: #198754;
            font-weight: bold;
        }

        .campo {
            margin-bottom: 18px;
        }

        pre {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            overflow-x: auto;
            border: 1px solid #dee2e6;
        }
    </style>

</head>

<body>

    <div class="container container-principal">

        <div class="card shadow p-4 p-md-5">

            <header class="text-center mb-4">

                <img
                    src="img/logo IF.png"
                    alt="Logo do IFNMG"
                    class="logo-ifnmg">

                <h1 class="titulo h3">
                    Formulário de Cadastro
                </h1>

                <p class="text-muted">
                    Preencha os campos abaixo para realizar seu cadastro.
                </p>

            </header>


            <?php if (!empty($erros)): ?>

                <div class="alert alert-danger">

                    <h5>Não foi possível realizar o cadastro!</h5>

                    <ul class="mb-0">

                        <?php foreach ($erros as $erro): ?>

                            <li><?= escapar($erro) ?></li>

                        <?php endforeach; ?>

                    </ul>

                </div>

            <?php endif; ?>


            <?php if ($sucesso): ?>

                <div class="alert alert-success text-center">

                    <h2 class="h4">
                        Cadastro realizado com sucesso!
                    </h2>

                    <p class="mb-0">
                        Seus dados foram validados e o cookie foi criado.
                    </p>

                </div>

                <h3 class="h5 titulo">
                    Cookies cadastrados:
                </h3>

                <p>
                    Resultado da variável $_COOKIE:
                </p>

                <pre><?php
                        echo escapar(print_r($_COOKIE, true));
                        ?></pre>

                <div class="d-grid gap-2">

                    <a
                        href="cadastro.php"
                        class="btn btn-success">
                        Novo cadastro
                    </a>

                </div>


            <?php else: ?>


                <form action="cadastro.php" method="POST">

                    <div class="campo">

                        <label for="nome_completo" class="form-label">
                            Nome completo:
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="nome_completo"
                            id="nome_completo"
                            value="<?= escapar($_POST['nome_completo'] ?? '') ?>"
                            required>

                    </div>


                    <div class="campo">

                        <label for="email" class="form-label">
                            E-mail:
                        </label>

                        <input
                            type="email"
                            class="form-control"
                            name="email"
                            id="email"
                            value="<?= escapar($_POST['email'] ?? '') ?>"
                            required>

                    </div>


                    <div class="campo">

                        <label for="senha" class="form-label">
                            Senha:
                        </label>

                        <input
                            type="password"
                            class="form-control"
                            name="senha"
                            id="senha"
                            minlength="6"
                            required>

                        <div class="form-text">
                            A senha deve possuir no mínimo 6 caracteres.
                        </div>

                    </div>


                    <div class="campo">

                        <label for="idade" class="form-label">
                            Idade:
                        </label>

                        <input
                            type="number"
                            class="form-control"
                            name="idade"
                            id="idade"
                            min="10"
                            max="120"
                            step="1"
                            value="<?= escapar($_POST['idade'] ?? '') ?>"
                            required>

                    </div>


                    <div class="campo">

                        <label for="genero" class="form-label">
                            Gênero:
                        </label>

                        <select
                            class="form-select"
                            name="genero"
                            id="genero"
                            required>

                            <option value="">Selecione</option>

                            <option value="masculino"
                                <?= (($_POST['genero'] ?? '') === 'masculino') ? 'selected' : '' ?>>
                                Masculino
                            </option>

                            <option value="feminino"
                                <?= (($_POST['genero'] ?? '') === 'feminino') ? 'selected' : '' ?>>
                                Feminino
                            </option>

                            <option value="prefiro_nao_opinar"
                                <?= (($_POST['genero'] ?? '') === 'prefiro_nao_opinar') ? 'selected' : '' ?>>
                                Prefiro não opinar
                            </option>

                        </select>

                    </div>


                    <div class="campo">

                        <label for="cidade" class="form-label">
                            Cidade:
                        </label>

                        <input
                            type="text"
                            class="form-control"
                            name="cidade"
                            id="cidade"
                            value="<?= escapar($_POST['cidade'] ?? '') ?>"
                            required>

                    </div>


                    <div class="campo">

                        <label for="estado" class="form-label">
                            Estado:
                        </label>

                        <select
                            class="form-select"
                            name="estado"
                            id="estado"
                            required>

                            <option value="">Selecione o estado</option>

                            <?php

                            $estados = [
                                'AC' => 'Acre',
                                'AL' => 'Alagoas',
                                'AP' => 'Amapá',
                                'AM' => 'Amazonas',
                                'BA' => 'Bahia',
                                'CE' => 'Ceará',
                                'DF' => 'Distrito Federal',
                                'ES' => 'Espírito Santo',
                                'GO' => 'Goiás',
                                'MA' => 'Maranhão',
                                'MT' => 'Mato Grosso',
                                'MS' => 'Mato Grosso do Sul',
                                'MG' => 'Minas Gerais',
                                'PA' => 'Pará',
                                'PB' => 'Paraíba',
                                'PR' => 'Paraná',
                                'PE' => 'Pernambuco',
                                'PI' => 'Piauí',
                                'RJ' => 'Rio de Janeiro',
                                'RN' => 'Rio Grande do Norte',
                                'RS' => 'Rio Grande do Sul',
                                'RO' => 'Rondônia',
                                'RR' => 'Roraima',
                                'SC' => 'Santa Catarina',
                                'SP' => 'São Paulo',
                                'SE' => 'Sergipe',
                                'TO' => 'Tocantins'
                            ];

                            foreach ($estados as $sigla => $nome):

                            ?>

                                <option
                                    value="<?= escapar($sigla) ?>"
                                    <?= (($_POST['estado'] ?? '') === $sigla) ? 'selected' : '' ?>>
                                    <?= escapar($nome) ?>
                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>


                    <div class="form-check mb-4">

                        <input
                            type="checkbox"
                            class="form-check-input"
                            name="termos_uso"
                            id="termos_uso"
                            value="aceito"
                            <?= (($_POST['termos_uso'] ?? '') === 'aceito') ? 'checked' : '' ?>
                            required>

                        <label
                            class="form-check-label"
                            for="termos_uso">
                            Li e aceito os termos de uso.
                        </label>

                    </div>


                    <div class="d-grid gap-2">

                        <button
                            type="submit"
                            class="btn btn-success btn-lg">
                            Cadastrar
                        </button>

                        <button
                            type="reset"
                            class="btn btn-outline-secondary">
                            Limpar formulário
                        </button>



                    </div>

                </form>

            <?php endif; ?>


            <footer class="text-center mt-4">

                <small class="text-muted">
                    IFNMG - Instituto Federal do Norte de Minas Gerais
                </small>

            </footer>

        </div>

    </div>

</body>

</html>