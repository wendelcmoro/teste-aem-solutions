<?php

require_once '../Models/Vendedor.php';

class VendedorController
{
    private $vendedorModel;

    public function __construct()
    {
        $this->vendedorModel = new Vendedor();
    }

    public function showVendedores()
    {
        return $this->vendedorModel->getAllVendedores();
    }

    public function addVendedor($nome, $email)
    {
        $this->vendedorModel->addVendedor($nome, $email);
        header("Location: ../home.php");
    }
}
