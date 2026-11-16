<?php
require("../configuracion/ClassProcesos.php");
$var_conexion = new procesos();
#@session_start();
$cvoperador  = $_REQUEST['operador'];
$propietario = $_REQUEST['propietario'];
$razonsocial = $_REQUEST['razonsocial'];
$rfc         = $_REQUEST['rfc'];
$domicilio  = $_REQUEST['domicilio'];
$telefonos  = $_REQUEST['telefonos'];
            
if($propietario!="" and $razonsocial!="")
{
     if($var_conexion->insertar_nvocliente($cvoperador,$razonsocial,$rfc,$domicilio,$telefonos,$propietario)==true)
    {
	  print "Registrado con exito";
    }else
	{
   	    print "Error Paso de Parametros";
	}
}
?>