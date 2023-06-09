<?php

namespace Models;

class ProductsModel {
    public function connect(){
        $hostname = 'testtask.mysql.uhserver.com';
        $username = 'fernandolucas';
        $password = 'F3rn4nd0@';
        $database = 'testtask';

       
        $connection = mysqli_connect($hostname, $username, $password, $database);

        if (mysqli_connect_errno()) {
            die('Database conection faild: ' . mysqli_connect_error());
        }

        return $connection;
    }

    public function getAllData() {
        $conn = $this->connect();
        $data = array();

        $query = "SELECT * FROM product";
        $result = mysqli_query($conn, $query);

        if (!$result) {
            die('An error ocurred: ' . mysqli_error($conn));
        }

        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }

        mysqli_free_result($result);

        $data = json_encode($data);

        mysqli_close($conn);

        return $data;
    }

    Public function deleteProduct($id) {
        $conn = $this->connect();
        $query = "DELETE FROM product where id = $id";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die('An error ocurred: ' . mysqli_error($conn));
        }
        mysqli_close($conn);
    }

    Public function createProduct($sku,$name,$price,$type,$size,$weight,$height,$width,$lenght) {
        $conn = $this->connect();
        $query = "INSERT INTO product (SKU, product_name, product_price, product_type, size, height, width, length, weight) VALUES ('$sku', '$name', $price, '$type', '$size', '$height', '$width','$lenght', '$weight');";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die('An error ocurred: ' . mysqli_error($conn));
        }
        mysqli_close($conn);
    }
}

