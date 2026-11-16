  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="jquery.js"></script>
<script>
	//inicializar controles y posicionar el mensaje donde el cursor
    $(document).ready(function(){			});
    	//inicializar controles y posicionar el mensaje donde el cursor
	//$(document).ready(function() { cargar_productos(); });
	
	function refrescar()
    {
      window.location.reload();  
    }
    //update septiembre 24 2021
    //function cargar_articulos()
    function cargar_productos()
    { 
        var var_familia  = $('#lbl_familia').val();
        $("#divarticuloss").load("productos/w_p2_buscarproductos.php",{familia:var_familia});
    }    

    
	function observar(cod)
	{
        var_operacion ="observar";
		var var_codigo = cod;
		$("#existe_update").load("productos/w_p2_revisacodalta.php",{codigo:var_codigo,operacion:var_operacion});
	}

	function actualiza()
	{
	   var_operacion   ="actualizar";
		var var_codigo = $('#codigo_up').val();
		var var_descripcion = $('#descripcion_update').val();
		var var_precio      = $('#precio_update').val();
		var var_familia      = $('#familia_update').val();
		var var_proveedor1  = $('#proveedor_update').val();
		var var_costo1      = $('#costo1_update').val();
		var var_unidadm     = $('#unidadm_update').val();
        //alert("d"+var_descripcion+"pr"+var_precio+"ln"+var_linea+"f"+var_familia+"sf"+var_sfamilia+"co"+var_costo1+"um"+var_unidadm)
		if(var_codigo!="" && var_descripcion!="") //actualiza_articulo.php
		{
			$("#resultado").load("productos/p2_revisacodalta.php",{codigo:var_codigo,descripcion:var_descripcion,precio:var_precio,familia:var_familia,proveedor:var_proveedor1,costo:var_costo1,unidad:var_unidadm,operacion:var_operacion});
			alert("Se ha actualizado el Producto: "+var_codigo);
            cargar_productos();
		}
		
		$('#codigo_up').val('')
		$('#descripcion_update').val('')
		$('#precio_update').val('')
		$('#proveedor1_update').val('');
		$('#costo1_update').val('');
		$('#codigo_update').focus();
	}
    	function actualiza2()
	{
	   var_operacion   ="actualizar";
		var var_codigo = $('#codigo_up1').val();
		var var_descripcion = $('#descripcion_update1').val();
		var var_precio      = $('#precio_update1').val();
		var var_familia      = $('#familia_update1').val();
		var var_proveedor1  = $('#proveedor_update1').val();
		var var_costo1      = $('#costo1_update1').val();
		var var_unidadm     = $('#unidadm_update1').val();
        //alert("d"+var_descripcion+"pr"+var_precio+"ln"+var_linea+"f"+var_familia+"sf"+var_sfamilia+"co"+var_costo1+"um"+var_unidadm)
		if(var_codigo!="" && var_descripcion!="") //actualiza_articulo.php
		{
			$("#resultado").load("productos/p2_revisacodalta.php",{codigo:var_codigo,descripcion:var_descripcion,precio:var_precio,familia:var_familia,proveedor:var_proveedor1,costo:var_costo1,unidad:var_unidadm,operacion:var_operacion});
			alert("Se ha actualizado el Producto: "+var_codigo);
            cargar_productos();
		}
		
		$('#codigo_up1').val('')
		$('#descripcion_update1').val('')
		$('#precio_update1').val('')
		$('#proveedor1_update1').val('');
		$('#costo1_update1').val('');
		$('#codigo_update1').focus();
	}	
	
	function revisa_update() //listo
	{
        var_operacion ="ver";
		var var_codigo = $('#codigo_update').val(); //revisa_codigo_update.php
		$("#existe_update").load("productos/w_p2_revisacodalta.php",{codigo:var_codigo,operacion:var_operacion});
	}

</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Panel de Productos</title>
</head>
<body>
<?php
     $logo='<img class="logo" src="imgs/caja.jpg" width="60px" height="60px" align="middle"/>'; 
	$imagen1='<img class="icono" src="imgs/add.png" width="30px" height="30px" align="middle"/>'; 
	$imagen2='<img class="icono" src="imgs/catalogo.png" width="30px" height="30px" align="middle"/>'; 
  ?>

<table width="900" border="0" align="center" cellpadding="0" cellspacing="0" class="cuerpo">
  <tr>   <td colspan="3" class="dato"><hr/></td></tr>
  <tr>    <td colspan="3" class="dato"><div id="resultado"></div></td></tr>
  <tr>   <td colspan="3" class="dato"><hr/></td></tr>
  <tr class="etab_encabezado">
    <td width="700px"><?php echo $logo;?> &nbsp;Visualizar Producto</td>
    <td colspan="2" align="left" width="200px">
               	<!--<input name="Submit" type="button" class="boton" value="Actualizar" onclick="actualiza()" />-->
    </td>
  </tr>
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>
  <tr>
          <td colspan="3" class="dato">
          <table width="90%" border="0">
          <tr class="etab_encabezado2">
             <td class="dato">C&oacute;digo de Barras:</td>
             <td colspan="2"><input name="codigo_update" type="text" id="codigo_update" size="20" onchange="revisa_update()" onkeyup="revisa_update()" /></td>
         </tr>
         <tr>
             <td colspan="3" class="dato">
               <div id="existe_update" align="center"></div>
             </td>
      </tr>
     </table> 
     </td>
 </tr>
  <tr>   <td colspan="3" class="dato"><hr/></td></tr>
  <tr class="etab_encabezado">
    <td width="700px"><?php echo $logo;?> &nbsp;Buscar Productos</td>
    <td colspan="2" align="left" width="200px">
               	<input name="btnbuscar" type="button" class="boton" value="Buscar" onclick="cargar_productos()" />
    </td>
  </tr>
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>
   <?php
      include_once("configuracion/ClassProcesos.php");
      $var_conexion = new procesos();
			 ?>
   <tr>
    <td colspan="3">Familia
            <select name="lbl_familia" id="lbl_familia" onchange="cargar_productos()">
            <option value="0">Seleccione...</option>
            <option value="0">Todos</option> 
             <?php
             $tablaf ="tabla_familia";
             $campof = "familia";
             $sql_consultas_familia  = $var_conexion->consulta_CATS($campof,$tablaf); #tablaventas     
             while ($datos_sql_consultas_familia =mysql_fetch_array($sql_consultas_familia))
             {
				$clave_familia = $datos_sql_consultas_familia['ni'];
				$conceptof    = $datos_sql_consultas_familia['familia'];
                echo '<option value="'.$clave_familia.'">'.$conceptof.'</option>';
             }   
             ?>
             
            </select>      
    </td>
  </tr>
  <tr>   <td colspan="3" class="dato"><hr/></td></tr>
  <tr>   <td colspan="3" ><div id="divarticuloss"></div></td></tr>
</table>
</body>
</html>