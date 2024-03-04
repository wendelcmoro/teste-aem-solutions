<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['user_name'])) {
    header("Location: ../index.php");
    exit();
}

require_once '../controllers/VeiculoController.php';
require_once '../controllers/MarcaController.php';

$veiculoController = new VeiculoController();
$marcaController = new MarcaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modelo = $_POST['modelo'];
    $ano = $_POST['ano'];
    $marca = $_POST['marca'];
    $preco = $_POST['preco'];

    $veiculoController->addVeiculo($modelo, $ano, $marca, $preco);
}

$veiculos = json_decode($veiculoController->showVeiculos());
$marcas = json_decode($marcaController->showMarcas());
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Lista Veículos</title>
    </head>
    <body>
        <h1>Lista Veículos</h1>
        <form action="veiculos.php" method="post">
            <label for="vendedor">Novo Veículo:</label>
            <input type="text" name="modelo" required placeholder="modelo">
            <input type="number" name="ano" required placeholder="ano">
            <select name="marca" required>
                <?php foreach ($marcas as $marca): ?>
                    <option value="<?php echo $marca->id; ?>"><?php echo $marca->nome; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="number" name="preco" required placeholder="preço">
            <button type="submit">Cadastrar</button>
        </form>

        <div class="veiculos-grid">
            <div class="item grid-title">
                ID
            </div>
            <div class="item grid-title">
                Modelo
            </div>
            <div class="item grid-title">
                Ano
            </div>
            <div class="item grid-title">
                Preço
            </div>
            <div class="item grid-title">
                Marca
            </div>
            <?php foreach ($veiculos as $veiculo): ?>             
                <div class="item">
                    <?php echo $veiculo->id; ?>
                </div>
                <div class="item">
                    <?php echo $veiculo->modelo; ?>
                </div>              
                <div class="item">
                    <?php echo $veiculo->ano; ?>
                </div>              
                <div class="item">
                    <?php echo $veiculo->preco; ?>
                </div>              
                <div class="item">
                    <?php echo $veiculo->marca; ?>
                </div>              
            <?php endforeach; ?>
        </div>
    </body>
</html>
