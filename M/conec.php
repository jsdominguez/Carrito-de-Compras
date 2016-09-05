<?php
require '../V/componentes/PHPMailer/PHPMailerAutoload.php';

class conexion
{
	//definiendo las variables que contendran los datos a conexion a la BD
	private $user="root";
	private $local="localhost";
	private $pass="";
	private $db="carrito";

	//*************METODO DONDE SE CARGARAN LAS CATEROGIAS Y SUBCATEGROIAS QUE ESTAN EN LA BD *****************************
	function categorias() 
	{

		$con=mysqli_connect($this->local,$this->user,$this->pass,$this->db);
		//consulta donde nos devuelve el codigo y el nombre de cada categoria de la tabla categoria
		$consulta_cat=$con->query("select cat_cod,cat_nom from categoria");
        while($datos_cat = $consulta_cat->fetch_array())
        {
			//consulta donde nos devuleve el codigo de la subcategoria y nombre de la sucategoria  recibiendo como parametro
			//el valor que esta en el primer while en la cual lo usaremos en el 2do while
           $consulta_subcat = $con->query("select subcat_cod,subcat_nom from sub_categoria where cat_cod='$datos_cat[0]'");
		   //mostramos la imagen y el nombre de categoria
           echo "<li style='cursor:pointer'><a><img src='img/Categorias/$datos_cat[0].png'><h4>$datos_cat[1]</h4><div class='flecha'><span class='fa fa-chevron-down'></span></div></a>
                 <ul class='nav child_menu' style='display: none'>";
           //obtenemos los datos de las sub_categoria
		   while($datos_subcat = $consulta_subcat->fetch_array())
           {
					//ahora mostramos todos las subcategoria de su respectiva categoria
            		echo "<li><label for='$datos_subcat[1]'>$datos_subcat[1]</label></li>";
           }
           echo 	"</ul>
                 </li>";
        }
	}
	
	// *************************************************************************************************************************

//***************** METODO DINAMICOS PARA PODER LISTAR LOS PRODUCTOS POR CATEGORIA **********************************
	
	// la funcion obtendra un parametro que es el codigo de la categoria para que pueda listar los productos de dicha categoria
	function mostrar_productos_categoria($sub_categoria)
	{
		$con=mysqli_connect($this->local,$this->user,$this->pass,$this->db);
		//se realiza la consulta dependiendo como esten relacionadas las tablas
		$product_subcat=$con->query("select c.cat_cod,foto,pro_nom,pro_cod from productos p inner join sub_categoria s inner join categoria c
on p.subcat_cod=s.subcat_cod and s.cat_cod=c.cat_cod where s.subcat_nom='$sub_categoria'");
		echo "<div class='row' id='contentproduct'>";
		while($datos_subcat_product=$product_subcat->fetch_array())
		{
			//imprimimos los productos por cada categoria que se nos ha enviado como parametro
			$dir_categoria=$datos_subcat_product[0];
			 	echo "<div class='col-md-2 col-sm-2' id='alinear1'>
		 				<div class='thumbnail'>
			 						<img src='img/$dir_categoria/$datos_subcat_product[1]'>
									<div id='botones'><button type='button' id='detalle' data-toggle='modal' class='btn btn-danger' data-target='#$datos_subcat_product[3]'>Detalle</button></div>
							</div>
			  		</div>";
					//incluimos los modales que tendra cada producto
					include("componentes/modal.php");
		}
		echo "</div>";
	}
	
	// *************************************************************************************************************************
	
	//***************** METODO PARA GUARDA LAS COMPRAS QUE SE HA SOLICITADO **********************************
	
	//tendra como parametros el usuario,precio y codigo del producto
	function guardar($var1,$var2,$var3)
	{
		$con=mysqli_connect($this->local,$this->user,$this->pass,$this->db);
		//hacemos la insercion de datos agregando aidicionalmente la hora 
		$con->query("insert into temp(pro_cod,preciotemp,usuario,hora) values('$var1','$var2','$var3',curTime())");
	}
	
	// *************************************************************************************************************************
	
	//***************** METODO PARA LISTAR TODOS LOS PRODUCTOS SELECCIONADOS POR EL CLIENTE **********************************
	
	function comprastemp()
	{
		$con=mysqli_connect($this->local,$this->user,$this->pass,$this->db);
		$usuario=$_COOKIE['usuario'];
		//hacemos la consulta union las tablas productos y la tabla temporal donde nos dara todos los productos + los datos de la persona que ha comprado
		$datos = $con->query("select preciotemp,cat_cod,foto,p.pro_cod,count(p.pro_cod) from productos p inner join temp t on p.pro_cod=t.pro_cod where usuario='$usuario' group by p.pro_cod order by hora desc");
		//obtenemos el numero de compras 
		$numfilas=$datos->num_rows;
		//obtenemos la suma de todo lo que ha comprado
		$totalpagar=$con->query("select sum(preciotemp) from temp where usuario='$usuario'");
		//hacemos una condicion donde si no tiene alguna compra le aparecera un mensaje y si tiene mostraremos todos sus productos 
		if($numfilas>0)
		{
			//si tiene compras mostramos los productos
			while($prodtemp=$datos->fetch_array())
			{
				//obtenemos el codigo del producto  y agregamos un boton que tendra como parametro ese codigo donde se enviara a una funcion 
				// nativa de JS que servira para la eliminacion del producto
				$codigo=$prodtemp[3];
				echo "<div class='col-md-12' id='detallecompra'>
					<img src='img/$prodtemp[1]/$prodtemp[2]' width='100px' height='100px' id='compras'>
					<span class='label label-warning' id='repetidas'>x $prodtemp[4]</span>
					<div id='codigo'>S/ $prodtemp[0]</div>
					<span class='label label-danger' id='btneliminar' onclick=\"deletes('".$codigo."')\">Eliminar</span>
					<hr>
					</div>";			
			}
			while($pagototal=$totalpagar->fetch_array())
			{
				    echo "<div id='espacio'>jsujjjjjjjjjjjjjjj</div>";
					//mostramos el total de su compra
					echo "<div id='total'>Total: S/. $pagototal[0].00</div>";
					$pagopaypal=$pagototal[0];
			}
			?>
<input type="image" src="https://www.paypalobjects.com/es_XC/i/btn/btn_buynowCC_LG.gif" border="0" name="submit" id="btncompra" onclick="paypal(<?php echo $pagopaypal;?>)">
			<?php
		}
		else
		{
			//mostramos un mensaje si no tiene compras
			echo "<div id='carvacio'><img src='img/2.png' width='100px' height='100px'><br><br><font-color='white'>No tiene Compras</font></div>";
		}
	}
	
	// *************************************************************************************************************************
	
	//***************** METODO PARA ELIMINAR UN PRODUCTO QUE ESTA EN SU CARRITO DE CADA CLIENTE **********************************
	
	function quitarprod($cod)
	{
		$con=mysqli_connect($this->local,$this->user,$this->pass,$this->db);
		$usuario=$_COOKIE['usuario'];
		//hacemos la consulta para la eliminacion
		$con->query("delete from temp where usuario='$usuario' and pro_cod='$cod'");
	}
	
	// *************************************************************************************************************************
	
	
	//***************** METODO PARA CALCULAR EL NUMERO DE PRODUCTOS QUE LLEVA EN SU CARRITO **********************************
	
	function totalcompras()
	{
		$con=mysqli_connect($this->local,$this->user,$this->pass,$this->db);
		$usuario=$_COOKIE['usuario'];
		$datos=$con->query("select pro_cod from temp where usuario='$usuario'");
		//obtenemos la cantidad
		$numfilas=$datos->num_rows;
		//lo mostramos
		printf($numfilas);
	}
	// *************************************************************************************************************************
	
		function fin_compra($nombre,$dni,$tarjeta,$correo,$total,$descuento)
	{
		$con=mysqli_connect($this->local,$this->user,$this->pass,$this->db);
		$usuario=$_COOKIE['usuario'];
		$con->query("insert into compra(usuario,nombre_completo,tarjeta,dni,correo,descuento,total) values('$usuario','$nombre','$tarjeta','$dni','$correo','$descuento','$total')");
	}
	
	function envio_compra_correo($enviar)
	{
		$mail = new PHPMailer;
		$mail->isSMTP();                                   // Set mailer to use SMTP
		$mail->Host = 'smtp-mail.outlook.com';                    // Specify main and backup SMTP servers
		//$mail->Host = "smtp.live.com";
		//$mail->Host = 'smtp.gmail.com';
		$mail->SMTPAuth = true;                            // Enable SMTP authentication
		$mail->Username = 'medalithpg@hotmail.com';          // SMTP username
		$mail->Password = 'teachercn'; // SMTP password
		$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 25;                                 // TCP port to connect to
		//587

		$mail->setFrom('britanico@unido.edu.pe', 'Britanico'); // quien manda el ensage
		$mail->addAddress($enviar);   // para quien
		//$mail->addCC('cc@example.com');
		//$mail->addBCC('bcc@example.com');

		$mail->isHTML(true);  // Set email format to HTML

		$mail->Subject = 'EFECTO CARGA'; //Asunto
		//$mail->Body  = $bodyContent;
		$foto= "C:/Users/RootPein/Desktop/11836733_10200799041254058_9093712891751773295_n.jpg";
		$mensaje="<img src='$foto' width='100px' height='100px'>"."<br>";
		$mensaje.= "<center><h1><font color='red'>UPC</font></h1></center>"; //Cuerpo
		$mensaje.= '<p>EFECTO CARGA</p>'; //Cuerpo
		$mail->MsgHTML($mensaje);

		if(!$mail->send()) 
		{
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} 
		else
		{
			echo 'Enviado al correo de la Tui para el CARRITO DE COMPRAS';
		}
	}
}
 ?>
