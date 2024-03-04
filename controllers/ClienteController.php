<?php

require_once '../Models/Cliente.php';

class ClienteController
{
    private $clienteModel;

    public function __construct()
    {
        $this->clienteModel = new Cliente();
    }

    public function showClientes()
    {
        return $this->clienteModel->getAllClientes();
    }

    public function addcliente($nome, $email,  $cpf, $data_nascimento, $endereco)
    {
        $this->clienteModel->addCliente($nome, $email,  $cpf, $data_nascimento, $endereco);
        header("Location: ../home.php");
    }
}
