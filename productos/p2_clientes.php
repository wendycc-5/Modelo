<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script src="jquery.js"></script>
<script>
    
    	//inicializar controles y posicionar el mensaje donde el cursor
	$(document).ready(function()
	{			
		$('#txt_propietario').focus();
        despliegaClientes();
	});
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
	function refrescar()
    {
      window.location.reload();  
    }
	
    function despliegaClientes()
    {
		var var_operacion  = "lista";
        $("#divclientess").load("productos/p2_guarda_operacionescliente.php",{operacion:var_operacion}); 
    }
    
	function guarda()
	{
		var var_operador       = $('#operador').val();
        var var_propietario       = $('#txt_propietario').val();
		var var_razonsocial  = $('#txt_razonsocial').val();
        
		var var_rfc     = $('#txt_rfc').val();
		var var_domicilio      = $('#txt_domicilio').val();
		var var_telefonos     = $('#txt_telefonos').val();
        
		var bandera =0; 
		 if(var_propietario !=""){  
            if(var_razonsocial !=""){
   		        bandera =1;
                $("#resultado").load("productos/p2_guarda_cliente.php",{propietario:var_propietario,razonsocial:var_razonsocial,rfc:var_rfc,domicilio:var_domicilio,telefonos:var_telefonos,operador:var_operador});
		    	alert("Se ha registrado el Cliente: "+var_propietario);	
                despliegaClientes();		 
            }else
            {
   	 	      alert("Error: Sin Nombre de Tienda");
              $('#txt_razonsocial').focus();                  
            }
            }else
            {
		     alert("Error: Sin Nombre propietario");
             $('#txt_propietario').focus();  
            }
		
		
        if(bandera !=0)
        {
      		$('#txt_propietario').val('');
            $('#txt_razonsocial').val('');
		    $('#txt_rfc').val('');
		    $('#txt_domicilio').val('');
		    $('#txt_telefonos').val('');
        }
}   

	function eliminar(cod)
	{
	    var_operacion  ="baja";
		var var_codigo = cod; //id cliente
		if(var_codigo!="")
		{  	$("#resultado").load("productos/p2_guarda_operacionescliente.php",{codigo:var_codigo,operacion:var_operacion});
			alert("Se ha eliminado el Cliente: "+var_codigo);
            despliegaClientes();
		}
	}
    
	function actualizar(vidcliente,vrfc,vprop,vrs,vdom,vtels)
	{
	   //alert("1:"+vidcliente+"2:"+vrfc+"3:"+vprop+"4:"+vrs+"5:"+vdom+"6:"+vtels)
        var_operacion ="actualiza";
		//$("#diveditar").load("productos/p2revisa_cliente_update.php",{cliente:vidcliente,rfc:vrfc,propietario:vprop,razonsocial:vrs,domicilio:vdom,tels:vtels});
		$("#diveditar").load("productos/p2_guarda_operacionescliente.php",{operacion:var_operacion,cliente:vidcliente,rfc:vrfc,propietario:vprop,razonsocial:vrs,domicilio:vdom,tels:vtels});
	   	$("#diveditar").show();
    }
    
	function actualiza()
	{
	   var_operacion   ="actualizar";
        
		var var_cliente       = $('#cliente').val();
        var var_propietario       = $('#txt_propietario1').val();
		var var_razonsocial  = $('#txt_razonsocial1').val();
        
		var var_rfc     = $('#txt_rfc1').val();
		var var_domicilio      = $('#txt_domicilio1').val();
		var var_telefonos     = $('#txt_telefonos1').val();
           
     	if(var_propietario!="" && var_razonsocial!="") //actualiza_articulo.php
		{
		   $("#resultado").load("productos/p2_guarda_operacionescliente.php",{cliente:var_cliente,propietario:var_propietario,razonsocial:var_razonsocial,rfc:var_rfc,domicilio:var_domicilio,telefonos:var_telefonos,operacion:var_operacion});
			alert("Se ha actualizado el Cliente: "+var_cliente);
            $("#diveditar").hide();
            despliegaClientes();
		}else
            {
   	 	      alert("Error: Datos vacios");
              $('#txt_propietario1').focus();                  
            }
	}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PANEL de CLIENTES</title>
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
    <td width="700px"><?php echo $logo;?> &nbsp;Registrar Nuevo Cliente</td>
    <td colspan="2" align="left" width="200px">
               	<input name="Submit2" type="button" class="boton" value="Registrar" onclick="guarda()" />
                <input name="operador" type="hidden" id="operador" value="<?php print $operador;?>" size="3"/>
    </td>
  </tr>
  <tr>    <td colspan="3" class="dato">
  <div id="resultado"></div>
   
  </td></tr>
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>
  <tr>
          <td colspan="3" class="dato">
          <table width="90%" border="0">
          <tr>
            <td class="subtitulo">Nombre propietario:</td>
            <td colspan="2"><input name="txt_propietario" type="text" id="txt_propietario" size="55" maxlength="55"/></td>
          </tr>
          <tr>
            <td class="subtitulo">Razon social (Nombre Tienda):</td>
            <td width="697"><input name="txt_razonsocial" type="text" id="txt_razonsocial" size="45" maxlength="75" /></td>
            <td width="41" class="dato">&nbsp;</td>
          </tr>
          <tr> 
            <td align="center" class="subtitulo">RFC:</td>
            <td colspan="2" align="center">
			<div align="left">
            <input name="txt_rfc" type="text" id="txt_rfc" size="12" maxlength="20" />
            
            </div>
           
           </td>
          </tr>
          <tr> 
             <td align="center" class="subtitulo">Domicilio :</td>
             <td colspan="2" align="center"><div align="left">
             <input name="txt_domicilio" type="text" id="txt_domicilio" size="55" maxlength="120" />
             </div></td>
          </tr>
          <tr>
             <td align="center" class="subtitulo">Telefonos :</td>
             <td colspan="2" align="center"><div align="left">
             <input name="txt_telefonos" type="text" id="txt_telefonos" size="20" maxlength="25"/>
             </div></td>
          </tr>
            </table>
         </td> 
  </tr>       
  <tr>   <td colspan="3" class="dato"><hr/></td></tr>
    <!--<tr class="etab_encabezado2">
    <td colspan="3" class="subtitulo">DESGLOSE DE CLIENTES</td>
  </tr>-->
    <tr>
    <td colspan="3" class="encabezado">
    <div id="diveditar"></div>
      <div id="divclientes" align="center">

      </div></td>
  </tr>
  <tr>   <td colspan="3" class="dato"><hr/></td></tr>
  <tr>   <td colspan="3" ><div id="divclientess"></div></td></tr>
</table>
</body>
</html>