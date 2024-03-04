<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['user_name'])) {
    header("Location: ../index.php");
    exit();
}

require_once '../controllers/MarcaController.php';

$marcaController = new MarcaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];

    $marcaController->addMarca($nome);
}

$marcas = json_decode($marcaController->showMarcas());
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Lista Marcas</title>
    </head>
    <body>
        <h1>Lista Marcas</h1>
        <form action="marcas.php" method="post">
            <label for="marca">Nova Marca:</label>
            <input type="text" name="nome" required placeholder="nome">
            <button type="submit">Cadastrar</button>
        </form>

        <div class="marcas-grid">
            <div class="item grid-title">
                ID
            </div>
            <div class="item grid-title">
                Nome
            </div>
            <?php foreach ($marcas as $marca): ?>               
                <div class="item">
                    <?php echo $marca->id; ?>
                </div>
                <div class="item">
                    <?php echo $marca->nome; ?>
                </div>              
            <?php endforeach; ?>
        </div>
    </body>
</html>
