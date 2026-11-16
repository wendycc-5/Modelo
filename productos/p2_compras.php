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
        despliegacompras();
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
		var var_super = $('#super').val();
        var var_importe = $('#importe').val();
        
		var var_operacion = "alta";
		
        if(var_super!= 0 && var_importe!="")
		{
		$("#divnotificacion").load("productos/p2_operacionescompra.php",{idsuper:var_super,importe:var_importe,operacion:var_operacion});
			alert("Se ha registrado Compra de: "+var_super);
            despliegacompras();
		}
		
		$('#importe').val('');
		$('#importe').focus();
	}

	function eliminar(clave)
	{
        var var_operacion = "baja";
		if(clave!="")
		{
			$("#divnotificacion").load("productos/p2_operacionescompra.php",{idcompra:clave,operacion:var_operacion});
			alert("Se ha eliminado la Compra");
		}
	}

	function actualizar(var_codigo,var_id,var_super,var_monto)
	{		
		if(var_codigo!="" && var_super!="" && var_monto!="" )
		{
		  $("#div_actualizar").show();
 		  $('#idcompra').val(var_codigo)
		  $('#super2').val(var_id)
		  $('#super2').text(var_super)
          $('#importe2').val(var_monto)
        }
	}

   function actualizar_compra()
	{		
	  var_operacion    = "actualizar";
       var_idcompra     = $('#idcompra').val();
       var_super = $('#super2').val(); 
       var_importe = $('#importe2').val(); 
		if(var_super!=0 && var_importe!="")
		{
 			$("#divnotificacion").load("productos/p2_operacionescompra.php",{folio:var_idcompra,idsuper:var_super,importe:var_importe,operacion:var_operacion});
			alert("Se ha actualizado datos: ");
            $("#div_actualizar").hide();
            despliegacompras();
            
          }else
          {
            alert("Datos erroneos");
            return false; 
          }
	}
    //function despliegalineas()
    function despliegacompras()   
    {
		var var_operacion  = "lista";
        $("#divlineas").load("productos/p2_operacionescompra.php",{operacion:var_operacion}); 
    }

</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <title>Panel Compras</title>
</head>
<body>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" class="cuerpo">
  <tr>   <td colspan="3" class="dato"><hr/></td></tr>
  <tr class="etab_encabezado">
    <td><?php echo $logo;?> &nbsp;NUEVA COMPRA</td>
    <td colspan="2">
               	  	<input name="Submit2" type="button" value="Guardar Compra" onclick="guarda()" />
    </td>
  </tr>
  <tr>    <td colspan="3" class="dato"><div id="divnotificacion"></div></td></tr>
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>
  
  <tr>
  <td>Nombre Super:</td>
    <td colspan="2">
    <select name="super" id="super" onChange="javascript:validarIngreso(this.value,this.name);return false">
    <option value="0" selected>Seleccione...</option>
   <?php
        $dato_supers=$v_conexion->lista_supers();
       	while($datos_supers=@mysql_fetch_array($dato_supers)){
       	 print "<option value='".$datos_supers['ni']."'>".$datos_supers['nomsuper']."</option>";     
       	}
   ?>
  </select> 
     </td>
  </tr>
  <tr class="encabezado">
    <td>Monto de compra:</td>
    <td colspan="2">
    <input name="txt_operador" type="hidden" id="txt_operador" size="10" value="<?php print $operador;?>"/>
    <input type="text" id="importe" name="importe" size="10" maxlength="12" onChange="javascript:validar_valor(this.value,this.name);return false"/>
    </td>
  </tr>
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>
  <tr>
    <td colspan="3">
	<div id="div_actualizar" style="display: none;">
       <table width="99%">
           <tr>
            <td>Nombre Super:</td>
              <td>
              <input type="hidden" name="idcompra" id="idcompra" value="" />
              <select name="super2" id="super2" onChange="javascript:validarIngreso(this.value,this.name);return false">
              <option value="0" selected>Seleccione...</option>
             <?php
                   $dato_supers=$v_conexion->lista_supers();
       	           while($datos_supers=@mysql_fetch_array($dato_supers)){
       	           print "<option value='".$datos_supers['ni']."'>".$datos_supers['nomsuper']."</option>";     
       	           }
              ?>
             </select> 
           </td>
         </tr>
         <tr class="encabezado"><td>Monto</td>
         <td> 
              <!--<input type="text" name="c_concepto" id="c_concepto" value="" size="60" maxlength="55"/>-->
              <input type="text" id="importe2" name="importe2" size="10" maxlength="12" onChange="javascript:validar_valor(this.value,this.name);return false"/>
              </td>
              
         </tr>
         
         <tr><td colspan="2"><input name="btn_actualizar" id="btn_actualizar" type="submit"  onclick="actualizar_compra()" value="Guardar" /></td></tr>
       </table>
    </div></td>
  </tr>
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr class="etab_encabezado2">
    <td colspan="3" class="subtitulo">DESGLOSE DE COMPRAS DEL DIA</td>
  </tr>
  <tr>
    <td colspan="3" class="dato">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" class="encabezado">
      <div id="divlineas" align="center">
	    <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
         <tr class="etab_encabezado">
          <td width="20%">NI</td>
          <td width="25%">SUPER</td>
          <td width="15%">MONTO</td>
          <td width="15%">&nbsp;</td>
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