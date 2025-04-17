<?php

    include('connection.php');
    include('creation.php');

    $sql_products = "SELECT Products.SKU_ID, Products.Name, Categories.Category, Products.Price FROM Products JOIN Categories ON Products.SKU_ID = Categories.SKU_ID;";
    $result = $conn->query($sql_products);

    $products = [];
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $products[] = $row;
        }
    }
    else{
        echo "No Products Found";
    }

    header("Content-Type: application/json");
    echo json_encode($products);

?>