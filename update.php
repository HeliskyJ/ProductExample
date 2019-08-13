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
    $sql  = "select * FROM product WHERE id=$id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();

    $product = $row["product_name"];
    $precio  = $row["pricce"];
    $stat    = $row["is_active"];
    $id      = $row["id"];
}
catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
$conn = null;

?>

<!DOCTYPE html>
<html lang="" dir="ltr">

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"
     href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.4/css/bulma.min.css">
    <script defer
    src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <title></title>
</head>

<body>
    <section class="hero is-primary is-bold">
      <div class="hero-body">
        <div class="container">
          <h1 class="subtitle">
            ACTUALIZAR
          </h1>
          <h2 class="title">
             <?php echo $product ?>
          </h2>
        </div>
      </div>
  </section>
  <div class="notification has-background-grey-dark">
      <div class="buttons is-1">
          <button class="button is-info" type="button" name="but" id="buto"
          onclick="location.href ='index.php'"> Productos
          </button>
      </div>
    <div class="container" id="co">
        <div class="notification" id="uno">
            <div class="columns is-mobile">
                <div class="column column is-half is-offset-one-quarter">
                    <form class="form" action="cchn.php">
                        <input type="hidden" name="id"
                        <?php echo 'value=' . $id; ?>>
                        <label for="product">Producto</label>
                        <br>
                        <input class="input is-hovered is-uppercase" disabled type="text"
                        name="product" <?php echo 'value=' . $product; ?>>
                        <br><br>
                        <label for="price">Precio</label>
                        <br>
                        <input class="input is-hovered" type="text" name="price"
                        <?php echo 'value=' . $precio; ?>
                        onblur="validateNum(this.value)">
                        <br>
                        <p class="has-text-danger" id="con"></p><br>
                        <label for="active"> Activar
                            <input type="checkbox" name="active"
                            <?php if ($stat !=0 ) {
                                echo "checked='checked'";}?>>
                        </label>
                        <br><br>
                        <div class="buttons">
                            <input class="button is-success" type="submit"
                             name="button">
                            <button class="button is-danger" type="reset"
                            name="button">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
<script type = "text/javascript" >

function validateNum(n) {
    var cant = n.length;
    if (cant <= 12 & cant >= 1 & cant != '') {
        var RE = /^\d*\.?\d*$/;
        if (RE.test(n)) {
            document.getElementById('con').innerHTML = "Precio valido";
        } else {
            document.getElementById('con').innerHTML = "Precio inválido";
        }
    } else {
        document.getElementById('con').innerHTML = "Inserte un precio";
    }



}
</script>
            </div>
        </div>
        <footer class='footer has-background-grey-dark'>
          <div class='content has-text-centered has-text-grey-light'>
            <p>
              <strong>Hecho</strong> por
              <a href="https://jgthms.com">Hely Méndez</a>.
               Lorem ipsum dolor sit amet, consectetur adipisicing elit.
              <a href="http://opensource.org/licenses/mit-license.php">MIT</a>.
               The website content
              is licensed
               <a href="http://creativecommons.org/licenses/by-nc-sa/4.0/'">
                   CC BY NC SA 4.0</a>.
            </p>
          </div>
        </footer>
    </div>
    </body>
</html>
