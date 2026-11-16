<?php
require("../configuracion/ClassProcesos.php");
$var_conexion = new procesos();
#@session_start();
$cvoperador = $operador;
$codigo      =$_REQUEST[codigo];
#$clave      =$_REQUEST[clave];
$descripcion =$_REQUEST[descripcion];
$precio      =$_REQUEST[precio];
$familia  = $_REQUEST[familia];
$sfamilia = $_REQUEST[sfamilia];
$linea    = $_REQUEST[linea];

$proveedor1 =$_REQUEST[proveedor1];
$costo1     =$_REQUEST[costo1];
$unidadm    =$_REQUEST[unidadm];
#print $codigo."-".$codigo."-".$descripcion."prec:".$precio."fam:".$familia."sfam:".$sfamilia."lin:".$linea."pro:".$proveedor1."co:".$costo1."-".$unidadm."-".$cvoperador;
if($codigo!="" and $descripcion!="")
{
     if($var_conexion->insertar_articulos($codigo,$codigo,$descripcion,$precio,$familia,$sfamilia,$linea,$proveedor1,$costo1,$unidadm,$cvoperador)==true)
    {
   	  $var_conexion->inicializar_inventario($codigo);
	  print "Registrado con exito";
    }else
	{
   	    print "Error Paso de Parametros";
	}
}
?>