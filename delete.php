<?php
$servername = "localhost";
$username   = "root";
$password   = "hely12345";
$dbname     = "products";
$id         = $_GET['id'];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
    $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "DELETE FROM product WHERE id=$id";
    $conn->exec($sql);
}
catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
header("Location: select.php");
?>
