<?php

	include_once ("sopa_modelo.php");
	// Los valores iniciales de los datos los ponemos aquí. 
	$filas = "";
	$columnas = "";
	$palabras = "";


	$mensajeValidacion = "";


	// Comprobamos si hay datos enviados por POST.
	if ($_POST)
	{
	
		$validacion = comprobarErroresSopa($_POST);
		if ($validacion != "OK") {

			// Creamos un mensaje de error informando de que la
			// validación ha fallado.
			$mensajeValidacion = "<p class='alert alert-danger'>" . $validacion . "</p>";

			$filas = isset($_POST["filas"]) ? $_POST["filas"] : "";
			$columnas = isset($_POST["columnas"]) ? $_POST["columnas"] : "";
			$palabras = isset($_POST["palabras"]) ? $_POST["palabras"] : "";
		}

		else
		{

			$todasPalabras = array();
			array_push($todasPalabras, $_POST["palabras"]);
				for($i = 1; $i < 10; $i++ ){
					if($_POST["palabras$i"] == true){
					array_push($todasPalabras, $_POST["palabras$i"]);
					$palabras =implode(",", $todasPalabras); 
					unset($_POST["palabras$i"]);
					}
					unset($_POST["palabras$i"]);
				}

				$_POST["palabras"]=$palabras;
						print_r($palabras);
			$resultado = guardarSopa($_POST);
			/*print_r($_POST);*/
				if ($resultado == TRUE) 
				{
					header("Location: sopa_form.php");
				}else
					{
					echo "Ha ocurrido un fallo al guardar la sopa de letras.";
					}
		}
	}
?>	
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<body>


<div class="content">


	<div class="bloque">

					<div class="contenido">
					<div class="titulo">Crea tu propia sopa de letras</div>
						<br/>

						<?= $mensajeValidacion ?>

 <script src="https://code.jquery.com/jquery-3.1.1.min.js"
		  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
		  crossorigin="anonymous"></script>
 <script>


$(function(){
		 
		$('#anadirBtn').click(function(){ 

			$("#palabrasTd").append('<input type="text" maxlength="10" value="" name="palabra"/><br/>');
			//$('<input>').attr('type','text').attr('maxlength','10').attr('name','nuevaPalabra').appendTo('#palabrasTd');

		});


});
</script>



<form name="formulario"  method="POST" >
		<table>

						<tr>
						<td>Columnas</td>
						<td><select name="columnas">
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Filas</td>
						<td>
							<select name="filas">
								<option value="10">10</option>
								<option value="11">11</option>
								<option value="12">12</option>
								<option value="13">13</option>
								<option value="14">14</option>
								<option value="15">15</option>
							</select>
						</td>
					</tr>
					<tr>
						<td >Palabras: <br/>
							<div id="palabrasTd">
								<input type="text" maxlength="10" value="" placeholder="Introduce una palabra...   " name="palabras"/><br/>
								<input type="text" maxlength="10" value="" name="palabras1"/><br/>
								<input type="text" maxlength="10" value="" name="palabras2"/><br/>
								<input type="text" maxlength="10" value="" name="palabras3"/><br/>
								<input type="text" maxlength="10" value="" name="palabras9"/><br/>
							</div>	
						<!--		<input type="button" value="+" id="anadirBtn" />-->
						</td>
						<td>
						<br/>
							<div id="palabrasTd">
								<input type="text" maxlength="10" value="" name="palabras4"/><br/>
								<input type="text" maxlength="10" value="" name="palabras5"/><br/>
								<input type="text" maxlength="10" value="" name="palabras6"/><br/>
								<input type="text" maxlength="10" value="" name="palabras7"/><br/>
								<input type="text" maxlength="10" value="" name="palabras8"/><br/>
							</div>	
						</td>
					</tr>

		</table>

			<input type="submit" value="Generar Sopa" />

</form>

				</div>
    		</div>
		</div>

</body>
</html>