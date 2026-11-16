<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
   <link rel="shortcut icon" href="/icono.ico"/>
   <meta name="description" content="Sistema Panel"/>
<title> Dasboard </title>
<script src="jquery.js"></script>
   <link rel="stylesheet" type="text/css" href="estilos/e_vista.css" media="screen"/>
   <link rel="stylesheet" type="text/css" href="estilos/e_cabeceravista.css" media="screen"/>
   <link rel="stylesheet" type="text/css" href="estilos/e_form.css" media="screen"/>
   <script type="text/javascript" src="configuracion/funciones.js"></script>
</head>
<body>
<div class="e01_pizarron" >  <!--seccion panel style="border: 1px solid red;"-->
<div class="e02_cabecera" ><!--seccion cabecera -->
    <div class="e02_cabeceraIzq"></div>
    <div class="e02_cabeceraDer"><br /><br />
       <span class="e02_cabeceraDertitulo">Panel</span>
    </div>
    <div style="width:949px; height:38px; background-color:#8a8889; text-align:left; line-height:32px; float:left; border-top: solid 1px #fff;">
       &nbsp;
       <span class="e02_sesion" ></span>
       <span class="e02_logout" > </span>
            <!-- seccion menu -->
       <div id="e02_menu">
       <?php
        $logo1 = '<img class="redondo" src="imgs/logarqueo.png" width="20px" height="20px" align="left"/>';
        $logo2 = '<img class="redondo" src="imgs/logcaja.png" width="20px" height="20px" align="left"/>';
        $logo3 = '<img class="redondo" src="imgs/loggastos.png" width="20px" height="20px" align="left"/>';
        $logo4 = '<img class="redondo" src="imgs/logpagos.png" width="20px" height="20px" align="left"/>';
        $logo5 = '<img class="redondo" src="imgs/lista.jpg" width="20px" height="20px" align="left"/>';
        $logo6 = '<img class="redondo" src="imgs/logajustes.png" width="20px" height="20px" align="left"/>';
       ?>
          <ul class="fondo">
           <li>
           <a id="comisionar" href="#">
                       <img class="redondo" src="imgs/pago.jpg" width="40px" height="40px" align="left"/>Operaciones</a>
           <ul>
            <li><a id="articulos" href="panel.php?sec=1" ><img class="redondo" src="imgs/logarticulos.png" width="20px" height="20px" align="left"/>Productos</a></li>       
            <li><a id="familia" href="panel.php?sec=12" ><img class="redondo" src="imgs/loginventario.png" width="20px" height="20px" align="left"/>Categorias</a></li>         
              <li><a id="supers" href="panel.php?sec=21" ><img class="redondo" src="imgs/loginventario.png" width="20px" height="20px" align="left"/>Supers</a></li>           
           </ul>
           </li>
              <li><a id="reportes" href="#" >
                       <img class="redondo" src="imgs/logcaja.png" width="40px" height="40px" align="left"/>Caja</a>           
                 <ul>
                   <li><a id="gastos" href="panel.php?sec=24"><?php echo $logo4;?>Ingresos</a></li> 
                   <li><a id="gastos" href="panel.php?sec=14"><?php echo $logo4;?>Ventas</a></li>				   
                 </ul>
            </li>
            <li><a  id="clientes" href="panel.php?sec=19">
                       <img class="redondo" src="imgs/logventas.png" width="40px" height="40px" align="left"/>Clientes</a>           
            </li>
          </ul>
           
       </div> 
       <!--Fin seccion menu-->
    </div>
</div><!--fin seccion cabecera-->
        <div class="e01_pizarronDer" >
        <div id="contenido">
        <?php
         if(isset($_GET['sec']))
         {
           switch($_GET['sec'])
           {#Productos
            case 1:
            include_once("productos/p2_productos.php");      
            break;
            case 12:
            include_once("productos/p2_categorias.php");  //Categorias Listo
            break;
            case 14:
            include_once("punto_venta/pedidos/p2_formbuscarVentas.php");
            break;
            case 19:
            include_once("productos/p2_clientes.php");   //Clientes
            break;
            case 21:
            include_once("productos/p2_supers.php");  //Supers listo
            break;        
            case 24:
            include_once("productos/p2_abonosclientes.php");   //Clientes
            break;
            
           }            
             
         }else
         {
            #carga al acceder a sitio
                        include_once("productos/p2_supers.php");  //Supers listo
         }
      ?>
        </div>
        </div>
        <div class="e01_pie">
    <span style="z-index:1; position:absolute; left:350px; "><b>Prueba</b>
     | Tizim&iacute;n,Yucatan|(P.D)Jose Chan</span>
    <span style="z-index:2; position:absolute; top:20px; left:375px;">|* APP WEB V1.0 (1024 x 768) *|</span> 
</div>
</div>
</body></html>