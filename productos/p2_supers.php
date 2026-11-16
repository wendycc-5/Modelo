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
		$('#txt_nombre').focus();
        despliegasupers();
	});
	
	function guarda()
	{
		var var_descripcion = $('#txt_nombre').val();
		var var_detalle = $('#txt_detalle').val();
        var var_operacion = "alta";
		if(var_descripcion!="")
		{
		$("#divnotificacion").load("productos/p2_operacionessupers.php",{descripcion:var_descripcion,detalle:var_detalle,operacion:var_operacion});
			alert("Se ha registrado: "+var_descripcion);
            despliegasupers();
		}
		
		$('#txt_nombre').val('');
        $('#txt_detalle').val('');
		$('#txt_descripcion').focus();
	}

	function eliminar(clave)
	{
        var var_operacion = "baja";
		if(clave!="")
		{
			$("#divnotificacion").load("productos/p2_operacionessupers.php",{idsuper:clave,operacion:var_operacion});
			alert("Se ha eliminado");
            despliegasupers();
		}
	}

	function actualizar(var_codigo,var_descripcion,var_detalle)
	{		
		if(var_codigo!="" && var_descripcion!="")
		{
		  $("#div_actualizar").show();
 		  $('#idsuper').val(var_codigo);
		  $('#c_nombre').val(var_descripcion);
          $('#c_detalle').val(var_detalle);
        }
	}

   function actualizar_super()
	{		
	  var_operacion     = "actualizar";
       var_idsuper    = $('#idsuper').val();
       var_descripcion = $('#c_nombre').val(); 
       var_detalle     = $('#c_detalle').val(); 
		if(var_descripcion!="")
		{
 			$("#divnotificacion").load("productos/p2_operacionessupers.php",{id:var_idsuper,nombre:var_descripcion,detalle:var_detalle,operacion:var_operacion});
			alert("Se ha actualizado datos ");
            $("#div_actualizar").hide();
            despliegasupers();
            
          }else
          {
            alert("Datos erroneos");
            return false; 
          }
	}
    function despliegasupers()
    {
		var var_operacion  = "lista";
        $("#divfamilias").load("productos/p2_operacionessupers.php",{operacion:var_operacion}); 
    }

</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <title>CRISLEO : Panel Supers</title>
</head>
<body>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" class="cuerpo">
  <tr>   <td colspan="3" class="dato"><hr/></td></tr>
  <tr class="etab_encabezado">
    <td><?php echo $logo;?> &nbsp;NUEVO SUPER</td>
    <td colspan="2">
               	  	<input name="Submit2" type="button" value="Guardar Super" onclick="guarda()" />
    </td>
  </tr>
  <tr>    <td colspan="3" class="dato"><div id="divnotificacion"></div></td></tr>
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>
  <tr>
    <td>Nombre Super:</td>
    <td colspan="2">
    <input name="txt_operador" type="hidden" id="txt_operador" size="10" value="<?php print $operador;?>"/>
    <input name="txt_nombre" type="text" id="txt_nombre" size="60" maxlength="55"/></td>
  </tr>
   <tr>
    <td>Detalles:</td>
    <td colspan="2">
    <input name="txt_detalle" type="text" id="txt_detalle" size="60" maxlength="200"/></td>
  </tr>
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>
  <tr>
    <td colspan="3">
	<!--Espacio de edicion-->
    <div id="div_actualizar" style="display: none;">
       <table width="99%">
       <tr class="etab_encabezado"><td colspan="3"> &nbsp;ACTUALIZAR DATOS SUPER</td></tr>
         <tr class="encabezado"><td>NOMBRE SUPER</td>
         <td> <input type="hidden" name="idsuper" id="idsuper" value="" />
              <input type="text" name="c_nombre" id="c_nombre" value="" size="60" maxlength="55"/></td>
         </tr>
         <tr class="encabezado"><td>DETALLES</td>
         <td> 
              <input type="text" name="c_detalle" id="c_detalle" value="" size="60" maxlength="200"/></td>
         </tr>
         <tr><td colspan="2"><input name="btn_actualizar" id="btn_actualizar" type="submit"  onclick="actualizar_super()"  value="Guardar"/></td></tr>
       </table>
    </div></td>
  </tr>
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr class="etab_encabezado2">
    <td colspan="3" class="subtitulo">DESGLOSE DE SUPERS</td>
  </tr>
  <tr>
    <td colspan="3" class="dato">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" class="encabezado">
      <div id="divfamilias" align="center">
	    <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
         <tr class="etab_encabezado">
          <td width="20%">ID</td>
          <td width="15%">NOMBRE</td>
         <td width="20%">DETALLES</td>
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