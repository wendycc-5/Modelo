<?php 
//error_reporting(0);
include_once("Config.php");
 #eliminar_entrada($folio)==true)
 #actualizar_InventarioEntrada($codigo,$cantidad);    
#clase contenedora	
  class procesos
               {        #constructor	
               function procesos() {   }	
    #-------------------------------------------------paginacion--------------------- 
    //consultar grupos
   function consultarTotal_vendedores()
   {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $query = "SELECT ni,vendedor,dato1 FROM tabla_vendedores";
      $dato = @mysql_query($query);
       if (!$dato)
        return false;
        else
        return $dato;
      }
   }
      function consultar_clientes()//22-09-22
   {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $query = "SELECT ni,propietario,razon_social FROM tabla_clientes";
      $dato = @mysql_query($query);
       if (!$dato)
        return false;
        else
        return $dato;
      }
   }
   //llamado desde pedido.php
      function consultar_folioactualpedidos()//02 de octubre 2021
   {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $query = "SELECT max(ni) as nopedido FROM tabla_pedidos";
      $dato = @mysql_query($query);
       if (!$dato)
        return false;
        else
        return $dato;
      }
   }
      function consultar_productos()//22-09-22
   {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $query = "SELECT codigo,descripcion,precio FROM tabla_productos";
      $dato = @mysql_query($query);
       if (!$dato)
        return false;
        else
        return $dato;
      }
   }

    #creado 28ago-2014
    //Agrega gtos_venta
   function consultaexis_gastoventa($folio,$detalle) 
   {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $query = "SELECT ni,folio,detalle,monto FROM tabla_gastosventa WHERE folio = $folio AND detalle = '$detalle'";
      $dato = @mysql_query($query);
       if (!$dato)
        return false;
        else
        return $dato;
      }
   }   
       

     function datos_operador($operador)
    {
        $link_conexion = new conexion();
      if ($link_conexion->conectar()== true)
      {
       $query = "SELECT id,nombre FROM tabla_operador WHERE id = $operador";
       $dato = @mysql_query($query);
       if (!$dato)
        return false;
       else
       return $dato;
      }
    }     

               

        #22Sep2021
    #proceso: consultando tablaarticulos    
    function consulta_codigoProducto($codigo)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT descripcion,precio,familia,unidad_medida,proveedor1,costo1 FROM tabla_productos WHERE codigo = '$codigo' ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }   
    } 
    
        #24 de septiembre 2021
    #proceso: consultando tabla_productos    
    function consulta_codigoProductos($codigo)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT descripcion,precio,familia,unidad_medida,proveedor1,costo1,claveart FROM tabla_productos WHERE codigo = '$codigo' ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }   
    }  
    #27MAY2014 
    #proceso: consultando tablaarticulos    
    function consulta_codigoArticulo($codigo)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT descripcion,precio,linea,familia,sfamilia,unidad_medida,proveedor1,costo1,claveart FROM tabla_articulos WHERE codigo = '$codigo' ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }   
    }   
    	    #22sep2021
    #proceso: consultando tablaarticulos    
    function consulta_existenciaProducto($codigo)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_inventario.existencia AS existencia FROM tabla_productos,tabla_inventario WHERE tabla_productos.codigo = '$codigo'  AND tabla_productos.codigo = tabla_inventario.codigo";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }   
    }  
	    #27MAY2014 
    #proceso: consultando tablaarticulos    
    function consulta_existenciaArticulo($codigo)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_inventario.existencia AS existencia FROM tabla_articulos,tabla_inventario WHERE tabla_articulos.codigo = '$codigo'  AND tabla_articulos.codigo = tabla_inventario.codigo";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }   
    }   
    
    #creado 18 de Diciembre 2021
    #llamado desde p2_guardaventa.php
    function consulta_lstdetalledeFolio($Venta)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT producto, unidades
                       FROM tabla_detalle
                       WHERE folio = $Venta";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }           
    }
        #creado 18 de Diciembre 2021
    #llamado desde p2_guardapedido.php
    function consulta_lstdetalledexPedido($Pedido)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT producto, unidades
                       FROM tabla_detallepedido
                       WHERE folio = $Venta";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }           
    }
    
        #creado 18 de Diciembre 2021
    #llamado desde p2_guardaventa.php
    function consulta_preciocompra($idproducto)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT costo1
                       FROM tabla_productos
                       WHERE codigo = '$idproducto'";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }           
    }
     #creado 24 de Septiembre 2021 editado 27-dic-2021
    #filtrado de productos x criterio1
    function consulta_listproductosCriterio1($familia)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_productos.codigo,tabla_productos.descripcion,tabla_productos.precio,tabla_productos.unidad_medida,tabla_productos.proveedor1,tabla_productos.costo1,tabla_familia.familia AS familia, tabla_inventario.existencia
                       FROM tabla_familia,tabla_productos,tabla_inventario
                       WHERE tabla_productos.familia = $familia 
                       AND tabla_productos.familia =  tabla_familia.ni 
                       AND tabla_productos.codigo = tabla_inventario.codigo";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }           
    }
    #creado 24 de Septiembre 2021
    #filtrado de productos x criterio2
    function consulta_listproductosCriterio2()
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_productos.codigo,tabla_productos.descripcion,tabla_productos.precio,tabla_productos.unidad_medida,tabla_productos.proveedor1,tabla_productos.costo1,tabla_familia.familia AS familia, tabla_inventario.existencia
                       FROM tabla_productos,tabla_familia,tabla_inventario
                       WHERE tabla_productos.familia =  tabla_familia.ni
                       AND tabla_productos.codigo = tabla_inventario.codigo";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }           
    }
        #creado 24 de Septiembre 2021
    #filtrado de productos x criterio2
    function consulta_listproductostockBajo($min,$max)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_productos.codigo,tabla_productos.descripcion,tabla_productos.precio,tabla_productos.unidad_medida,tabla_productos.proveedor1,tabla_productos.costo1,tabla_familia.familia AS familia, tabla_inventario.existencia
                       FROM tabla_productos,tabla_familia,tabla_inventario
                       WHERE tabla_productos.familia =  tabla_familia.ni
                       AND tabla_productos.codigo = tabla_inventario.codigo
                       AND tabla_inventario.existencia BETWEEN $min AND $max";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }           
    }
    #creado 13-ago-14
    #filtrado ade articulos x criterio1
    function consulta_lstarticulosCriterio1($familia,$sfamilia,$linea)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_articulos.codigo,tabla_articulos.descripcion,tabla_articulos.precio,tabla_articulos.unidad_medida,tabla_articulos.proveedor1,tabla_articulos.costo1,tabla_familia.familia AS familia ,tabla_sfamilia.sfamilia AS sfamilia,tabla_linea.linea  AS linea
                       FROM tabla_articulos,tabla_familia,tabla_sfamilia,tabla_linea 
                       WHERE tabla_articulos.familia = $familia AND  tabla_articulos.sfamilia = $sfamilia
                       AND tabla_articulos.linea = $linea
                       AND tabla_articulos.familia =  tabla_familia.ni 
                       AND tabla_articulos.sfamilia =  tabla_sfamilia.ni
                       AND  tabla_articulos.linea =  tabla_linea.ni";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }           
    }  
    #creado 13-ago-14
    #listado x criterio 2
     function consulta_lstarticulosCriterio2($valor1,$valor2,$campo1,$campo2)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_articulos.codigo,tabla_articulos.descripcion,tabla_articulos.precio,tabla_articulos.unidad_medida,tabla_articulos.proveedor1,tabla_articulos.costo1,tabla_familia.familia AS familia ,tabla_sfamilia.sfamilia AS sfamilia,tabla_linea.linea  AS linea
                       FROM tabla_articulos,tabla_familia,tabla_sfamilia,tabla_linea 
                       WHERE tabla_articulos.$campo1 = $valor1 AND  tabla_articulos.$campo2 = $valor2
                       AND tabla_articulos.familia =  tabla_familia.ni 
                       AND tabla_articulos.sfamilia =  tabla_sfamilia.ni
                       AND  tabla_articulos.linea =  tabla_linea.ni";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }                       
    }
    #creado 13-ago-14
    #listado x criterio 3    
    function consulta_lstarticulosCriterio3($valor,$campo)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_articulos.codigo,tabla_articulos.descripcion,tabla_articulos.precio,tabla_articulos.unidad_medida,tabla_articulos.proveedor1,tabla_articulos.costo1,tabla_familia.familia AS familia ,tabla_sfamilia.sfamilia AS sfamilia,tabla_linea.linea  AS linea
                       FROM tabla_articulos,tabla_familia,tabla_sfamilia,tabla_linea 
                       WHERE tabla_articulos.$campo = $valor
                       AND tabla_articulos.familia =  tabla_familia.ni 
                       AND tabla_articulos.sfamilia =  tabla_sfamilia.ni
                       AND  tabla_articulos.linea =  tabla_linea.ni";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }               
    }
    
    #creado 13-ago-14
    #listado de todos
    function consulta_lstarticulosCriterio4()
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_articulos.codigo,tabla_articulos.descripcion,tabla_articulos.precio,tabla_articulos.unidad_medida,tabla_articulos.proveedor1,tabla_articulos.costo1,tabla_familia.familia AS familia ,tabla_sfamilia.sfamilia AS sfamilia,tabla_linea.linea  AS linea
                       FROM tabla_articulos,tabla_familia,tabla_sfamilia,tabla_linea 
                       WHERE tabla_articulos.familia =  tabla_familia.ni 
                       AND tabla_articulos.sfamilia =  tabla_sfamilia.ni
                       AND  tabla_articulos.linea =  tabla_linea.ni";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }                       
    }
      #24 de septiembre 2021
    #proceso: consultando tabla_productos    
    function consulta_claveProducto($clave)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT codigo,claveart,descripcion,precio,linea,familia,sfamilia,unidad_medida,proveedor1,costo1 FROM tabla_productos WHERE claveart = '$clave' ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }   
    } 
  
    #7agosto2014 
    #proceso: consultando tablaarticulos    
    function consulta_claveArticulo($clave)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT codigo,claveart,descripcion,precio,linea,familia,sfamilia,unidad_medida,proveedor1,costo1 FROM tabla_articulos WHERE claveart = '$clave' ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }   
    }   
   #7agosto2014 
    #proceso: consultando tabla_tiendas   
    function consulta_lsttiendas()
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT ni,razon_social,rfc,domicilio,telefonos,folio_efectivo,folio_tarjeta FROM tabla_tiendas ORDER BY razon_social";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }           
    }
    #09Junio2014
    #Procesos: consulta ventas generaes por intevalo de fechas X efectivo X operador
    function reportegeneralVentasEfectivoXoperador($operador,$f_inicial,$f_final){
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "SELECT tabla_ventas.fecha,sum(tabla_ventas.total_cobrado) as total,count(tabla_ventas.ni) as ventas,sum(tabla_ventas.gtos_venta) as gtos
                       FROM tabla_ventas
                       WHERE tabla_ventas.fecha BETWEEN '$f_inicial' AND '$f_final'
                       and tabla_ventas.tipopago=1
                       and tabla_ventas.idoperador=$operador
                       GROUP BY tabla_ventas.fecha";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }} 

   #09Jun2014 
   #proceso : consulta gatos de intervalo->tablagastos 
   function reportegeneralGastos($f_inicial,$f_final)
   {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "SELECT tabla_gastos.fecha,sum(tabla_gastos.monto) as total,count(tabla_gastos.ni) as gastos
                       FROM tabla_gastos
                       WHERE tabla_gastos.fecha BETWEEN '$f_inicial' AND '$f_final'
                       GROUP BY tabla_gastos.fecha";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
     }
   }

   #18Jun2014 
   #proceso : consulta rfc->tablatiendas 
   function consulta_rfc($rfc)
   {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "SELECT  ni,razon_social,rfc,domicilio,telefonos,folio_efectivo,folio_tarjeta 
                       FROM tabla_tiendas
                       WHERE rfc = '$rfc' ";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
     }
   }
   #18Jun2014-02:48 
   #proceso : insert registro->tablatiendas 
   function insertar_tiendas($cvoperador,$razons,$rfc,$domicilio,$telefono,$efectivo,$tarjeta)
  {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "INSERT INTO tabla_tiendas VALUES(null,$cvoperador,'$razons','$rfc','$domicilio','$telefono',$efectivo,$tarjeta)";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
     }    
  }
   #18Jun2014-08:22 
   #proceso : update registro->tablatiendas 
  function update_tienda($ni,$razon,$rfc,$domicilio,$telefono,$efectivo,$tarjeta)
  {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "UPDATE tabla_tiendas SET razon_social='$razon', rfc='$rfc', domicilio='$domicilio', telefonos='$telefono', folio_efectivo=$efectivo, folio_tarjeta=$tarjeta WHERE ni=$ni";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
     }    
  }
   #18agos2014-06:22 
   #proceso : select registro->tablas  
function inventariogeneral()
{
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "SELECT tabla_articulos.claveart,tabla_articulos.descripcion,tabla_articulos.precio,tabla_articulos.costo1,
                    tabla_inventario.existencia AS existencia,tabla_articulos.unidad_medida,tabla_familia.familia AS fam,tabla_sfamilia.sfamilia AS sfam,
                    tabla_linea.linea AS linea 
                   FROM tabla_articulos,tabla_inventario,tabla_familia,tabla_sfamilia,tabla_linea 
                   WHERE  tabla_articulos.codigo = tabla_inventario.codigo 
                   AND tabla_articulos.familia = tabla_familia.ni
                   AND tabla_articulos.sfamilia = tabla_sfamilia.ni
                   AND tabla_articulos.linea = tabla_linea.ni";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
     }     
}
          
   #18Jun2014-08:22 
   #proceso : insert registro->tablatarjeta 
  function insertar_tarjeta($tarjeta,$porc)
  {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "INSERT INTO tabla_tarjeta VALUES(null,'$tarjeta',$porc)";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
     }    
  }       
   #18Jun2014-07:39 
   #proceso : consulta exist ->tablatiendas && tablaventas   
  function consulta_siVentaTienda($rfc)
  {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "SELECT  tabla_tiendas.ni,tabla_tiendas.domicilio,tabla_tiendas.telefonos 
                       FROM tabla_tiendas,tabla_ventas
                       WHERE tabla_tiendas.rfc = '$rfc' AND tabla_tiendas.ni = tabla_ventas.tienda";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
     }    
  }
   #18Jun2014-07:39 
   #proceso : consulta exist ->tabla_tarjeta     
    function consulta_tarjetas($tarjeta)
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "SELECT  ni,descripcion,porc
                       FROM tabla_tarjeta
                       WHERE descripcion = '$tarjeta' ";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
     }            
    }
              
             
   #30Jun2014-09:47 
   #proceso : ELIMINAR ->tabla_tarjeta     
    function eliminar_tarjeta($tarjeta)
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "DELETE FROM tabla_tarjeta
                       WHERE descripcion = '$tarjeta' ";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
     }            
    }
   #30Jun2014-09:47 
   #proceso : update ->tabla_tarjeta     
    function update_tarjeta($ni,$porcentaje,$tarjeta)
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "UPDATE tabla_tarjeta SET descripcion = '$tarjeta',porc='$porcentaje'  WHERE ni=$ni ";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
     }            
    }
    
   #30Jun2014-12:23 
   #proceso : nuevo iva ->tabla_iva    
    function nuevo_iva($iva)
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "INSERT INTO tabla_iva VALUES(null,'$iva')";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
     }            
    }   
 
   #30Jun2014-12:23 
   #proceso : nuevo iva ->tabla_iva    
   function nuevo_vendedor($vendedor,$apodo)
   {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "INSERT INTO tabla_vendedores(vendedor,dato1) VALUES('$vendedor','$apodo')";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
     }                
   }
   #30Jun2014-12:23 
   #proceso : existe vendedor ->tabla_vendedor    
    function consulta_eVendedor($vendedor)
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "SELECT ni,dato1 FROM tabla_vendedores WHERE vendedor='$vendedor'";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
     }            
    }      
         
    #30Jun2014-12:23 
   #proceso : ultimo vendedor ->tabla_vendedor   
    function consulta_ultimoVendedor($vendedor)
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "SELECT max(ni) as ultimo FROM tabla_vendedores";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
     }            
    } 
    
   #30Jun2014-12:23 
   #proceso : nueva cuenta ->tabla_cuentas   
    function  cuenta_vendedor($cuenta)
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "INSERT INTO tabla_cuentas(cuenta) VALUES($cuenta)";
      $resultado= @mysql_query($sentencia);
      if (!$resultado)
       return false;
      else
       return true;
     }           
    }
   #30Jun2014-12:23 
   #proceso : update iva ->tabla_iva    
    function update_iva($id,$iva)
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "UPDATE tabla_iva SET valor= '$iva' WHERE id=$id)";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
     }            
    }           
   #18Jun2014-07:39 
   #proceso : Elimina tienda ->tablatiendas    
  function eliminar_tienda($rfc)
  {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "DELETE FROM tabla_tiendas WHERE  rfc='$rfc' ";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
     }        
  }
 
   #18Jun2014 
   #proceso : consulta razon_social->tablatiendas 
   function consulta_razon($razon)
   {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "SELECT  ni,rfc,domicilio,telefonos 
                       FROM tabla_tiendas
                       WHERE razon_social = '$razon' ";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
     }
   }
     #09Jun2014 
   #proceso : consulta pagos de intervalo->tablapagos 
   function reportegeneralPagos($f_inicial,$f_final)
   {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "SELECT tabla_pagos.fecha,sum(tabla_pagos.monto) as total,count(tabla_pagos.ni) as pagos
                       FROM tabla_pagos
                       WHERE tabla_pagos.fecha BETWEEN '$f_inicial' AND '$f_final'
                       GROUP BY tabla_pagos.fecha";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
     }
   }
        #09Jun2014 
   #proceso : consulta pagos x operador de intervalo->tablapagos 
   function reportegeneralPagosxOperador($operador,$f_inicial,$f_final)
   {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "SELECT tabla_pagos.fecha,sum(tabla_pagos.monto) as total,count(tabla_pagos.ni) as pagos
                       FROM tabla_pagos
                       WHERE tabla_pagos.fecha BETWEEN '$f_inicial' AND '$f_final'
                       AND tabla_pagos.operador =$operador 
                       GROUP BY tabla_pagos.fecha";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
     }
   }
   
   #09Jun2014 
   #proceso : consulta pagos Desglose ->tablapagos    
   function reportegeneralDesglosePagoss($fecha1,$fecha2)
   {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "SELECT tabla_pagos.ni,tabla_pagos.fecha,tabla_pagos.monto,tabla_vendedores.vendedor AS vendedor
                       FROM tabla_pagos,tabla_vendedores
                       WHERE tabla_pagos.fecha BETWEEN '$fecha1' AND '$fecha2'
                       AND tabla_pagos.vendedor = tabla_vendedores.ni
                       GROUP BY tabla_pagos.ni";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
     }    
   }   
   
  #09Jun2014 
   #proceso : consulta pagos x operador Desglose ->tablapagos    
   function reportegeneralDesglosePagosxOperador($operador,$fecha1,$fecha2)
   {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "SELECT tabla_pagos.ni,tabla_pagos.fecha,tabla_pagos.monto,tabla_vendedores.vendedor
                       FROM tabla_pagos,tabla_vendedores
                       WHERE tabla_pagos.fecha BETWEEN '$fecha1' AND '$fecha2' AND tabla_pagos.vendedor=$operador
                       AND tabla_pagos.operador = tabla_vendedores.ni
                       GROUP BY tabla_pagos.ni";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
     }    
   }   

   
   #09Jun2014 
   #proceso : consulta gastos Desglose ->tablagastos    
   function reportegeneralDesgloseGastos($fecha1,$fecha2)
   {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "SELECT tabla_gastos.ni,tabla_gastos.fecha,tabla_gastos.hora,tabla_gastos.concepto,tabla_gastos.monto,tabla_operador.nombre AS nombre
                       FROM tabla_gastos,tabla_operador
                       WHERE tabla_gastos.fecha  BETWEEN '$fecha1' AND  '$fecha2'
                       AND tabla_gastos.operador = tabla_operador.id
                       GROUP BY tabla_gastos.ni";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
     }    
   }   
   
   #09Jun2014 
   #proceso : consulta gastos Desglose X operador ->tablagastos 
   function reportegeneralDesgloseGastosXoperador($cvoperador,$fecha1,$fecha2)
   {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "SELECT tabla_gastos.ni,tabla_gastos.fecha,tabla_gastos.hora,tabla_gastos.concepto,tabla_gastos.monto,tabla_operador.nombre AS nombre
                       FROM tabla_gastos,tabla_operador
                       WHERE tabla_gastos.fecha BETWEEN '$fecha1' AND  '$fecha2' AND tabla_gastos.operador = $cvoperador
                       AND tabla_gastos.operador = tabla_operador.id
                       GROUP BY tabla_gastos.ni";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
     }
   }   
   #09Jun2014 
   #proceso : consulta gatos de intervalo->tablagastos 
    function reportegeneralGastosOperador($cvoperador,$f_inicial,$f_final)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "SELECT tabla_gastos.fecha,sum(tabla_ventas.monto) as total,count(tabla_gastos.ni) as gastos
                       FROM tabla_gastos
                       WHERE tabla_gastos.fecha BETWEEN '$f_inicial' AND '$f_final'
                       AND tabla_gastos.operador=$cvoperador
                       GROUP BY tabla_gastos.fecha";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
     }
    }

    #09Junio2014
    #Procesos: consulta ventas generaes por intevalo de fechas x Efectivo ALL operadores
    function reportegeneralVentasEfectivo($f_inicial,$f_final){
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "SELECT tabla_ventas.fecha,sum(tabla_ventas.total_cobrado) as total,count(tabla_ventas.ni) as ventas,sum(tabla_ventas.gtos_venta) as gtos
                       FROM tabla_ventas
                       WHERE tabla_ventas.fecha BETWEEN '$f_inicial' AND '$f_final'
                       and tabla_ventas.tipopago=1
                       GROUP BY tabla_ventas.fecha";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }} 

    #09Junio2014
    #Procesos: consulta ventas generaes por intevalo de fechas X efectivo X operador
    function reportegeneralVentasTarjetaXoperador($operador,$f_inicial,$f_final){
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "SELECT tabla_ventas.fecha,sum(tabla_ventas.total_cobrado) as total,count(tabla_ventas.ni) as ventas,
      sum(tabla_ventas.porc_combanco) as combanco,sum(tabla_ventas.porc_iva) as iva, sum(tabla_ventas.gtos_venta) as gtos
                       FROM tabla_ventas
                       WHERE tabla_ventas.fecha BETWEEN '$f_inicial' AND '$f_final'
                       and tabla_ventas.tipopago=2
                       and tabla_ventas.idoperador=$operador
                       GROUP BY tabla_ventas.fecha";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }} 

    #09Junio2014
    #Procesos: consulta ventas generaes por intevalo de fechas x Efectivo ALL operadores
    function reportegeneralVentasTarjeta($f_inicial,$f_final){
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
      $sentencia = "SELECT tabla_ventas.fecha,sum(tabla_ventas.total_cobrado) as total,count(tabla_ventas.ni) as ventas,
            sum(tabla_ventas.porc_combanco) as combanco,sum(tabla_ventas.porc_iva) as iva, sum(tabla_ventas.gtos_venta) as gtos
                       FROM tabla_ventas
                       WHERE tabla_ventas.fecha BETWEEN '$f_inicial' AND '$f_final'
                       and tabla_ventas.tipopago=2
                       GROUP BY tabla_ventas.fecha";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }}   

    #30MAY2014 
    #proceso: consultando tabla_inventario
    function actualizar_existencia($existencia,$codigo)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "UPDATE tabla_inventario SET existencia = '$existencia' WHERE codigo = '$codigo' limit 1 ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
      }   
    }             
    #30MAY2014 
    #proceso: consultando tablaentradas-tablaarticulos
    function consultar_entradas($fechai,$fechaf,$cvoperador)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT entradas.folio,entradas.fecha,entradas.hora,entradas.codigo,entradas.cantidad,entradas.costo,entradas.monto,tabla_articulos.descripcion AS articulo
                       FROM entradas,tabla_articulos 
                       WHERE  entradas.operador=$cvoperador AND (entradas.fecha BETWEEN '$fechai' AND  '$fechaf' ) AND entradas.codigo=tabla_articulos.codigo";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }   
    }
    
        #27-dic-2021 
    #proceso: consultando tabla entradas - tabla_productos
    function consultar_entradasenAlmacen($fechai,$fechaf)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT entradas.folio,entradas.fecha,entradas.hora,entradas.codigo,entradas.cantidad,entradas.costo,entradas.monto,tabla_productos.descripcion AS articulo
                       FROM entradas,tabla_productos 
                       WHERE  entradas.codigo = tabla_productos.codigo
                       AND (entradas.fecha BETWEEN '$fechai' AND  '$fechaf' )";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }   
    }   
    
    #30MAY2014 
    #proceso: consultando tablaentradas-tablaarticulos    
    function eliminar_entrada($folio)
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "DELETE FROM entradas WHERE  folio = $folio";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }     
    }
    #30MAY2014 
    #proceso: consultando tablainventario
    function actualizar_InventarioEntrada($codigo,$cantidad)
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "UPDATE tabla_inventario SET existencia= existencia + $cantidad  WHERE codigo= $codigo";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
      }     
    }
    #30MAY2014 
    #proceso: consultando tablainventario
    function actualizar_InventarioEntradaElimina($codigo,$cantidad)
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "UPDATE tabla_inventario SET existencia= existencia - $cantidad  WHERE codigo= $codigo";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
      }     
    }
    #creado 08-10-2021
    #LLamado des de punto_venta/ventas/p2_datosdePedido.php
    function actualizar_stockEntrada($codigo,$unidades)
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "UPDATE tabla_inventario SET existencia= existencia + $unidades  WHERE codigo= $codigo";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
      }     
    }
    #30MAY2014 
    #proceso: consultando tablaoperador    
    function existencia_claveOperador($cvoperador,$clave_encriptada)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT * FROM tabla_operador WHERE id=$cvoperador AND clave = '$clave_encriptada' ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }   
    }   
      
    #30MAY2014 
    #proceso: registro tablaentrada
    function agregar_entrada($codigo,$cantidad,$costo,$monto,$cvoperador)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "INSERT INTO entradas VALUES ('',curdate(),now(),'$codigo','$cantidad','$costo','$monto',$cvoperador)";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
     }   
    }         

    #30MAY2014 
    #proceso: update tablainventario
    function actualizar_existencia2($cantidad,$codigo)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "UPDATE tabla_inventario SET existencia = existencia + '$cantidad' WHERE codigo = '$codigo' ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
     }   
    }         

    #30MAY2014 
    #proceso: consultando tablaarticulos-inventario    
    function consultar_existenciaArticulos($codigo)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT  tabla_articulos.descripcion,tabla_inventario.existencia 
         FROM tabla_articulos,tabla_inventario 
         WHERE tabla_articulos.codigo = '$codigo' 
         AND tabla_articulos.codigo=tabla_inventario.codigo ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }   
    }
    
        #27-dic-2021
    #proceso: consultando tabla_productos-tabla_inventario    
    function consultar_existenciaProductosenInventario($codigo)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT  tabla_productos.descripcion,tabla_inventario.existencia 
         FROM tabla_productos,tabla_inventario 
         WHERE tabla_productos.codigo = '$codigo' 
         AND tabla_productos.codigo=tabla_inventario.codigo ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }   
    }
       
    #28MAY2014 
    #proceso: consultandousuario tablaoperador    
    function consulta_existeUsuario($usuario)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT id,nombre,perfil,clave,usuario FROM tabla_operador WHERE usuario = '$usuario' ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }           
    }
    #28MAY2014 
    #proceso: consultandousuario tablaoperador    
    function iniciar_sesion($usuario,$clave)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT id,nombre,perfil FROM tabla_operador WHERE usuario = '$usuario' AND clave='$clave' ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }           
    }
     
    #28MAY2014 
    #proceso: consultandousuario tablaarticulos-       
    function consulta_lstarticulos()
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_articulos.codigo,tabla_articulos.descripcion,tabla_articulos.precio,tabla_articulos.linea,tabla_articulos.unidad_medida,tabla_articulos.proveedor1,tabla_inventario.existencia AS existencia 
                       FROM tabla_articulos,tabla_inventario
                       WHERE tabla_articulos.codigo = tabla_inventario.codigo ORDER BY tabla_articulos.linea ASC ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                   
    }
    
    #2junio2014 
    #proceso: consultandousuario tablaarticulos-criterio apartado           
    function consulta_lstarticulosCriterio($apartado)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_articulos.codigo,tabla_articulos.descripcion,tabla_articulos.precio,tabla_articulos.linea,tabla_articulos.unidad_medida,tabla_articulos.proveedor1,tabla_inventario.existencia AS existencia 
                       FROM tabla_articulos,tabla_inventario
                       WHERE tabla_articulos.linea='$apartado' AND tabla_articulos.codigo = tabla_inventario.codigo ORDER BY tabla_articulos.descripcion ASC";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                           
    }
    #11AGO2014 
    #proceso: consultandoventas tablaventas-x folio           
     function consultaDatos_folio($folio)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_ventas.folio,tabla_ventas.cantidad,tabla_ventas.total_real,tabla_ventas.total_cobrado,tabla_ventas.tipopago,tabla_ventas.tipo_tarjeta,tabla_ventas.porc_combanco,tabla_ventas.porc_iva,tabla_ventas.gtos_venta,tabla_ventas.hora,tabla_ventas.diferencia,tabla_ventas.tienda,tabla_tiendas.razon_social AS nombre_tienda
                      FROM tabla_ventas,tabla_tiendas
                      WHERE   tabla_ventas.folio = '$folio'
                       AND tabla_ventas.tienda = tabla_tiendas.ni ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                           
    }

     #28MAY2014 
    #proceso: consultandoventas tablaventas-tablainventario       
    function consulta_lstventas($operador,$status)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_ventas.folio,tabla_ventas.cantidad,tabla_ventas.total_real,tabla_ventas.total_cobrado,tabla_ventas.tipopago,tabla_ventas.tipo_tarjeta,tabla_ventas.porc_combanco,tabla_ventas.porc_iva,tabla_ventas.gtos_venta,tabla_ventas.hora,tabla_tiendas.razon_social AS tienda
                      FROM tabla_ventas,tabla_tiendas
                      WHERE tabla_ventas.idoperador=$operador AND tabla_ventas.status ='$status' AND  tabla_ventas.fecha = curdate() AND tabla_ventas.tienda = tabla_tiendas.ni ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                   
    }  
     #28MAY2014 
    #proceso: consultandoventas tablaventas-tablainventario       
    function consulta_lstventasdetalle($fecha1,$fecha2)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_ventas.folio,tabla_ventas.cantidad,tabla_ventas.total_real,tabla_ventas.total_cobrado,tabla_ventas.tipopago,tabla_ventas.tipo_tarjeta,tabla_ventas.porc_combanco,tabla_ventas.porc_iva,tabla_ventas.gtos_venta,tabla_ventas.hora,tabla_tiendas.razon_social AS tienda
                      FROM tabla_ventas,tabla_tiendas
                      WHERE  (tabla_ventas.fecha BETWEEN '$fecha1' AND '$fecha2') AND tabla_ventas.tienda = tabla_tiendas.ni ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                   
    }  
    #04Jun2014 
    #proceso: consultando tablatarjeta              
    function consulta_dataTarjeta($tipotarjeta)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT descripcion,porc FROM tabla_tarjeta  WHERE ni=$tipotarjeta ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                           
    }
    #02Jun2014 
    #proceso: consultandoventas tablaventas-tablainventario       
    function consulta_lstventasReporte($fecha1,$fecha2)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_ventas.total_real,tabla_ventas.total_cobrado,tabla_ventas.tipopago,tabla_ventas.tipo_tarjeta,tabla_ventas.porc_combanco,tabla_ventas.porc_iva,tabla_ventas.gtos_venta,tabla_ventas.hora,tabla_tiendas.razon_social AS tienda,tabla_tarjeta.descripcion AS tarjeta,tabla_ventas.idoperador
                      FROM tabla_ventas,tabla_tiendas,tabla_tarjeta 
                      WHERE tabla_ventas.tienda = tabla_tiendas.ni 
                       AND tabla_ventas.tipo_tarjeta=tabla_tarjeta.ni AND (tabla_ventas.fecha BETWEEN '$fecha1' AND '$fecha2') 
                      ORDER BY tabla_ventas.idoperador";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                   
    }      
    #02Jun2014 
    #proceso: consultando -tablaoperador       
    function consulta_perfil($idoperador)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT id,nombre,clave,perfil
                      FROM tabla_operador
                      WHERE id= $idoperador";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                           
    }
   #30-sep 2021
    #proceso: consultandoventas tablaventas-tablatiendas-tarjeta       upate 26-dic-2021
    function consulta_lstventasxIntervalo($fecha1,$fecha2,$status)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_ventas.folio,tabla_ventas.cantidad,tabla_ventas.tienda,tabla_ventas.total_real,tabla_ventas.total_cobrado,tabla_ventas.tipopago,tabla_ventas.hora,tabla_tiendas.razon_social AS tiendas,tabla_ventas.idoperador
                      FROM tabla_ventas,tabla_tiendas
                      WHERE  tabla_ventas.status ='$status' 
                      AND  (tabla_ventas.fecha  BETWEEN '$fecha1' and '$fecha2') 
                      AND tabla_ventas.tienda = tabla_tiendas.ni  ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                   
    } 
       #26-dic 2021
    #proceso: consultandoventas tablaventas-tablatiendas-tarjeta       upate 26-dic-2021
    function consulta_lstpedidosxIntervalo($fecha1,$fecha2)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_ventas.folio,tabla_ventas.tienda,tabla_ventas.total_real,tabla_ventas.total_cobrado,tabla_ventas.tipopago,tabla_ventas.hora,tabla_tiendas.razon_social AS tiendas,tabla_ventas.idoperador
                      FROM tabla_pedidos,tabla_tiendas
                      WHERE  tabla_ventas.status ='pagado' OR tabla_ventas.status ='credito'  
                      AND  (tabla_ventas.fecha  BETWEEN '$fecha1' and '$fecha2') 
                      AND tabla_ventas.tienda = tabla_tiendas.ni  ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                   
    }       
    #28MAY2014 
    #proceso: consultandoventasxtienda tablaventas-tablatarjeta       
    function consulta_montoxtiendas($operador,$status)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT sum(tabla_ventas.total_cobrado) AS totaltienda, tabla_tiendas.razon_social AS tienda
                       FROM tabla_ventas,tabla_tiendas 
                       WHERE tabla_ventas.tienda = tabla_tiendas.ni AND tabla_ventas.idoperador=$operador AND tabla_ventas.status ='$status' AND  
                       tabla_ventas.fecha = curdate() GROUP BY tabla_ventas.tienda";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                   
    }
    #28MAY2014 
    #proceso: consultandoventasxtienda tablaventas-tablatarjeta       
    function consulta_montoxtiendasdetalle($fecha1,$fecha2)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT sum(tabla_ventas.total_cobrado) AS totaltienda, tabla_tiendas.razon_social AS tienda
                       FROM tabla_ventas,tabla_tiendas 
                       WHERE tabla_ventas.tipopago =2 AND tabla_ventas.tipo_tarjeta <>3  AND tabla_ventas.tienda = tabla_tiendas.ni AND  
                       (tabla_ventas.fecha BETWEEN '$fecha1' AND '$fecha2') GROUP BY tabla_ventas.tienda";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                   
    }

    #30ago2014 
    #proceso: consulta tablaventas     
    function consulta_montoxamex($fecha1,$fecha2)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT sum(total_cobrado) AS totalamex
                       FROM tabla_ventas
                       WHERE tipopago = 2 AND tipo_tarjeta =3 AND (fecha BETWEEN '$fecha1' AND '$fecha2') ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                   
    }
    #30ago2014 
    #proceso: consulta tablaventas total-efectivo    
    function consulta_montoNetoefectivo($fecha1,$fecha2)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT sum(total_cobrado) AS totalefectivo
                       FROM tabla_ventas
                       WHERE tipopago = 1 AND (fecha BETWEEN '$fecha1' AND '$fecha2') ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                   
    }
	
    #30ago2014 
    #proceso: consulta tablagastos total-gastos    
    function consulta_montoNetogastos($fecha1,$fecha2)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT sum(monto) AS totalgastos
                       FROM tabla_gastos
                       WHERE fecha BETWEEN '$fecha1' AND '$fecha2' ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                   
    }    
    #30ago2014 
    #proceso: consulta tablagastos lista-gastos    
    function consulta_desgloselistagastos($fecha1,$fecha2)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT ni,concepto,monto,fecha,operador
                       FROM tabla_gastos
                       WHERE fecha BETWEEN '$fecha1' AND '$fecha2' ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                   
    }    

	    #30ago2014 
    #proceso: consulta tablagastosventa total-gastosventa    
    function consulta_montoNetogastosventas($fecha1,$fecha2)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT sum(monto) AS totalgastosventas
                       FROM tabla_gastosventa
                       WHERE fecha BETWEEN '$fecha1' AND '$fecha2' ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                   
    }    
    #2jun2014 
    #proceso: consultandoventasxtienda tablaventas-tablatarjeta           
    function consulta_montoxtiendasAdmin($fecha1,$fecha2)
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT sum(tabla_ventas.total_cobrado) AS totaltienda, tabla_tiendas.razon_social AS tienda
                       FROM tabla_ventas,tabla_tiendas 
                       WHERE tabla_ventas.tienda = tabla_tiendas.ni AND (tabla_ventas.fecha  BETWEEN '$fecha1' AND '$fecha2') GROUP BY tabla_ventas.tienda";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                           
    }       
    
    #29MAY2014 
    #proceso: consultandoventasxtienda tablaventas-tablatiendas          
    function consulta_montoxtiendasIntervalo($operador,$fecha1,$fecha2,$status)
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT sum(tabla_ventas.total_cobrado) AS totaltienda, tabla_tiendas.razon_social AS tienda
                       FROM tabla_ventas,tabla_tiendas 
                       WHERE tabla_ventas.tienda = tabla_tiendas.ni AND tabla_ventas.idoperador=$operador  AND tabla_ventas.status ='$status' AND 
                       (tabla_ventas.fecha BETWEEN '$fecha1' AND '$fecha2' ) GROUP BY tabla_ventas.tienda";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                           
    }
      #01 de octure      
       #proceso: consultando creditos  tabla_creditos tabla_clientes          
    function lista_creditos($operador,$status)
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_creditos.ni, tabla_creditos.cliente, tabla_creditos.monto, tabla_creditos.saldo, tabla_clientes.propietario
                       FROM tabla_creditos,tabla_clientes 
                       WHERE tabla_creditos.idoperador=$operador  
                       AND tabla_creditos.status ='$status' AND tabla_creditos.cliente = tabla_clientes.ni ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                           
    }
    #llamdo de p2_compras
          function lista_supers() //01-oct-2021
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT ni,nomsuper,detalle,operador
                       FROM tabla_supers ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                           
    }    
        #llamdo de p2_mermas
          function listar_productosm() //01-oct-2021
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT codigo,descripcion, precio, costo1
                       FROM tabla_productos ORDER BY descripcion";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                           
    }    
           
    #01 de octure      
    #proceso: consultando creditos  tabla_creditos tabla_clientes          
    function listar_credito($idcredito)
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_creditos.cliente, tabla_creditos.monto, tabla_creditos.saldo, tabla_clientes.propietario
                       FROM tabla_creditos,tabla_clientes 
                       WHERE tabla_creditos.ni=$idcredito  
                       AND tabla_creditos.cliente = tabla_clientes.ni ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                           
    }      
    #28MAY2014 
    #proceso: consultandogastos_ tablagastos       
    function consulta_lstgastos($operador)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT ni,concepto,monto,hora,fecha FROM tabla_gastos WHERE fecha = curdate() AND operador=$operador ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                   
    }
    #29MAY2014 
    #proceso: update_ tablaoperador       
    function update_dataOperador($id,$nombre,$clave)
    {
      $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "UPDATE tabla_operador SET nombre= '$nombre',clave='$clave'  WHERE id=$id ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
     }                           
    }
              
    #29MAY2014 
    #proceso: consulta tablaventa           
	 function consultar_folio($folio,$cvoperador)
     {
      $link_conexion = new conexion();
      if ($link_conexion->conectar()== true)
      {
         $sentencia = "SELECT * FROM tabla_ventas WHERE folio=$folio AND idoperador=$cvoperador ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
       }                                   
     }
    #12JUN2014 
    #proceso: consulta tablaventa           
	 function consultar_folioAdmin($folio)
     {
      $link_conexion = new conexion();
      if ($link_conexion->conectar()== true)
      {
         $sentencia = "SELECT * FROM tabla_ventas WHERE folio=$folio";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
       }                                   
     }
    #29MAY2014 
    #proceso: update tablaventa       
     function cancelar_venta($folio,$status)
     {
      $link_conexion = new conexion();
      if ($link_conexion->conectar()== true)
      {
         $sentencia = "UPDATE tabla_ventas SET status='$status' WHERE folio=$folio";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
       }                                           
     }
     
         #208oct2021
    #proceso: update tablaventa       
     function cancelar_pedido($folio,$status)
     {
      $link_conexion = new conexion();
      if ($link_conexion->conectar()== true)
      {
         $sentencia = "UPDATE tabla_pedidos SET  estado='$status' ,status='$status' WHERE ni=$folio";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
       }                                           
     }
      
    #29MAY2014 
    #proceso: update tablacomisionados       
     function cancelar_comisionados($folio)
     {
      $link_conexion = new conexion();
      if ($link_conexion->conectar()== true)
      {
         $sentencia = "DELETE FROM tabla_comisionados WHERE folio_venta=$folio";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
       }                                                   
     }
    #29MAY2014 
    #proceso: registro tablacancelado       
    function agregar_cancelacion($folio,$cvoperador,$fecha,$total,$cobrado,$tipotarjeta,$gtos,$iva,$combanco,$tienda,$tipopago)
    {
      $link_conexion = new conexion();
      if ($link_conexion->conectar()== true)
      {
         $sentencia = "INSERT INTO tabla_cancelado VALUES(null,$folio,$tienda,$fecha,$cvoperador,$cobrado,$combanco,$iva,$gtos,$tipopago,$tipotarjeta,'$total',curdate())";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
       }                                                           
    }

    #29MAY2014 
    #proceso: consulta_ tablaoperador       
    function consulta_operador($cvoperador)
    {
      $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT id,usuario,nombre,clave,perfil FROM tabla_operador WHERE id=$cvoperador ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                           
    }                   
    #29MAY2014 
    #proceso: consultandoprestamos_ tablaprestamos       
    function consulta_lstgastosIntervalo($operador,$fecha1,$fecha2)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT ni,concepto,monto,hora,fecha FROM tabla_gastos WHERE operador=$operador 
                       AND (fecha BETWEEN '$fecha1' AND '$fecha2')";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                   
    }               


    #28MAY2014 
    #proceso: consultandoprestamos_ tablaprestamos       
    function consulta_lstprestamos($operador)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT ni,prestador,monto,hora,fecha,tipo FROM tabla_prestamos WHERE fecha = curdate() AND operador=$operador ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                   
    }               
             
    #29MAY2014 
    #proceso: consultandoprestamos_ tablaprestamos       
    function consulta_lstprestamosIntervalo($operador,$fecha1,$fecha2)
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT ni,prestador,monto,hora,fecha,tipo FROM tabla_prestamos  WHERE operador=$operador AND (fecha BETWEEN '$fecha1' AND '$fecha2')";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                   
    }                       
    #28MAY2014 
    #proceso: consultandoAbonos_ tablaAbonos       
    function consulta_lstabonos($operador)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT ni,abonador,monto,hora,fecha,tipo FROM tabla_abonos WHERE fecha = curdate() AND operador=$operador ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                   
    }   
    #2jun2014 
    #proceso: consultandoAbonos_ tablaAbonos       
    function consulta_lstabonosReportes($fecha1,$fecha2)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_abonos.ni,tabla_abonos.abonador,tabla_abonos.monto,tabla_abonos.hora,tabla_abonos.fecha,tabla_abonos.tipo,tabla_operador.operador AS prestador FROM tabla_abonos,tabla_operador WHERE tabla_abonos.operador=tabla_operador.id AND (tabla_abonos.fecha BETWEEN '$fecha1' AND '$fecha2')";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                   
    }   

    #30-sep-2021
    #proceso: consultandoAbonos_ tabla_abonos x Intervalo       
    function consulta_lstabonosIntervalo($fecha1,$fecha2)
    {
      $link_conexion = new conexion();
      if ($link_conexion->conectar()== true)
      {
         $sentencia = "SELECT ni,abonador,monto,hora,fecha,credito 
                      FROM tabla_abonos 
                      WHERE fecha BETWEEN '$fecha1' AND '$fecha2'";
         $resultado= @mysql_query($sentencia);
       if (!$resultado)
        return false;
       else
        return $resultado;
      }                           
    }
        #27-dic-2021
    #proceso: consultandoAbonos_ tabla_abonos x cuenta       
    function consulta_lstabonosxcredito($credito,$cliente)
    {
      $link_conexion = new conexion();
      if ($link_conexion->conectar()== true)
      {
         $sentencia = "SELECT ni,abonador,monto,hora,fecha,credito 
                      FROM tabla_abonos 
                      WHERE credito= $credito AND abonador=$cliente";
         $resultado= @mysql_query($sentencia);
       if (!$resultado)
        return false;
       else
        return $resultado;
      }                           
    }
    #28MAY2014 
    #proceso: consultandoDatos_ tablaoperador/vendedores       
      function consulta_criterioAbonador($campo,$campo2,$tabla,$prestador) 
      { 
        $link_conexion = new conexion();
        if ($link_conexion->conectar()== true)
       {
         $sentencia = "SELECT $campo FROM $tabla WHERE $campo2 = $prestador ";
         $resultado= @mysql_query($sentencia);
         if (!$resultado)
          return false;
         else
          return $resultado;
        }         
      }        
    #28MAY2014 
    #proceso: consultando_ tablavendedores/operador       
    function consulta_criterioPrestador($campo,$campo2,$tabla,$prestador)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT $campo FROM $tabla WHERE $campo2 = $prestador ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }                   
    }               

    #28MAY2014 
    #proceso: consultandolog tablahistorialacceso        
    function update_log($id)
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "UPDATE tabla_historialacceso SET fsalida =curdate(),hsalida=now(),activo=0 WHERE fentrada=curdate() AND usuario=$id ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
     }                   
    }
      
    #28MAY2014 
    #proceso: consultandousuario tablahistorialacceso    
    function historial_acceso($id)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT id,fentrada,fsalida FROM tabla_historialacceso WHERE usuario = $id AND fentrada=curdate() ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
     }           
    }
     
     #28MAY2014 
    #proceso: consultandousuario tablahistorialacceso    
    function log_acceso($id)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "INSERT INTO tabla_historialacceso(usuario,fentrada,hentrada,activo) VALUES($id,curdate(),now(),1) ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
     }           
    } 
    
         #28MAY2014 
    #proceso: consultandousuario tablahistorialacceso    
    function update_acceso($id)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "UPDATE tabla_historialacceso SET hentrada =now() WHERE usuario = $id AND fentrada=curdate() ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
     }           
    }   
      
    #28MAY2014 
    #proceso: consultandlst tablaoperador        
    function consulta_perfiles()
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT id,usuario,nombre,perfil,clave FROM tabla_operador ORDER BY nombre ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }                   
    }
    #5AGO2014 
    #proceso: consultandlst tablaoperador        
    function consulta_perfilespersonalizado($perfil)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT id,usuario,nombre,perfil FROM tabla_operador WHERE perfil=$perfil ORDER BY nombre ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }                   
    }
    
    function eliminar_usuario($codigo)
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "DELETE FROM  tabla_operador WHERE id= $codigo ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
      }                           
    }
    #28MAY2014 
    #proceso: registro tablaoperador    
    function registro_Usuario($nombre,$usuario,$clave,$perfil)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "INSERT INTO tabla_operador VALUES(null,'$nombre','$usuario','$clave',$perfil) ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
      }           
    }
    
    #28MAY2014 
    #proceso: registro tablaoperador   
   function update_usuario($id,$nombre,$usuario,$clave,$perfil)
   {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "UPDATE tabla_operador SET nombre = '$nombre' , usuario = '$usuario' , clave = '$clave' , perfil = $perfil WHERE id = $id";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
     }                 
   }

    
    #27MAY2014  up 07agos 
    #proceso: update tablaarticulos    
    function update_articulo($descripcion,$precio,$codigo,$linea,$proveedor1,$costo1,$unidad,$clave,$familia,$sfamilia)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "UPDATE tabla_articulos SET claveart = '$clave',descripcion = '$descripcion' , precio = '$precio' ,familia=$familia,sfamilia=$sfamilia ,linea = '$linea' ,
         unidad_medida='$unidad',proveedor1 = '$proveedor1' , costo1 = '$costo1' WHERE codigo = '$codigo' ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
      }   
    }   
        #24 de septiembre 2021 
    #proceso: tabla_productos   
    function update_producto($descripcion,$precio,$codigo,$proveedor1,$costo1,$unidad,$familia)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "UPDATE tabla_productos SET descripcion = '$descripcion' , precio = '$precio',familia=$familia , unidad_medida='$unidad' , proveedor1 = '$proveedor1' , costo1 = '$costo1' 
         WHERE codigo = '$codigo' ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
      }   
    }
    
    #24 de septiembre 2021   
    #proceso: update tabla_detalle       
    function consulta_enusoProducto($codigo)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT folio FROM tabla_detalle WHERE articulo = '$codigo' ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }           
    }
    #07agosto2014   
    #proceso: update tablaventas        
    function consulta_enusoArticulo($codigo)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT folio FROM tabla_detalle WHERE articulo = '$codigo' ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return $resultado;
      }           
    }

    #27MAY2014 
    #proceso: ELIMINA ART_tablaarticulos    
   	function eliminar_articulo($codigo)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "DELETE FROM tabla_articulos WHERE codigo = '$codigo' limit 1 ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
      }         
    }
        #27dic2021
    #proceso: ELIMINA ART_tabla_productos    
   	function eliminar_PRODUCTOCATALOGO($codigo)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "DELETE FROM tabla_productos WHERE codigo = '$codigo' limit 1 ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
      }         
    }
        #24 de septiembre 2021
    #proceso: ELIMINA tabla_inventario   
   	function eliminar_productodeInventario($codigo)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "DELETE FROM tabla_inventario WHERE codigo = '$codigo' limit 1 ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
      }         
    }
    #27MAY2014 
    #proceso: ELIMINA ART_tablaarticulos    
   	function eliminar_articulodeInventario($codigo)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "DELETE FROM tabla_inventario WHERE codigo = '$codigo' limit 1 ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
      }         
    }
        #24Septiembre2021  Perfil de CAJera
    #proceso: insertando tabla_productos   
             
    function insertar_productos($codigo,$codigo,$descripcion,$precio,$familia,$proveedor1,$costo1,$unidadm,$cvoperador)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "INSERT INTO tabla_productos(codigo,claveart,descripcion,precio,familia,proveedor1,costo1,unidad_medida,operador) 
                       VALUES ('$codigo','$clave','$descripcion','$precio',$familia,'$proveedor1','$costo1','$unidadm',$cvoperador)";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
      }   
    }

    #27MAY2014  up 7agosto
    #proceso: insertando tablaarticulos    
             
    function insertar_articulos($codigo,$clave,$descripcion,$precio,$familia,$sfamilia,$linea,$proveedor1,$costo1,$unidadm,$cvoperador)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "INSERT INTO tabla_articulos(codigo,claveart,descripcion,precio,familia,sfamilia,linea,proveedor1,costo1,unidad_medida,operador) 
                       VALUES ('$codigo','$clave','$descripcion','$precio',$familia,$sfamilia,$linea,'$proveedor1','$costo1','$unidadm',$cvoperador)";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
      }   
    }
    
        #proceso: insertando tabla_clientes llamado de p2_guarda_cliente.php    
             
    function insertar_nvocliente($operador,$razonsocial,$rfc,$domicilio,$telefonos,$propietario)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "INSERT INTO tabla_clientes(ni,operador,razon_social,rfc,domicilio,telefonos,propietario) 
                       VALUES (null,$operador,'$razonsocial','$rfc','$domicilio','$telefonos','$propietario')";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
      }   
    }
    #llamado desde p2_prestamospersonales.php el 27-12-2021
        function insertar_nvoprestamo($operador,$prestador,$detalle,$monto,$saldo)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "INSERT INTO tabla_prestamos(ni,monto,saldo,fecha,detalles,operador,hora,concepto) 
                       VALUES (null,'$monto','$saldo',curdate(),'$detalle',$operador,now(),'$prestador')";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
      }   
    }
    #24 septiembre 2021 PERfil CAJera
    #proceso: insertando tabla_inventario    
    function inicializar_inventario($codigo)
    {
         $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "INSERT INTO tabla_inventario values ('$codigo','0')";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
        return false;
      else
        return true;
      }   
    }
        
    #proceso: consultando tabla_iva
    function consulta_iva()
    {
     $link_conexion = new conexion();
     if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT valor as iva FROM tabla_iva";
     $resultado= @mysql_query($sentencia);
     if (!$resultado)
       return false;
     else
       return $resultado;
     }   
    } 
    //---->si hay caja iniciada
    function registrar_cierre($operador){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "UPDATE tabla_cortes SET  hora_cierre=now(),activo=0
        	           WHERE fecha_apertura=curdate() AND operador=$operador";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }} 
    //---->inicia caja 
    //Sep 2021
    function registrar_apertura($operador,$cantidainicial){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "INSERT INTO tabla_cortes(operador,fecha_apertura,hora_apertura,cantidadini,cantidadfin,activo) 
         VALUES($operador,curdate(),now(),'$cantidainicial','$cantidainicial',1)";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }} 
	#creado
	# //---->Actualiza caja 
    //Sep 2021
	function actualizar_aperturacaja($operador,$cajainicial)
	{
      $link_conexion = new conexion();
      if ($link_conexion->conectar()== true)
      {
         $sentencia = "UPDATE tabla_cortes SET cantidadini = '$cajainicial' WHERE operador = $operador AND fecha_apertura= curdate() ";
         $resultado= @mysql_query($sentencia);
       if (!$resultado)
       return false;
       else
       return true;
      }	
	}
	
    //---->Reporte de caja x periodo
    function consultar_caja($f_inicial,$f_final,$operador){//---------->15-feb-12
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT id_corte,operador,fecha_apertura,hora_apertura,cantidadini,cantidadfin,hora_cierre
                            FROM tabla_cortes
                         	WHERE operador=$operador AND  fecha_apertura BETWEEN '$f_inicial' and '$f_final'";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }} 

    //---->si hay caja iniciada y activa
    function CajaInicial($fecha,$operador){
       $link_conexion = new conexion();
       if ($link_conexion->conectar()== true)
       {
         $sentencia = "SELECT id_corte,operador,fecha_apertura,hora_apertura,cantidadini,cantidadfin,hora_cierre
                            FROM tabla_cortes
                         	WHERE operador=$operador AND fecha_apertura='$fecha' and activo=1";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }} 
        //--------->Ultima caja del dia
    function Ultimacaja($operador){
         $link_conexion = new conexion();
         if ($link_conexion->conectar()== true)
         {
         $sentencia = "SELECT max(fecha_apertura) as fecha,id_corte,operador,hora_apertura,cantidadini,cantidadfin,hora_cierre
                            FROM tabla_cortes WHERE operador=$operador";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }}   
        //--------->consulta si Caja esta cerrada
    function cajaInactiva($operador){
        $link_conexion = new conexion();
        if ($link_conexion->conectar()== true)
        {
         $sentencia = "SELECT id_corte,operador,fecha_apertura,hora_apertura,cantidadini,cantidadfin,hora_cierre
                            FROM tabla_cortes
                         	WHERE operador = $operador AND fecha_apertura=curdate() and activo=0";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }}   
    #------------------------------------------------30/sep2021---------------------------------------------------------#               
    #----------------------------------------------------------------------------------------------------------------#                              
 #funcion: proceso de Tabla_gastos   
    function importe_gastos($fecha,$operador){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(monto) as imp_gastos
                            FROM tabla_gastos
                         	WHERE fecha=$fecha AND operador=$operador";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }}  
     #funcion: proceso de Tabla_gastos   
    function importe_gastos1($fecha){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(monto) as imp_gastos
                            FROM tabla_gastos
                         	WHERE fecha=$fecha";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }} 
         #funcion: proceso de Tabla_gastos   
    function importe_gastos2($fecha1,$fecha2){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(monto) as imp_gastos
                            FROM tabla_gastos
                         	WHERE fecha BETWEEN '$fecha1' AND '$fecha2'";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }}
 #funcion: proceso de Tabla_gastos   
    function importe_compras($fecha){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(monto) as imp_compras
                            FROM tabla_compras
                         	WHERE fecha=$fecha";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }}  
     #funcion: proceso de Tabla_gastos   
    function importe_compras2($fecha1,$fecha2){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(monto) as imp_compras
                            FROM tabla_compras
                         	WHERE fecha BETWEEN '$fecha1' AND '$fecha2'";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }}
  #funcion: proceso de Tabla_prestamos      
    function importe_prestamos($fecha)
    {
      $link_conexion = new conexion();
      if ($link_conexion->conectar()== true)
      {
         $sentencia = "SELECT sum(saldo) as imp_prestamos
                            FROM tabla_prestamos
                         	WHERE fecha=$fecha ";
         $resultado= @mysql_query($sentencia);
      if (!$resultado)
       return false;
       else
       return $resultado;
      }        
    }
  function consulta_nomperfiles($perfil)
  {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {#apodo
         $sentencia = "SELECT id,nombre
                            FROM tabla_operador
                         	WHERE perfil=$perfil";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }            
  }  
  //30-sep 2021 tabla_mermas
    function importe_mermas($fecha,$operador)
  {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(monto) as imp_mermas
                            FROM tabla_mermas
                         	WHERE fecha=$fecha AND operador=$operador";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }            
  }
    //28-dic 2021 tabla_mermas
    function importe_mermas1($fecha)
  {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(monto) as imp_mermas
                            FROM tabla_mermas
                         	WHERE fecha=$fecha";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }            
  }
      //28-dic 2021 tabla_mermas
    function importe_mermas2($fecha1,$fecha2)
  {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(monto) as imp_mermas
                            FROM tabla_mermas
                         	WHERE fecha BETWEEN '$fecha1' AND '$fecha2'";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }            
  }
  //30sep 2021 tabla_pagos
    function importe_pagos($fecha,$operador)
  {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(monto) as imp_pagos
                            FROM tabla_pagos
                         	WHERE fecha=$fecha AND operador=$operador";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }            
  }
    //28-dic 2021 tabla_pagos
    function importe_pagos1($fecha)
  {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(monto) as imp_pagos
                            FROM tabla_pagos
                         	WHERE fecha=$fecha";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }            
  }
      //28-dic 2021 tabla_pagos
    function importe_pagos2($fecha1,$fecha2)
  {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(monto) as imp_pagos
                            FROM tabla_pagos
                         	WHERE fecha BETWEEN '$fecha1' AND '$fecha2'";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }            
  }
   //30sep 2021 tabla_abonos
    function importe_abonos($fecha)
  {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(monto) as imp_abonos
                            FROM tabla_abonos
                         	WHERE fecha=$fecha";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }            
  }
  
     //28-ddic 2021 tabla_abonos
    function importe_abonosxintervaloss($fecha1,$fecha2)
  {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(monto) as imp_abonos
                            FROM tabla_abonos
                         	WHERE fecha BETWEEN '$fecha1' AND '$fecha2' ";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }            
  }
  
  function importe_ingresos($fecha,$operador)
  {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(monto) as imp_ingresos
                            FROM tabla_abonos
                         	WHERE fecha=$fecha AND operador=$operador";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }            
  }
  function importe_ingresosExtras($fecha,$operador)
  {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(monto) as imp_ingresosex
                            FROM tabla_ingresos
                         	WHERE fecha=$fecha AND operador=$operador";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }            
  }  
  //conulta tabla_ventas tipo=1 en Efectivo editado 26-dic-2021
  function importe_VentasEfectivo($fecha_hoy){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(total_cobrado) as imp_efectivo
                       FROM tabla_ventas 
                       WHERE fecha='$fecha_hoy' AND
                       tipopago=1";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }}  
      //conulta tabla_pedidos status='pagado' editado 26-dic-2021
  function importe_PedidosEfectivo($fecha_hoy){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(total_cobrado) as imp_efectivopedido
                       FROM tabla_pedidos 
                       WHERE fecha='$fecha_hoy' AND
                       status='pagado'";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }}
          //consulta folios tabla_ventas tipo=1 en Efectivo 
  function importeneto_PedidosEfectivo($fecha_hoy){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(total_real) as imp_netoefectivopedido
                       FROM tabla_pedidos 
                       WHERE fecha='$fecha_hoy' AND
                       status='pagado'";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }} 
      //consulta folios tabla_ventas tipo=1 en Efectivo 
  function importeneto_VentasEfectivo($fecha_hoy){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(total_real) as imp_netoefectivo
                       FROM tabla_ventas 
                       WHERE fecha='$fecha_hoy' AND
                       tipopago=1";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }} 
    
    //01-oct 2021
        #Registrar Abono tabla_abonos
        function registrar_compra($id_super,$importe,$operador){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "INSERT INTO tabla_compras(fecha,hora,super,monto,operador)
                       VALUES (curdate(),now(),'$id_super','$importe',$operador)";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }}
    
            #Registrar merma tabla_mermas llamado desde p2_mermas.php
    function registrar_merma($codigo,$cantidad,$importe,$detalles,$operador){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "INSERT INTO tabla_mermas(fecha,hora,codigo,cantidad,monto,detalles,operador)
                       VALUES (curdate(),now(),'$codigo','$cantidad','$importe','$detalles',$operador)";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }}
    #Registrar Abono tabla_abonos
        function registrar_abono($idcredito,$id_cliente,$importe,$operador){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "INSERT INTO tabla_abonos(abonador, monto,fecha, credito, operador,hora)
                       VALUES ($id_cliente,'$importe',curdate(),$idcredito,$operador,now())";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }}
    
        #Registrar pago tabla_pagos -creao 27-12-2021
        function registrar_pagoeprestamo($idprestador,$importe,$operador){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "INSERT INTO tabla_pagos(prestador,monto,fecha,operador)
                       VALUES ($idprestador,'$importe',curdate(),$operador)";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }}
    
    function registrar_operacion($detalle,$importe,$operador,$tabla){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "INSERT INTO $tabla(fecha,concepto,monto,operador,hora)
                       VALUES(curdate(),'$detalle','$importe',$operador,now())";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }}
   #-------------................................................................
   #.................................agosto 07-2014
    function registrar_operacionCats($campo,$descripcion,$operador,$tabla)  #creado agosto-07-2014
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "INSERT INTO $tabla($campo,operador)
                       VALUES('$descripcion',$operador)";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }        
    }
        function registrar_operacionSupers($descripcion,$detalle,$operador,$tabla)  #creado dic-26-2021
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "INSERT INTO $tabla(nomsuper,detalle,operador)
                       VALUES('$descripcion','$detalle',$operador)";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }        
    }
#llamado desde p2_categorias.php  01-oct-2021
    function consulta_enusoCATProd($id,$campo)  #creado agosto-07-2014
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT claveart, codigo FROM tabla_productos WHERE $campo = $id";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }        
    }
    #llamado desde p2_categorias.php  01-oct-2021
    function consulta_enusoSupercompras($id)  #creado agosto-07-2014
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT * FROM tabla_compras WHERE  super= '$id'";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }        
    }
    
    function consulta_enusoCATS($id,$campo)  #creado agosto-07-2014
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT claveart FROM tabla_articulos WHERE $campo = $id";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }        
    }
    //creado 15-oct-2021
    function consulta_enusoCTPyV($id,$tabla)  #creado agosto-07-2014
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT * FROM $tabla WHERE tienda = $id";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }        
    }
    
        //creado 27-dic-2021
    function consulta_enusoPAgos($id,$tabla)  #creado dic-27-2021
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT * FROM $tabla WHERE prestador = $id";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }        
    }
    
	//DESDE p2_mermas.php
        function consulta_mermasdeldia($fecha)  #creado agosto-07-2014
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT tabla_mermas.folio,tabla_mermas.codigo,tabla_mermas.monto,tabla_mermas.cantidad,tabla_mermas.detalles,tabla_productos.descripcion 
         FROM tabla_mermas, tabla_productos 
         WHERE tabla_mermas.fecha=$fecha 
         AND tabla_mermas.codigo=tabla_productos.codigo
         ORDER BY tabla_mermas.folio";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }        
    }
    //DESDE p2_compras.php
    function consulta_comprasdeldia($fecha)  #creado agosto-07-2014 EDIT 26-DIC-2021
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT tabla_compras.folio,tabla_compras.super,tabla_compras.monto,tabla_supers.nomsuper 
         FROM tabla_compras, tabla_supers 
         WHERE  tabla_compras.fecha=$fecha 
         AND tabla_compras.super=tabla_supers.ni
         ORDER BY tabla_compras.folio";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }        
    }

    function consulta_CATS($campo,$tabla)  #creado agosto-07-2014
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT ni,$campo FROM $tabla ORDER BY $campo";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }        
    }
    
      function consulta_sUPERS($tabla)  #creado agosto-07-2014
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT ni,nomsuper,detalle,operador FROM $tabla ORDER BY nomsuper";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }        
    }
    
    function consulta_lstClientesconCreditos()  #creado 15-oct-2021 llamado de 
    {
      $link_conexion = new conexion();
      if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT tabla_creditos.ni,tabla_clientes.ni AS idcliente, tabla_clientes.propietario, tabla_clientes.rfc,tabla_clientes.razon_social,tabla_clientes.domicilio, tabla_clientes.telefonos,tabla_clientes.operador,tabla_creditos.monto,tabla_creditos.saldo,tabla_creditos.fecha,tabla_creditos.id_venta 
         FROM tabla_clientes, tabla_creditos 
         WHERE tabla_clientes.ni = tabla_creditos.cliente AND tabla_creditos.status = 'activo'
         ORDER BY tabla_clientes.propietario";
      $resultado= @mysql_query($sentencia);
      if (!$resultado)
      return false;
      else
      return $resultado;
    }        
    }
    
        function consulta_lstPrestamospersonales()  #creado 27-dic-2021 llamado de P2_guarda_operacionesPrestamo.php
    {
      $link_conexion = new conexion();
      if ($link_conexion->conectar()== true)
     {
         $sentencia = "SELECT ni,concepto,detalles,monto,saldo,fecha 
         FROM tabla_prestamos 
         WHERE status = 1
         ORDER BY concepto";
      $resultado= @mysql_query($sentencia);
      if (!$resultado)
      return false;
      else
      return $resultado;
    }        
    }
        function consulta_lstClientes()  #creado 15-oct-2021 llamado de 
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT * FROM tabla_clientes ORDER BY propietario";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }        
    }
    
	function consulta_familiaaart()  #creado agosto-07-2014
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT ni,familia FROM tabla_familia ORDER BY familia";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }        
    }  
    #tomado de p2_compras.php
    	function eliminar_compra($idcompra)  #creado octubre-01-2021
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "DELETE FROM tabla_compras WHERE folio = $idcompra";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }        
    }
   
    #tomado de p2_mermas.php
    	function eliminar_merma($folio)  #creado octubre-01-2021
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "DELETE FROM tabla_mermas WHERE folio = $folio";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }        
    }
        
	function eliminar_CATS($id,$tabla)  #creado 01-10-2021
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "DELETE FROM $tabla WHERE ni = $id";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }        
    }
    	function eliminar_supers($id,$tabla)  #creado 27-12-2021
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "DELETE FROM $tabla WHERE ni = $id";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }        
    }
    	function eliminar_xCliente($id)  #creado 01-10-2021
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "DELETE FROM tabla_clientes WHERE ni = $id";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }        
    }
   	
       function eliminar_xPrestamo($id)  #creado 27-12-2021
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "DELETE FROM tabla_prestamos WHERE ni = $id";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }        
    }
    
    #llamdo desde p2_mermas.php
        function actualizar_merma($folio,$producto,$cantidad,$detalles,$importe) #creado octubre 01-2021
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "UPDATE tabla_mermas SET codigo='$producto', monto ='$importe', cantidad='$super', detalles='$detalles' WHERE folio = $folio";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }                
    }
    #llamdo desde p2_compras.php
        function actualizar_compra($folio,$super,$importe) #creado octubre 01-2021
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "UPDATE tabla_compras SET monto =$importe, super='$super' WHERE folio = $folio";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }                
    }
    
    function actualizar_Supers($id,$nombre,$detalle,$tabla) #creado 01-10-2021
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "UPDATE $tabla SET nomsuper ='$nombre', detalle ='$detalle'  WHERE ni = $id";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }                
    }
    #creado 15-oct-2021 llamado desde p2_guarda_operacionescliente.php
        function actualizar_dataCliente($id,$razonsocial,$rfc,$domicilio,$telefonos,$propietario) 
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "UPDATE tabla_clientes SET  razon_social='$razonsocial', rfc='$rfc',domicilio='$domicilio',telefonos='$telefonos', propietario='$propietario'
         WHERE ni = $id";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }                
    }
    
        #creado 27-dic-2021 llamado desde p2_guarda_operacionesPrestamo.php
        function actualizar_dataPrestamo($id,$prestador,$detalle,$monto,$saldo) 
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "UPDATE tabla_prestamos SET  concepto='$prestador',detalles='$detalle', monto='$monto', saldo='$saldo'
         WHERE ni = $id";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }                
    }
    
//  llamdo desde registrar_ingreso.php
    function actualizar_credito($idcredito,$saldonuevo,$status) #creado oct-01-2021
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "UPDATE tabla_creditos SET saldo =$saldonuevo, status='$status' WHERE ni = $idcredito";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }                
    }
    
    //  llamdo desde p2_guarda_operacionesPrestamo.php
    function actualizar_saldoprestamopersonal($id,$saldonuevo,$status) #creado 27-12-2021
    {
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "UPDATE tabla_prestamos SET saldo =$saldonuevo, status=$status WHERE ni = $id";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }                
    }
   #-------------................................................................
   #.................................agosto 07-2014

    function registrar_operacion2($deudor,$tipo,$detalle,$importe,$operador,$tabla)
    {
         $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "INSERT INTO $tabla(prestador,tipo,fecha,concepto,monto,operador,hora)
                       VALUES($deudor,'$tipo',curdate(),'$detalle','$importe',$operador,now())";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return true;
    }   
    }
      function actualizar_caja($importecaja,$id_corte){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "UPDATE tabla_cortes  SET cantidadfin=$importecaja
                         	WHERE id_corte=$id_corte";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }}    
  //cosultar tipo=2 ventas a credito tabla_ventas editado 26-dic-2021
    function importe_VentasAcredito($fecha_hoy){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(total_cobrado) as imp_creditos
                       FROM tabla_ventas 
                       WHERE fecha='$fecha_hoy' AND
                       tipopago=2";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }}
    
      //cosultar status='credito' a credito tabla_pedidos editado 26-dic-2021
    function importe_PedidosAcredito($fecha_hoy){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(total_cobrado) as imp_creditospedido
                       FROM tabla_pedidos 
                       WHERE fecha='$fecha_hoy' AND
                       status ='credito'";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }}
      //cosultar tipo=2 ventas a credito tabla_ventas 26-dic-2021
    function importeNeto_VentasAcredito($fecha_hoy){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(total_real) as imp_netocreditos
                       FROM tabla_ventas 
                       WHERE fecha='$fecha_hoy' AND
                       tipopago=2";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }}
      //cosultar tipo=2 ventas a credito tabla_ventas 26-dic-2021
    function importeNeto_PedidosAcredito($fecha_hoy){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(total_real) as imp_netocreditospedido
                       FROM tabla_pedidos 
                       WHERE fecha='$fecha_hoy' AND
                       status = 'credito'";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }}    
    
  function importe_VentasTarjeta($operador,$fecha_hoy){
    $link_conexion = new conexion();
    if ($link_conexion->conectar()== true)
    {
         $sentencia = "SELECT sum(total_cobrado) as imp_tarjetas
                       FROM tabla_ventas 
                       WHERE fecha='$fecha_hoy' AND
                       tipopago=2 AND idoperador = $operador";
    $resultado= @mysql_query($sentencia);
    if (!$resultado)
    return false;
    else
    return $resultado;
    }}  
       #funcion: proceso de lst.TablaTarjetas
               function consulta_tabTarjetas()
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT ni,descripcion,porc 
                                      FROM tabla_tarjeta ORDER BY ni";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }
               }
       #funcion: proceso de lst.TablaTiendas
               function consulta_tiendas()
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT ni,razon_social,rfc 
                                      FROM tabla_tiendas ORDER BY ni";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }
               }
       #funcion: proceso de lst.Tablatipomoneda #24may14 
              function consulta_monedas()
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT ni,tipo_moneda,valorcambio,moneda,den_1000,den_500,den_200,den_100,den_50,den_20,den_10,den_5,den_1 
                                      FROM tabla_tipomoneda ORDER BY valorcambio";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }
               
       #funcion: proceso de lst.Tablaarqueo #24may14                
              function existereg_Monedaarqueo($var_clavemoneda,$operador)
              {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT ni,den_1000,den_500,den_200,den_100,den_50,den_20,den_10,den_5,den_1 
                                      FROM tabla_arqueo WHERE fecha = curdate() AND operador=$operador AND moneda=$var_clavemoneda";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                                
              }
       #funcion: proceso de lst.Tablaarqueo #24may14                
             function actualizar_Monedaarqueo($var_clavemoneda,$den_1000,$den_500,$den_200,$den_100,$den_50,$den_20,$den_10,$den_5,$den_2,$den_1)
              {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_arqueo SET den_1000=$den_1000,den_500=$den_500,den_200=$den_200,den_100=$den_100,den_50=$den_50,den_20=$den_20,den_10=$den_10,den_5=$den_5,den_2=$den_2,den_1=$den_1 
                                      WHERE ni=$var_clavemoneda ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                                
              }

       #funcion: proceso de lst.Tablaarqueo #24may14                
             function actualizar_Monedaarqueo2($var_clavemoneda,$den_1000,$den_500,$den_200,$den_100,$den_50,$den_20,$den_10,$den_5,$den_2,$den_1)
              {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_arqueo SET den_1000=$den_1000,den_500=$den_500,den_200=$den_200,den_100=$den_100,den_50=$den_50,den_20=$den_20,den_10=$den_10,den_5=$den_5,den_2=$den_2,den_1=$den_1 
                                      WHERE ni=$var_clavemoneda ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                                
              }                               

                               
       #funcion: proceso de reg.Tablaarqueo #24may14                
             function registrar_Monedaarqueo($var_clavemoneda,$operador,$den_1000,$den_500,$den_200,$den_100,$den_50,$den_20,$den_10,$den_5,$den_2,$den_1)
              {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "INSERT INTO tabla_arqueo VALUES(null,curdate(),$var_clavemoneda,$den_1000,$den_500
                    ,$den_200,$den_100,$den_50,$den_20,$den_10,$den_5,$den_2,$den_1,$operador)";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                                
              }                                               


       #funcion: proceso de lst.Tablaarqueo #24may14                
              function consulta_existeArqueo($operador,$clave_moneda)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT ni,den_1000,den_500,den_200,den_100,den_50,den_20,den_10,den_5,den_1 
                                      FROM tabla_arqueo WHERE moneda=$clave_moneda AND fecha = curdate() AND operador = $operador";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                                
               }
       #funcion: proceso de lst.Tablaarqueo #24may14                
              function consulta_denominacionMoneda($clave_moneda)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT ni,den_1000,den_500,den_200,den_100,den_50,den_20,den_10,den_5,den_1 
                                      FROM tabla_tipomoneda WHERE ni=$clave_moneda ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                                
               }
               function actualizar_valorMoneda($clave,$valor)#6agosto2014
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_tipomoneda SET valorcambio='$valor' WHERE ni=$clave ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                                                
               }

       #funcion: proceso de lst.Tablaarqueo #2jun14                
              function consulta_existeArqueoAdmin($operador,$clave_moneda)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT ni,sum(den_1000)AS den_1000,sum(den_500) AS den_500,sum(den_200) AS den_200,
                    sum(den_100) AS den_100,sum(den_50) AS den_50,sum(den_20) AS den_20,sum(den_10) AS den_10, sum(den_5) AS den_5,sum(den_1) AS den_1 
                                      FROM tabla_arqueo WHERE moneda=$clave_moneda AND fecha = curdate() AND operador <> $operador GROUP BY operador";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                                
               }
       #funcion: proceso de lst.Tabla_Tiendas
               function consulta_folios($tipo,$tienda)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  $tipo
                                      FROM tabla_tiendas WHERE  ni= $tienda";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }
       #funcion: proceso de lst.TablaTiendas
               function consulta_gastos($fechai,$fechaf,$operador)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,concepto,monto,fecha,hora
                                      FROM tabla_gastos WHERE operador=$operador AND (fecha BETWEEN '$fechai' AND '$fechaf') ORDER BY fecha DESC";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }
               
          function actualizar_gasto($idgasto,$concepto,$monto)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_gastos SET monto ='$monto',concepto='$concepto' WHERE ni=$idgasto";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                
               }
          #funcion: proceso de lst.Tabla_gastos     
          function eliminar_gasto($idgasto)
          {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "DELETE 
                                      FROM tabla_gastos WHERE  ni= $idgasto";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                 
          }

       #funcion: proceso de lst.Tabla_abonos y tabla_clientes
               function consulta_ingresosabonos($fechai,$fechaf,$operador)#01-oct-2021
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  tabla_abonos.ni,tabla_abonos.abonador,tabla_abonos.credito,tabla_abonos.monto,tabla_abonos.fecha,tabla_abonos.hora,tabla_clientes.propietario
                                      FROM tabla_abonos, tabla_clientes 
                                      WHERE tabla_abonos.operador=$operador 
                                      AND (tabla_abonos.fecha BETWEEN '$fechai' AND '$fechaf')
                                      AND tabla_abonos.abonador=tabla_clientes.ni
                                       ORDER BY tabla_abonos.fecha DESC";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }
       #funcion: proceso de lst.TablaTiendas
               function consulta_ingresos($fechai,$fechaf,$operador)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,concepto,monto,fecha,hora
                                      FROM tabla_ingresos WHERE operador=$operador AND (fecha BETWEEN '$fechai' AND '$fechaf') ORDER BY fecha DESC";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }
          function actualizar_ingreso($idingreso,$concepto,$monto)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_ingresos SET monto ='$monto',concepto='$concepto' WHERE ni=$idingreso";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                
               }
          #funcion: proceso de lst.Tablaingresos     
          function eliminar_ingreso($idingreso)
          {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "DELETE 
                                      FROM tabla_ingresos WHERE  ni= $idingreso";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                 
          }


       #funcion: proceso de registro.tablavendedores
               function consultar_datosVendedor($ni_vendedor)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,vendedor
                                      FROM tabla_vendedores WHERE  ni= $ni_vendedor";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }   
       #creado 05-ago-14        
       #funcion: proceso de registro.tablavendedores
               function consulta_perfilvendedores()
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni AS id ,vendedor AS nombre, dato1
                                      FROM tabla_vendedores ORDER BY vendedor ASC";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                  
               }       
       #05junio2014  
       #funcion: consults xnombre.tablavendores       
       function consulta_existeVendedor($vendedor)
       {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,vendedor
                                      FROM tabla_vendedores WHERE  vendedor= '$vendedor'";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                        
       }
       #  06junio2014
       #funcion: proceso de lst.tablacomisionados con autorizacion
               function consulta_comisionados($v_fechai,$v_fechaf,$vendedor,$status)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "
                                      SELECT  tabla_ventas.folio,tabla_ventas.fecha,tabla_ventas.hora,tabla_comisionados.ni_vendedor,tabla_comisionados.comision
                                      FROM  tabla_comisionados,tabla_ventas
                                      WHERE tabla_comisionados.autorizado =$status
                                      AND tabla_comisionados.ni_vendedor =$vendedor
                                      AND tabla_comisionados.folio_venta=tabla_ventas.folio 
                                      AND (tabla_ventas.fecha BETWEEN '$v_fechai' AND '$v_fechaf') GROUP BY tabla_ventas.folio ORDER BY tabla_ventas.fecha" ;

                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }               
			   
			   #  04sep2014 
               #funcion: proceso  comision x fecha .tablacomisionados con autorizacion
               function consulta_comisiondeldiaVendedor($fecha1,$fecha2,$vendedor,$status)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  sum(tabla_comisionados.comision) as comision
                                      FROM  tabla_comisionados,tabla_ventas
                                      WHERE tabla_comisionados.autorizado =$status
                                      AND tabla_comisionados.ni_vendedor =$vendedor
                                      AND tabla_comisionados.folio_venta=tabla_ventas.folio 
                                      AND (tabla_ventas.fecha BETWEEN '$fecha1' AND '$fecha2')";
			
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }               						  
       #  06junio2014
       #funcion: proceso de lst.tablacuentas 
          function datos_cuenta($ni_vendedor)
          {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,efectivo,prestamo
                                      FROM  tabla_cuentas
                                      WHERE cuenta =$ni_vendedor" ;

                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                            
          }

          function consulta_Pagoscomision($v_fechai,$v_fechaf,$ni_vendedor,$operador)
          {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT fecha,monto
                                      FROM  tabla_pagos
                                      WHERE operador =$operador
                                      AND vendedor =$ni_vendedor
                                      AND (fecha BETWEEN '$v_fechai' AND '$v_fechaf') ORDER BY fecha" ;

                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                            
          }

       #funcion: proceso de lst.tablacomisionados
            function consulta_comisionado($folio)
            {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,ni_vendedor
                                      FROM tabla_comisionados WHERE  folio_venta= $folio";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                                
            }   
       #funcion: proceso de lst.tablacomisionados
               function consultar_comisionados($folio,$autorizado)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,ni_vendedor,comision,porc
                                      FROM tabla_comisionados WHERE  folio_venta= '$folio' AND autorizado = $autorizado";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }
	   #nuevo 3 septiembre	   
       #funcion: proceso de update tablacomisionados
               function actualizar_comisionXVededor($folio,$vendedor,$comision,$porc)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_comisionados SET comision = $comision ,porc = $porc  WHERE  ni_vendedor = $vendedor AND folio_venta = $folio ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                
               }			   
       #funcion: proceso de lst.tablacomisionados
               function consultar_montocomision($folio,$autorizado)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  comision
                                      FROM tabla_comisionados WHERE  folio_venta= '$folio' AND autorizado = $autorizado GROUP BY comision";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }			   
			   function eliminar_comisionComisionados($ni_vendedor,$folio)
			   {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "DELETE FROM tabla_comisionados WHERE  folio_venta= '$folio' AND ni_vendedor = $ni_vendedor";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                			   
			   }
       #hoy 15-agos-14
       #funcion: proceso de lst.tablacomisionados
               function consultar_valcomisionactual($folio,$autorizado)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,ni_vendedor,comision,porc
                                      FROM tabla_comisionados WHERE  folio_venta= '$folio' AND autorizado = $autorizado";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }            
       #funcion: proceso de update.tablacomisionados 
               function comisionar($folio,$ni_vendedor,$comisionado,$comision,$porc)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_comisionados SET autorizado= $comisionado, comision ='$comision',porc='$porc' WHERE  folio_venta= $folio AND ni_vendedor = $ni_vendedor";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                
               }
             function  agregar_comisionado($folio,$codigo)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "INSERT INTO tabla_comisionados(folio_venta,ni_vendedor) VALUES($folio,$codigo)";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                                
               }
       #funcion: proceso de update.tablacuentas #creado 19may14
               function agregar_comisionCuenta($ni_vendedor,$comision,$tipo)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_cuentas SET efectivo = efectivo + $comision WHERE  tipo= '$tipo' AND cuenta = $ni_vendedor";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                                
               }
                              
                               
       #06junio2014
       #funcion: proceso de registro.tablapagos #creado 19may14
               function registrar_pago($vendedor,$monto,$cvoperador)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "INSERT INTO tabla_pagos VALUES(null,$vendedor,'$monto',curdate(),$cvoperador)";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                                
               }        
       #funcion: proceso de registro.tablaprestamos #creado 20may14                      
              function registrar_prestamo($vendedor,$monto,$tipo,$operador)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "INSERT INTO tabla_prestamos(prestador,monto,fecha,tipo,operador,hora) VALUES($vendedor,'$monto',curdate(),'$tipo',$operador,now())";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                  
               }  
       #funcion: proceso de registro.tablaprestamos #creado 20may14                      
              function registrar_abonos($vendedor,$monto,$tipo,$operador)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "INSERT INTO tabla_abonos(abonador,monto,fecha,tipo,operador) VALUES($vendedor,'$monto',curdate(),'$tipo',$operador)";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                  
               }
       #funcion: proceso de registro.tablagastos #creado 20may14                    
             function registrar_gasto($descripcion,$monto,$operador)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "INSERT INTO tabla_gastos(concepto,monto,fecha,hora,operador) VALUES('$descripcion','$monto',curdate(),now(),$operador)";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                  
               }               
           
                #funcion: proceso de registro.tabla_creditos #creado 14-10-2021  
                #llamdo desde pv/p2_guardaventa.php               
             function registrar_creditocliente($cliente,$total_cobrado,$operador,$folio)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "INSERT INTO tabla_creditos(cliente,monto,fecha,saldo,operador,hora,id_venta) 
                    VALUES($cliente,'$total_cobrado',curdate(),'$total_cobrado',$operador,now(),$folio)";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                  
               }      
       #funcion: proceso de registro.tablacuentas #creado 20may14                                       
            function aumentar_prestamocuenta($cuenta,$monto)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_cuentas SET prestamo = prestamo + $monto WHERE ni = $cuenta ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                      
               }               
			          
               function listar_prestamos($fechai,$fechaf,$operador)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT tabla_prestamos.ni,tabla_prestamos.prestador,tabla_prestamos.monto,tabla_prestamos.fecha,tabla_vendedores.vendedor AS nprestador
                     FROM tabla_prestamos,tabla_vendedores WHERE  operador=$operador AND (tabla_prestamos.fecha BETWEEN '$fechai' AND '$fechaf') AND tabla_prestamos.prestador = tabla_vendedores.ni ORDER BY tabla_prestamos.fecha DESC";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                      
               }   
               
			   #04 sep 2014
			   #prestamos del dia x vendedor
			   function list_prestamosxvendedor($fecha1,$fecha2,$vendedor)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT ni,monto,fecha,concepto
                                     FROM tabla_prestamos WHERE prestador=$vendedor AND (fecha BETWEEN '$fecha1' AND '$fecha2')";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                      
               }   
			  
			   #04 sep 2014
			   #prestamos del dia x vendedor
			   function monto_prestamoxdiaVendedor($fecha1,$fecha2,$vendedor)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT sum(monto) AS prestamos
                                     FROM tabla_prestamos WHERE prestador=$vendedor AND (fecha BETWEEN '$fecha1' AND '$fecha2')";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                      
               }    
			   #04 sep 2014
			   #abonos del dia x vendedor
			   function monto_abonosxdiaVendedor($fecha1,$fecha2,$vendedor)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT sum(monto) AS abonos
                                     FROM tabla_abonos WHERE abonador=$vendedor AND (fecha BETWEEN '$fecha1' AND '$fecha2')";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                      
               }    
			   
			   #04 sep 2014
			   #pagos del dia x vendedor
			   function monto_pagosxdiaVendedor($fecha1,$fecha2,$vendedor)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT sum(monto) AS pagos
                                     FROM tabla_pagos WHERE vendedor=$vendedor AND (fecha BETWEEN '$fecha1' AND '$fecha2')";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                      
               }    
			   
              
			   function listar_prestamostodosoperadores($fechai,$fechaf)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT tabla_prestamos.ni,tabla_prestamos.prestador,tabla_prestamos.monto,tabla_prestamos.fecha,tabla_vendedores.vendedor AS nprestador
                     FROM tabla_prestamos,tabla_vendedores WHERE (tabla_prestamos.fecha BETWEEN '$fechai' AND '$fechaf') AND tabla_prestamos.prestador = tabla_vendedores.ni ORDER BY tabla_prestamos.fecha DESC";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                      
               }   
       #funcion: proceso de registro.tablacuentas #creado 22may14                                       
            function aumentar_prestamocuentaNi($cuenta,$monto)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_cuentas SET prestamo = prestamo + $monto WHERE cuenta = $cuenta ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                      
               }    
       #funcion: proceso de registro.tablacuentas #creado 22may14                                       
            function disminuir_prestamocuentaNi($prestador,$monto)  
            { 
                               $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_cuentas SET prestamo = prestamo - $monto WHERE cuenta = $prestador ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                        
            }      
       #funcion: proceso de registro.tablacuentas #creado 20may14                                       
            function disminuir_prestamocuenta($cuenta,$monto)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_cuentas SET prestamo = prestamo - $monto WHERE ni = $cuenta";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                      
               }      
			  #creado 3 septiembre
			  #eliminar comisionado 
	  			function eliminar_comisionado($novendedor,$folio)
				{   
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "DELETE FROM tabla_comisionados WHERE folio_venta = $folio AND ni_vendedor = $novendedor";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                                						 
				}

       #funcion: proceso de update.tablacuentas #creado 19may14
               function valornuevo_cuenta($cuenta,$monto)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_cuentas SET efectivo = $monto WHERE ni = $cuenta";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                                
               }                                                                        
       #funcion: proceso de update.tablacuentas 
	   #creado 3 septiembre14
               function nuevovalor_cuenta($vendedor,$monto)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_cuentas SET efectivo = $monto WHERE cuenta = $vendedor";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                                
               }                                                                        
       #funcion: proceso de update.tablacuentas #creado 19may14
               function disminuir_cuenta($cuenta,$monto)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_cuentas SET efectivo = efectivo - $monto WHERE ni = $cuenta";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                                
               }                              
       #funcion: proceso de update.tablacuentas #creado 19may14
               function obtener_cuenta($cuenta)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT efectivo FROM tabla_cuentas WHERE ni = $cuenta";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                                
               }                             
       #funcion: proceso de update.tablacuentas #creado 19may14
               function obtener_efecCuenta($vendedor)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT efectivo FROM tabla_cuentas WHERE cuenta = $vendedor";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                                
               }                             

       #funcion: proceso de registro.tablatiendas
               function consulta_razontienda($tienda)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,razon_social,rfc
                                      FROM tabla_tiendas WHERE  ni= $tienda";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }
               #datos de cliente tabla_clientes 08-10-2021
               function consulta_razonxcliente($cliente)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,razon_social,rfc, propietario
                                      FROM tabla_clientes WHERE  ni= $cliente";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }
       #funcion: proceso de consulta.tablaventas
               function consulta_ventas($v_fechai,$v_fechaf,$operador,$status)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,cantidad,total_real,total_cobrado,diferencia,tipopago,tipo_tarjeta,porc_combanco,porc_iva,gtos_venta,folio,tienda,hora,fecha
                                      FROM tabla_ventas 
                                      WHERE idoperador=$operador AND status='$status' AND  fecha BETWEEN '$v_fechai' AND '$v_fechaf'";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }    
       #18Julio14         
       #funcion: proceso de consulta.tablaventas x folio
               function consulta_detallesVenta($folio)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,articulo,claveventa,precioventa,clavevendedor,preciovendedor,moneda,unidades,kgrs,monto,fecha,hora,operador
                                      FROM tabla_detalle 
                                      WHERE folio = $folio ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }   
          #18Julio14         
          #funcion: proceso de consulta.tablaarticulos x id    
          function consulta_detalleArticulo($articulo)
          {
              $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  descripcion,precio,linea,unidad_medida
                                      FROM tabla_articulos 
                                      WHERE codigo = '$articulo' ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }   
          }
          #18Julio14         
          #funcion: proceso de consulta.tablatipomoneda x moneda
          function consulta_valorMoneda($moneda)
          {
              $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  valorcambio
                                      FROM tabla_tipomoneda 
                                      WHERE moneda = '$moneda' ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }  
          }
          #18Julio14         
          #funcion: proceso de consulta.tablaoperador x id
          function consulta_datosOperador($operador)
          {
              $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  nombre
                                      FROM tabla_operador 
                                      WHERE id = $operador ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }              
          }
              
                      
          #05Junio14     
          #funcion: proceso de consultaXtienda.tablaventas     
          function consulta_ventasXtienda($v_fechai,$v_fechaf,$cvoperador,$status,$tienda)
          {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,cantidad,total_real,total_cobrado,diferencia,tipopago,tipo_tarjeta,porc_combanco,porc_iva,gtos_venta,folio,tienda,hora,fecha
                                      FROM tabla_ventas 
                                      WHERE idoperador=$cvoperador AND status='$status' AND tienda=$tienda AND (fecha BETWEEN '$v_fechai' AND '$v_fechaf')";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                            
          }              
          #08-oct-2021     
          #funcion: proceso de consultaX cliente tabla_pedidos     
          function consulta_pedidosXCliente($v_fechai,$v_fechaf,$cvoperador,$status,$cliente)
          {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,total_real,total_cobrado,diferencia,folio,tienda,fecha,hora
                                      FROM tabla_pedidos 
                                      WHERE idoperador=$cvoperador 
                                      AND status='$status' 
                                      AND tienda=$cliente 
                                      AND (fecha BETWEEN '$v_fechai' AND '$v_fechaf')";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                            
          } 
                    #27-dic-2021     
          #funcion: proceso de consultaX cliente tabla_pedidos     
          function consulta_pedidosXClienteCajera($v_fechai,$v_fechaf,$status,$cliente)
          {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,total_real,total_cobrado,diferencia,folio,tienda,fecha,hora
                                      FROM tabla_pedidos 
                                      WHERE status='$status' 
                                      AND tienda=$cliente 
                                      AND (fecha BETWEEN '$v_fechai' AND '$v_fechaf')";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                            
          } 
                              #27-dic-2021     
          #funcion: proceso de consultaX cliente tabla_pedidos     
          function consulta_VentasXClienteCajera($v_fechai,$v_fechaf,$status,$cliente)
          {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,total_real,total_cobrado,diferencia,tipopago,folio,tienda,fecha,hora
                                      FROM tabla_ventas 
                                      WHERE status='$status' 
                                      AND tienda=$cliente 
                                      AND (fecha BETWEEN '$v_fechai' AND '$v_fechaf')";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                            
          }
          
                    #funcion: proceso de consultaX cliente tabla_pedidos     
          function consultap2_pedidosXCliente($v_fechai,$v_fechaf,$status,$cliente)
          {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,total_real,total_cobrado,diferencia,folio,tienda,fecha,hora
                                      FROM tabla_pedidos 
                                      WHERE status='$status' 
                                      AND tienda=$cliente 
                                      AND (fecha BETWEEN '$v_fechai' AND '$v_fechaf')";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                            
          } 
          #05Junio14     06:48
          #funcion: proceso de consultaXtiendaALLoperadores.tablaventas     
          function consulta_ventasCNtienda($v_fechai,$v_fechaf,$status,$tienda)
          {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,cantidad,total_real,total_cobrado,diferencia,tipopago,tipo_tarjeta,porc_combanco,porc_iva,gtos_venta,folio,tienda,hora,fecha
                                      FROM tabla_ventas 
                                      WHERE status='$status' AND tienda=$tienda AND (fecha BETWEEN '$v_fechai' AND '$v_fechaf')";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                            
          }              
  
          #05Junio14     
          #funcion: proceso de consultaALLtiendasXoperador.tablaventas     
          function consulta_ventasSNtienda($v_fechai,$v_fechaf,$cvoperador,$status)
          {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,cantidad,total_real,total_cobrado,diferencia,tipopago,tipo_tarjeta,porc_combanco,porc_iva,gtos_venta,folio,tienda,hora,fecha
                                      FROM tabla_ventas 
                                      WHERE idoperador=$cvoperador 
                                      AND status='$status' 
                                      AND (fecha BETWEEN '$v_fechai' AND '$v_fechaf')";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                            
          }                
          #08-oct-2021     
          #funcion: proceso de consultaX cliente tabla_pedidos     
          function consulta_pedidosSINCliente($v_fechai,$v_fechaf,$cvoperador,$status)
          {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,total_real,total_cobrado,diferencia,folio,tienda,fecha,hora
                                      FROM tabla_pedidos 
                                      WHERE idoperador=$cvoperador 
                                      AND status='$status' 
                                      AND (fecha BETWEEN '$v_fechai' AND '$v_fechaf')";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                            
          } 
                    #27-dic-2021     
          #funcion: proceso de consultaX cliente tabla_pedidos     
          function consulta_pedidosSINClienteCajera($v_fechai,$v_fechaf,$status)
          {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,total_real,total_cobrado,diferencia,folio,tienda,fecha,hora
                                      FROM tabla_pedidos 
                                      WHERE status='$status' 
                                      AND (fecha BETWEEN '$v_fechai' AND '$v_fechaf')";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                            
          } 
                             #28-dic-2021     
          #funcion: proceso de consultaX cliente tabla_venta     
          function consulta_VentasSINClienteCajera($v_fechai,$v_fechaf,$status)
          {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,total_real,total_cobrado,diferencia,tipopago,folio,tienda,fecha,hora
                                      FROM tabla_ventas 
                                      WHERE status='$status' 
                                      AND (fecha BETWEEN '$v_fechai' AND '$v_fechaf')";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                            
          }
                    #16-oct-2021     
          #funcion: proceso de consultaX cliente tabla_pedidos     
          function consultap2_pedidosSINCliente($v_fechai,$v_fechaf,$status)
          {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,total_real,total_cobrado,diferencia,folio,tienda,fecha,hora
                                      FROM tabla_pedidos 
                                      WHERE  status='$status' 
                                      AND (fecha BETWEEN '$v_fechai' AND '$v_fechaf')";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                            
          } 
          #30agosto14     
          #funcion: proceso de consulta.tablaventas    
          function consulta_lstventasreporte1($v_fechai,$v_fechaf,$status)
          {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,cantidad,total_real,total_cobrado,diferencia,tipopago,tipo_tarjeta,porc_combanco,porc_iva,gtos_venta,folio,tienda,hora,fecha
                                      FROM tabla_ventas 
                                      WHERE status='$status' AND (fecha BETWEEN '$v_fechai' AND '$v_fechaf')";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                            
          }                

          #05Junio14     
          #funcion: proceso de consultaXtiendasALLoperadores.tablaventas     
          function consulta_ventasSOtienda($v_fechai,$v_fechaf,$status)
          {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  ni,cantidad,total_real,total_cobrado,diferencia,tipopago,tipo_tarjeta,porc_combanco,porc_iva,gtos_venta,folio,tienda,hora,fecha
                                      FROM tabla_ventas 
                                      WHERE status='$status' AND (fecha BETWEEN '$v_fechai' AND '$v_fechaf')";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                            
          }              

          #05Junio14    06:46 
          #funcion: proceso de consultaXperfilOperadores.tablaoperador     
          function consulta_dataperfil($perfil)
          {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT  id,nombre  FROM tabla_operador   WHERE perfil=$perfil";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                            
          }              
                 #creado 12-agosto-14
                 #actualiza comisiones
                 #function actualizar_comisionXVendedor($folio,$ni_vendedor,$comision)#ta
                 function actualizar_comisionXVendedor($folio,$ni_vendedor,$comision,$porcentaje)#ta
                 {
                   $link_conexion = new conexion();
                   if ($link_conexion->conectar()== true)
                   {
                    $sentencia_sql = "UPDATE tabla_comisionados SET comision='$comision',porc='$porcentaje'   WHERE folio_venta=$folio AND ni_vendedor=$ni_vendedor";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                   }                                                 
                 } 
                 #creado 12-agosto-14
                 #actualiza la cuenta de vendedor
                 function actualizar_comisionCuenta($ni_vendedor,$ingreso,$operador)
                 {
                  $link_conexion = new conexion();
                  if ($link_conexion->conectar()== true)
                  {
                    $sentencia_sql = "UPDATE tabla_cuentas SET efectivo = efectivo $operador $ingreso   WHERE cuenta=$ni_vendedor";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                  }                                                
                 }

                 #creado 14-oct-2021
                 #actualiza los montos de pedido.
                 function actualizar_montosPedido($folio,$monto,$montoneto,$operador,$diferencia)
                 {
                  $link_conexion = new conexion();
                  if ($link_conexion->conectar()== true)
                  {
                    $sentencia_sql = "UPDATE tabla_pedidos SET total_real = total_real $operador $montoneto,   total_cobrado = total_cobrado $operador $monto, diferencia = '$diferencia'
                      WHERE ni=$folio";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                  }                                                
                 }
                                  #creado 14-oct-2021
                 #actualiza los montos de pedido.
                 function actualizar_montosvEMTAs($folio,$monto,$montoneto,$operador,$diferencia)
                 {
                  $link_conexion = new conexion();
                  if ($link_conexion->conectar()== true)
                  {
                    $sentencia_sql = "UPDATE tabla_ventas SET total_real = total_real $operador $montoneto,   total_cobrado = total_cobrado $operador $monto, diferencia = '$diferencia'
                      WHERE folio=$folio";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                  }                                                
                 }

       #funcion: proceso de select.tabla_comisionados #19may14
               function filtrar_comisionesventas($vendedor,$fechi,$fechf)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT sum(tabla_comisionados.comision)AS comision,tabla_ventas.fecha AS fecha FROM tabla_comisionados,tabla_ventas 
                      WHERE  tabla_comisionados.ni_vendedor =$vendedor AND tabla_comisionados.folio_venta= tabla_ventas.folio AND 
                       tabla_comisionados.status=1 AND (tabla_ventas.fecha BETWEEN '$fechai' AND '$fechaf')
                       GROUP BY tabla_ventas.fecha ORDER BY tabla_ventas.fecha DESC";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }

       #funcion: proceso de select.tabla_pagos #19may14
               function filtrar_pagos($vendedor,$fechi,$fechf)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT sum(tabla_pagos.monto)AS pago,tabla_pagos.fecha AS fecha FROM tabla_pagos 
                         WHERE  tabla_pagos.vendedor =$vendedor  AND (tabla_pagos.fecha BETWEEN '$fechi' AND '$fechf') GROUP BY tabla_pagos.fecha ORDER BY tabla_pagos.fecha DESC";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }

       #funcion: proceso de select.tabla_prestamos #19may14
               function filtrar_prestamos($vendedor,$fechi,$fechf)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT sum(tabla_prestamos.monto)AS monto,tabla_prestamos.fecha AS fecha FROM tabla_prestamos 
                     WHERE  tabla_prestamos.prestador =$vendedor AND tabla_prestamos.tipo='vendedor' GROUP BY tabla_prestamos.fecha ORDER BY tabla_prestamos.fecha DESC";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }
       #funcion: InsercionRegistro.Tabladetalle
            function guardar_detalleTicket($transaccion,$codigo,$cvventa,$precio,$cvvendedor,$precioventa,$cantidad,$monto,$grs,$tipomoneda,$operador,$tipoventa)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "INSERT INTO tabla_detalle 
                                      VALUES (null,$transaccion,'$codigo','$cvventa','$precio','$tipomoneda','$cvvendedor','$precioventa',$cantidad,'$grs','$monto',curdate(),now(),$operador,$tipoventa) ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                
               }
              #funcion: InsercionRegistro.Tabla_detallepedido   02-oct-2021 
            function guardar_detallePedido($transaccion,$codigo,$precio,$precioventa,$cantidad,$monto,$unidadmedida,$operador,$agotado,$autorizado)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "INSERT INTO tabla_detallepedido 
                                      VALUES (null,$transaccion,'$codigo','$precio','$precioventa',$cantidad,'$unidadmedida','$monto',curdate(),now(),$operador,$agotado,$autorizado) ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                
               }
            #funcion: InsercionRegistro.Tabla_detalle  de venta   15-oct-2021 
            function guardar_detallesVentas($transaccion,$codigo,$precio,$precioventa,$cantidad,$monto,$unidadmedida,$operador)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "INSERT INTO tabla_detalle 
                                      VALUES (null,$transaccion,'$codigo','$precio','$precioventa',$cantidad,'$unidadmedida','$monto',curdate(),now(),$operador) ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                
               }
               
       #funcion: InsercionRegistro.Tabla_ventas   llamado desde pv/p2_guardaventa.php
               function  agregar_venta($operador,$cantidad,$totalventa,$totalvendido,$val_diferencia,$tipopago,$Venta,$cliente)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "INSERT INTO tabla_ventas 
                                      VALUES(null,$operador,$cantidad,'$totalventa','$totalvendido','$val_diferencia',$tipopago,$Venta,$cliente,curdate(),now(),'impreso','entregado')";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                
               }
               //llamado de p2_guardapedido.php
              function agregar_nuevoPedido($operador,$totalventa,$totalvendido,$val_diferencia,$cliente)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "INSERT INTO tabla_pedidos (ni,idoperador,total_real,total_cobrado,diferencia,tienda,fecha,hora)
                                      VALUES(null,$operador,'$totalventa','$totalvendido','$val_diferencia',$cliente,curdate(),now())";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                
               }
       #funcion: InsercionRegistro.Tablaventa
       #usado en crea_ticketpedido.php
               function  consulta_datosTienda($tienda)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT * FROM tabla_tiendas WHERE ni = $tienda";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }
               
        
       #funcion: consultaDetalleVenta.Tablaventa
               function  consulta_datosFolio($folio)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT * FROM tabla_ventas WHERE folio = $folio";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }

       #funcion: consultaDetalle.Tabladetalle
               function  consulta_tipodetalle($folio)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT sum(preciovendedor) as preciocobrado FROM tabla_detalle WHERE folio = $folio ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }
       #nuevo 12 agosto.14
       #funcion: consultaDetalle.Tabladetalle  
               function  consulta_tipoCobrodetalle($folio)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT sum(usopvendedor) as preciocobrado FROM tabla_detalle WHERE folio = $folio ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }

       #funcion: ActualizacionRegistro.Tabla_inventario llamado desde pv/p2_guardadVenta.php
               function actulizar_inventario($codigo,$cantidad)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_inventario SET existencia = existencia - '$cantidad' 
                    WHERE codigo = '$codigo' ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                
               }
 
        #funcion: ActualizacionRegistro.Tabla_inventario  llamado desde p2_autorizardetalle.php & p2_cancelardetalle.php
               function actulizar_inventarioxoperaciones($codigo,$operacion,$cantidad)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_inventario SET existencia = existencia $operacion '$cantidad' 
                    WHERE codigo = '$codigo' ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                
               }
                             
                 #funcion: ConsultaRegistro.Tabla_detallepedido  02-oct-2021
        #usado en p2_detallesurtit.php
               function consulta_detallesdepedidoXStatus($transaccion, $status)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT * FROM tabla_detallepedido 
                    WHERE folio = $transaccion AND autorizado=$status";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }        
                       #usado en crea_ticketPedido2.php
               function consulta_pedidoxfolio($transaccion)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT * FROM tabla_pedidos WHERE ni = $transaccion";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }  
        #funcion: ConsultaRegistro.Tabla_detallepedido  02-oct-2021
        #usado en crea_ticketPedido.php
               function consulta_detallesdepedido($transaccion)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT * FROM tabla_detallepedido WHERE folio = $transaccion ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }   
               
        #funcion: ConsultaRegistro.Tabla_detalle llamado de pv/p2_guardadVenta.php  15-oct-2021
        #usado en crea_ticketPedido.php
               function consulta_detallesdeVentas($transaccion)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT * FROM tabla_detalle WHERE folio = $transaccion ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }    
       #funcion: ConsultaRegistro.Tabla_ detalle venta 
       #usado en punto_venta/ventas/p2_datosPedido.php
               function consulta_detallesFolio($transaccion)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT * FROM tabla_detalle WHERE folio = $transaccion ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }
                     #funcion: deleteRegistro.Tabla_detallepedido               
               function delete_detallePedidop($ni) #creado 05Oct-2021
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "DELETE FROM tabla_detallepedido WHERE ni = $ni ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                                
               }
       #funcion: deleteRegistro.Tabladetalle   llamado de pv/p2_eliminadetalleVenta.php            
               function delete_detalleVenta($ni)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "DELETE FROM tabla_detalle WHERE ni = $ni ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                                
               }
      #hoy 15-oct-2021 llamado de pv/p2_eliminadetalleVenta.php 
      //regreso la cantidad al almacen 
      function update_inventarioArt($codigo,$cantidad)
      {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_inventario SET existencia = existencia +'$cantidad' 
                    WHERE codigo = '$codigo' ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                                        
      }
      #hoy 13-oct-2021
      //Autorizar detalle de pedido
      function update_statusdetallepedido($ni,$status)
      {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_detallepedido SET autorizado = $status 
                    WHERE ni = $ni ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                                        
      }

      #hoy 13-oct-2021
      //Registrar surtido de  pedido
      function update_estadoxpedido($pedido,$status)
      {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_pedidos SET status = '$status', estado = '$status'
                    WHERE ni = $pedido ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                                        
      }
       #funcion: ConsultaRegistroTotal de importe.Tabla_detalle llamado desde pv/p2_guardaventa.php
            function  consulta_totalFolio($folio)
              {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT sum(monto) AS importe FROM tabla_detalle WHERE folio = $folio ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                                
              } 
              //llamado desde p2_guardapedido.php TOTALVENDIDO
              function  consulta_MontototalPEdido($folio)
              {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT sum(monto) AS importe FROM tabla_detallepedido WHERE folio = $folio ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                                
              } 
            //llamado desde p2_guardapedido.php
              function  consulta_MontototalPEdidoxstatus($folio, $status)
              {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT sum(monto) AS importe FROM tabla_detallepedido WHERE folio = $folio 
                    AND autorizado = $status";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                                
              } 

       #funcion: ConsultaRegistro.Tabla_productos   02-oct-2021
               function consulta_descripcionPROD($codigo)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT costo1,descripcion,unidad_medida FROM tabla_productos WHERE codigo = '$codigo' ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }
               
       #funcion: ConsultaRegistro.Tablaarticulos
               function consulta_descripcionArt($codigo)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "SELECT descripcion,unidad_medida FROM tabla_articulos WHERE codigo = '$codigo' ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return $resultado_sql;
                    else
                        return false;
                 }                
               }
       #funcion: llamado de regpagos.php
               function actulizar_datosPedidoFinal($pedido,$folio,$tipopago,$status)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_pedidos SET folio = $folio, tipopago = $tipopago,status = '$status',estado = '$status'  
                    WHERE ni=$pedido ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                
               }	 
    
                               #funcion: llamado de cp2_guardadetalleventa.php
               function actulizar_datosVentaasxconsulta($pedido,$montoreal,$montocobrado,$diferencia)
               {
                 $link_conexion = new conexion();
                 if ($link_conexion->conectar()== true)
                 {
                    $sentencia_sql = "UPDATE tabla_ventas SET total_real = '$montoreal', total_cobrado = '$montocobrado',diferencia = '$diferencia'  
                    WHERE folio=$pedido ";
                    $resultado_sql = @mysql_query($sentencia_sql);
                    if ($resultado_sql)
                        return true;
                    else
                        return false;
                 }                
               }       

 
                //Consulta productos por iniciales de nombre 
                function consulta_textoenproductos($valor)
               {
                  $lnkconexion = new conexion();
                  if ($lnkconexion->conectar()==true)
                  {
                   $sentencia = "SELECT * FROM tabla_productos WHERE descripcion LIKE '$valor'";
                   $resultado = @mysql_query($sentencia);
                   if ($resultado)
                   return $resultado;
                     else
                   return false;
                  }
                }
 #funcion: 
        #proceso de actualizacion de perfil  
  function mod_perfil($columna,$valor,$cadena)
  {
    $lnkconexion = new conexion();
    if ($lnkconexion->conectar()==true)
    {
     $sentencia = "UPDATE tblperfil
                   SET  $cadena
                   WHERE $columna='$valor' ";
     $resultado = @mysql_query($sentencia);
     if ($resultado)
       return true;
     else
       return false;
    }
  }


}  
/**
    ......... ...J.E.C.E....................
  ..E.............D´Ek.....................E..
****k*********** **************************k***
**/
?>