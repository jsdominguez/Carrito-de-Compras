<?php 
  include("../M/conec.php");
  //instaciamos la clase para poder acceder a sus metodos
  $conexion = new conexion();
  //recibimos el codigo del producto que queremos eliminar
  $codigo=$_POST["codigo"];
  //capturado ese codigo lo enviamos dentro del metodo que hara la eliminacion de dicho producto
  $conexion->quitarprod($codigo);
 ?>