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
            

        </div>

        <div class="division right">
        </div>

    </div>

    <!-- ////////////////INICIO INCIDENCIAS//////////// -->

    <div class="div-incid">
        <div class="par-incid">
            <a href="home.php"><h2>Home</h2></a>
            
        </div>
        
        <div class="par-incid">
            <img src="./img/incidencias/logo-incid.png">
        </div>
    </div>

    <a href="perfil.php"><h2>Mi  Perfil</h2></a>

    <!-- ////////////////INICIO CONTENT//////////////// -->


        <form action="./procesa/incidencia.proc.php">
                Titulo <br>
                <input type="text" name="titulo" required>
                <br>
                Descripcion:<br>
                <input type="text" name="descripcion" required>
                <br>
                Recurso averiado:<br>
                <select name="idres" required>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11</option>
                <option>12</option>
                <option>13</option>
                <option>14</option>
                <option>15</option>
                <option>16</option>
                <option>17</option>
                <option>18</option>
    
                </select>
                <input type="hidden" name="variableid" value="<?php echo $_REQUEST['variableid']; ?>" />
                <br><br>
                <input type="submit" value="Submit">
        </form> 


</body>

</html>