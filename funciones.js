/*Este código es para mostra las tablas y que el administrador las pueda modificar*/
function MuestraTabla(){

	$.get('muestraTabla.php',function(mensaje){

		document.getElementById('resultado').innerHTML=mensaje;
	})
}

function MuestraTabla2(){

	$.get('muestraTabla2.php',function(mensaje){

		document.getElementById('resultado').innerHTML=mensaje;
	})
}

function MuestraTabla3(){

	$.get('muestraTabla3.php',function(mensaje){

		document.getElementById('resultado').innerHTML=mensaje;
	})
}