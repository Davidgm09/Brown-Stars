<?php
$conn = mysqli_connect('localhost','root','','bd_brown');
if($conn){
	echo "Conexión establecida<br>";
}else{
	echo "Ha fallado la conexión<br>";
}
?>