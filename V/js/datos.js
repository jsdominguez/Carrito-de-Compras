 $("#vercompras").hide(); /* el contenido del carrito de compras esta oculto*/
$("#loading").hide();
//funcion para agregar un producto al carrito de compras
//como parametro esta el precio y producto concatenado
 function btnañadir(variable)
 {	 
				$.post('guardar.php',
				{
				'producto':variable // clave-valor
				}
				).done(function(){
					alertify.success('Fue enviado al carrito');
					// terminado el envio llama a otras 2 funciones mas
					peticion_async();
					compra_cantidad();
				});
				
 }
 
 
	//funcion donde se envia el codigo de la categoria para desplegar los productos de dicha categoria seleccionada
	$("label").click(function()
	{
		$('#contenido').hide(); //oculta el contenido actual
		var categoria = $(this).attr("for"); //obteniene el codigo de la subcategoria

				$.ajax
				({ //ENVIANDO EL CODIGO QUE CAPTURAMOS A PHP PARA LA DESCRIPCION
				type:"POST",
				url:"show_product_cat.php",
				data: "codigo="+categoria //clave-valor 
				}).done(function(data){
				//despliega los productos de dicha subcategoria seleccionada
				$("#datosub").html(data);
				});
	});
	
	//funcion para mostrar y ocultar el contenido del carrito de compras
	$("#carrito").click(function(){
		//si esta oculto el click lo hara mostrar
		if($("#vercompras").is(":hidden"))
		{
			$("#vercompras").slideDown("slow");
			$.ajax
			({
			type:"POST",
			url:"show_prod_temp.php"            			
			}).done(function(data){
				//muestra los productos que añadio a su carrito
				$("#vercompras").html(data);
			});
		}
		//si esta visible lo ocultara
		else
		{
			$("#vercompras").slideUp("slow");
		}
	});

	//funcion para mostrar los producto que estan en su carrito de compras
	function peticion_async()
	{
			$.ajax
			({
			type:"POST",
			url:"show_prod_temp.php"            			
			}).done(function(data){
				//muestra los productos
				$("#vercompras").html(data);
			});
	}

	
	// funcion para eliminar un producto de su carrito de compras enviando como parametro el codigo del producto
	function deletes(cod)
	{
			$.post('eliminar.php',
				{
				'codigo':cod //clave-valor
				}
				).done(function(){
					alertify.error('Producto Eliminado');
					//al terminar la peticion llamara 2 funciones mas
					peticion_async();
					compra_cantidad();
				});
	}
	
	//funcion para mostrar la cantidad de compras que tiene en su carrito de compras
	function compra_cantidad()
	{	
			$.ajax
			({
			type:"POST",
			url:"cantidad_prod.php"            			
			}).done(function(data){
				//muestra el resultado
				$("#cantidad").html(data);
			});
	}

function paypal(pago)
{
	 $("#mymodal").modal();
	 $("#totalpaypal").val(pago+".00");
}	

$("#finalcompra").click(function(){
	 $("#finalcompra").hide();
	$("#cancelpaypal").hide();
	var nombre = $("#nombres").val();
	var dni = $("#dni").val();
	var tarjeta = $("#tarjeta").val();
	var correo = $("#correo").val();
	var total = $("#totalpaypal").val();
	var desc_nuevo=0;
	 $("#loading").show();
	if(total>500)
	{
		desc_nuevo=total*0.10;
	}
	
	$.post("fin_compra.php",
	{
		'nombre':nombre ,
		'dni':dni ,
		'tarjeta':tarjeta ,
		'correo':correo ,
		'descuento':desc_nuevo,
		'total':total
	}).done(function(){
		 $("#loading").hide();
		 $("#finalcompra").show();
	$("#cancelpaypal").show();
		$("#mymodal").modal("hide");
		peticion_async();
		compra_cantidad();
		alertify.success('Fue enviado al carrito');
	});

});