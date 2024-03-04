<?php

require_once '../Models/Venda.php';

class VendaController
{
    private $vendaModel;

    public function __construct()
    {
        $this->vendaModel = new Venda();
    }

    public function showVendas()
    {
        return $this->vendaModel->getAllVendas();
    }

    public function addVenda($modelo, $cliente, $data, $vendedor)
    {
        $this->vendaModel->addVenda($modelo, $cliente, $data, $vendedor);
        header("Location: ../home.php");
    }
}
