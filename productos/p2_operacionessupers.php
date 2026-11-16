<?php
require("../configuracion/ClassProcesos.php");
$var_conexion = new procesos();
$operacion    = $_REQUEST['operacion'];

$operador=intval($_SESSION['operador']);
$tabla="tabla_supers";
$campo ="familia";
switch($operacion)
{
 case "alta":   
 $descripcion  = $_REQUEST['descripcion']; 
 $detalle  = $_REQUEST['detalle']; 
                 $exit =0;
                 if($var_conexion->registrar_operacionSupers($descripcion,$detalle,$operador,$tabla)==true)#tabla_supers  
                  { print "Operacion Exitosa";}else{print "Operacion Fallida";}
break;
case "baja": 

 $idsuper        = $_REQUEST['idsuper'];  
                 $exit =0;
                 $sql_enusoSuper =$var_conexion->consulta_enusoSupercompras($idsuper);
                if(@mysql_num_rows($sql_enusoSuper)==0)
                { 
                 if ($var_conexion->eliminar_supers($idsuper,$tabla) == true) #tabla_linea 
                  { print "Operacion Exitosa";}else{print "Operacion Fallida";}
                }else
                {
                   print "No se puede eliminar/Super en Uso"; 
                }  
break;
case "actualizar":  
$id  = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];
$detalle = $_REQUEST['detalle'];
                 if ($var_conexion->actualizar_Supers($id,$nombre,$detalle,$tabla) == true) #tabla_supers
                  { print "Operacion Exitosa";}else{print "Operacion Fallida";}
break;
case "lista":  
	$imagen1='<img class="icono" src="imgs/editar.png" width="25px" height="25px" align="middle"/>'; 
	$imagen2='<img class="icono" src="imgs/delete.png" width="25px" height="25px" align="middle"/>';

				echo '
				<table width="70%" border="0" cellpadding="0" cellspacing="0" class="encabezado" align="center">
                <tr class="etab_encabezado">
					<td width="20%" align="left">ID</td>
					<td width="15%" align="left">NOMBRE</td>
					<td width="20%" align="left">DETALLES</td>
                    <td width="15%  align="left">&nbsp;</td>
				</table>
				';            
   $sql_consultasupers  = $var_conexion->consulta_sUPERS($tabla); #tablaventas  
   $i=0; $j=0;   
        while ($datos_sql_consultasupers =@mysql_fetch_array($sql_consultasupers))
            {
				$i++; $j++;
				$id = $datos_sql_consultasupers['ni'];
				$descripcion    = $datos_sql_consultasupers['nomsuper'];
				$detalle        = $datos_sql_consultasupers['detalle'];
                $fechahoy = date('Y')."-".date('m')."-".date('d');	
				if($j==1){$color="#EEEEEE";}else{$color="#DFDFDF"; $j=0;}
				 echo '
				<table width="70%" border="0" cellpadding="0" cellspacing="0" bgcolor="'.$color.'" class="dato" align="center"><tr>
					<td width="20%" align="left">'.$id.'</td>
					<td width="15%" align="left">'.$descripcion.'</td>
                    <td width="20%" align="left">'.$detalle.'</td>
					<td width="15%" align="left">';
                      print '<a href="#"   
                        onclick="eliminar('."'".$id."'".')">'.$imagen2.'</a>';
                      print '<a href="#"
                        onclick="actualizar('."'".$id."'".','."'".$descripcion."'".','."'".$detalle."'".')" >'.$imagen1.'</a>';
                    
				print '</td></tr>
                </table>';
			}
break;
}
?>     