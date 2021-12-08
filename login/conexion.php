<?php
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'tables_hotel';

$conection = @mysqli_connect($host,$user,$password,$db);

if (!$conection) {
	echo "Error, no se a podido establecer la conexion";
} else{

}
?>