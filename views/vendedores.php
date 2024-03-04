<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['user_name'])) {
    header("Location: ../index.php");
    exit();
}

require_once '../controllers/VendedorController.php';

$vendedorController = new VendedorController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $vendedorController->addVendedor($name, $email);
}

$vendedores = json_decode($vendedorController->showVendedores());
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lista Vendedores</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <h1>Lista Vendedores</h1>
        <form action="vendedores.php" method="post">
            <label for="vendedor">Novo Vendedor:</label>
            <input type="text" name="nome" required placeholder="nome">
            <input type="text" name="email" required placeholder="email">
            <button type="submit">Cadastrar</button>
        </form>

        <div class="vendedores-grid">
            <div class="item grid-title">
                ID
            </div>
            <div class="item grid-title">
                Nome
            </div>
            <div class="item grid-title">
                Email
            </div>
            <?php foreach ($vendedores as $vendedor): ?>                
                <div class="item">
                    <?php echo $vendedor->id; ?>
                </div>
                <div class="item">
                <?php echo $vendedor->nome; ?>
                </div>
                <div class="item">
                    <?php echo $vendedor->email; ?>
                </div>                
            <?php endforeach; ?>
        </div>
    </body>
</html>
