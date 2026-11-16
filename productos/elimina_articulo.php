<?php
require("../common.php");

$codigo=$_REQUEST[codigo];

if($codigo!="")
{
	mysql_select_db($mysql_database,$conexion) or die("Error");
    $consulta="delete from articulos where codigo = '$codigo' limit 1 ";
    mysql_query($consulta,$conexion) or die("Error:".mysql_error());
	
    $consulta="delete from inventario where codigo = '$codigo' limit 1 ";
    mysql_query($consulta,$conexion) or die("Error:".mysql_error());
	
	mysql_close($conexion);
}
?>