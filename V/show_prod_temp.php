<?php 
  //instanciamos la clase para poder acceder a sus metodos
  include("../M/conec.php");
  //llamamos al metodo para que muestre todos los productos que envio cada cliente a su carrito
  $conexion = new conexion();
  $conexion->comprastemp();
 ?>