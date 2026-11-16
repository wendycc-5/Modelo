<?php
require("../configuracion/ClassProcesos.php");
$var_conexion = new procesos();
$operacion    = $_REQUEST[operacion];

$operador=intval($_SESSION['operador']);
$tabla="tabla_sfamilia";
$campo ="sfamilia";
switch($operacion)
{
 case "alta":   
 $descripcion  = $_REQUEST[descripcion]; 
                 $exit =0;
                 if($var_conexion->registrar_operacionCats($campo,$descripcion,$operador,$tabla)==true)#tabla_linea  
                  { print "Operacion Exitosa";}else{print "Operacion Fallida";}
break;
case "baja":      
 $idsfamilia        = $_REQUEST[idsfamilia];  
                 $exit =0;
                 $sql_enusoLinea =$var_conexion->consulta_enusoCATS($idsfamilia,$campo);
                if(mysql_num_rows($sql_enusoLinea)==0)
                { 
                 if ($var_conexion->eliminar_CATS($idsfamilia,$tabla) == true) #tabla_linea 
                  { print "Operacion Exitosa";}else{print "Operacion Fallida";}
                }else
                {
                   print "No se elimino/Linea en Uso"; 
                }  
break;
case "actualizar":  
$idsfamilia  = $_REQUEST[idsfamilia];
$concepto = $_REQUEST[concepto];
                 if ($var_conexion->actualizar_CATS($idsfamilia,$concepto,$campo,$tabla) == true) #tabla_linea
                  { print "Operacion Exitosa";}else{print "Operacion Fallida";}
break;
case "lista":  
	$imagen1='<img class="icono" src="imgs/editar.png" width="25px" height="25px" align="middle"/>'; 
	$imagen2='<img class="icono" src="imgs/delete.png" width="25px" height="25px" align="middle"/>';

				echo '
				<table width="70%" border="0" cellpadding="0" cellspacing="0" class="encabezado" align="center"><tr class="etab_encabezado">
					<td width="20%" align="left">NI</td>
					<td width="35%" align="left">SFAMILIA</td>
                    <td width="15%  align="left">&nbsp;</td>
				</table>
				';            
   $sql_consultasfamilia  = $var_conexion->consulta_CATS($campo,$tabla); #tablaventas     
        while ($datos_sql_consultasfamilia =mysql_fetch_array($sql_consultasfamilia))
            {
				$i++; $j++;
				$clave_sfamilia = $datos_sql_consultasfamilia['ni'];
				$concepto    = $datos_sql_consultasfamilia['sfamilia'];
                $fechahoy = date(Y)."-".date(m)."-".date(d);	
				if($j==1){$color="#EEEEEE";}else{$color="#DFDFDF"; $j=0;}
				 echo '
				<table width="70%" border="0" cellpadding="0" cellspacing="0" bgcolor="'.$color.'" class="dato" align="center"><tr>
					<td width="20%" align="left">'.$clave_sfamilia.'</td>
					<td width="35%" align="left">'.utf8_decode($concepto).'</td>
					<td width="15%" align="left">';
                      print '<a href="#"   
                        onclick="eliminar('."'".$clave_sfamilia."'".')">'.$imagen2.'</a>';
                      print '<a href="#"
                        onclick="actualizar('."'".$clave_sfamilia."'".','."'".$concepto."'".')" >'.$imagen1.'</a>';
                    
				print '</td></tr>
                </table>';
			}
break;
}
?>     