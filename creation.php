<?php

    include('connection.php');

    $sql_ct_products = "CREATE TABLE IF NOT EXISTS Products (
                            SKU_ID VARCHAR(255),
                            Name VARCHAR(255),
                            Category VARCHAR(255),
                            Price INT,
                            Creation_At TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                            PRIMARY KEY (SKU_ID));";

    $sql_i_products = "INSERT IGNORE INTO Products (SKU_ID, Name, Category, Price) VALUES
                        ('SKU1001', 'Wireless Mouse', 'Electronics', 1200),
                        ('SKU1002', 'Bluetooth Speaker', 'Electronics', 2500),
                        ('SKU1003', 'Smartphone Stand', 'Accessories', 800),
                        ('SKU1004', 'Running Shoes', 'Clothes', 3500),
                        ('SKU1005', 'Coffee Maker', 'Appliances', 4000),
                        ('SKU1006', 'Adjustable Laptop Stand', 'Accessories', 1500),
                        ('SKU1007', 'LED Desk Lamp', 'Appliances', 1000),
                        ('SKU1008', 'Laptop Backpack', 'Accessories', 1800),
                        ('SKU1009', 'Stainless Steel Water Bottle', 'Accessories', 600),
                        ('SKU1010', 'Noise Cancelling Headphones', 'Electronics', 7000),
                        ('SKU1011', 'Smartwatch', 'Electronics', 5500),
                        ('SKU1012', 'Polarized Sunglasses', 'Accessories', 2000),
                        ('SKU1013', 'Portable Power Bank', 'Electronics', 1300),
                        ('SKU1014', 'Electric Kettle', 'Appliances', 1700),
                        ('SKU1015', 'Wireless Mechanical Keyboard', 'Electronics', 1600),
                        ('SKU1016', 'Ergonomic Gaming Chair', 'Accessories', 9500),
                        ('SKU1017', 'Cotton T-Shirt', 'Clothes', 900),
                        ('SKU1018', 'Adjustable Dumbbell Set', 'Accessories', 3200),
                        ('SKU1019', 'Wall Clock with Temperature', 'Appliances', 1100),
                        ('SKU1020', 'Tripod Stand for Camera', 'Electronics', 2100);";

    if($conn->query($sql_ct_products) === FALSE){
        echo "Error: Table 'Products' not created";
    }

    if($conn->query($sql_i_products) === FALSE){
        echo "Error: Dummy Products Insertion Error in Table 'Products'";
    }

?>