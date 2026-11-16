<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="jquery.js"></script>
<script>
	//inicializar controles y posicionar el mensaje donde el cursor
	$(document).ready(function()
	{			});
	
	function refrescar()
    {
      window.location.reload();  
    }
	//Guarda nuevo Producto
	function guarda()
	{
		var var_codigo       = $('#codigo_insert').val();
		//var var_clave        = $('#clave_insert').val();  clave:var_clave
		var var_descripcion  = $('#descripcion_insert').val();
		var var_precio     = $('#precio_insert').val();
		var var_familia      = $('#txt_familia').val();
	    var var_proveedor1 = $('#proveedor1').val();
		var var_costo1     = $('#costo1').val();		
		var var_unidadm    = $('#unidadm').val();
		var bandera =0;
  		//alert(var_familia+"lin"+var_linea);
		if(var_codigo!="" && var_descripcion!="")
		{
	       if(var_familia != '0'){  
            if(var_unidadm != '0'){
   		        bandera =1;
                $("#resultado").load("productos/p2_guardaproducto.php",{codigo:var_codigo,descripcion:var_descripcion,precio:var_precio,familia:var_familia,proveedor1:var_proveedor1,costo1:var_costo1,unidadm:var_unidadm});
		    	alert("Se ha registrado el Producto: "+var_codigo);			 
            }else
            {
   	 	      alert("Error: Sin Seleccion de Unidad de Medida");
              $('#unidadm').focus();                  
            }
          }else
           {
		    alert("Error: Sin Seleccion de Categoria de Producto");
            $('#txt_familia').focus();  
           }
        
		}
		
        if(bandera !=0)
        {
      		$('#codigo_insert').val('');
            $('#descripcion_insert').val('');
		    $('#precio_insert').val('');
		    $('#proveedor1').val('');
		    $('#costo1').val('');
		    $('#codigo_insert').focus();
        }
       }
    //update septiembre 24 2021
    //function cargar_articulos()
    function cargar_productos()
    { 
        var var_familia  = $('#lbl_familia').val();
        $("#divarticuloss").load("productos/p2_buscarproductos.php",{familia:var_familia});
    }    

	function elimina()
	{
	    var_operacion  ="elimina";
		var var_codigo = $('#codigo_del').val();
		if(var_codigo!="")
		{  //elimina_articulo.php
			$("#resultado").load("productos/p2_revisacodalta.php",{codigo:var_codigo,operacion:var_operacion});
			alert("Se ha eliminado el Producto: "+var_codigo);
            cargar_productos();
			$('#codigo_del').val('');
			$('#existe_borra').text('');
			$('#codigo_del').focus();
		}
	}
	function eliminar(cod)
	{
	    var_operacion  ="elimina";
		var var_codigo = cod;
		if(var_codigo!="")
		{  	$("#resultado").load("productos/p2_revisacodalta.php",{codigo:var_codigo,operacion:var_operacion});
			alert("Se ha eliminado el Producto: "+var_codigo);
            cargar_productos();
		}
	}
    
	function actualizar(cod)
	{
        var_operacion ="actualiza2";
		var var_codigo = cod;
		$("#existe_update").load("productos/p2_revisacodalta.php",{codigo:var_codigo,operacion:var_operacion});
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

	function revisa_alta()
	{
	   var_operacion ="alta";
		var var_codigo = $('#codigo_insert').val();
		$("#existe_alta").load("productos/p2_revisacodalta.php",{codigo:var_codigo,operacion:var_operacion});
	}
         
    function revisaclave()
    {
	   var_operacion ="altaclave";
		var var_clave = $('#clave_insert').val();
		$("#existe_clave").load("productos/p2_revisacodalta.php",{clave:var_clave,operacion:var_operacion});        
    }
	
	function revisa_del()
	{
        var_operacion ="baja";
		var var_codigo = $('#codigo_del').val(); //revisa_codigo_borra.php
		$("#existe_borra").load("productos/p2_revisacodalta.php",{codigo:var_codigo,operacion:var_operacion});
	}
	
	function revisa_update()
	{
        var_operacion ="actualiza";
		var var_codigo = $('#codigo_update').val(); //revisa_codigo_update.php
		$("#existe_update").load("productos/p2_revisacodalta.php",{codigo:var_codigo,operacion:var_operacion});
	}
	function revisaclave_update()
	{
        var_operacion ="actualizaclave";
		var var_codigo = $('#clave_update').val(); //revisa_codigo_update.php
		$("#existe_update").load("productos/p2_revisacodalta.php",{clave:var_codigo,operacion:var_operacion});
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
  <tr class="etab_encabezado">
    <td width="700px"><?php echo $logo;?> &nbsp;Registrar Nuevo Producto</td>
    <td colspan="2" align="left" width="200px">
               	<input name="Submit2" type="button" class="boton" value="Registrar" onclick="guarda()" />
    </td>
  </tr>
  <tr>    <td colspan="3" class="dato"><div id="resultado"></div></td></tr>
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>
  <tr>
          <td colspan="3" class="dato">
          <table width="90%" border="0">
           <tr>
            <td width="162" class="subtitulo">C&oacute;digo de Barras : </td>
            <td colspan="2">
	          <input name="codigo_insert" type="text" id="codigo_insert" size="20" onchange="revisa_alta()" onkeyup="revisa_alta()" />
	          <div id="existe_alta"></div></td>
          </tr>
          <tr>
            <td class="subtitulo">Descripci&oacute;n:</td>
            <td colspan="2"><input name="descripcion_insert" type="text" id="descripcion_insert" size="100" /></td>
          </tr>
          <tr>
            <td class="subtitulo">Precio Venta:</td>
            <td width="697"><input name="precio_insert" type="text" id="precio_insert" size="20" /></td>
            <td width="41" class="dato">&nbsp;</td>
          </tr>
          <tr> 
            <td align="center" class="subtitulo">FAMILIA:</td>
            <td colspan="2" align="center">
			 <?php
      include_once("configuracion/ClassProcesos.php");
      $var_conexion = new procesos();
			 ?>
			<div align="left">
            <select name="txt_familia" id="txt_familia">
            <option value="0">Seleccione...</option>
             <?php
             $tablaf = 'tabla_familia';
             $campof = 'familia';
             $sql_consultas_familia  = $var_conexion->consulta_CATS($campof,$tablaf); #tablaventas     
             while ($datos_sql_consultas_familia =mysql_fetch_array($sql_consultas_familia))
             {
				$clave_familia = $datos_sql_consultas_familia['ni'];
				$conceptof    = $datos_sql_consultas_familia['familia'];
                echo '<option value="'.$clave_familia.'">'.$conceptof.'</option>';	
			 }   
             ?>
            </select>
           </div></td>
          </tr>
          <tr>
            <td align="center" class="subtitulo">Unidad de medida:</td>
            <td colspan="2" align="center"><div align="left">
            <select name="unidadm" id="unidadm">
              <option value="PZA">PZA</option>
              <option value="KG">KG</option>
              <option value="PAQ">PAQ</option>
            </select>
            </div></td>
          </tr>
          <tr> 
             <td align="center" class="subtitulo">Observacion:</td>
             <td colspan="2" align="center"><div align="left">
             <input name="proveedor1" type="text" id="proveedor1" size="40" />
             </div></td>
          </tr>
          <tr>
             <td align="center" class="subtitulo">Costo :</td>
             <td colspan="2" align="center"><div align="left">
             <input name="costo1" type="text" id="costo1" size="20" />
             </div></td>
          </tr>
            </table>
         </td> 
  </tr>       
  <tr>   <td colspan="3" class="dato"><hr/></td></tr>
  <tr class="etab_encabezado">
    <td width="700px"><?php echo $logo;?> &nbsp;Eliminar un Producto</td>
    <td colspan="2" align="left" width="200px">
               	<input name="Submit22" type="button" class="boton" value="Eliminar" onclick="elimina()" />
    </td>
  </tr>
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>
  <tr>
          <td colspan="3" class="dato">
          <table width="90%" border="0">
          <tr>
            <td class="dato">C&oacute;digo de Barras: </td>
            <td colspan="2">
	          <input name="codigo_del" type="text" id="codigo_del" size="20" onchange="revisa_del()" onkeyup="revisa_del()" />
	          <div id="existe_borra" style="background:#ccc;"></div></td>
          </tr>
          </table>
          </td>
  </tr>
  <tr>   <td colspan="3" class="dato"><hr/></td></tr>
  <tr class="etab_encabezado">
    <td width="700px"><?php echo $logo;?> &nbsp;Actualizar un Producto</td>
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