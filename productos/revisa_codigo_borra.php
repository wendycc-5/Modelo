<?php
require("../configuracion/ClassProcesos.php");
$var_conexion = new procesos();

$flag=0;
$codigo = $_REQUEST[codigo];
if ($codigo!="")
{
        
        $consulta = "SELECT * FROM articulos WHERE codigo = '$codigo' ";
        $sql_existenciaCodigo = $var_conexion->consulta_codigoArticulo($codigo);
        
        if(mysql_num_rows($sql_existenciaCodigo)!=0)
            {
               $datos_sql_existenciaCodigo = mysql_fetch_array($sql_existenciaCodigo);
                $flag=1;	
				$descripcion = $datos_sql_existenciaCodigo['descripcion'];	
            }else
            {
                $flag=0;
            }	
if ($flag==0){echo '<label style="color:#FF0000;">'.utf8_encode('No existe este código en sistema').'</label>';}
else{echo utf8_encode($descripcion);}
}

?>