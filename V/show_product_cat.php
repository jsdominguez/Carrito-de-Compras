<?php
include("../M/conec.php");
//instanciamos la clase para poder acceder a sus metodos
$conexion = new conexion();
// recibimos el nombre de la categoria para que nos muestre los productos de dicha categoria 
$mostrar = $_POST["codigo"];
//enviamos esa categoria al metodo que nos devolvera todos los productos de esa categoria recibida
$conexion->mostrar_productos_categoria($mostrar);
 ?>
