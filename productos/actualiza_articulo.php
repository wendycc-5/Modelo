<?php
require("../common.php");

$codigo=$_REQUEST[codigo];
$descripcion=$_REQUEST[descripcion];
$precio=$_REQUEST[precio];
$linea=$_REQUEST[linea];
$proveedor1=$_REQUEST[proveedor1];
$costo1=$_REQUEST[costo1];
$proveedor2=$_REQUEST[proveedor2];
$costo2=$_REQUEST[costo2];
$proveedor3=$_REQUEST[proveedor3];
$costo3=$_REQUEST[costo3];

if($codigo!="" and $descripcion!="")
{
	mysql_select_db($mysql_database,$conexion) or die("Error");
    $consulta="update articulos set descripcion = '$descripcion' , precio = '$precio' , linea = '$linea' , proveedor1 = '$proveedor1' , costo1 = '$costo1' , proveedor2 = '$proveedor2' , costo2 = '$costo2' , proveedor3 = '$proveedor3' , costo3 = '$costo3' where codigo = '$codigo' limit 1 ";
    mysql_query($consulta,$conexion) or die("Error:".mysql_error());
	mysql_close($conexion);
}
?>