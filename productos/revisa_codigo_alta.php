<?php
require("../configuracion/ClassProcesos.php");
$var_conexion = new procesos();
$operacion = $_REQUEST[operacion];

switch($operacion)
{
case "alta":
$flag = 0;
$codigo = $_REQUEST[codigo];
        $sql_existenciaCodigo = $var_conexion->consulta_codigoArticulo($codigo);
        if (mysql_num_rows($sql_existenciaCodigo) !=0)
        {
                $flag=1;		
        }	
if ($flag==1){echo '<label style="color:#FF0000;">'.utf8_encode('Ya existe un artículo con este código').'</label>';}
break;
case "altaclave":
$flag = 0;
$clave = $_REQUEST[clave];
        $sql_existenciaClave = $var_conexion->consulta_claveArticulo($clave);
        if (mysql_num_rows($sql_existenciaClave) !=0)
        {
                $flag=1;		
        }	
if ($flag==1){echo '<label style="color:#FF0000;">'.utf8_encode('Ya existe un artículo con esta Clave').'</label>';}

break;
case "baja":
$flag=0;
$codigo = $_REQUEST[codigo];
if ($codigo!="")
{        
        $sql_existenciaCodigo = $var_conexion->consulta_codigoArticulo($codigo);       
        if(mysql_num_rows($sql_existenciaCodigo)!=0)
            {
               $datos_sql_existenciaCodigo = mysql_fetch_array($sql_existenciaCodigo);
                $flag=1;	
				$descripcion = $datos_sql_existenciaCodigo['descripcion'];	
            }else
            {
                $flag=0;
            }	
if ($flag==0){echo '<label style="color:#FF0000;">'.utf8_encode('No existe este código en sistema').'</label>';}
else{echo utf8_encode($descripcion);}
}
break;
case "actualiza":
$flag=0;
$codigo = $_REQUEST[codigo];
if ($codigo!="")
{
        $sql_existenciaCodigo = $var_conexion->consulta_codigoArticulo($codigo);       
        if(mysql_num_rows($sql_existenciaCodigo)!=0)
        {
               $datos_sql_existenciaCodigo = mysql_fetch_array($sql_existenciaCodigo);
                $flag=1;	
				#$clave       = $datos_sql_existenciaCodigo['claveart'];	
				$descripcion = $datos_sql_existenciaCodigo['descripcion'];	
				$precio      = $datos_sql_existenciaCodigo['precio'];
				$linea       = $datos_sql_existenciaCodigo['linea'];
				$familia       = $datos_sql_existenciaCodigo['familia'];
				$sfamilia       = $datos_sql_existenciaCodigo['sfamilia'];
				$proveedor1  = $datos_sql_existenciaCodigo['proveedor1'];
				$costo1          = $datos_sql_existenciaCodigo['costo1'];
				$unidad_medida   = $datos_sql_existenciaCodigo['unidad_medida'];
        }
	
if ($flag==0){echo '<label style="color:#FF0000;">'.utf8_encode('No existe este código en sistema').'</label>';}
else
	{
	   #<tr>
       #   <td class="dato">Clave art:</td>
       #   <td>
       #     <div align="left">
       #       <input name="clave_update" type="text" id="clave_update" value="'.$clave.'" size="20"/>
       #       </div></td>
       #   </tr>
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
             while ($datos_sql_consultas_familia =mysql_fetch_array($sql_consultas_familia))
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
            <td align="center" class="subtitulo">SUBFAMILIA:</td>
            <td colspan="2" align="center"><div align="left">
            <select name="sfamilia_update" id="sfamilia_update">';
             $tablasf ="tabla_sfamilia";
             $camposf = "sfamilia";
             $sql_consultasfamilia  = $var_conexion->consulta_CATS($camposf,$tablasf); #tablaventas     
             while ($datos_sql_consultasfamilia =mysql_fetch_array($sql_consultasfamilia))
             {
				$clave_sfamilia = $datos_sql_consultasfamilia['ni'];
				$conceptosf    = $datos_sql_consultasfamilia['sfamilia'];
                if($clave_sfamilia == $sfamilia)
               {
                     echo '<option value="'.$clave_sfamilia.'" selected>'.$conceptosf.'</option>';                
               }else{
                     echo '<option value="'.$clave_sfamilia.'">'.$conceptosf.'</option>';
                    } 
             }   
         print'</select>
           </div></td>
          </tr>
          <tr> 
            <td align="center" class="subtitulo">LINEA:</td>
            <td colspan="2" align="center"><div align="left">
            <select name="linea_update" id="linea_update">';
             $tabla ="tabla_linea";
             $campo = "linea";
             $sql_consultalinea  = $var_conexion->consulta_CATS($campo,$tabla); #tablaventas     
             while ($datos_sql_consultalinea =mysql_fetch_array($sql_consultalinea))
             {
				$clave_linea = $datos_sql_consultalinea['ni'];
				$concepto    = $datos_sql_consultalinea['linea'];
                if($clave_linea == $linea)
               {
                     echo '<option value="'.$clave_linea.'" selected>'.$concepto.'</option>';                
               }else{
                     echo '<option value="'.$clave_linea.'">'.$concepto.'</option>';
                    }
             }   
           print '</select>
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
          <td class="dato">Proveedor :</td>
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
case "actualizaclave":
$flag=0;
$cvcodigo = $_REQUEST[clave];
if ($codigo!="")
{
        $sql_existenciaCodigo = $var_conexion->consulta_claveArticulo($cvcodigo);       
        if(mysql_num_rows($sql_existenciaCodigo)!=0)
        {
               $datos_sql_existenciaCodigo = mysql_fetch_array($sql_existenciaCodigo);
                $flag=1;	
				$codigo      = $datos_sql_existenciaCodigo['codigo'];	
				$clave       = $datos_sql_existenciaCodigo['claveart'];	
				$descripcion = $datos_sql_existenciaCodigo['descripcion'];	
				$precio      = $datos_sql_existenciaCodigo['precio'];
				$linea       = $datos_sql_existenciaCodigo['linea'];
				$familia       = $datos_sql_existenciaCodigo['familia'];
				$sfamilia       = $datos_sql_existenciaCodigo['sfamilia'];
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
          <td class="dato">Precio:</td>
          <td>
            <div align="left">
              <input name="clave_update" type="text" id="clave_update" value="'.$clave.'" size="20"/>
              </div></td>
          </tr>  
        <tr>
          <td width="17%" class="dato">Descripcion:</td>
          <td width="83%"><div align="left">
            <input name="codigo_update" type="hidden" id="codigo_update" value="'.$codigo.'" size="100" />
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
             while ($datos_sql_consultas_familia =mysql_fetch_array($sql_consultas_familia))
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
            <td align="center" class="subtitulo">SUBFAMILIA:</td>
            <td colspan="2" align="center"><div align="left">
            <select name="sfamilia_update" id="sfamilia_update">';
             $tablasf ="tabla_sfamilia";
             $camposf = "sfamilia";
             $sql_consultasfamilia  = $var_conexion->consulta_CATS($camposf,$tablasf); #tablaventas     
             while ($datos_sql_consultasfamilia =mysql_fetch_array($sql_consultasfamilia))
             {
				$clave_sfamilia = $datos_sql_consultasfamilia['ni'];
				$conceptosf    = $datos_sql_consultasfamilia['sfamilia'];
                if($clave_sfamilia == $sfamilia)
               {
                     echo '<option value="'.$clave_sfamilia.'" selected>'.$conceptosf.'</option>';                
               }else{
                     echo '<option value="'.$clave_sfamilia.'">'.$conceptosf.'</option>';
                    } 
             }   
         print'</select>
           </div></td>
          </tr>
          <tr> 
            <td align="center" class="subtitulo">LINEA:</td>
            <td colspan="2" align="center"><div align="left">
            <select name="linea_update" id="linea_update">';
             $tabla ="tabla_linea";
             $campo = "linea";
             $sql_consultalinea  = $var_conexion->consulta_CATS($campo,$tabla); #tablaventas     
             while ($datos_sql_consultalinea =mysql_fetch_array($sql_consultalinea))
             {
				$clave_linea = $datos_sql_consultalinea['ni'];
				$concepto    = $datos_sql_consultalinea['linea'];
                if($clave_linea == $linea)
               {
                     echo '<option value="'.$clave_linea.'" selected>'.$concepto.'</option>';                
               }else{
                     echo '<option value="'.$clave_linea.'">'.$concepto.'</option>';
                    }
             }   
           print '</select>
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
          <td class="dato">Proveedor :</td>
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
case "elimina":
$codigo =$_REQUEST[codigo];
 if($codigo!="")
 {
	$sql_ensusoArticulo = $var_conexion->consulta_enusoArticulo($codigo);
    if(mysql_num_rows($sql_ensusoArticulo) ==0)
    {
     if($var_conexion->eliminar_articulo($codigo)==true)
     {
       	 if($var_conexion->eliminar_articulodeInventario($codigo)==true)
         {
            echo "/Operacion Exitosa";       
         }else
         {
          echo "No se Elimino/Error";    
         }        
     }else
     {
       echo "No se Elimino/Error";    
     }

    }else
    {
            echo "No se Elimino/Articulo en Uso";   
    }
 }
break;

case "actualizar":

$codigo      =$_REQUEST[codigo];
#$clave      =$_REQUEST[clave];
$descripcion =$_REQUEST[descripcion];
$precio      =$_REQUEST[precio];
$linea       =$_REQUEST[linea];
$familia       =$_REQUEST[familia];
$sfamilia       =$_REQUEST[sfamilia];
$proveedor1 =$_REQUEST[proveedor];
$costo1     =$_REQUEST[costo];
$unidad     =$_REQUEST[unidad];
#echo   $descripcion."pre:".$precio."cod:".$codigo."lin:".$linea."prov:".$proveedor1."cos:".$costo1."uni".$unidad."fam:".$familia."sfam:".$sfamilia;
if($codigo!="" and $descripcion!="")
{
    if($var_conexion->update_articulo($descripcion,$precio,$codigo,$linea,$proveedor1,$costo1,$unidad,$codigo,$familia,$sfamilia)==true)
    {
       echo "Datos guardados"; 
    }else
    {
      echo "No se Guardo Dato"; 
    } 
}
break;
}
?>