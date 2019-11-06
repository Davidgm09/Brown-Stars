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
            <div class="cont-filtros">
                <form method="POST" action="home.php">
                    <label class="desc" id="titulo-disp">Disponibilidad:</label>
                    <select id="field1" class="select medium" style="width: 90%" name="dispon">
                        <option>Disponible</option>
                        <option>Ocupado</option>
                    </select>

                    <label class="desc" id="titulo-rec">Tipo de recurso:</label>
                    <select id="field2" class="select medium" style="width: 90%" name="recurs">
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

        <div class="division right">
        </div>

    </div>

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
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce venenatis auctor nunc, quis viverra leo venenatis vel. Donec ac tempor nunc. Integer nec venenatis magna. Integer ut dolor magna. Curabitur sed quam at urna venenatis commodo. In dictum sapien a ex vulputate tempor sed sit amet mauris. Nam sodales finibus est, eu varius est. Nulla tellus nisi, semper vel massa et, bibendum cursus nunc. In molestie urna vitae ipsum ultricies porttitor. In hac habitasse platea dictumst.</p>
                        <h2 style="color: green;"><?php echo $row['disp_rec']; ?></h2>
                        <a class="res-button" href="./procesa/reserva.proc.php?variableid=<?php echo $_REQUEST['variableid']; ?>&recurso=<?php echo $rec; ?>" >Reservar</a>
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