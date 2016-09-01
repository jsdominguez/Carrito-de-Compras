
<!-- Modal Que se despliega segun el codigo del producto -->
<div class="modal animated fadeInDown" id=<?php echo $datos_subcat_product[3];?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
	  <!-- NOMBRE DEL PRODUCTO POR CADA MODAL QUE HARA DE TITULO-->
        <div id='prodcar'><?php echo utf8_encode($datos_subcat_product[2]); ?></div>
      </div>
      <div class="modal-body">
        <?php
		//conexion a la BD
        $con=mysqli_connect("localhost","root","","carrito");
		//realiza la busqueda del producto seleccionado devolviendonos la descripcion y el precio
    	$consulta="select pro_desc,Precio from productos where pro_cod='$datos_subcat_product[3]'";
    	$respuesta=$con->query($consulta);
        echo "<div class='row'>";
          echo "<div class='col-md-6'>";
		  // PARA PODER ENTEDER DE DONDE SALE LAS VARIABLES VER EL METODO mostrar_productos_categoria en conec.php
          echo "<img src='img/$dir_categoria/$datos_subcat_product[1]'>";
          echo "<br>";
          echo "</div>";
          echo "<div class='col-md-6' id='desc'>";
          while ($descripcion=$respuesta->fetch_array())
            {
			//mostramos la descripcion del producto
              echo utf8_encode($descripcion[0]);
              echo "<br>";
			  //mostramos el precio del producto
              echo "<div id='precio'><span class='label label-success'>S/. $descripcion[1]</span></div>";
			  //guardamos el precio en una variable 
			  $price = $descripcion[1];
			  echo "<br>";
            }
			//obtenemos el precio y el codigo del producto en una variable
		$envio = $datos_subcat_product[3]."-".$price;
          echo "</div>";
		  //boton que enviara la variable envio que tiene como valor el codigo y el precio del producto como parametro a una funcinoa nativa de JS
		  echo "<button type='button' onClick=\"btnañadir('".$envio."')\" id='btnañadir' class='btn btn-warning'>Añadir</button>";
		  echo "<br>";
          echo "<button type='button' id='btncancel' class='btn btn-default' data-dismiss='modal'>Cancelar</button>";
        echo "</div>";
        ?>
      </div>
    </div>
  </div>
</div>
