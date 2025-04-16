<?php

    include('connection.php');
    
    $product_name = $_POST['product_name'];
    $product_category = $_POST['product_category'];

    if($product_name == "" && $product_category == "all"){
        $sql_fetch_all_data = "SELECT SKU_ID, Name, Category, Price FROM Products;";
        $result = $conn->query($sql_fetch_all_data);

        $filtered_products = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $filtered_products[] = $row;
            }
        }
    }

    else if($product_name == ""){
        $sql_fetch_all_data = "SELECT SKU_ID, Name, Category, Price FROM Products WHERE Category = '$product_category';";
        $result = $conn->query($sql_fetch_all_data);

        $filtered_products = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $filtered_products[] = $row;
            }
        }
    }

    else if($product_name!="" && $product_category!="all"){
        $sql_fetch_filtered_data = "SELECT SKU_ID, Name, Category, Price FROM Products WHERE Name = '$product_name' AND Category = '$product_category';";
        $result = $conn->query($sql_fetch_filtered_data);
        
        $filtered_products = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $filtered_products[] = $row;
            }
        }
    }

    else{
        $sql_fetch_filtered_data = "SELECT SKU_ID, Name, Category, Price FROM Products WHERE Name = '$product_name';";
        $result = $conn->query($sql_fetch_filtered_data);
        
        $filtered_products = [];
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $filtered_products[] = $row;
            }
        }
    }

    echo json_encode($filtered_products);

?>