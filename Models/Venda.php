<?php

class Venda
{
    private $vendas = [];

    public function getAllVendas()
    {
        include "../db_conn.php";

        $sql = "SELECT A.id, A.data, B.modelo, C.nome as cliente, D.nome as vendedor
                FROM vendas as A 
                join modelos as B on A.modelo_id = B.id
                join clientes as C on A.cliente_id = C.id
                join vendedores as D on A.vendedor_id = D.id
                order by A.data desc";

        $result = mysqli_query($conn, $sql);

        while($row = $result->fetch_assoc()) {
            $this->vendas[] = $row;
        }

        return json_encode($this->vendas);
    }

    public function addVenda($modelo, $cliente, $data, $vendedor)
    {
        include "../db_conn.php";

        $sql = "INSERT INTO vendas (modelo_id, cliente_id, data, vendedor_id) values ('$modelo', '$cliente', '$data', '$vendedor')";
        $result = mysqli_query($conn, $sql);

        return json_encode($result);
    }
}
