<?php
    $DB_servername = "localhost";
    $DB_username = "root";
    $DB_password = "";
    $DB_name = "blog";
    try {
    $conn = new PDO("mysql:host=$DB_servername;dbname=$DB_name", $DB_username, $DB_password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
?>