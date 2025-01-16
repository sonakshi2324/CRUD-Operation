<?php
$servername = "localhost";
$username = "root";  // default for XAMPP or change it according to your MySQL settings
$password = "";      // default for XAMPP or use your password
$dbname = "crud_app";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
