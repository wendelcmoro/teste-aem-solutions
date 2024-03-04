<?php 
    session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>
        
        <!DOCTYPE html>
        <html>
            <head>
                <title>HOME</title>
                <link rel="stylesheet" type="text/css" href="style.css">
            </head>
            
            <body>
                <h1>Olá, <?php echo $_SESSION['name']; ?></h1>
                <a href="views/vendedores.php">Cadastro de vendedores </a>
                <a href="views/clientes.php">Cadastro de clientes </a>
                <a href="views/marcas.php">Cadastro de marcas </a>
                <a href="views/veiculos.php">Cadastro de modelos </a>
                <a href="views/vendas.php">Gerar venda veículo</a>
                <a class="logout-button" href="logout.php">Logout</a>
            </body>
        
        </html>
    
    <?php 
} else{
    header("Location: index.php");
    exit();
}
?>
