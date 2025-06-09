<?php
class ContaBancaria {
    public string $titular;
    protected float $saldo = 0;
    private string $senha;

    public function __construct(string $titular, string $senha) {
        $this->titular = $titular;
        $this->senha = $senha;
    }

    public function depositar(float $valor): bool {
        if ($valor > 0) {
            $this->saldo += $valor;
            return true;
        }
        return false;
    }

    public function sacar(float $valor, string $senha): bool {
        if ($senha === $this->senha && $valor > 0 && $valor <= $this->saldo) {
            $this->saldo -= $valor;
            return true;
        }
        return false;
    }

    public function verSaldo(string $senha): ?float {
        return $senha === $this->senha ? $this->saldo : null;
    }
}

session_start();

if (!isset($_SESSION['conta'])) {
    $_SESSION['conta'] = serialize(new ContaBancaria("Usuário", "1234"));
}

$conta = unserialize($_SESSION['conta']);
$mensagem = "";
$saldoVisivel = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['action'] ?? '';

    switch ($acao) {
        case 'criar':
            $titular = trim($_POST['titular'] ?? '');
            $senha = $_POST['senha'] ?? '';
            if ($titular !== '' && $senha !== '') {
                $conta = new ContaBancaria($titular, $senha);
                $_SESSION['conta'] = serialize($conta);
                $mensagem = "Conta criada para <b>" . htmlspecialchars($titular) . "</b>.";
            } else {
                $mensagem = "Preencha os dados para criar a conta.";
            }
            break;

        case 'depositar':
            $valor = floatval($_POST['valor'] ?? 0);
            if ($conta->depositar($valor)) {
                $mensagem = "Depósito de R$" . number_format($valor, 2, ',', '.') . " efetuado.";
            } else {
                $mensagem = "Valor inválido para depósito.";
            }
            break;

        case 'sacar':
            $valor = floatval($_POST['valor'] ?? 0);
            $senha = $_POST['senha'] ?? '';
            if ($conta->sacar($valor, $senha)) {
                $mensagem = "Saque de R$" . number_format($valor, 2, ',', '.') . " efetuado.";
            } else {
                $mensagem = "Falha no saque: senha incorreta, saldo insuficiente ou valor inválido.";
            }
            break;

        case 'saldo':
            $senha = $_POST['senha'] ?? '';
            $saldo = $conta->verSaldo($senha);
            if (is_null($saldo)) {
                $mensagem = "Senha incorreta para consulta de saldo.";
            } else {
                $saldoVisivel = number_format($saldo, 2, ',', '.');
            }
            break;
    }
    $_SESSION['conta'] = serialize($conta);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Conta Bancária Simples</title>
<style>
    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
            Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
        background: #fff;
        color: #6b7280;
        display: flex;
        justify-content: center;
        padding: 3rem 1rem;
        margin: 0;
    }
    main {
        max-width: 420px;
        width: 100%;
        background: #f9fafb;
        padding: 2rem;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    h1 {
        font-weight: 700;
        font-size: 2.5rem;
        color: #111827;
        margin-bottom: 1rem;
        text-align: center;
    }
    form {
        margin-bottom: 1.5rem;
    }
    label {
        display: block;
        margin-bottom: 0.25rem;
        font-weight: 600;
        color: #374151;
        font-size: 0.9rem;
    }
    input[type="text"],
    input[type="password"],
    input[type="number"] {
        width: 100%;
        padding: 0.5rem 0.75rem;
        font-size: 1rem;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        margin-bottom: 0.75rem;
        box-sizing: border-box;
        color: #111827;
    }
    button {
        width: 100%;
        padding: 0.6rem 0;
        font-weight: 600;
        font-size: 1rem;
        border: none;
        border-radius: 8px;
        background: #111827;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    button:hover {
        background: #2563eb;
    }
    .mensagem {
        background: #e0f2fe;
        color: #0369a1;
        padding: 0.75rem 1rem;
        border-radius: 8px;
        margin-bottom: 1rem;
        font-weight: 600;
        text-align: center;
    }
    .saldo {
        font-weight: 700;
        font-size: 1.5rem;
        text-align: center;
        margin-top: -1rem;
        margin-bottom: 1rem;
        color: #111827;
    }
    .titular {
        color: #374151;
        font-weight: 600;
        text-align: center;
        margin-bottom: 2rem;
        font-size: 1rem;
    }
</style>
</head>
<body>
<main>
    <h1>Conta Bancária</h1>

    <?php if ($mensagem !== ""): ?>
        <div class="mensagem"><?= $mensagem ?></div>
    <?php endif; ?>

    <div class="titular">Titular: <b><?= htmlspecialchars($conta->titular) ?></b></div>

    <form method="post" autocomplete="off">
        <label for="titular">Nome do titular</label>
        <input type="text" id="titular" name="titular" placeholder="Nome completo" required>
        <label for="senhaCriar">Senha</label>
        <input type="password" id="senhaCriar" name="senha" placeholder="Senha" required>
        <button type="submit" name="action" value="criar">Criar Conta</button>
    </form>

    <form method="post" autocomplete="off">
        <label for="valorDepositar">Valor para depositar (R$)</label>
        <input type="number" id="valorDepositar" name="valor" min="0.01" step="0.01" required>
        <button type="submit" name="action" value="depositar">Depositar</button>
    </form>

    <form method="post" autocomplete="off">
        <label for="valorSacar">Valor para sacar (R$)</label>
        <input type="number" id="valorSacar" name="valor" min="0.01" step="0.01" required>
        <label for="senhaSacar">Senha</label>
        <input type="password" id="senhaSacar" name="senha" required>
        <button type="submit" name="action" value="sacar">Sacar</button>
    </form>

    <form method="post" autocomplete="off" style="margin-bottom:0;">
        <label for="senhaSaldo">Consultar saldo (senha)</label>
        <input type="password" id="senhaSaldo" name="senha" required>
        <button type="submit" name="action" value="saldo">Ver Saldo</button>
    </form>

    <?php if (!is_null($saldoVisivel)): ?>
        <div class="saldo">Saldo: R$<?= $saldoVisivel ?></div>
    <?php endif; ?>
</main>
</body>
</html>
