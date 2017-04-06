<!--si se descuadra la sopa de letras introducir un div con las dimesiones de 890px de ancho o 
mas facil aun modificar la clase de casilla en sopa_letras.css y aumentar a 44px el left, top, width, height y line-height o bajar a 40 px
todo depende de las dimensiones de la pantalla
por tanto lo importante de aqui es el array que queda recogido en la variable $sopa, el como se presente en pantalla depende del administrador jiji
aaaaa no copies este codigo que es una gran chapuza no coregido, poco fiable, muy extendida y a la que le faltan muchas funciones. por tanto no copiar, que la liais, que realmente no va asi, el codigo es mucho mas corto e incomprensible.-->
<?php
	include("funciones/sopa_modelo.php");
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>sopa de letras</title>
		<script defer type="text/javascript" src="./js/sopa_letras.js"></script>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"
  		integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  		crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="css/sopa_letras.css">
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
	<?php
							$resultados = obtenerSopaPorIdJuegos(4); 
							$respuestas=explode(",", strtoupper($resultados[0]['palabras']));
							$numeroPalabras = count($respuestas);
							$columnas=$resultados[0]['filas'];
							$filas=$resultados[0]['columnas'];
							$sopa = puntero($respuestas,$filas,$columnas);
							$altura = ($filas*40)."px";
							$anchura = ($columnas*40)."px";
							//print_r($anchura);
							//print_r($altura);
	?>
		<div class="container-fluid">
			<div class="row" >
				<div  style="width: <?=$altura?>; height: <?=$anchura?>;">
						<?php 
							

							for($i = 0; $i < $filas; $i++): for($j = 0; $j < $columnas; $j++):?>
								<div class="casilla" id="<?= $i . $j?>"><?= $sopa[$i][$j]; ?></div>

							<?php endfor; endfor;?>
				</div>
				<div class="col-md-4 palabrasLista"><h2 class="tituloLista">LISTA PALABRAS</h2>
					<ul>
						<?php
							$cuentaRespuestas = count($respuestas);

							for($z = 0; $z < $cuentaRespuestas; $z++ ): ?>
								<li class="listaPalabras" id="<?= $z?>"><?= $respuestas[$z]; ?></li>
							<?php endfor;?>
					</ul>
				</div>
			</div>
		</div>
		<script>
			var palabras = ['<?= implode("', '", $respuestas); ?>'];

		</script>
			
	</body>
</html>