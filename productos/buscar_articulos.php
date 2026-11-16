<?php
require("../configuracion/ClassProcesos.php");
$var_conexion = new procesos();

$familia   =$_REQUEST[familia]; 
$sfamilia  =$_REQUEST[sfamilia];
$linea     =$_REQUEST[linea];
  #print $familia."sf_".$sfamilia."li_".$linea;
if($familia != 0 && $sfamilia != 0 && $linea !=0)
{
  $sql_lstarticulos =$var_conexion->consulta_lstarticulosCriterio1($familia,$sfamilia,$linea);  
}   

 
if($familia != 0 && $sfamilia != 0 && $linea ==0)
{ 
  $campo1 ='familia';   $campo2 ='sfamilia';  
  $valor1= $familia;    $valor2 =$sfamilia;       
  $sql_lstarticulos =$var_conexion->consulta_lstarticulosCriterio2($valor1,$valor2,$campo1,$campo2);  
}   
if($familia != 0 && $sfamilia == 0 && $linea !=0)
{
  $campo1 ='familia';   $campo2 ='linea';
  $valor1= $familia;    $valor2 =$linea;       
  $sql_lstarticulos =$var_conexion->consulta_lstarticulosCriterio2($valor1,$valor2,$campo1,$campo2);  
}   

if($familia == 0 && $sfamilia != 0 && $linea !=0)
{
  $campo2 ='linea';   $campo1 ='sfamilia';  
  $valor2= $linea;    $valor1 =$sfamilia;       
  $sql_lstarticulos =$var_conexion->consulta_lstarticulosCriterio2($valor1,$valor2,$campo1,$campo2);  
}   


if($familia != 0 && $sfamilia == 0 && $linea ==0)
 {
   $campo = 'familia';  
   $valor = $familia;
   $sql_lstarticulos =$var_conexion->consulta_lstarticulosCriterio3($valor,$campo);  
 }
if($familia == 0 && $sfamilia != 0 && $linea ==0)
{
  $campo = 'sfamilia'; 
  $valor = $familia;    
  $sql_lstarticulos =$var_conexion->consulta_lstarticulosCriterio3($valor,$campo);  
}   
if($familia == 0 && $sfamilia == 0 && $linea !=0)
{
  $valor = $linea;  
  $campo = 'linea';   
  $sql_lstarticulos =$var_conexion->consulta_lstarticulosCriterio3($valor,$campo);  
}   

if($familia == 0 && $sfamilia == 0 && $linea ==0)
{
  $sql_lstarticulos =$var_conexion->consulta_lstarticulosCriterio4();  
  
}    
?>
<table width="90%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="10%">CodigoArt</td>
    <td width="25%">Descripcion</td>
    <td width="5%">Unidad Medida</td>
    <td width="7%">Precio</td>
    <td width="5%">Existencia</td>
    <td width="8%">Familia</td>
    <td width="10%">SFamilia</td>
    <td width="10%">Linea</td>
    <td width="10%">&nbsp;</td>
  </tr>
</table>
<?php
	$imagen1='<img class="icono" src="imgs/editar.png" width="30px" height="30px" align="middle"/>'; 
	$imagen2='<img class="icono" src="imgs/delete.png" width="30px" height="30px" align="middle"/>';

        while ($datos_sql_lstarticulos = mysql_fetch_array($sql_lstarticulos))
        {
				$i++; $j++;
				$codigo      = $datos_sql_lstarticulos['codigo'];
				$descripcion = utf8_decode($datos_sql_lstarticulos['descripcion']);	
				$precio      = $datos_sql_lstarticulos['precio'];
				$familia     = $datos_sql_lstarticulos['familia'];
				$sfamilia    = $datos_sql_lstarticulos['sfamilia'];
				$linea       = $datos_sql_lstarticulos['linea'];
				$unidadmedida  = $datos_sql_lstarticulos['unidad_medida'];
				$proveedor1  = utf8_decode($datos_sql_lstarticulos['proveedor1']);
				$costo1      = $datos_sql_lstarticulos['costo1']; 
				$existencia  = $datos_sql_lstarticulos['existencia']; 				
			
            	$precio = "$".number_format($datos_sql_lstarticulos['precio'],2,'.',",");
					
				if($j==1){$color="#EEEEEE";}else{$color="#DFDFDF"; $j=0;}				
				echo '
				<table width="90%" border="0" cellpadding="0" cellspacing="0" bgcolor="'.$color.'" class="dato"><tr>
					<td width="10%">'.$codigo.'</td>
					<td width="25%" align="right">'.$descripcion.'</td>
					<td width="5%">'.$unidadmedida.'</td>
					<td width="7%">'.$precio.'</td>
					<td width="5%">'.$existencia.'</td>
					<td width="8%">'.$familia.'</td>
					<td width="10%">'.$sfamilia.'</td>
					<td width="10%">'.$linea.'</td>';
					?>
                          <td width="10%"> <a href="#" onclick="actualizar('<?php echo $codigo;?>');return false" ><?php echo $imagen1;?></a>
                                <a href="#" onclick="eliminar('<?php echo $codigo;?>')" ><?php echo $imagen2;?></a></td>

                <?php  
				echo '</table>';
			}
echo "$i Articulos";




?>