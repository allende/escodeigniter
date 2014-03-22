<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<title>Welcome to esCodeIgniter</title>

	<style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;	
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container,#container_dos{
		margin: 10px;
		padding: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
		-moz-box-shadow: 0 0 8px #D0D0D0;
		-ms-box-shadow: 0 0 8px #D0D0D0;
		-o-box-shadow: 0 0 8px #D0D0D0;
	}
	
	
	/*CSS tomado de: http://bavotasan.com/2011/style-select-box-using-only-css 
	About the author: c.bavota
	A freelance web developer living in Montreal who spends most of his time writing for this site and building Premium themes for WordPress. You can find him on Twitter @bavotasan.*/
	
	
	.styled-select {
	
		width: 240px;
		height: 34px;
		overflow: hidden;
		background: url(<?php echo base_url(); ?>imagenes/down_arrow_select.jpg) no-repeat right #ddd;
		
		
		outline-style: none;
	}
	/*termina css de */
	
	.styled-select select option{
		border: 0px none;
		background-color: #ddd; /*webkit-chrome*/
	}
	
	.styled-select select{
		background-color: transparent;		
		width: 268px;
		padding: 5px;
		margin:2px;
		font-size: 16px;
		border-style: none;
		height: 34px;
		outline-style: none;
		-webkit-appearance: none; 		/*chrome fix*/

	}
	
	</style>
	
	<script>
			//tenemos jquyer ?
			/*if  ($()){
				alert("yey, jquery desde el cdn de google");
			}*/
	</script>
	
	<script>
	/**/
		$(document).ready(function(){
				$("#paises").change(function(){
				
						$.ajax({
						type: "POST",
						url: "http://localhost/escodeigniter/index.php/ajax_jquery/get_ajax_estados",
						
						data: "id_pais="+$("#paises").val(), //<< esto nunca llega a get_ajax_states
						//la llamada si se j
						
						success:function(estadosResponse) 						 
							{				
															
								
								$("#estados").empty().append($(estadosResponse).find("option"));
								//Hay que actualizar tambien las ciudades si cambia el estado.
								
								$.ajax({
									type: "POST",
									url: "http://localhost/escodeigniter/index.php/ajax_jquery/get_ajax_ciudades",						
									data: "id_estado="+$("#estados").val(),						
									success:function(ciudadesResponse) {	
										
										$("#ciudades").empty().append($(ciudadesResponse).find("option"));
									}
								});
								
							}
						});
				});
				
				$("#estados").change(function(){
					$.ajax({
							type: "POST",
							url: "http://localhost/escodeigniter/index.php/ajax_jquery/get_ajax_ciudades",						
							data: "id_estado="+$("#estados").val(),						
							success:function(ciudadesResponse) {	
								
								$("#ciudades").empty().append($(ciudadesResponse).find("option"));
							}
					});								
				});
		
		/*Este codigo es para los 3 dropdowns que insertan elementos vacios con jquery*/
		
				$("#paises2").prepend("<option value='-1' selected='true'></value>");
				$("#paises2").change(function(){
				
						$.ajax({
						type: "POST",
						url: "http://localhost/escodeigniter/index.php/ajax_jquery/get_ajax_estados",
						
						data: "id_pais="+$("#paises2").val(), //<< esto nunca llega a get_ajax_states
					
						
						success:function(estadosResponse2) 						 
							{				
															
								
								$("#estados2").empty().append($(estadosResponse2).find("option"));
								//Hay que actualizar tambien las ciudades si cambia el estado.
								
								$.ajax({
									type: "POST",
									url: "http://localhost/escodeigniter/index.php/ajax_jquery/get_ajax_ciudades",						
									data: "id_estado="+$("#estados2").val(),					
									success:function(ciudadesResponse2) {	
										console.log(ciudadesResponse2);
										
										$("#ciudades2").empty().append($(ciudadesResponse2).find("option"));
										console.log($("#ciudades2"));
									}
								});
								
							}
						});
				});
				
				$("#estados2").change(function(){
					$.ajax({
							type: "POST",
							url: "http://localhost/escodeigniter/index.php/ajax_jquery/get_ajax_ciudades",						
							data: "id_estado="+$("#estados2").val(),						
							success:function(ciudadesResponse) {	
								console.log(ciudadesResponse);
								$("#ciudades2").empty().append($(ciudadesResponse).find("option"));
							}
					});								
				});
		
		}); /*fin del document.ready*/
		
	</script>
	<script>
	
		
		
	</script>
	
</head>
<body>

<div id="container">
<h1>Ejemplo 1:</h1>
<h2>Ejemplo AJAX con jQuery+Codeigniter</h2>	
	<div id="pais">
                  
                  <label>Pa&iacute;s<span id="requerido">*</span></label>
				  <div class="styled-select">
                  <?php
                     echo form_dropdown('paises', $paises, '#', 'id="paises"');
                   ?>
				   </div>
               </div>
               <div id="estado">
			   
                  <label>Estado<span id="requerido">*</span></label>
				  <div class="styled-select">
                  <?php
                     echo form_dropdown('estados', $estados, '#', 'id="estados"');
                  ?>
				  </div>
               </div>
               <div id="ciudad">
                  <label>Ciudad<span id="requerido">*</span></label>
				  <div class="styled-select">
                  <?php
                     echo form_dropdown('ciudades', $ciudades, '#', 'id="ciudades"');
                  ?>
				  </div>
				</div>
</div>

<div id="container_dos">
<h1>Ejemplo 2:</h1>
<h2>Agregando un valor vacio en el dropDown de paises (siempre) permite dejar "vacios"los otros 2 dropdowns</h2>	
	<div id="pais">
                  
                  <label>Pa&iacute;s<span id="requerido">*</span></label>
				  <div class="styled-select">
                  <?php
                     echo form_dropdown('paises2', $paises, '#', 'id="paises2"');
                   ?>
				   </div>
               </div>
               <div id="estado">
			   
                  <label>Estado<span id="requerido">*</span></label>
				  <div class="styled-select">
                  <?php
                     echo form_dropdown('estados2', $estados2, '#', 'id="estados2"');
                  ?>
				  </div>
               </div>
               <div id="ciudad">
                  <label>Ciudad<span id="requerido">*</span></label>
				  <div class="styled-select">
                  <?php
                     echo form_dropdown('ciudades2', $ciudades2, '#', 'id="ciudades2"');
                  ?>
				  </div>
				</div>
</div>
<div id="agradecimientos">

<h2>Agradecimientos:</h2>
<p>El estilo de los dropdowns fue tomado de aca, fue levemente modificado:
<a href="http://bavotasan.com/2011/style-select-box-using-only-css/">bavotasan</a></p>


A <a href="http://twitter.com/marco_garay">Marco Garay</a> por el tip final para hacer funcionar el ejemplo.

Al usario <a href="http://foro.escodeigniter.com/memberlist.php?mode=viewprofile&u=900">mikezero</a> del foro, parte del codigo :)
(en especial la parte del modelo) lo bas&eacute; en un ejemplo que 
empezaba a hacer con la misma funcionalidad y que me envi&oacute; para que le diera un vistazo.

<p><a href="https://twitter.com/escodeigniter">esCodeigniter</a></p>
</div>
    
</body>
</html>