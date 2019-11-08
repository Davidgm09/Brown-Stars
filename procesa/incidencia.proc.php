<?php

include "../login/services/connection.php";

$queryid_res = "SELECT 	id_incidencia FROM `incidencia` ORDER BY `incidencia`.`id_incidencia` DESC";
$res_id = mysqli_query($conn,$queryid_res);
$row = mysqli_fetch_array($res_id);

$CAMPO1 = $row['id_incidencia'] + 1;
$CAMPO2 = $_REQUEST['titulo'];
$CAMPO3 = $_REQUEST['descripcion'];
$CAMPO4 = date('Y-m-d');
$CAMPO5 = date('H:i:s');
$CAMPO6 = $_REQUEST['idres'];
$CAMPO7 = $_REQUEST['variableid'];

// echo $CAMPO1;
// echo "------";
// echo $CAMPO2;
// echo "------";
// echo $CAMPO3;
// echo "------";
// echo $CAMPO4;
// echo "------";
// echo $CAMPO5;
// echo "------";
// echo $CAMPO6;

$insert="INSERT INTO `incidencia` (`id_incidencia`, `titulo_inci`, `descrip_ini`, `fecha_ini_inc`, `fecha_fin_inc`, `hora_ini_inc`, `hora_fin_inc`, `status_inc`, `id_reserva`)
 VALUES ($CAMPO1, '$CAMPO2', '$CAMPO3', '$CAMPO4', NULL , '$CAMPO5', NULL, 'progress', '$CAMPO6')";


mysqli_query($conn, $insert);

header('location: ../home.php?variableid='.$CAMPO7);




?>

