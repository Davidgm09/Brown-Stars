<?php

include "../login/services/connection.php";

$queryid_res = "SELECT 	id_incidencia FROM `incidencia` ORDER BY `incidencia`.`id_incidencia` DESC";
$res_id = mysqli_query($conn,$queryid_res);
$row = mysqli_fetch_array($res_id);

$CAMPO1 = date('Y-m-d');
$CAMPO2 = date('H:i:s');
$CAMPO3 = $_REQUEST['incidencia'];
$CAMPO4 = $_REQUEST['variableid'];

// echo $CAMPO1;
// echo "------";
// echo $CAMPO2;
// echo "------";
// echo $CAMPO3;
// echo "------";
// echo $CAMPO4;
// echo "------";
// echo $CAMPO5;

$update1 = "UPDATE incidencia SET fecha_fin_inc='$CAMPO1' WHERE id_incidencia='$CAMPO3'";
$update2 = "UPDATE incidencia SET hora_fin_inc='$CAMPO2' WHERE id_incidencia='$CAMPO3'";
$update3 = "UPDATE incidencia SET status_inc='done' WHERE id_incidencia='$CAMPO3'";

mysqli_query($conn, $update1);
mysqli_query($conn, $update2);
mysqli_query($conn, $update3);

header('location: ../adminIncidencia.php?variableid='.$CAMPO4);








?>

