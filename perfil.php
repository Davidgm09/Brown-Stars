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

$sqlHistorial  = "SELECT * FROM `incidencia` INNER JOIN `reserva` ON `incidencia`.`id_reserva` = `reserva`.`id_reserva` INNER JOIN `recursos` ON `reserva`.`id_recursos` = `recursos`.`id_recurso` WHERE `id_usuario`='$varid'";


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
            <a href="./login/index.php">
                <p>Bienvenido, <?php echo $_SESSION['nombre']; ?> </p>
            </a>
        </div>
    </div>

    <!-- ////////////////INICIO Home//////////////// -->

    <div class="home">
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


    <!-- ////////////////INICIO CONTENT//////////////// -->
    <!-- ////////////////INICIO CONTENT//////////////// -->

    <h1>Historial de reservas</h1>

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
            ?><h1>Historial de Incidencias Resueltas</h1><?php

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