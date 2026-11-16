<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
   <link rel="shortcut icon" href="/icono.ico"/>
   <meta name="description" content="Sistema"/>
<title>Sistema (v1.0) </title>
   <link rel="stylesheet" type="text/css" href="estilos/e_global.css" media="screen"/>
   <link rel="stylesheet" type="text/css" href="estilos/e_cabecera.css" media="screen"/>
   <link rel="stylesheet" type="text/css" href="estilos/e_form.css" media="screen"/>
<script type="text/javascript">
 function test(){
    if(document.login.txt_usuario.value=="")
    {
        alert('Ingrese Nombre usuario');
        document.login.txt_usuario.focus();
        return false;
    }else
    {
      if(document.login.txt_clave.value==""){
        alert('Ingrese contraseña');
        document.login.txt_clave.focus();
        return false;
    }
}
}
</script>
</head>
<body>
<div class="e01_lienzo">  <!--seccion panel -->
<div class="e02_cabecera"><!--seccion cabecera -->
    <div class="e02_cabeceraIzq" ></div>
    <div class="e02_cabeceraDer">
       
    </div>
    <div style="width:949px; height:38px; background-color:#8a8889; text-align:left; line-height:32px; float:left; border-top: solid 1px #fff;">
       &nbsp;
       <span id="cabecera_lblFecha" style="color:#F7F7F7;font-size:1em;margin-left:1px;">
       <?php
       switch(date('n')){case 01: $mes="Enero";break; case 02: $mes="Febrero";break; case 03: $mes="Marzo";break; case 04: $mes="Abril";break;
                       case 05: $mes="Mayo";break; case 06: $mes="Junio";break; case 07: $mes="Julio";break; case 08: $mes="Agosto";break;
                       case 09: $mes="Septiembre";break; case 10: $mes="Octubre";break; case 11: $mes="Noviembre";break; case 12: $mes="Diciembre";break;}
       echo date('d')." "."de"." ".$mes." "."de"." ".date('Y');
       ?></span>
       <span class="e02_subtitulo" >&nbsp;&nbsp;&nbsp;&nbsp;ADA v.1.0 <small>[<b>G</b>estor de <b>V</b>entas/<b>I</b>nventario/<b>C</b>ompras]</small></span>
       <!-- seccion menu -->
       <div class="e02_menu">
        <span id="cabecera_lblMenu">
          <ul>
           <li class="e02_menuSeleccionado" >Sistema</li>
          </ul>
         </span>
       </div> 
       <!--Fin seccion menu-->
    </div>
</div><!--fin seccion cabecera-->
<div class="e01_lienzoIzq">
<!--seccion lateral izq -->
  <div class="e01_separadorpunteado"></div>
  <div class="e01_espacio5"></div>
  <div class="e01_titulo02">
   
  </div>
  <ul class="e01_ul1Columna01" style=" margin-left:15px; ">
    <form action="init_log.php" name="login" method="POST" onSubmit="return test()">
    <div id="mgizq_panelIngreso">	
        <li>
            <label for="tbRUT">Nombre Usuario:</label><br/>
            <input name="txt_usuario" class="cajas_texto" type="text" size="21" style="width:150px;"/>
        </li>
        <li>
            <label for="tbPassword">Clave Acceso:</label><br/>
            <input name="txt_clave" class="cajas_texto" type="password" size="21" style="width:150px;"/>
        </li> 
    <li>
        <label>Operador:</label><br/>
          <input type="radio" name="nivel_acceso" value="1" checked="true"/>Vendedor&nbsp;<br/><input type="radio" name="nivel_acceso" value="1"/>Cajera(0)&nbsp;<br/>
         <input type="radio" name="nivel_acceso" value="2" />Administrador
    </li>           
    </div>
    <li style="text-align:right; margin-left:12px;">
        <input type="submit" name="Entrar" value="Entrar" class="e03_butOff02" />
    </li>
    </form>
    <br/>
  </ul>
<div class="e01_espacio5"></div>
<div class="e01_separadorpunteado"></div>
<div class="e01_espacio5"></div>
</div>
        <div class="e01_lienzoDer" style="font-family:'Brush Script MT';font-weight: bold; font-size: 96px; text-shadow: 0px 0px 0.1em #000;" >
        
        <div class="e01_espacio30"></div>
        
            <div id="UpdatePanel1" >
            </div>
            <div class="e01_espacio20" ></div>
            <div class="e01_espacio20"></div><br /><br /><br /><br /><br /><br /><br /><br />
           &nbsp;&nbsp;&nbsp;&nbsp; 
        </div>
       
<div class="e01_pie">
    <span style="z-index:1; position:absolute; left:350px; ">
     | Tizimc&iacute;n,Yucatan|(P.D)Jose Chan</span>
    <span style="z-index:2; position:absolute; top:20px; left:375px;">|* APP V1.0 (1024 x 768) *|</span> 
</div>
</div>
    <div class="e01_espacio30"></div>
</body></html>