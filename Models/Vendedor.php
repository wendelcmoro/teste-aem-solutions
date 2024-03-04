<?php 

class Vendedor
{
    private $vendedores = [];

    public function getAllVendedores()
    {
        include "../db_conn.php";

        $sql = "SELECT * FROM vendedores order by nome";
        $result = mysqli_query($conn, $sql);

        while($row = $result->fetch_assoc()) {
            $this->vendedores[] = $row;
        }

        return json_encode($this->vendedores);
    }

    public function addVendedor($nome, $email)
    {
        include "../db_conn.php";

        $sql = "INSERT INTO vendedores (nome, email) values ('$nome', '$email')";
        $result = mysqli_query($conn, $sql);

        return json_encode($result);
    }
}
