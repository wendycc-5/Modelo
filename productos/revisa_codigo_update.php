<?php
require("../common.php");
$flag=0;
$codigo = $_REQUEST[codigo];

if ($codigo!="")
{
	mysql_select_db($mysql_database,$conexion) or die("Error");
            
        $consulta = "select * from articulos where codigo = '$codigo' ";
        $registros=mysql_query($consulta,$conexion) or die("Error:".mysql_error());
        while ($reg=mysql_fetch_array($registros))
            {
                $flag=1;	
				$descripcion = $reg['descripcion'];	
				$precio = $reg['precio'];
				$linea = $reg['linea'];
				$proveedor1 = $reg['proveedor1'];
				$costo1 = $reg['costo1'];
				$proveedor2 = $reg['proveedor2'];
				$costo2 = $reg['costo2'];
				$proveedor3 = $reg['proveedor3'];
				$costo3 = $reg['costo3'];
            }
	mysql_close($conexion);
	
if ($flag==0){echo '<label style="color:#FF0000;">'.utf8_encode('No existe este código en sistema').'</label>';}
else
	{
		echo '
		<table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="17%" class="dato">Descripcion:</td>
          <td width="83%"><div align="left">
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
          <td class="dato">Apartado:</td>
          <td>
            <div align="left">
              <select name="linea_update" id="linea_update">
			  	<option value="'.$linea.'">'.$linea.'</option>
                <option value="Abarrote">Abarrote</option>
                <option value="Cigarro">Cigarro</option>
                <option value="TiempoAire">Tiempo Aire</option>
                <option value="Otro">Otro</option>
              </select>
              </div></td>
          </tr>
        <tr>
          <td class="dato">Proveedor 1:</td>
          <td>
            <div align="left">
              <input name="proveedor_update" type="text" id="proveedor1_update" value="'.$proveedor1.'" size="40" />
              </div></td>
          </tr>
        <tr>
          <td class="dato">Costo 1:</td>
          <td>
            <div align="left">
              <input name="costo1_update" type="text" id="costo1_update" value="'.$costo1.'" size="20" />
              </div></td>
          </tr>
        <tr>
          <td class="dato">Proveedor 2:</td>
          <td>
            <div align="left">
              <input name="proveedor2_update" type="text" id="proveedor2_update" value="'.$proveedor2.'" size="40" />
              </div></td>
          </tr>
        <tr>
          <td class="dato">Costo 2: </td>
          <td>
            <div align="left">
              <input name="costo2_update" type="text" id="costo2_update" value="'.$costo2.'" size="20" />
              </div></td>
          </tr>
        <tr>
          <td class="dato">Proveedor 3: </td>
          <td>
            <div align="left">
              <input name="proveedor3_update" type="text" id="proveedor3_update" value="'.$proveedor3.'" size="40" />
              </div></td>
          </tr>
        <tr>
          <td class="dato">Costo 3: </td>
          <td>
            <div align="left">
              <input name="costo3_update" type="text" id="costo3_update" value="'.$costo3.'" size="20" />
              </div></td>
          </tr>
        </table>
		';
	}
}

?>