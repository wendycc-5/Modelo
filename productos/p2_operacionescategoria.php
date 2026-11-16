<?php
require("../configuracion/ClassProcesos.php");
$var_conexion = new procesos();
$operacion    = $_REQUEST['operacion'];

$operador=intval($_SESSION['operador']);
$tabla="tabla_familia";
$campo ="familia";
switch($operacion)
{
 case "alta":   
 $descripcion  = $_REQUEST['descripcion']; 
                 $exit =0;
                 if($var_conexion->registrar_operacionCats($campo,$descripcion,$operador,$tabla)==true)#tabla_linea  
                  { print "Operacion Exitosa";}else{print "Operacion Fallida";}
break;
case "baja": 

 $idfamilia        = $_REQUEST['idfamilia'];  
                 $exit =0;
                 $sql_enusoLinea =$var_conexion->consulta_enusoCATProd($idfamilia,$campo);
                if(@mysql_num_rows($sql_enusoLinea)==0)
                { 
                 if ($var_conexion->eliminar_CATS($idfamilia,$tabla) == true) #tabla_linea 
                  { print "Operacion Exitosa";}else{print "Operacion Fallida";}
                }else
                {
                   print "No se puede eliminar/Categoria en Uso"; 
                }  
break;
case "actualizar":  
$idfamilia  = $_REQUEST['idfamilia'];
$concepto = $_REQUEST['concepto'];
                 if ($var_conexion->actualizar_CATS($idfamilia,$concepto,$campo,$tabla) == true) #tabla_linea
                  { print "Operacion Exitosa";}else{print "Operacion Fallida";}
break;
case "lista":  
	$imagen1='<img class="icono" src="imgs/editar.png" width="25px" height="25px" align="middle"/>'; 
	$imagen2='<img class="icono" src="imgs/delete.png" width="25px" height="25px" align="middle"/>';

				echo '
				<table width="70%" border="0" cellpadding="0" cellspacing="0" class="encabezado" align="center"><tr class="etab_encabezado">
					<td width="20%" align="left">CODIGO</td>
					<td width="35%" align="left">FAMILIA</td>
                    <td width="15%  align="left">&nbsp;</td>
				</table>
				';            
   $sql_consultafamilia  = $var_conexion->consulta_CATS($campo,$tabla); #tablaventas     
        while ($datos_sql_consultafamilia =@mysql_fetch_array($sql_consultafamilia))
            {
				$i++; $j++;
				$clave_familia = $datos_sql_consultafamilia['ni'];
				$concepto    = $datos_sql_consultafamilia['familia'];
                $fechahoy = date(Y)."-".date(m)."-".date(d);	
				if($j==1){$color="#EEEEEE";}else{$color="#DFDFDF"; $j=0;}
				 echo '
				<table width="70%" border="0" cellpadding="0" cellspacing="0" bgcolor="'.$color.'" class="dato" align="center"><tr>
					<td width="20%" align="left">'.$clave_familia.'</td>
					<td width="35%" align="left">'.utf8_decode($concepto).'</td>
					<td width="15%" align="left">';
                      print '<a href="#"   
                        onclick="eliminar('."'".$clave_familia."'".')">'.$imagen2.'</a>';
                      print '<a href="#"
                        onclick="actualizar('."'".$clave_familia."'".','."'".$concepto."'".')" >'.$imagen1.'</a>';
                    
				print '</td></tr>
                </table>';
			}
break;
}
?>     