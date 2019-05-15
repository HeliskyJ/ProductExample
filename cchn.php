<?php
$servername = "localhost";
$username   = "root";
$password   = "hely12345";
$dbname     = "products";
$id         = $_GET['id'];

$id  = $_GET["id"];
$pro = $_GET["product"];
$pri = $_GET["price"];
$act = isset($_GET['active']) ? 1 : 0;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
    $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE product SET pricce=$pri, is_active=$act WHERE id=$id";
    $conn->exec($sql);
}
catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;
header("Location: index.php");
?>
 Download
