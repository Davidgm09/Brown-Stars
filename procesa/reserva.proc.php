<?php

include "../login/services/connection.php";

$queryid_res = "SELECT id_reserva FROM `reserva` ORDER BY `reserva`.`id_reserva` DESC";
$res_id = mysqli_query($conn,$queryid_res);
$row = mysqli_fetch_array($res_id);

$CAMPO1 = $row['id_reserva'] + 1;
$CAMPO2 = date('Y-m-d');
$CAMPO3 = date('H:i:s');
$CAMPO4 = $_REQUEST['variableid'];
$CAMPO5 = $_REQUEST['recurso'];

// echo $CAMPO2;
// echo "------";
// echo $CAMPO3;
// echo "------";
// echo $CAMPO4;
// echo "------";
// echo $CAMPO5;
// echo "------";
// echo $CAMPO1;

$insert = "INSERT INTO `reserva` (`id_reserva`, `fecha_ini_res`, `fecha_fin_res`, `hora_ini_res`, `hora_fin_res`,`status_res`, `id_usuario`, `id_recursos`)
 VALUES ('$CAMPO1', '$CAMPO2', NULL , '$CAMPO3', NULL ,'progress', '$CAMPO4' , '$CAMPO5')";

$update = "UPDATE recursos SET disp_rec='Ocupado' WHERE id_recurso='$CAMPO5'";

mysqli_query($conn, $insert);
mysqli_query($conn, $update);

header('location: ../home.php?variableid='.$CAMPO4);








?>

