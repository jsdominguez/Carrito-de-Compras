
<!-- Modal Que se despliega segun el codigo del producto -->
<div class="modal animated bounceIn" id="mymodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
	
      <div class="modal-header">
	  <!-- TITULO-->
       <img src="http://blog.descubreviajar.com/wp-content/uploads/2016/05/banner-blog.gif" id="banner" class="modal-title img-responsive" />
      </div>
	  
      <div class="modal-body">
	     <form name="myForm" id="myform">
		<!--****************************************************************************************************-->
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
              <input type="text" aria-describedby="sizing-addon2" class="form-control" id="nombres" placeholder="Ingrese su Nombre y Apellidos Completos" required>
            </div>
          </div>
		<!--****************************************************************************************************-->  
		  	<div class="form-group">
				<div class="input-group">
				<span class="input-group-addon" id="basic-addon1"><p style="font-weight:bold">DNI</p></span>
				<input type="text" aria-describedby="sizing-addon2" class="form-control" id="dni" placeholder="Ingrese su Indetificacón" required>
				</div>
			</div>
		<!--****************************************************************************************************-->	
		    <div class="form-group">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-credit-card" aria-hidden="true"></span></span>
					<input type="text" aria-describedby="sizing-addon2" class="form-control" id="tarjeta" placeholder="Ingrese su Nr. Tarjeta" required>
				</div>
			</div>
		<!--****************************************************************************************************-->	
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span></span>
					<input type="text" aria-describedby="sizing-addon2" class="form-control" id="correo" placeholder="Ingrese su Correo" required>
				</div>
			</div>
		<!--****************************************************************************************************-->	
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon1"><p style="font-weight:bold">S/.</p></span>
					<input type="text" aria-describedby="sizing-addon2" class="form-control" id="totalpaypal" disabled="disabled">
				</div>
			</div> 
		<!--****************************************************************************************************-->
		<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
				<div class="panel panel-default">
					<div class="panel-heading" role="tab" id="headingOne">
						<h4 class="panel-title">
							<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
							<p style="color:black"><u>Terminos y Condiciones</u><p>
							</a>
						</h4>
					</div>
					
			<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
				<div class="panel-body">
					<p id='aviso'>El Descuento por la compra via web se aplica si el monto total es mayor a S/ 500.00 nuevos soles , con el 10% descuento ,valido en todo Lima Metropolitana , Tener en cuenta
					que al momentode realizar el pago en linea se le enviara por correo su boleta de su compra con todos los detalles</p>
				</div>
			</div>
			
		</div>
	</div>
	<!--******************************************************************************-->
          <div class="form-group">
            <button type="button" class="btn btn-primary btn-lg btn-block" id="finalcompra"><img src="http://lombricescalifornianas.cl/assets/img/comprar-con-efectivo.png" height="40px" width="40px" id="pagar">Procesar Compra</button>
			<div id="loading">
			<div id="blurringTextG"><div id="blurringTextG_1" class="blurringTextG">P</div><div id="blurringTextG_2" class="blurringTextG">r</div><div id="blurringTextG_3" class="blurringTextG">o</div><div id="blurringTextG_4" class="blurringTextG">c</div><div id="blurringTextG_5" class="blurringTextG">e</div><div id="blurringTextG_6" class="blurringTextG">s</div><div id="blurringTextG_7" class="blurringTextG">a</div><div id="blurringTextG_8" class="blurringTextG">n</div><div id="blurringTextG_9" class="blurringTextG">d</div><div id="blurringTextG_10" class="blurringTextG">o</div><div id="blurringTextG_11" class="blurringTextG"> </div><div id="blurringTextG_12" class="blurringTextG">.</div><div id="blurringTextG_13" class="blurringTextG">.</div><div id="blurringTextG_14" class="blurringTextG">.</div></div>
			</div>
          </div>
	<!--******************************************************************************-->	  
		    <div class="form-group">
				<button class="btn btn-danger btn-lg btn-block" id="cancelpaypal" data-dismiss='modal'>Cancelar</button>
			</div>
	<!--******************************************************************************-->
	   </form>
      </div>
    </div>
  </div>
</div>
