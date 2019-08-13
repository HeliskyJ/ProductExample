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
    <section class="hero is-primary is-bold">
      <div class="hero-body">
        <div class="container">
          <h1 class="title">
            PRODUCTOS
          </h1>
          <h2 class="subtitle">
            Megalot
          </h2>
        </div>
      </div>
  </section>
  <div class="notification has-background-grey-dark">
    <div class="container" id="co">
            <div class="buttons is-3">
                <button class="button is-link" name="button" onclick="location.href ='ind.html'">
                    Crear Producto
                </button>
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

        echo "<div class='column column is-half is-offset-one-quarter has-background-grey'>
                      <table class='table is-fullwidth has-text-grey-darker'>
                      <tr>
                      <th colspan='2'>Producto</th>
                      <th colspan='2'>Precio</th>
                      <th colspan='3'>Estado</th>
                      <th colspan='1'></th>


                       </tr>";
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
                  <td>" . $value["product_name"] . "</td><td></td>" .
                 "<td>" . "<span>Q.</span>" . $value["pricce"] . "</td><td></td>" .
                 "<td>" . "<input type='checkbox' disabled value='" . $act . "'";
                if ($act != 0) {
                    echo "checked='" . $a . "'";
                }
                ">";

                echo
                "</td> <td></td> <td></td>" .
                "<td>" . "<a class='button is-primary is-2'
                 href='update.php?id=" . $value["id"] . "'>Actualizar</a>" .
                 "</td>" .
                 "<td>" . "<a class='button is-warning is-2'
                 href='delete.php?id=" . $value["id"] . "'>Eliminar</a>" .
                 "</td>";
            }
            echo "</tr>" . " </table> </div> </div>" ;

            echo "<footer class='footer has-background-grey-dark'>
              <div class='content has-text-centered has-text-grey-light'>
                <p>
                  <strong>Hecho</strong> por
                   <a href='https://jgthms.com'>Hely Méndez</a>.
                   Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                  <a href='http://opensource.org/licenses/mit-license.php'>MIT</a>.
                   The website content
                  is licensed
                   <a href='http://creativecommons.org/licenses/by-nc-sa/4.0/''>
                   CC BY NC SA 4.0</a>.
                </p>
              </div>
            </footer>";

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
