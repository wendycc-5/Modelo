<?php
$flag=0;
 $cliente  = $_REQUEST['cliente'];
 $rfc  = $_REQUEST['rfc'];
 $propietario  = $_REQUEST['propietario'];
 $razonsocial  = $_REQUEST['razonsocial'];
 $domicilio  = $_REQUEST['domicilio'];
 $tels = $_REQUEST['tels']; 
	
 echo '<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" class="cuerpo">
  <tr>   <td colspan="3" class="dato"><hr/></td></tr>
  <tr class="etab_encabezado">
    <td width="700px">&nbsp;Actualziar Datos Cliente</td>
    <td colspan="2" align="left" width="200px">
               	<input name="Submit3" type="button" class="boton" value="Guardar Cambios" onclick="actualiza()" />
                <input name="cliente" type="hidden" id="cliente" value="'.$cliente.'" size="3"/>
    </td>
  </tr>
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>
  <tr>
          <td colspan="3" class="dato">
          <table width="90%" border="0">
          <tr>
            <td class="subtitulo">Nombre propietario:</td>
            <td colspan="2"><input name="txt_propietario1" type="text" id="txt_propietario1" value="'.$propietario.'" size="55" maxlength="55"/></td>
          </tr>
          <tr>
            <td class="subtitulo">Razon social (Nombre Tienda):</td>
            <td width="697"><input name="txt_razonsocial1" type="text" id="txt_razonsocial1" value="'.$razonsocial.'" size="45" maxlength="75" /></td>
            <td width="41" class="dato">&nbsp;</td>
          </tr>
          <tr> 
            <td align="center" class="subtitulo">RFC:</td>
            <td colspan="2" align="center">
			<div align="left">
            <input name="txt_rfc1" type="text" id="txt_rfc1" value="'.$rfc.'" size="12" maxlength="20" />
            
            </div>
           
           </td>
          </tr>
          <tr> 
             <td align="center" class="subtitulo">Domicilio :</td>
             <td colspan="2" align="center"><div align="left">
             <input name="txt_domicilio1" type="text" id="txt_domicilio1" value="'.$domicilio.'" size="55" maxlength="120" />
             </div></td>
          </tr>
          <tr>
             <td align="center" class="subtitulo">Telefonos :</td>
             <td colspan="2" align="center"><div align="left">
             <input name="txt_telefonos1" type="text" id="txt_telefonos1" value="'.$tels.'" size="20" maxlength="25"/>
             </div></td>
          </tr>
            </table>
         </td> 
  </tr>       
</table>';      

?>