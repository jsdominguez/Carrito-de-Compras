<script src='js/jquery.js'></script>
<script src='js/datos.js'></script>
<script src='js/bootstrap.min.js'></script>
<script src='js/custom.js'></script>
<script src='js/jquery.nicescroll.min.js'></script>
<script src='js/jquery.raty.js'></script>
<script src='js/alerti.js'></script>
<!-- FUNCION QUE CARGA LA CANTIDAD DE COMPRAS QUE TIENE EN SU CARRITO AL INICIAR LA WEB -->
	<script>
	$("document").ready(function(){
			$.ajax
			({
			type:"POST",
			url:"cantidad_prod.php"            			
			}).done(function(data){
				$("#cantidad").html(data);
			});
	});
	</script>