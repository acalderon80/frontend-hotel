<?php 
$host = 'localhost';
$user = 'root';
$password = '';
$db = 'tablas_hotel';

try {
	$bd = new PDO (
		'mysql:host=localhost;
		dbname='.$db,
		$user,
		$password,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	);
} catch (Exception $e) {
	echo "Problema con la conexion: ".$e->getMessage();
}
?>