<?php

    include('connection.php');

    $sql_ct_products = "CREATE TABLE IF NOT EXISTS Products (
                            SKU_ID VARCHAR(255),
                            Name VARCHAR(255),
                            Price INT,
                            Creation_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                            PRIMARY KEY (SKU_ID));";

    $sql_ct_categories = "CREATE TABLE IF NOT EXISTS Categories (
                            SKU_ID VARCHAR(255),
                            Category VARCHAR(255),
                            PRIMARY KEY (SKU_ID));";

    $sql_i_products = "INSERT IGNORE INTO Products (SKU_ID, Name, Price) VALUES
                            ('SKU1001', 'Wireless Mouse', 1200),
                            ('SKU1002', 'Bluetooth Speaker', 2500),
                            ('SKU1003', 'Smartphone Stand', 800),
                            ('SKU1004', 'Running Shoes', 3500),
                            ('SKU1005', 'Coffee Maker', 4000),
                            ('SKU1006', 'Adjustable Laptop Stand', 1500),
                            ('SKU1007', 'LED Desk Lamp', 1000),
                            ('SKU1008', 'Laptop Backpack', 1800),
                            ('SKU1009', 'Stainless Steel Water Bottle', 600),
                            ('SKU1010', 'Noise Cancelling Headphones', 7000),
                            ('SKU1011', 'Smartwatch', 5500),
                            ('SKU1012', 'Polarized Sunglasses', 2000),
                            ('SKU1013', 'Portable Power Bank', 1300),
                            ('SKU1014', 'Electric Kettle', 1700),
                            ('SKU1015', 'Wireless Mechanical Keyboard', 1600),
                            ('SKU1016', 'Ergonomic Gaming Chair', 9500),
                            ('SKU1017', 'Cotton T-Shirt', 900),
                            ('SKU1018', 'Adjustable Dumbbell Set', 3200),
                            ('SKU1019', 'Wall Clock with Temperature', 1100),
                            ('SKU1020', 'Tripod Stand for Camera', 2100);";

    $sql_i_categories = "INSERT IGNORE INTO Categories (SKU_ID, Category) VALUES
                            ('SKU1001', 'Electronics'),
                            ('SKU1002', 'Electronics'),
                            ('SKU1003', 'Accessories'),
                            ('SKU1004', 'Clothes'),
                            ('SKU1005', 'Appliances'),
                            ('SKU1006', 'Accessories'),
                            ('SKU1007', 'Appliances'),
                            ('SKU1008', 'Accessories'),
                            ('SKU1009', 'Accessories'),
                            ('SKU1010', 'Electronics'),
                            ('SKU1011', 'Electronics'),
                            ('SKU1012', 'Accessories'),
                            ('SKU1013', 'Electronics'),
                            ('SKU1014', 'Appliances'),
                            ('SKU1015', 'Electronics'),
                            ('SKU1016', 'Accessories'),
                            ('SKU1017', 'Clothes'),
                            ('SKU1018', 'Accessories'),
                            ('SKU1019', 'Appliances'),
                            ('SKU1020', 'Electronics');";

    if($conn->query($sql_ct_products) === FALSE){
        echo "Error: Table 'Products' not created";
    }

    if($conn->query($sql_ct_categories) === FALSE){
        echo "Error: Table 'Categories' not created";
    }

    if($conn->query($sql_i_products) === FALSE){
        echo "Error: Dummy Products Insertion Error in Table 'Products'";
    }

    if($conn->query($sql_i_categories) === FALSE){
        echo "Error: Dummy Categories Insertion Error in Table 'Categories'";
    }

?>