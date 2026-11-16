<?php
require("../configuracion/ClassProcesos.php");
$var_conexion = new procesos();
#@session_start();
#$operador=intval($_SESSION['operador']);
$operacion = $_REQUEST['operacion'];

switch($operacion)
{
//llamado evento desde p2_producto.php
//24 septiembre 2021
case "ver":
$flag=0;
$codigo = $_REQUEST['codigo'];
if ($codigo!="")
{
        $sql_existenciaCodigo = $var_conexion->consulta_codigoProductos($codigo);       
        if(@mysql_num_rows($sql_existenciaCodigo)!=0)
        {
               $datos_sql_existenciaCodigo = @mysql_fetch_array($sql_existenciaCodigo);
                $flag=1;	
				$descripcion = $datos_sql_existenciaCodigo['descripcion'];	
				$precio      = $datos_sql_existenciaCodigo['precio'];
				$familia       = $datos_sql_existenciaCodigo['familia'];
				$proveedor1  = $datos_sql_existenciaCodigo['proveedor1'];
				$costo1          = $datos_sql_existenciaCodigo['costo1'];
				$unidad_medida   = $datos_sql_existenciaCodigo['unidad_medida'];
        }
	
if ($flag==0){echo '<label style="color:#FF0000;">'.utf8_encode('No existe este código en sistema').'</label>';}
else
	{
		echo '
		<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">  
        <tr>
          <td width="17%" class="dato">Descripcion:</td>
          <td width="83%"><div align="left">
            <input name="codigo_up" type="hidden" id="codigo_up" value="'.$codigo.'" size="100" />
            <input name="descripcion_update" type="text" id="descripcion_update" value="'.$descripcion.'" size="100" />
          </div></td>
        </tr>
        <tr>
          <td class="dato">Precio:</td>
          <td>
            <div align="left">
              <input name="precio_update" type="text" id="precio_update" value="'.$precio.'" size="20" />
              </div></td>
          </tr>
         <tr> 
            <td align="center" class="subtitulo">FAMILIA:</td>
            <td colspan="2" align="center"><div align="left">
            <select name="familia_update" id="familia_update">';
            
             $tablaf ="tabla_familia";
             $campof = "familia";
             $sql_consultas_familia  = $var_conexion->consulta_CATS($campof,$tablaf); #tablaventas     
             while ($datos_sql_consultas_familia =@mysql_fetch_array($sql_consultas_familia))
             {
				$clave_familia = $datos_sql_consultas_familia['ni'];
				$conceptof    = $datos_sql_consultas_familia['familia'];
               if($clave_familia == $familia)
               {
                     echo '<option value="'.$clave_familia.'" selected>'.$conceptof.'</option>';                
               }else{
                     echo '<option value="'.$clave_familia.'">'.$conceptof.'</option>';
                    }
             }   
        print  '</select>
           </div></td>
          </tr>
          <tr>
            <td align="center" class="subtitulo">Unidad de medida:</td>
            <td colspan="2" align="center"><div align="left">
            <select name="unidadm_update" id="unidadm_update">
           <option value="'.$unidad_medida.'">'.$unidad_medida.'</option>
              <option value="PZA">PZA</option>
              <option value="KG">KG</option>
              <option value="PAQ">PAQ</option>
            </select>
            </div></td>
          </tr>
        <tr>
          <td class="dato">Observacion :</td>
          <td>
            <div align="left">
              <input name="proveedor_update" type="text" id="proveedor_update" value="'.$proveedor1.'" size="40" />
              </div></td>
          </tr>
        <tr>
          <td class="dato">Costo :</td>
          <td>
            <div align="left">
              <input name="costo1_update" type="text" id="costo1_update" value="'.$costo1.'" size="20" />
              </div></td>
          </tr>
        </table>
		';
	}
  }  
break;
case "observar":
$flag=0;
$codigo = $_REQUEST['codigo'];
if ($codigo!="")
{
        $sql_existenciaCodigo = $var_conexion->consulta_codigoProductos($codigo);       
        if(@mysql_num_rows($sql_existenciaCodigo)!=0)
        {
               $datos_sql_existenciaCodigo = @mysql_fetch_array($sql_existenciaCodigo);
                $flag=1;	
				$descripcion = $datos_sql_existenciaCodigo['descripcion'];	
				$precio      = $datos_sql_existenciaCodigo['precio'];
				$familia       = $datos_sql_existenciaCodigo['familia'];
				$proveedor1  = $datos_sql_existenciaCodigo['proveedor1'];
				$costo1          = $datos_sql_existenciaCodigo['costo1'];
				$unidad_medida   = $datos_sql_existenciaCodigo['unidad_medida'];
        }
	
if ($flag==0){echo '<label style="color:#FF0000;">'.utf8_encode('No existe este código en sistema').'</label>';}
else
	{
		echo '
		<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">  
        <tr>
          <td width="17%" class="dato">Descripcion:</td>
          <td width="83%"><div align="left">
            <input name="codigo_up1" type="hidden" id="codigo_up1" value="'.$codigo.'" size="100" />
            <input name="descripcion_update1" type="text" id="descripcion_update1" value="'.$descripcion.'" size="100" />
          </div></td>
        </tr>
        <tr>
          <td class="dato">Precio:</td>
          <td>
            <div align="left">
              <input name="precio_update1" type="text" id="precio_update1" value="'.$precio.'" size="20" />
              </div></td>
          </tr>
         <tr> 
            <td align="center" class="subtitulo">FAMILIA:</td>
            <td colspan="2" align="center"><div align="left">
            <select name="familia_update1" id="familia_update1">';
            
             $tablaf ="tabla_familia";
             $campof = "familia";
             $sql_consultas_familia  = $var_conexion->consulta_CATS($campof,$tablaf); #tablaventas     
             while ($datos_sql_consultas_familia =@mysql_fetch_array($sql_consultas_familia))
             {
				$clave_familia = $datos_sql_consultas_familia['ni'];
				$conceptof    = $datos_sql_consultas_familia['familia'];
               if($clave_familia == $familia)
               {
                     echo '<option value="'.$clave_familia.'" selected>'.$conceptof.'</option>';                
               }else{
                     echo '<option value="'.$clave_familia.'">'.$conceptof.'</option>';
                    }
             }   
        print  '</select>
           </div></td>
          </tr>
          <tr>
            <td align="center" class="subtitulo">Unidad de medida:</td>
            <td colspan="2" align="center"><div align="left">
            <select name="unidadm_update1" id="unidadm_update1">
           <option value="'.$unidad_medida.'">'.$unidad_medida.'</option>
              <option value="PZA">PZA</option>
              <option value="KG">KG</option>
              <option value="PAQ">PAQ</option>
            </select>
            </div></td>
          </tr>
        <tr>
          <td class="dato">Observacion :</td>
          <td>
            <div align="left">
              <input name="proveedor_update1" type="text" id="proveedor_update1" value="'.$proveedor1.'" size="40" />
              </div></td>
          </tr>
        <tr>
          <td class="dato">Costo :</td>
          <td>
            <div align="left">
              <input name="costo1_update1" type="text" id="costo1_update1" value="'.$costo1.'" size="20" />
              </div></td>
          </tr>
    
        </table>
		';
	}
  }  
break;
}
?>