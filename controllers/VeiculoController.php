<?php

require_once '../Models/Veiculo.php';

class VeiculoController
{
    private $veiculoModel;

    public function __construct()
    {
        $this->veiculoModel = new Veiculo();
    }

    public function showVeiculos()
    {
        return $this->veiculoModel->getAllVeiculos();
    }

    public function addVeiculo($modelo, $ano, $marca, $preco)
    {
        $this->veiculoModel->addVeiculo($modelo, $ano, $marca, $preco);
        header("Location: ../home.php");
    }
}
