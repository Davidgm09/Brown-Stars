<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<?php

session_start();

include "./login/services/connection.php";

$sql = "SELECT * FROM `incidencia` INNER JOIN `reserva` ON `incidencia`.`id_reserva` = `reserva`.`id_reserva` INNER JOIN `recursos` ON `reserva`.`id_recursos` = `recursos`.`id_recurso` WHERE `status_inc`='progress'";

$sqlHistorial  = "SELECT * FROM `incidencia` INNER JOIN `reserva` ON `incidencia`.`id_reserva` = `reserva`.`id_reserva` INNER JOIN `recursos` ON `reserva`.`id_recursos` = `recursos`.`id_recurso` WHERE `status_inc`='done'";


$result_query = mysqli_query($conn, $sql) or die("Algo ha ido mal en la consulta a la base de datos");
$result_queryHist = mysqli_query($conn, $sqlHistorial) or die("Algo ha ido mal en la consulta a la base de datos");

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
           
            

        </div>

        <div class="division right">
        </div>

    </div>

    <!-- ////////////////INICIO INCIDENCIAS//////////// -->

    <div class="div-incid">
        <div class="par-incid">
            <a href="incidencia.php?variableid=<?php echo $_REQUEST['variableid']; ?>"><h2>¡Reportar incidencia!</h2></a>
        </div>
        
        <div class="par-incid">
            <img src="./img/incidencias/logo-incid.png">
        </div>
    </div>

    <a href="home.php?variableid=<?php echo $_REQUEST['variableid']; ?>"><h2>Home</h2></a>

    <?php


    ?>
    

    <!-- ////////////////INICIO CONTENT//////////////// -->

    <?php
    


    while ($row = mysqli_fetch_array($result_query)) {

        $rec= $row['id_recurso'];


        ?>

        <div class="content">
            <div class="cont-recursos">
                <div class="rec-unico">
                    <div class="rec-part">
                        <img src=<?php echo $row['imagen_rec']; ?> style="object-fit: cover;">
                    </div>
                    <div class="rec-part">
                        <h1><?php echo $row['nom_rec']; ?></h1>
                        <h2><?php echo $row['titulo_inci']; ?></h2>
                        <p><?php echo $row['descrip_ini']; ?></p>                        

                            <a class="res-button" href="./procesa/cerrarIncidencia.proc.php?variableid=<?php echo $_REQUEST['variableid']; ?>&incidencia=<?php echo $row['id_incidencia']; ?>" >Finalizar Incidencia</a>


                        
                    </div>
                </div>
            </div>
        </div style="height: 500px;">


        

    <?php
    }

    ?><h1>Historial de Incidencias Resueltas</h1><?php

    while ($row = mysqli_fetch_array($result_queryHist)) {

        $rec= $row['id_recurso'];


        ?>

        <div class="content">
            <div class="cont-recursos">
                <div class="rec-unico">
                    <div class="rec-part">
                        <img src=<?php echo $row['imagen_rec']; ?> style="object-fit: cover;">
                    </div>
                    <div class="rec-part">
                        <h1><?php echo $row['nom_rec']; ?></h1>
                        <h2><?php echo $row['titulo_inci']; ?></h2>
                        <p><?php echo $row['descrip_ini']; ?></p>                        

                            <a class="res-button">Incidencia Resuelta el dia <?php echo $row['fecha_fin_inc']; ?> a las <?php echo $row['hora_fin_inc']; ?></a>


                        
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