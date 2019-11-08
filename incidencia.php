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
        <form action="./procesa/incidencia.proc.php">
        <div class="content">
        <div class="cont-recursos">
            <div class="rec-unico" style="flex-flow: column; padding: 3%">
                Titulo <br>
                <input class="impinci" type="text" name="titulo" required>
                <br>
                Descripcion:<br><br>
                <input class="impinci" type="text" name="descripcion" required>
                <br>
                Recurso averiado:<br><br>
                <select class="impinci" name="idres" required>
                <option>Sala Multidisciplinària A</option>
                <option>Sala Multidisciplinària B</option>
                <option>Sala Multidisciplinària C</option>
                <option>Sala Multidisciplinària D</option>
                <option>Sala informática A</option>
                <option>Sala informática B</option>
                <option>Despacho A</option>
                <option>Despacho B</option>
                <option>Taller de cocina</option>
                <option>Salón de Actos</option>
                <option>Sala de reuniones</option>
                <option>Proyector A</option>
                <option>Proyector B</option>
                <option>Portátil A</option>
                <option>Portátil B</option>
                <option>Portátil C</option>
                <option>Móvil A</option>
                <option>Móvil B</option>
    
                </select>
                <input type="hidden" name="variableid" value="<?php echo $_REQUEST['variableid']; ?>" />
                <br><br>
                <input type="submit" style="width: 10%; padding: 1%;" value="Submit">
        </div>
        </div>
        </div>
        </form> 
    <div>

</body>

</html>