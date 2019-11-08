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

$sql = "SELECT * FROM `incidencia` INNER JOIN `recursos` ON `incidencia`.`id_recurso` = `recursos`.`id_recurso` WHERE `status_inc`='progress'";

$sqlHistorial  = "SELECT * FROM `incidencia` INNER JOIN `recursos` ON `incidencia`.`id_recurso` = `recursos`.`id_recurso` WHERE `status_inc`='done'";


$result_query = mysqli_query($conn, $sql) or die("Algo ha ido mal en la consulta a la base de datos");
$result_queryHist = mysqli_query($conn, $sqlHistorial) or die("Algo ha ido mal en la consulta a la base de datos");

?>

<body>

    <!-- ////////////////INICIO Header//////////////// -->
     <!-- ////////////////INICIO Header//////////////// -->
     <div class="header">
        <div class="head logo">
            <!-- <p>Izquierda</p> -->
        </div>
        <div class="head login">
            <a href="./index.php">
                <p>Cerrar sesión</p>
            </a>
            <?php

if($_REQUEST['variableid'] <> 1){
    ?><a href="home.php?variableid=<?php echo $_REQUEST['variableid']; ?>"><p>Home</p></a><?php
}

if($_REQUEST['variableid'] == 1){

    ?><a href="home.php?variableid=<?php echo $_REQUEST['variableid']; ?>"><p>Home</p></a><?php

}

?>

        </div>
    </div>

    <!-- ////////////////INICIO Home//////////////// -->


    <div class="home" style="height: 90vh!important">
        <!-- Division del header en dos partes verticales -->
        <div class="division left">
            <p style="font-size: 40px; text-shadow: 1px 3px 9px black;">Bienvenido, <?php echo $_SESSION['nombre']; ?></h1>
            <p style="font-size: 20px; text-shadow: 1px 3px 9px black;">Puedes encontrar los recursos disponibles abajo</p>
        </div>

        <div class="division right">
            

        </div>

    </div>


      <!-- ////////////////INICIO INCIDENCIAS//////////// -->

      <a style='text-decoration:none;' href="incidencia.php?variableid=<?php echo $_REQUEST['variableid']; ?>">
    <div class="incidencias">
        <div class="inc-div">
            <img src="./img/incidencias/logo-inc.png" class="inc-blanco">
            <p>¡Reporta una incidencia!</p>
            <img src="./img/incidencias/logo-inc2.png" class="inc-rojo">
        </div>
    </div>
    </a>
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

    ?><div align="center"><h1>Historial de Incidencias Resueltas</h1></div> <br><?php

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