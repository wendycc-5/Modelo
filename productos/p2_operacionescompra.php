<?php
require("../configuracion/ClassProcesos.php");
$var_conexion = new procesos();
$operacion    = $_REQUEST['operacion'];

$operador=intval($_SESSION['operador']);
$tabla="tabla_compras";
$campo ="linea";
switch($operacion)
{
 case "alta":   
 $id_super  = $_REQUEST['idsuper']; 
 $importe  = $_REQUEST['importe']; 
 
                 $exit =0;
                 if($var_conexion->registrar_compra($id_super,$importe,$operador)==true)#tabla_linea  
                  { print "Operacion Exitosa";}else{print "Operacion Fallida";}
break;
case "baja":      
 $idcompra        = $_REQUEST['idcompra'];  
                 $exit =0;
                 /*$sql_enusoLinea =$var_conexion->consulta_enusoCATS($idlinea,$campo);
                if(@mysql_num_rows($sql_enusoLinea)==0)
                { */
                 if ($var_conexion->eliminar_compra($idcompra) == true) #tabla_linea 
                  { print "Operacion Exitosa";}else{print "Operacion Fallida";}
                /*}else
                {
                   print "No se elimino/Linea en Uso"; 
                } */ 
break;
case "actualizar":  
$folio  = $_REQUEST['folio'];
$super = $_REQUEST['idsuper'];
$importe = $_REQUEST['importe'];

                 if ($var_conexion->ctualizar_compra($folio,$super,$importe) == true) #tabla_linea
                  { print "Operacion Exitosa";}else{print "Operacion Fallida";}
break;
case "lista":  
$fecha      = 'curdate()'; 
//$fecha = date('Y')."-".date('m')."-".date('d');	
//print $fecha;
	$imagen1='<img class="icono" src="imgs/editar.png" width="25px" height="25px" align="middle"/>'; 
	$imagen2='<img class="icono" src="imgs/delete.png" width="25px" height="25px" align="middle"/>';

				echo '
				<table width="70%" border="0" cellpadding="0" cellspacing="0" class="encabezado" align="center"><tr class="etab_encabezado">
					<td width="20%" align="left">NI</td>
					<td width="25%" align="left">SUPER</td>
                    <td width="15%" align="left">MONTO</td>
                    <td width="15%"  align="left">&nbsp;</td>
				</table>
				';            
   $sql_consultacompras  = $var_conexion->consulta_comprasdeldia($fecha); #tablaventas     
        while ($datos_sql_consultacompras =@mysql_fetch_array($sql_consultacompras))
            {
				$i++; $j++;
				$folio = $datos_sql_consultacompras['folio'];
				$idSuper    = $datos_sql_consultacompras['super'];
				$Super    = $datos_sql_consultacompras['nomsuper'];
                $monto    = $datos_sql_consultacompras['monto'];
                $fechahoy = date(Y)."-".date(m)."-".date(d);	
				if($j==1){$color="#EEEEEE";}else{$color="#DFDFDF"; $j=0;}
				 echo '
				<table width="70%" border="0" cellpadding="0" cellspacing="0" bgcolor="'.$color.'" class="dato" align="center"><tr>
					<td width="20%" align="left">'.$folio.'</td>
					<td width="25%" align="left">'.utf8_decode($Super).'</td>
                    <td width="15%" align="left">'.$monto.'</td>
					<td width="15%" align="left">';
                      print '<a href="#"   
                        onclick="eliminar('."'".$folio."'".')">'.$imagen2.'</a>';
                      print '<a href="#"
                        onclick="actualizar('."'".$folio."'".','."'".$idSuper."'".','."'".$Super."'".','."'".$monto."'".')" >'.$imagen1.'</a>';
                    
				print '</td></tr>
                </table>';
			}
break;
}
?>     