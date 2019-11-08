<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body>

<?php

session_start();

include "./login/services/connection.php";

$varid = $_REQUEST['variableid'];

$sql = "SELECT * FROM `reserva` INNER JOIN `recursos` ON `reserva`.`id_recursos` = `recursos`.`id_recurso` WHERE `reserva`.`id_usuario`='$varid'";

$sqlHistorial  = "SELECT * FROM `incidencia` INNER JOIN `recursos` ON `incidencia`.`id_recurso` = `recursos`.`id_recurso` WHERE `id_usuario`='$varid'";


$result_query = mysqli_query($conn, $sql) or die("Algo ha ido mal en la consulta a la base de datos");
$result_queryHist = mysqli_query($conn, $sqlHistorial) or die("Algo ha ido mal en la consulta a la base de datos");

$cont=0;

?>

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
<div align="center">
    <h1>Historial de reservas</h1>
</div>

    <br>
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
                        <h2><?php echo $row['desc_rec']; ?></h2>
                        <p>Reserva: De <?php echo $row['fecha_ini_res']; ?> <?php echo $row['hora_ini_res']; ?> a <?php echo $row['fecha_fin_res']; ?> <?php echo $row['hora_fin_res']; ?></p>                        
                        
                    </div>
                </div>
            </div>
        </div style="height: 500px;">


        

    <?php
    }

    while ($row = mysqli_fetch_array($result_queryHist)) {

        $cont=$cont+1;

        if($cont == 1){
            ?><div align="center">
            <h1>Historial de Incidencias Resueltas</h1>
        </div>
        
            <br><?php

        }

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