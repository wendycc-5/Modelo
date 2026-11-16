<?php
/**
                                    * @author chanek
                                    * @copyright 2012
                                 **/
class conexion{
  var $conexion;
  var $bd;
  var $Dirservidor;
  var $Usuario;
  var $Clave;
#funcion constructura
    #(Inicializa variables) 
  function conexion(){
        $this->bd = "iaw-agenda";
		$this->Dirservidor = "localhost";
		$this->Usuario = "root";
		$this->Clave = "";
 }
#funcion de test de conexion
    #(Inicializa sesion con servidor de bd) 
 function conectar() {
        if(!($estado=@mysql_connect($this->Dirservidor,$this->Usuario,$this->Clave)))
 		{
             print "<font color='red'>(!) Error de Conexi&oacute;n A servidor de Base de Datos (!)</font>";
			 exit();
        }
	    if (!@mysql_select_db($this->bd,$estado)) {
		   print "<font color='red'>(!) Error de Selecci&ocute;n de Base de Datos (!)</font>";  
		   exit();
	    }
	       $this->conexion=$estado;
		   return true;	
 }
#funcion de test de status
    #(testea status de servidor) 
  function statusServidor($puerto)
  {
     if(@fsockopen($this->Dirservidor,$puerto,$errno,$errstr,10))
     {
       return true;
       exit;   
     }else
     {
       return false;  
       exit;
     }
  }  

}
/**
    ......... ...J.E.C.E....................
**/
?>