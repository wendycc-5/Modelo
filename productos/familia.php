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
        despliegafamilias();
	});
	
	function guarda()
	{
		var var_descripcion = $('#txt_descripcion').val();
		var var_operacion = "alta";
		if(var_descripcion!="")
		{
		$("#divnotificacion").load("articulos/guarda_familia.php",{descripcion:var_descripcion,operacion:var_operacion});
			alert("Se ha registrado: "+var_descripcion);
            despliegafamilias();
		}
		
		$('#txt_descripcion').val('');
		$('#txt_descripcion').focus();
	}

	function eliminar(clave)
	{
        var var_operacion = "baja";
		if(clave!="")
		{
			$("#divnotificacion").load("articulos/guarda_familia.php",{idfamilia:clave,operacion:var_operacion});
			alert("Se ha eliminado dato ");
		}
	}

	function actualizar(var_codigo,var_descripcion)
	{		
		if(var_codigo!="" && var_descripcion!="")
		{
		  $("#div_actualizar").show();
 		  $('#idfamilia').val(var_codigo)
		  $('#c_concepto').val(var_descripcion)
        }
	}

   function actualizar_linea()
	{		
	  var_operacion    = "actualizar";
       var_idfamilia     = $('#idfamilia').val();
       var_descripcion = $('#c_concepto').val(); 
		if(var_descripcion!="")
		{
 			$("#divnotificacion").load("articulos/guarda_familia.php",{idfamilia:var_idfamilia,concepto:var_descripcion,operacion:var_operacion});
			alert("Se ha actualizado datos: ");
            $("#div_actualizar").hide();
            despliegafamilias();
            
          }else
          {
            alert("Datos erroneos");
            return false; 
          }
	}
    function despliegafamilias()
    {
		var var_operacion  = "lista";
        $("#divfamilias").load("articulos/guarda_familia.php",{operacion:var_operacion}); 
    }

</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 <title>Panel Familias</title>
</head>
<body>
<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" class="cuerpo">
  <tr>   <td colspan="3" class="dato"><hr/></td></tr>
  <tr class="etab_encabezado">
    <td width="700px"><?php echo $logo;?> &nbsp;NUEVA FAMILIA</td>
    <td colspan="2" align="right" width="200px">
               	  	<input name="Submit2" type="button" value="Guardar Familia" onclick="guarda()" />
    </td>
  </tr>
  <tr>    <td colspan="3" class="dato"><div id="divnotificacion"></div></td></tr>
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>
  <tr class="encabezado">
    <td>Nombre Familia:</td>
    <td colspan="2">
    <input name="txt_operador" type="hidden" id="txt_operador" size="10" value="<?php print $operador;?>"/>
    <input name="txt_descripcion" type="text" id="txt_descripcion" size="60" maxlength="55"/></td>
  </tr>
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>
  <tr>
    <td colspan="3">
	<div id="div_actualizar" style="display: none;">
       <table width="99%">
         <tr class="encabezado"><td>Concepto</td>
         <td> <input type="hidden" name="idfamilia" id="idfamilia" value="" />
              <input type="text" name="c_concepto" id="c_concepto" value="" size="60" maxlength="55"/></td>
         </tr>
         <tr><td colspan="2"><input name="btn_actualizar" id="btn_actualizar" type="submit"  onclick="actualizar_familia()"  value="Guardar"/></td></tr>
       </table>
    </div></td>
  </tr>
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <?php
  function nombremes($mes)
  {
    switch($mes)
    {
       case 1: $nmes="Enero";  break;         case 2: $nmes="Febrero";  break; 
       case 3: $nmes="Marzo";  break;         case 4: $nmes="Abril";  break; 
       case 5: $nmes="Mayo";  break;          case 6: $nmes="Junio";  break; 
       case 7: $nmes="Julio";  break;         case 8: $nmes="Agosto";  break; 
       case 9: $nmes="Septiembre";  break;         case 10: $nmes="Octubre";  break; 
       case 11: $nmes="Noviembre";  break;         case 12: $nmes="Diciembre";  break; 
    }
    return $nmes;
  }
  ?>
  <tr class="etab_encabezado2">
    <td colspan="3" class="subtitulo">DESGLOSE DE FAMILIAS</td>
  </tr>
  <tr>
    <td colspan="3" class="dato">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" class="encabezado">
      <div id="divfamilias" align="center">
	    <table width="70%" border="0" align="center" cellpadding="0" cellspacing="0">
         <tr class="etab_encabezado">
          <td width="20%">NI</td>
          <td width="35%">FAMILIA</td>
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