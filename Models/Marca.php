<?php

class Marca
{
    private $marcas = [];

    public function getAllMarcas()
    {
        include "../db_conn.php";

        $sql = "SELECT * FROM marcas";
        $result = mysqli_query($conn, $sql);

        while($row = $result->fetch_assoc()) {
            $this->marcas[] = $row;
        }

        return json_encode($this->marcas);
    }

    public function addMarca($nome)
    {
        include "../db_conn.php";

        $sql = "INSERT INTO marcas (nome) values ('$nome')";
        $result = mysqli_query($conn, $sql);

        return json_encode($result);
    }
}
