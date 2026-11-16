<?php
require("../configuracion/ClassProcesos.php");
$var_conexion = new procesos();
$operacion    = $_REQUEST['operacion'];

$operador=intval($_SESSION['operador']);
$tabla="tabla_clientes";
$campo ="familia";
switch($operacion)
{
 case "abona":   
 $cliente  = $_REQUEST['cliente'];
 $credito  = $_REQUEST['credito'];
 $deuda  = $_REQUEST['monto'];
 $saldo  = $_REQUEST['saldo'];
 ?>
<table  cellpadding="1" cellspacing="1" width="200px" align="center" style="border: solid black 1px;">
<tr class="etab_encabezado">
    <td width="700px" colspan="3">&nbsp;Abonar a Credito</td>
</tr>
<tr>
  <td>Fecha</td>
  <td colspan="2">Detalle</td>
</tr>
<tr>
 <td><input type="text" id="fecha" name="fecha" size="10" value="<?php print date("Y-m-d",time());?>"/></td>
 <td colspan="2">  
   <input name="ingreso" type="text" id="ingreso" size="10" value="<?php print $credito;?>" readonly="true"/> /
   <input name="cliente" type="text" id="cliente" size="10" value="<?php print $cliente;?>" readonly="true"/>
   <input name="deuda" type="hidden" id="deuda" size="50" value="<?php print $deuda;?>"/>
 </td>
</tr>
<tr>
  <td>Saldo</td>
  <td>Importe</td>                                                                                
  <td>&nbsp;</td>
</tr>
<tr> 
<td>  
   <input name="saldo" type="text" id="saldo" size="15" value="<?php print $saldo;?>" readonly="true"/>
 </td>
 <td><input type="text" id="importe" name="importe" size="10" maxlength="12" onChange="javascript:validar_valor(this.value,this.name);return false"/></td>
  <td><input name="Submit3" type="button" class="boton" value="Guardar Cambios" onclick="abonar()" /></td>
</tr> 
</table>
  
 
 <?php          
break;
case "abono":  

$id_cliente  = $_REQUEST['cliente'];
$idcredito = $_REQUEST['credito'];
$importe = $_REQUEST['importe'];
$saldoactual         = $_REQUEST['saldo'];
$deuda  = $_REQUEST['deuda'];

       $saldonuevo=$saldoactual - $importe;
       if($saldonuevo > 0)
       {$status="activo";}else{$status="pagado";}
           
                   if($var_conexion->registrar_abono($idcredito,$id_cliente,$importe,$operador)==true){
                   $actualizar_credito = $var_conexion->actualizar_credito($idcredito,$saldonuevo,$status);  
                     print "Se Ha Registrado Abono"; 
                     
                     
                     }else{
                     print "No se pudo Registrar Abono"; 
                     }
                 
break;

case "lista":  
	$imagen1='<img class="icono" src="imgs/editar.png" width="25px" height="25px" align="middle"/>'; 
	$imagen2='<img class="icono" src="imgs/delete.png" width="25px" height="25px" align="middle"/>';

				$sql_consultaCREDITOS  = $var_conexion->consulta_lstClientesconCreditos();
                echo '
				<table width="70%" border="0" cellpadding="0" cellspacing="0" class="encabezado" align="center">
                <tr class="etab_encabezado"> 
					<td width="15%" align="left">CLIENTE</td>
					<td width="15%" align="left">CUENTA</td>
					<td width="15%" align="left">DEBE(MONTO)</td>
					<td width="15%" align="left">FALTA(SALDO)</td>
                    <td width="10%  align="left">&nbsp;</td></tr>
				</table>';
                $ii=0; $jj=0;
            while ($datos_consultaCREDITOS = @mysql_fetch_array($sql_consultaCREDITOS))
            {
				$ii++; $jj++;
				$id_credito = $datos_consultaCREDITOS['ni'];
				$id_cliente = $datos_consultaCREDITOS['idcliente'];
                $razon_social2   = $datos_consultaCREDITOS['razon_social'];
                $idventa = $datos_consultaCREDITOS['id_venta'];
				$monto    = $datos_consultaCREDITOS['monto'];
                $saldo = $datos_consultaCREDITOS['saldo'];
                $propietario2    = $datos_consultaCREDITOS['propietario'];
                $ntienda = $razon_social2."/".$propietario2;
                
                if($jj==1){$color2="#EEEEEE";}else{$color2="#DFDFDF"; $jj=0;}
				 echo '
				<table width="70%" border="0" cellpadding="0" cellspacing="0" bgcolor="'.$color2.'" class="dato" align="center"><tr>
					<td width="15%" align="left">'.utf8_decode($ntienda).'</td>
					<td width="15%" align="left">'.$idventa.'</td>
					<td width="15%" align="left">'.$monto.'</td>
                    <td width="15%" align="left">'.$saldo.'</td>
                    <td width="10%" align="left">';
                      print '<a href="#"
                        onclick="abona('."'".$id_credito."'".','."'".$id_cliente."'".','."'".$monto."'".','."'".$saldo."'".')" >Abonar</a>';

				?>
                          <a href="#" onClick="javascript:desglose_dia('<?php echo $id_credito;?>','<?php echo $id_cliente;?>');return false" >Desglose</a>
                 <?php  
                print '</td></tr>
                </table>';
			}
break;
}
?>     