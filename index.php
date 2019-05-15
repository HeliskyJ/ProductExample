<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js">
    </script>
    <title></title>
</head>

<body>
    <div class="container" id="co">
        <div class="notification">
            <h1 class="is-size-1" align="center"> Productos</h1>

            <div class="buttons is-1">
                <a href="ind.html" class="button is-info"
                type="button">Nuevo Producto</a>
            </div>

    <?php
    $servername = "localhost";
    $username   = "root";
    $password   = "hely12345";
    $dbname     = "products";


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username,
         $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select * from product";

        echo "<div class='column column is-half is-offset-one-quarter'>
                      <table class='table is-fullwidth'>
                      <tr>
                      <th colspan='1'>Producto</th>
                      <th colspan='1'>Precio</th>
                      <th colspan='1'>Activo</th> </th>";
        if ($conn) {
            $result = $conn->query($sql);
            foreach ($result as $value) {

                $pro = $value["product_name"];
                $pri = $value["pricce"];
                $act = $value["is_active"];
                $a   = 'checked';
                ;

                echo
                 "<tr>
                  <td>" . $value["product_name"] . "</td>" .
                 "<td>" . "<span>Q.</span>" . $value["pricce"] . "</td>" .
                 "<td>" . "<input type='checkbox' disabled value='" . $act . "'";
                if ($act != 0) {
                    echo "checked='" . $a . "'";
                }
                ">";

                echo
                "</td>" .
                "<td>" . "<a class='button is-primary is-2'
                 href='update.php?id=" . $value["id"] . "'>Actualizar</a>" .
                 "</td>" .
                 "<td>" . "<a class='button is-warning is-2'
                 href='delete.php?id=" . $value["id"] . "'>Eliminar</a>" .
                 "</td>";
            }
            echo "</tr>" . "</div>";
        } else {
            echo "nothig";

        }

    }
    catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
    ?>
        </div>
    </div>
</body>
</html>
