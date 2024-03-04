<?php

class Cliente
{
    private $clientes = [];

    public function getAllClientes()
    {
        include "../db_conn.php";

        $sql = "SELECT * FROM clientes order by nome";
        $result = mysqli_query($conn, $sql);

        while($row = $result->fetch_assoc()) {
            $this->clientes[] = $row;
        }

        return json_encode($this->clientes);
    }

    public function addCliente($nome, $email,  $cpf, $data_nascimento, $endereco)
    {
        include "../db_conn.php";

        $sql = "INSERT INTO clientes (nome, email, cpf, data_nascimento, endereco) values ('$nome', '$email', '$cpf', '$data_nascimento', '$endereco')";
        $result = mysqli_query($conn, $sql);

        return json_encode($result);
    }
}
