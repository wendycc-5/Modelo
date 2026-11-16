<?php
require("../configuracion/ClassProcesos.php");
$var_conexion = new procesos();

$familia   =$_REQUEST['familia']; 
  #print $familia."sf_".$sfamilia."li_".$linea;
if($familia != 0)
{
  $sql_lstarticulos =$var_conexion->consulta_listproductosCriterio1($familia);  
}
if($familia == 0)
{
  $sql_lstarticulos =$var_conexion->consulta_listproductosCriterio2();  
  
}    
?>
<table width="90%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="10%">Codigo</td>
    <td width="30%">Descripcion</td>
    <td width="5%">Unidad Medida</td>
    <td width="7%">Precio</td>
    <td width="5%">Costo</td>
    <td width="5%">Existencia</td>
    <td width="8%">Familia</td>
    <td width="10%">Observacion</td>
    <td width="10%">&nbsp;</td>
  </tr>
</table>
<?php
	$imagen1='<img class="icono" src="imgs/editar.png" width="30px" height="30px" align="middle"/>'; 
	$imagen2='<img class="icono" src="imgs/delete.png" width="30px" height="30px" align="middle"/>';

        while ($datos_sql_lstarticulos = @mysql_fetch_array($sql_lstarticulos))
        {
				$i++; $j++;
				$codigo      = $datos_sql_lstarticulos['codigo'];
				$descripcion = $datos_sql_lstarticulos['descripcion'];	
				$precio      = $datos_sql_lstarticulos['precio'];
				$familia     = $datos_sql_lstarticulos['familia'];
				$unidadmedida  = $datos_sql_lstarticulos['unidad_medida'];
				$proveedor1  = $datos_sql_lstarticulos['proveedor1'];
				$costo1      = "$".number_format($datos_sql_lstarticulos['costo1'],2,'.',","); 
				$existencia  = $datos_sql_lstarticulos['existencia']; 				
			
            	$precio = "$".number_format($datos_sql_lstarticulos['precio'],2,'.',",");
					
				if($j==1){$color="#EEEEEE";}else{$color="#DFDFDF"; $j=0;}				
				echo '
				<table width="90%" border="0" cellpadding="0" cellspacing="0" bgcolor="'.$color.'" class="dato"><tr>
					<td width="10%">'.$codigo.'</td>
					<td width="30%" align="left">'.$descripcion.'</td>
					<td width="5%">'.$unidadmedida.'</td>
					<td width="7%">'.$precio.'</td>
                    <td width="5%">'.$costo1.'</td>
                    <td width="5%">'.$existencia.'</td>
					
					<td width="8%">'.$familia.'</td>
                    <td width="10%">'.$proveedor1.'</td>';
					?>
                          <td width="10%"> <a href="#" onclick="actualizar('<?php echo $codigo;?>');return false" ><?php echo $imagen1;?></a>
                                <a href="#" onclick="eliminar('<?php echo $codigo;?>')" ><?php echo $imagen2;?></a></td>

                <?php  
				echo '</table>';
			}
echo "$i Productos";
?>