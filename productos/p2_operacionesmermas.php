<?php
require("../configuracion/ClassProcesos.php");
$var_conexion = new procesos();
$operacion    = $_REQUEST['operacion'];

$operador=intval($_SESSION['operador']);
$tabla="tabla_mermas";
$campo ="folio";
switch($operacion)
{
 case "alta":   
 $codigo  = $_REQUEST['codigo']; 
 $importe  = $_REQUEST['importe']; 
  $cantidad  = $_REQUEST['cantidad']; 
   $detalles  = $_REQUEST['detalles']; 
                 $exit =0;
                 if($var_conexion->registrar_merma($codigo,$cantidad,$importe,$detalles,$operador)==true)#tabla_linea  
                  { print "Operacion Exitosa";}else{print "Operacion Fallida";}
break;
case "baja":      
 $folio        = $_REQUEST['folio'];  
                 $exit =0;
                 /*$sql_enusoLinea =$var_conexion->consulta_enusoCATS($idlinea,$campo);
                if(@mysql_num_rows($sql_enusoLinea)==0)
                { */
                 if ($var_conexion->eliminar_compra($folio) == true) #tabla_linea 
                  { print "Operacion Exitosa";}else{print "Operacion Fallida";}
                /*}else
                {
                   print "No se elimino/Linea en Uso"; 
                } */ 
break;
case "actualizar":  
$folio  = $_REQUEST['folio'];
$producto = $_REQUEST['producto'];
$cantidad = $_REQUEST['cantidad'];
$detalles = $_REQUEST['detalles'];
$importe = $_REQUEST['importe'];

                 if ($var_conexion->actualizar_merma($folio,$producto,$cantidad,$detalles,$importe) == true) #tabla_linea
                  { print "Operacion Exitosa";}else{print "Operacion Fallida";}
break;
case "lista":  
$fecha      = 'curdate()'; 
	$imagen1='<img class="icono" src="imgs/editar.png" width="25px" height="25px" align="middle"/>'; 
	$imagen2='<img class="icono" src="imgs/delete.png" width="25px" height="25px" align="middle"/>';

				echo '
				<table width="70%" border="0" cellpadding="0" cellspacing="0" class="encabezado" align="center"><tr class="etab_encabezado">
					<td width="20%" align="left">FOLIO</td>
					<td width="25%" align="left">PRODUCTO</td>
                    <td width="15%" align="left">MONTO</td>
                    <td width="15%"  align="left">&nbsp;</td>
				</table>
				';            
   $sql_consultamermas  = $var_conexion->consulta_mermasdeldia($fecha); #tablaventas     
        while ($datos_sql_consultamermas =@mysql_fetch_array($sql_consultamermas))
            {
				$i++; $j++;
				$folio = $datos_sql_consultamermas['folio'];
				$idproducto    = $datos_sql_consultamermas['codigo'];
				$descripcion    = $datos_sql_consultamermas['descripcion'];
                $monto    = $datos_sql_consultamermas['monto'];
                $cantidad    = $datos_sql_consultamermas['cantidad'];
                $detalles    = $datos_sql_consultamermas['detalles'];
                $fechahoy = date('Y')."-".date('m')."-".date('d');	
				if($j==1){$color="#EEEEEE";}else{$color="#DFDFDF"; $j=0;}
				 echo '
				<table width="70%" border="0" cellpadding="0" cellspacing="0" bgcolor="'.$color.'" class="dato" align="center"><tr>
					<td width="20%" align="left">'.$folio.'</td>
					<td width="25%" align="left">'.$descripcion.'</td>
                    <td width="15%" align="left">'.$monto.'</td>
					<td width="15%" align="left">';
                      print '<a href="#"   
                        onclick="eliminar('."'".$folio."'".')">'.$imagen2.'</a>';
                      print '<a href="#"
                        onclick="actualizar('."'".$folio."'".','."'".$idproducto."'".','."'".$descripcion."'".','."'".$cantidad."'".','."'".$detalles."'".','."'".$monto."'".')" >'.$imagen1.'</a>';
                    
				print '</td></tr>
                </table>';
			}
break;
}
?>     