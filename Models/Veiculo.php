<?php

class Veiculo
{
    private $veiculos = [];

    public function getAllVeiculos()
    {
        include "../db_conn.php";

        $sql = "SELECT A.*, B.nome as marca FROM modelos as A join marcas as B where A.marca_id = B.id order by A.modelo";
        $result = mysqli_query($conn, $sql);

        while($row = $result->fetch_assoc()) {
            $this->veiculos[] = $row;
        }

        return json_encode($this->veiculos);
    }

    public function addVeiculo($modelo, $ano, $marcaId, $preco)
    {
        include "../db_conn.php";

        $sql = "INSERT INTO modelos (modelo, ano, marca_id, preco) values ('$modelo', '$ano', '$marcaId', '$preco')";
        $result = mysqli_query($conn, $sql);

        return json_encode($result);
    }
}
