<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['user_name'])) {
    header("Location: ../index.php");
    exit();
}

require_once '../controllers/VendaController.php';
require_once '../controllers/VeiculoController.php';
require_once '../controllers/ClienteController.php';
require_once '../controllers/VendedorController.php';

$vendaController = new VendaController();
$veiculoController = new VeiculoController();
$clienteController = new ClienteController();
$vendedorController = new VendedorController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modelo = $_POST['modelo'];
    $cliente = $_POST['cliente'];
    $data = $_POST['data'];
    $vendedor = $_POST['vendedor'];

    $vendaController->addVenda($modelo, $cliente, $data, $vendedor);
}

$vendas = json_decode($vendaController->showVendas());
$veiculos = json_decode($veiculoController->showVeiculos());
$clientes = json_decode($clienteController->showClientes());
$vendedores = json_decode($vendedorController->showVendedores());
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Lista Vendas</title>
    </head>
    <body>
        <h1>Lista Vendas</h1>
        <form action="vendas.php" method="post">
            <label for="venda">Novo Venda</label>
            <select name="modelo" required>
                <?php foreach ($veiculos as $veiculo): ?>
                    <option value="<?php echo $veiculo->id; ?>"><?php echo $veiculo->modelo; ?></option>
                <?php endforeach; ?>
            </select>
            <select name="cliente" required>
                <?php foreach ($clientes as $cliente): ?>
                    <option value="<?php echo $cliente->id; ?>"><?php echo $cliente->nome; ?></option>
                <?php endforeach; ?>
            </select>
            <input type="date" name="data" required placeholder="data">
            <select name="vendedor" required>
                <?php foreach ($vendedores as $vendedor): ?>
                    <option value="<?php echo $vendedor->id; ?>"><?php echo $vendedor->nome; ?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Cadastrar</button>
        </form>
        
        <div class="vendas-grid">
            <div class="item grid-title">
                ID
            </div>
            <div class="item grid-title">
                Modelo
            </div>
            <div class="item grid-title">
                Cliente
            </div>
            <div class="item grid-title">
                Vendedor
            </div>
            <div class="item grid-title">
                Data
            </div>
            <?php foreach ($vendas as $venda): ?>               
                <div class="item">
                    <?php echo $venda->id; ?>
                </div>
                <div class="item">
                    <?php echo $venda->modelo; ?>
                </div>              
                <div class="item">
                    <?php echo $venda->cliente; ?>
                </div>              
                <div class="item">
                    <?php echo $venda->vendedor; ?>
                </div>              
                <div class="item">
                    <?php echo $venda->data; ?>
                </div>              
            <?php endforeach; ?>
        </div>
    </body>
</html>
