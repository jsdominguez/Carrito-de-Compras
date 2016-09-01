<?php 
  include("../M/conec.php");
  //instalacion la clase para accedes a sus metodos
  $conexion = new conexion();
  // llamamos al metodo que nos devolvera la cantidad de compras que he realizado cada cliente
  $conexion->totalcompras();
 ?>