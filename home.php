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
    ?><a href="perfil.php?variableid=<?php echo $_REQUEST['variableid']; ?>"><p>Mi  Perfil</p></a><?php
}

if($_REQUEST['variableid'] == 1){

    ?><a href="adminIncidencia.php?variableid=<?php echo $_REQUEST['variableid']; ?>"><p>Administrador de Incidencias</p></a><?php

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
            <!-- Filtros de busqueda -->
            <div class="cont-filtros">
                <form method="POST" action="home.php?variableid=<?php echo $_REQUEST['variableid']; ?>">
                    <label class="desc" id="titulo-disp">Disponibilidad:</label> <!-- Primer titulo -->
                    <select id="field1" class="select medium" style="width: 90%" name="dispon"> <!-- Select disponibilidad -->
                        <option>Disponible</option>
                        <option>Ocupado</option>
                    </select>

                    <label class="desc" id="titulo-rec">Tipo de recurso:</label>
                    <select id="field2" class="select_form" style="width: 90%" name="recurs">
                        <option>Todo</option>
                        <option>Sala multidisciplinaria</option>
                        <option>Sala informática</option>
                        <option>Despacho</option>
                        <option>Taller de cocina</option>
                        <option>Sala de actos</option>
                        <option>Sala de reuniones</option>
                        <option>Proyector</option>
                        <option>Portátil</option>
                        <option>Móvil</option>
                    </select>

                    

                    <input type="submit" name="buscar" value="Buscar">
                </form>
            </div>

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

    if(isset($_POST['dispon']) && isset($_POST['recurs'])) {
        $disponibilidad=$_POST['dispon'];
        $tiporecurso=$_POST['recurs'];
    }else {
        $disponibilidad='';
        $tiporecurso='';
    }

    if(isset($_POST['dispon']) && isset($_POST['recurs'])){ // Si se ha realizado una busqueda (si estan establecidas las variables)
        if ($_POST['recurs']=='Todo') { // Si la busqueda es TODO
            $sql="SELECT * FROM recursos WHERE disp_rec LIKE '%$disponibilidad%'; ";
        }else { 
            $sql="SELECT * FROM recursos WHERE disp_rec LIKE '%$disponibilidad%' AND tipo_rec LIKE '%$tiporecurso%' ; ";
            
        }
    }else {
        
        $sql="SELECT * FROM recursos ; ";
    }
    
	$result_query=mysqli_query($conn,$sql);
    
    $resultados="SELECT COUNT(id_recurso) FROM recursos WHERE disp_rec LIKE '%$disponibilidad%' AND tipo_rec LIKE '%$tiporecurso%';";
	$resultadosnum=mysqli_query($conn,$resultados);

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
                        <p><?php echo $row['desc_rec']; ?></p>
                        
                        <?php if($row['disp_rec']=='Disponible'){

                            ?><h2 style="color: green;"><?php echo $row['disp_rec']; ?></h2><?php

                        }else{
                            ?><h2 style="color: #e42312;"><?php echo $row['disp_rec']; ?></h2><?php
                        }

                        ?>

                        <?php

                        if($row['disp_rec']=='Disponible'){

                            ?>
                            <a class="res-button" href="./procesa/reserva.proc.php?variableid=<?php echo $_REQUEST['variableid']; ?>&recurso=<?php echo $rec; ?>" >Reservar</a>
                            <?php
                        }elseif($row['disp_rec']=='Ocupado'){

                            $sql2="SELECT * FROM `reserva` INNER JOIN `recursos` ON `reserva`.`id_recursos` = `recursos`.`id_recurso` WHERE `recursos`.`id_recurso`=$rec AND `reserva`.`status_res`='progress'";
                            $resultqid = mysqli_query($conn,$sql2);
                            $rowid2 = mysqli_fetch_array($resultqid);
                            $iduser2 = $rowid2['id_usuario'];

                            //echo $iduser2;
                            //echo $_REQUEST['variableid'];


                            if($iduser2==$_REQUEST['variableid']){

                                ?>
                            <a class="res-button" href="./procesa/cerrarReserva.proc.php?variableid=<?php echo $_REQUEST['variableid']; ?>&recurso=<?php echo $rec; ?>" >Cerrar Reserva</a>
                            <?php

                            }
                            
                        }
                        ?>

                        
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