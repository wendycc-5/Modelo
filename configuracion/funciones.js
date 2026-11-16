function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function Paginarse(nropagina)
{
	//donde se mostrará los registros
    divContenido = document.getElementById('catalogo_vendedores');
	ajax = objetoAjax();
    ajax.open("GET", "paginarVendedores.php?inicio="+nropagina);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divContenido.innerHTML = ajax.responseText
		}
	}
     ajax.send(null)
}
function nuevo_vendedor()
{   divContenido = document.getElementById('panel_nuevo');
	divContenido.style.display = "block";
    
}
/*	function revisa_update()
	{
        var_operacion ="actualiza";
         divContenido = document.getElementById('existe_update');
		var var_vendedor = $('#vendedor_update').val(); //revisa_codigo_update.php
        /*alert("dd"+var_vendedor);
		$("#existe_update").load("revisa_vendedor_alta.php",{vendedor:var_vendedor,operacion:var_operacion});
        
        
        ajax=objetoAjax();
    ajax.open("GET", "buscar_vendedor.php?operacion="+var_operacion+"&vendedor="+var_vendedor);
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
		  alert(ajax.responseText)
			divContenido.innerHTML = ajax.responseText
		}
	}
     ajax.send(null)
    }*/
function Paginargrupos(nropagina){
	//donde se mostrará los registros
    divContenido = document.getElementById('contenido');
	ajax=objetoAjax();
    ajax.open("GET", "catalogo_grupos.php?p="+nropagina);
	divContenido.innerHTML= '<img src="../imgs/carga.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divContenido.innerHTML = ajax.responseText
		}
	}
     ajax.send(null)
}
function Paginarespecialidades(nropagina){
	//donde se mostrará los registros
    divContenido = document.getElementById('contenido');
	ajax=objetoAjax();
    ajax.open("GET", "catalogo_especialidades.php?p="+nropagina);
	divContenido.innerHTML= '<img src="../imgs/carga.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divContenido.innerHTML = ajax.responseText
		}
	}
     ajax.send(null)
}
function Paginaralumnos(nropagina){
	//donde se mostrará los registros
    divContenido = document.getElementById('contenido');
	ajax=objetoAjax();
    ajax.open("GET", "consulta_alumnos.php?p="+nropagina);
	divContenido.innerHTML= '<img src="../imgs/carga.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divContenido.innerHTML = ajax.responseText
		}
	}
     ajax.send(null)
}
function Paginarprofesores(nropagina){
	//donde se mostrará los registros
    divContenido = document.getElementById('contenido');
	ajax=objetoAjax();
    ajax.open("GET", "catalogo_profesores.php?p="+nropagina);
	divContenido.innerHTML= '<img src="../imgs/carga.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			divContenido.innerHTML = ajax.responseText
		}
	}
     ajax.send(null)
}