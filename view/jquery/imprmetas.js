$(document).on('click', '#imprimirmetas', function() {
	var arreglo = $('#poithis').val().split('|');
	var imprplan = arreglo[1];
	//alert(imprplan);
	window.open('index.php?page=mipoi&accion=imprimir&id='+imprplan+'', '_blank');
});

