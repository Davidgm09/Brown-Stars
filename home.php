<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<?php

session_start();

include "./login/services/connection.php";

$query = "SELECT * FROM `recursos` ORDER BY `recursos`.`id_recurso` ASC";

$result_query = mysqli_query($conn, $query) or die("Algo ha ido mal en la consulta a la base de datos");

?>

<body>

    <!-- ////////////////INICIO Header//////////////// -->
    <div class="header">
        <div class="head logo">
            <!-- <p>Izquierda</p> -->
        </div>
        <div class="head login">
            <a href="./login/index.php">
                <p>Bienvenido, <?php echo $_SESSION['nombre']; ?> </p>
            </a>
        </div>
    </div>

    <!-- ////////////////INICIO Home//////////////// -->

    <div class="home" style="height: 75vh!important">
        <!-- Division del header en dos partes verticales -->
        <div class="division left">
            <!-- Filtros de busqueda -->
            <!-- <div class="cont-filtros">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sodales mauris et ornare pharetra. Quisque blandit risus vitae ornare feugiat. Nullam at justo pharetra, egestas libero nec, posuere sapien. Pellentesque vulputate faucibus libero, sed finibus diam egestas quis. Praesent tellus mi, venenatis a libero at, maximus imperdiet elit. Nunc varius metus at elementum venenatis. Sed mattis enim dolor, a aliquet sapien tempor suscipit. </p>
                </div> -->

        </div>

        <div class="division right">
        </div>

    </div>

    <!-- ////////////////INICIO CONTENT//////////////// -->

    <?php

    while ($row = mysqli_fetch_array($result_query)) {


        ?>


        <div class="content">
            <div class="cont-recursos">
                <div class="rec-unico">
                    <div class="rec-part">
                        <img src=<?php echo $row['imagen_rec']; ?> style="object-fit: cover;">
                    </div>
                    <div class="rec-part">
                        <h1><?php echo $row['nom_rec']; ?></h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce venenatis auctor nunc, quis viverra leo venenatis vel. Donec ac tempor nunc. Integer nec venenatis magna. Integer ut dolor magna. Curabitur sed quam at urna venenatis commodo. In dictum sapien a ex vulputate tempor sed sit amet mauris. Nam sodales finibus est, eu varius est. Nulla tellus nisi, semper vel massa et, bibendum cursus nunc. In molestie urna vitae ipsum ultricies porttitor. In hac habitasse platea dictumst.</p>
                        <h2 style="color: green;"><?php echo $row['disp_rec']; ?></h2>
                    </div>
                </div>
            </div>
        </div style="height: 500px;">

    <?php
    }

    // ------------- Final de la estructura que se repite ----------------

    // cerrar conexion con MYSQL

    mysqli_close($conn);

    ?>

</body>

</html>