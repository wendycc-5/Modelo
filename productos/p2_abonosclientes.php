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
 
 function desglose_dia(vcredito,vcliente)
{   
    //window.location='reportes/Reportexcolonia.php?fi='+f_i+'&ff='+f_f;
    var url='punto_venta/p2_frm_abonos.php?c='+vcredito+'&cc='+vcliente;
    //window.location=url
   //window.open(url);
   window.open(url, 'window', 'width=500 height=300 channelmode=yes, left = 30, top = 30, directories = no, location = no, menubar = no, toolbar = no, resizable = no, scrollbars = yes')
}

	function refrescar()
    {
      window.location.reload();  
    }
	
    function despliegaClientes()
    {
		var var_operacion  = "lista";
        $("#divclientess").load("productos/p2_guardaabonos_operacionescliente.php",{operacion:var_operacion}); 
    }

	function abona(vidcredito,vidcliente,vmonto,vsaldo)
	{
	   //alert("1:"+vidcliente+"2:"+vrfc+"3:"+vprop+"4:"+vrs+"5:"+vdom+"6:"+vtels)
        var_operacion ="abona";
		$("#diveditar").load("productos/p2_guardaabonos_operacionescliente.php",{operacion:var_operacion,credito:vidcredito,cliente:vidcliente,monto:vmonto,saldo:vsaldo});
	   	$("#diveditar").show();
    }
    
    function abonar()
	{
	   var_operacion   ="abono";
        
		var var_cliente       = $('#cliente').val();
        var var_credito       = $('#ingreso').val();
		var var_importe  = $('#importe').val();
		var var_saldo     = $('#saldo').val();
           var var_deuda     = $('#deuda').val();
     	if(var_importe!="" && var_importe!= 0) //ingresa abono
		{
		   $("#resultado").load("productos/p2_guardaabonos_operacionescliente.php",{cliente:var_cliente,credito:var_credito,importe:var_importe,saldo:var_saldo,deuda:var_deuda,operacion:var_operacion});
			alert("Abono registrado del Credito: "+var_credito);
            $("#diveditar").hide();
            despliegaClientes();
		}else
            {
   	 	      alert("Error: Datos vacios");
              $('#importe').focus();                  
            }
	}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>PANEL Abonos de CLIENTES</title>
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
  <tr>    <td colspan="3" class="dato"><hr /></td></tr>      
  <tr class="etab_encabezado2">
    <td colspan="3" class="subtitulo">DESGLOSE DE CREDITOS</td>
  </tr>
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