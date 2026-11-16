<?php
	  require("configuracion/ClassProcesos.php");
      $v_conexion = new procesos();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="jquery.js"></script>
<script>
	//inicializar controles y posicionar el mensaje donde el cursor
	$(document).ready(function()
	{			
		$('#txt_descripcion').focus();
        despliegamermas();
	});
	
    function validarIngreso(valor,campo) {
    var n_campo = document.getElementById(String(campo));
   if(valor == "" || valor== 0 ){
    alert('Seleccione el credito');
    n_campo.focus();
    return false;
   }else{
    return false;
   }
   } 
   function validar_valor(valor,campo) {
    var invalidos=/([abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ])/;
    var n_campo = document.getElementById(String(campo));
   if(valor == "" || valor<= 0 || (invalidos.test(valor))){
    alert('Ingrese Valor Valido');
    n_campo.value=0;
    n_campo.focus();
    return false;
   }else{
    return false;
   }
 } 
	function guarda()
	{
		var var_producto = $('#producto').val();
        var var_importe = $('#importe').val();
		var var_cantidad = $('#cantidad').val();
        var var_detalles = $('#detalles').val();
        
		var var_operacion = "alta";
		
        if(var_producto!= 0 && var_importe!="")
		{
		$("#divnotificacion").load("productos/p2_operacionesmermas.php",{codigo:var_producto,cantidad:var_cantidad,importe:var_importe,detalles:var_detalles,operacion:var_operacion});
			alert("Se ha registrado Merma de: "+var_producto);
            despliegamermas();
		}
		
		$('#importe').val('');
		$('#detalles').val('');
        $('#cantidad').val('');
        $('#importe').focus();
        
	}

	function eliminar(clave)
	{
        var var_operacion = "baja";
		if(clave!="")
		{
			$("#divnotificacion").load("productos/p2_operacionesmermas.php",{folio:clave,operacion:var_operacion});
			alert("Se ha eliminado la Compra");
            despliegamermas();
		}
	}

	function actualizar(var_codigo,var_idproducto,var_descripcion,var_cantidad,var_detalles,var_monto)
	{		
		if(var_codigo!="" && var_idproducto!="" && var_monto!="" )
		{
		  $("#div_actualizar").show();
 		  $('#folio').val(var_codigo)
		  $('#producto2').val(var_idproducto)
		  $('#producto2').text(var_descripcion)
          $('#cantidad2').val(var_cantidad)
         $('#detalles2').val(var_detalles)
         $('#importe2').val(var_monto)
        }
	}

   function actualizar_merma()
	{		
	  var_operacion    = "actualizar";
       var_folio     = $('#folio').val();
       var_id = $('#producto2').val(); 
       var_cantidad = $('#cantidad2').val();
       var_detalles = $('#detalles2').val();
       var_importe = $('#importe2').val(); 
		if(var_super!=0 && var_importe!="")
		{
 			$("#divnotificacion").load("productos/p2_operacionesmermas.php",{folio:var_folio,producto:var_id,cantidad:var_cantidad,detalles:var_detalles,importe:var_importe,operacion:var_operacion});
			alert("Se ha actualizado datos: ");
            $("#div_actualizar").hide();
            despliegamermas();
            
          }else
          {
            alert("Datos erroneos");
            return false; 
          }
	}
    //function despliegalineas()
    function despliegamermas()   
    {
		var var_operacion  = "lista";
        $("#divmermas").load("productos/p2_operacionesmermas.php",{operacion:var_operacion}); 
    }

</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <title> Panel Compras</title>
</head>
<body>
<table width="900px" border="0" align="center" cellpadding="0" cellspacing="0" class="cuerpo">
  <tr>   <td colspan="3" class="dato"><hr/></td></tr>
  <tr class="etab_encabezado">
    <td ><?php echo $logo;?> &nbsp;AGREGAR MERMA</td>
    <td colspan="2">
               	  	<input name="Submit2" type="button" value="Guardar Merma" onclick="guarda()" />
    </td>
  </tr>
  <tr>    <td colspan="3" class="dato"><div id="divnotificacion"></div></td></tr>
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>
  
  <tr>
  <td>PRODUCTO:</td>
    <td colspan="2">
    <input name="txt_operador" type="hidden" id="txt_operador" size="10" value="<?php print $operador;?>"/>
    <select name="producto" id="producto" onChange="javascript:validarIngreso(this.value,this.name);return false">
    <option value="0" selected>Seleccione...</option>
   <?php
        $dato_productos=$v_conexion->listar_productosm();
       	while($datos_productos=@mysql_fetch_array($dato_productos)){
       	 print "<option value='".$datos_productos['codigo']."'>".$datos_productos['descripcion']."</option>";     
       	}
   ?>
  </select> 
     </td>
  </tr>
    <tr class="encabezado">
    <td>CANTIDAD:</td>
    <td colspan="2">
    <input type="text" id="cantidad" name="cantidad" size="10" maxlength="12" onChange="javascript:validar_valor(this.value,this.name);return false"/>
    </td>
  </tr>
    <tr class="encabezado">
    <td>MONTO DE MERMA:</td>
    <td colspan="2">
<input type="text" id="importe" name="importe" size="10" maxlength="12" onChange="javascript:validar_valor(this.value,this.name);return false"/>    
    </td>
  </tr>
  <tr class="encabezado">
    <td>DETALLES:</td>
    <td colspan="2">
    <input type="text" id="detalles" name="detalles" size="25" maxlength="100" />
    </td>
  </tr>
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>
  <tr>
    <td colspan="3">
    <!--
    --- Espacio de edición de merma
    ---
    -->
	<div id="div_actualizar" style="display: none;">
       <table width="99%">
           <tr>
            <td>PRODUCTO:</td>
              <td>
              <input type="hidden" name="folio" id="folio" value="" />
                <select name="producto2" id="producto2" onChange="javascript:validarIngreso(this.value,this.name);return false">
                 <option value="0" selected>Seleccione...</option>
                 <?php
                   $dato_productos=$v_conexion->listar_productosm();
                 	while($datos_productos=@mysql_fetch_array($dato_productos)){
       	           print "<option value='".$datos_productos['codigo']."'>".$datos_productos['descripcion']."</option>";     
       	          }
                 ?>
                </select>  
           </td>
         </tr>
             <tr class="encabezado">
              <td>CANTIDAD:</td>
              <td colspan="2">
               <input type="text" id="cantidad2" name="cantidad2" size="10" maxlength="12" onChange="javascript:validar_valor(this.value,this.name);return false"/>
              </td>
              </tr>
              <tr class="encabezado">
               <td>MONTO DE MERMA:</td>
               <td colspan="2">
                 <input type="text" id="importe2" name="importe2" size="10" maxlength="12" onChange="javascript:validar_valor(this.value,this.name);return false"/>    
               </td>
              </tr>
             <tr class="encabezado">
               <td>DETALLES:</td>
               <td colspan="2">
                 <input type="text" id="detalles2" name="detalles2" size="25" maxlength="100" />
               </td>
             </tr>
         
         <tr><td colspan="2"><input name="btn_actualizar" id="btn_actualizar" type="submit"  onclick="actualizar_merma()" value="Guardar" /></td></tr>
       </table>
    </div></td>
  </tr>
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>

  <tr class="etab_encabezado2">
    <td colspan="3" class="subtitulo">DESGLOSE DE MERMAS DEL DIA</td>
  </tr>
  <tr>
    <td colspan="3" class="dato">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" class="encabezado">
      <div id="divmermas" align="center">
	    <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
         <tr class="etab_encabezado">
          	<td width="20%" align="left">FOLIO</td>
					<td width="25%" align="left">PRODUCTO</td>
                    <td width="15%" align="left">MONTO</td>
                    <td width="15%"  align="left">&nbsp;</td>
         </tr>
        </table>
      </div></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><div id="resultado"></div></td>
  </tr>
</table>
</body>
</html>