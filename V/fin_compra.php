<?php
include("../M/conec.php");
//instanciamos la clase para poder acceder a sus metodos
$conexion = new conexion();
//recibe el producto enviado por ajax 
$nombre=$_POST["nombre"];
$dni=$_POST["dni"];
$tarjeta=$_POST["tarjeta"];
$email=$_POST["correo"];
$descuento=$_POST["descuento"];
$total=$_POST["total"];
$conexion->envio_compra_correo($email);
$conexion->fin_compra($nombre,$dni,$tarjeta,$email,$total,$descuento);
 ?>