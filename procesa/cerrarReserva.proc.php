<?php

include "../login/services/connection.php";

$queryid_res = "SELECT id_reserva FROM `reserva` ORDER BY `reserva`.`id_reserva` DESC";
$res_id = mysqli_query($conn,$queryid_res);
$row = mysqli_fetch_array($res_id);

$CAMPO1 = date('Y-m-d');
$CAMPO2 = date('H:i:s');
$CAMPO3 = $_REQUEST['recurso'];
$CAMPO4 = $_REQUEST['variableid'];
$CAMPO5 = $row['id_reserva'] + 1;

// echo $CAMPO1;
// echo "------";
// echo $CAMPO2;
// echo "------";
// echo $CAMPO3;
// echo "------";
// echo $CAMPO4;
// echo "------";
// echo $CAMPO5;

$update1 = "UPDATE reserva SET fecha_fin_res='$CAMPO1' WHERE id_recursos='$CAMPO3' AND status_res='progress'";
$update2 = "UPDATE reserva SET hora_fin_res='$CAMPO2' WHERE id_recursos='$CAMPO3' AND status_res='progress'";
$update3 = "UPDATE recursos SET disp_rec='Disponible' WHERE id_recurso='$CAMPO3'";
$update4 = "UPDATE reserva SET status_res='done' WHERE id_recursos='$CAMPO3' AND status_res='progress'";

mysqli_query($conn, $update1);
mysqli_query($conn, $update2);
mysqli_query($conn, $update3);
mysqli_query($conn, $update4);

header('location: ../home.php?variableid='.$CAMPO4);








?>

