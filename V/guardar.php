<?php
include("../M/conec.php");
//instanciamos la clase para poder acceder a sus metodos
$conexion = new conexion();
//recibe el producto enviado por ajax 
$producto=$_POST["producto"];
//la variable producto viene junto con el precio unido por un guion
//cortamos el guion y nos queda un arreglo de 2 posiciones con valores precio y producto
$cortados = explode("-",$producto);
//obtenemos el valor de la cookie que generamos y guardamos en la pc de cada visitante
$user = $_COOKIE['usuario'];
//colocamos las variables en la funcion que se enviara a la clase-metodo que hara la consulta
$conexion->guardar($cortados[0],$cortados[1],$user);
 ?>
