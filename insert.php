<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
 $servername = "localhost";
 $username   = "root";
 $password   = "hely12345";
 $dbname     = "products";

 $pro = $_GET["product"];
 $pri = $_GET["price"];
 $act = isset($_GET['che']) ? 1 : 0;

 try {
     $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
      $password);
     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "INSERT INTO product VALUES (null, '$pro', '$pri', '$act')";
     $conn->exec($sql);
     echo "New record created successfully";
 }
 catch (PDOException $e) {
     echo $sql . "<br>" . $e->getMessage();
 }
 $conn = null;
 header("Location: ind.html");
 ?>
    </body>
</html>
