<?php

require_once '../Models/Marca.php';

class MarcaController
{
    private $marcaModel;

    public function __construct()
    {
        $this->marcaModel = new Marca();
    }

    public function showMarcas()
    {
        return $this->marcaModel->getAllMarcas();
    }

    public function addMarca($nome)
    {
        $this->marcaModel->addMarca($nome);
        header("Location: ../home.php");
    }
}
