<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['user_name'])) {
    header("Location: ../index.php");
    exit();
}

require_once '../controllers/ClienteController.php';

$clienteController = new ClienteController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $data_nascimento = $_POST['data_nascimento'];
    $endereco = $_POST['endereco'];

    $clienteController->addCliente($nome, $email,  $cpf, $data_nascimento, $endereco);
}

$clientes = json_decode($clienteController->showClientes());
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Lista Clientes</title>
    </head>
    <body>
        <h1>Lista Clientes</h1>
        <form action="clientes.php" method="post">
            <label for="cliente">Novo Cliente:</label>
            <input type="text" name="nome" required placeholder="nome">
            <input type="text" name="email" required placeholder="email">
            <input type="text" name="cpf" required placeholder="cpf">
            <input type="date" name="data_nascimento" required placeholder="data de nascimento">
            <input type="text" name="endereco" required placeholder="endereço">
            <button type="submit">Cadastrar</button>
        </form>

        <div class="clientes-grid">
            <div class="item grid-title">
                ID
            </div>
            <div class="item grid-title">
                Nome
            </div>
            <div class="item grid-title">
                Email
            </div>
            <div class="item grid-title">
                CPF
            </div>
            <div class="item grid-title">
                Data de nascimento
            </div>
            <div class="item grid-title">
                Endereço
            </div>
            <?php foreach ($clientes as $cliente): ?>               
                <div class="item">
                    <?php echo $cliente->id; ?>
                </div>
                <div class="item">
                    <?php echo $cliente->nome; ?>
                </div>
                <div class="item">
                    <?php echo $cliente->email; ?>
                </div>                
                <div class="item">
                    <?php echo $cliente->cpf; ?>
                </div>                
                <div class="item">
                    <?php echo $cliente->data_nascimento; ?>
                </div>                
                <div class="item">
                    <?php echo $cliente->endereco; ?>
                </div>                
            <?php endforeach; ?>
        </div>
    </body>
</html>
