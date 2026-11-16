<?php
require("../configuracion/ClassProcesos.php");
$var_conexion = new procesos();
$operacion    = $_REQUEST['operacion'];

$operador=intval($_SESSION['operador']);
$tabla="tabla_clientes";
$campo ="familia";
switch($operacion)
{   
 case "actualiza":   
 $cliente  = $_REQUEST['cliente'];
 $rfc  = $_REQUEST['rfc'];
 $propietario  = $_REQUEST['propietario'];
 $razonsocial  = $_REQUEST['razonsocial'];
 $domicilio  = $_REQUEST['domicilio'];
 $tels = $_REQUEST['tels']; 
 ?>
  <table width="900" border="0" align="center" cellpadding="0" cellspacing="0" class="cuerpo">
  <tr>   <td colspan="3" class="dato"><hr/></td></tr>
  <tr class="etab_encabezado">
    <td width="700px">&nbsp;Actualziar Datos Cliente</td>
    <td colspan="2" align="left" width="200px">
               	<input name="Submit3" type="button" class="boton" value="Guardar Cambios" onclick="actualiza()" />
                <input name="cliente" type="hidden" id="cliente" value="<?php print $cliente;?>" size="3"/>
    </td>
  </tr>
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>
  <tr>
          <td colspan="3" class="dato">
          <table width="90%" border="0">
          <tr>
            <td class="subtitulo">Nombre propietario:</td>
            <td colspan="2"><input name="txt_propietario1" type="text" id="txt_propietario1" value="<?php print $propietario;?>" size="55" maxlength="55"/></td>
          </tr>
          <tr>
            <td class="subtitulo">Razon social (Nombre Tienda):</td>
            <td width="697"><input name="txt_razonsocial1" type="text" id="txt_razonsocial1" value="<?php print $razonsocial;?>" size="45" maxlength="75" /></td>
            <td width="41" class="dato">&nbsp;</td>
          </tr>
          <tr> 
            <td align="center" class="subtitulo">RFC:</td>
            <td colspan="2" align="center">
			<div align="left">
            <input name="txt_rfc1" type="text" id="txt_rfc1" value="<?php print $rfc;?>" size="12" maxlength="20" />
            
            </div>
           
           </td>
          </tr>
          <tr> 
             <td align="center" class="subtitulo">Domicilio :</td>
             <td colspan="2" align="center"><div align="left">
             <input name="txt_domicilio1" type="text" id="txt_domicilio1" value="<?php print $domicilio;?>" size="55" maxlength="120" />
             </div></td>
          </tr>
          <tr>
             <td align="center" class="subtitulo">Telefonos :</td>
             <td colspan="2" align="center"><div align="left">
             <input name="txt_telefonos1" type="text" id="txt_telefonos1" value="<?php print $tels;?>" size="20" maxlength="25"/>
             </div></td>
          </tr>
            </table>
         </td> 
  </tr>       
</table>              
 
 <?php
                
break;
case "baja":      
 $idcliente        = $_REQUEST['codigo']; #idcliente 
 $tabla = "tabla_pedidos"; 
$tabla1 = "tabla_ventas";
                 $exit =0;
                 $sql_enusoLinea =$var_conexion->consulta_enusoCTPyV($idcliente,$tabla);
                 $usoenpedidos = @mysql_num_rows($sql_enusoLinea);
                 
                 $sql_enusoVentas =$var_conexion->consulta_enusoCTPyV($idcliente,$tabla1);
                 $usoenventas = @mysql_num_rows($sql_enusoVentas);
                 
                if(($usoenpedidos ==0) && ($usoenventas ==0))
                { 
                 if ($var_conexion->eliminar_xCliente($idcliente) == true) #tabla_clientes
                  { print "Operacion Exitosa";}else{print "Operacion Fallida";}
                }else
                {
                   print "No se elimino/Cliente en Uso"; 
                }  
break;
case "actualizar":  

$cliente  = $_REQUEST['cliente'];
$propietario = $_REQUEST['propietario'];
$razonsocial = $_REQUEST['razonsocial'];
$rfc         = $_REQUEST['rfc'];
$domicilio  = $_REQUEST['domicilio'];
$telefonos  = $_REQUEST['telefonos'];
            
if($propietario!="" and $razonsocial!="")
{
    if ($var_conexion->actualizar_dataCliente($cliente,$razonsocial,$rfc,$domicilio,$telefonos,$propietario) == true) #tabla_linea
                  { print "Operacion Exitosa";}else{ print "Error Paso de Parametros";}
}

                 
break;
case "lista":  
	$imagen1='<img class="icono" src="imgs/editar.png" width="25px" height="25px" align="middle"/>'; 
	$imagen2='<img class="icono" src="imgs/delete.png" width="25px" height="25px" align="middle"/>';
                echo '
				<table width="70%" border="0" cellpadding="0" cellspacing="0" class="encabezado" align="center">
                <tr class="etab_encabezado"> <td colspan="5" align="center">Desglose de Clientes</td>
                <tr>
					<td width="15%" align="left">PROPIETARIO</td>
					<td width="15%" align="left">RAZON SOCIAL</td>
					<td width="15%" align="left">DIRECCION</td>
					<td width="15%" align="left">TELEFONOS</td>
                    <td width="10%  align="left">&nbsp;</td></tr>
				</table>
				';            
   $sql_consultaClientes  = $var_conexion->consulta_lstClientes(); #tablaventas  
   $i=0; $j=0;   
        while ($datos_consultaClientes = @mysql_fetch_array($sql_consultaClientes))
            {
				$i++; $j++;
				$ni_cliente = $datos_consultaClientes['ni'];
				$razon_social   = $datos_consultaClientes['razon_social'];
                $rfc = $datos_consultaClientes['rfc'];
				$domicilio    = $datos_consultaClientes['domicilio'];
                $telefonos = $datos_consultaClientes['telefonos'];
                $propietario    = $datos_consultaClientes['propietario'];
                
                $fechahoy = date('Y')."-".date('m')."-".date('d');	
				if($j==1){$color="#EEEEEE";}else{$color="#DFDFDF"; $j=0;}
				 echo '
				<table width="70%" border="0" cellpadding="0" cellspacing="0" bgcolor="'.$color.'" class="dato" align="center"><tr>
					<td width="15%" align="left">'.$propietario.'</td>
					<td width="15%" align="left">'.$razon_social.'</td>
					<td width="15%" align="left">'.$domicilio.'</td>
                    <td width="15%" align="left">'.$telefonos.'</td>
                    <td width="10%" align="left">';
                      print '<a href="#"   
                        onclick="eliminar('."'".$ni_cliente."'".')">'.$imagen2.'</a>';
                      print '<a href="#"
                        onclick="actualizar('."'".$ni_cliente."'".','."'".$rfc."'".','."'".$propietario."'".','."'".$razon_social."'".','."'".$domicilio."'".','."'".$telefonos."'".')" >'.$imagen1.'</a>';
                    
				print '</td></tr>
                </table>';
			}
break;
}
?>     