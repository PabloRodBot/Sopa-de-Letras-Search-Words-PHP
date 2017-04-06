<?php
	
	//esta es la funcion principal
	function rellenarSopaLetras($palabras){
	
		$palabrasDivididas = dividirPalabras($palabras);

			//para mayor claridad creamos primero un array funcional con tan solo 0 que representa que una casillas esta vacia
			//esto no es necesario ya se puede comprobar facilmente si una posicion del array esta sin rellenar o vacia.
			//solo es por claridad de codigo y ahorro de lineas y funciones.
			for ($i = 0; $i < 10; $i++){
				for($j = 0; $j < 10; $j++){
					$sopaDeLetras[$i][$j] = 0;
				}

			}

			//con este return sin comentar sale la sopa de letras rellena de 0 lo que va permitir ver las palabras a buscar con mayor claridad
			return introducirPalabras($sopaDeLetras,$palabrasDivididas);
			//return completarSopa(introducirPalabras($sopaDeLetras,$palabrasDivididas));
			//para ver la sopa de letras bien definida, es decir sin 0, comentar la linea de arriva y descomentar la linea de abajo
			//return completarSopa(introducirPalabras($sopaDeLetras,$palabrasDivididas));
	}
	//esta funcion la usamos para introducir todas las palabras.
	function introducirPalabras($sopaDeLetras,$palabrasDivididas){
			$longitudHorizontalSopa = 10;
			$longitudVerticalSopa = 10;
			for($i = 0; $i < count($palabrasDivididas); $i++){
				$introducir = false;
				$longitudPalabra = count($palabrasDivididas[$i]);
				while ($introducir == false) {
					//cada una de las funciones del switch son repetidas, salvo algun pequeño detalle que cambia, por tanto todo lo que
					//hay en cada una de los case iria comprimido en una unica funcion de 20 lineas.
					//lo pongo asi para diferenciar claramente como funciona el posicionar una palabra de diferentes formas.
					switch (rand(1,4)) {
						//horizontal derecho
						case 1:
										//introducimos aleatoriamente la posicion de inicio donde se van a colocar las palabras
										$inicioFila = rand(0,9);
										$inicioColumna = rand(0,9);

										//comprobamos en primer lugar que haya suficiente espacio en la sopa de letras para introducir la palabra
								if(($inicioColumna + $longitudPalabra) < 10){

									//comprobamos que se puede introducir la palabra, es decir que no hay ninguna palabra ya en ese sitio.
									
									for($j = 0; $j < $longitudPalabra && $sopaDeLetras[$inicioFila][($inicioColumna + $j)] == 0; $j++){

											if($j == ($longitudPalabra - 1)){
												$introducir = true;

											}
								}
							}
								//si el espacio esta libre introducimos la palabra
								if($introducir == true){

										for($h = 0; $h < $longitudPalabra; $h++){
											$sopaDeLetras[$inicioFila][($inicioColumna + $h)]= $palabrasDivididas[$i][$h];


										}
								}
							
							break;


						//horizontal inverso
						case 2:
						//introducimos aleatoriamente la posicion de inicio donde se van a colocar las palabras
										$inicioFila = rand(0,9);
										$inicioColumna = rand(0,9);

										//comprobamos en primer lugar que haya suficiente espacio en la sopa de letras para introducir la palabra
								if(($inicioColumna - $longitudPalabra) > 0){

									//comprobamos que se puede introducir la palabra, es decir que no hay ninguna palabra ya en ese sitio.

										for($j = 0; $j < $longitudPalabra && $sopaDeLetras[$inicioFila][($inicioColumna-$j)] == 0; $j++){

											if($j == ($longitudPalabra-1)){
												$introducir = true;

											}
										}
									}
								//si el espacio esta libre introducimos la palabra
								if($introducir == true){

										for($h = 0; $h < $longitudPalabra; $h++){
											$sopaDeLetras[$inicioFila][($inicioColumna-$h)]= $palabrasDivididas[$i][$h];


										}
								}
								break;




							//vertical derecho
						case 3:
									//introducimos aleatoriamente la posicion de inicio donde se van a colocar las palabras
										$inicioFila = rand(0,9);
										$inicioColumna = rand(0,9);

										//comprobamos en primer lugar que haya suficiente espacio en la sopa de letras para introducir la palabra
								if(($inicioFila+$longitudPalabra) < 10){

									//comprobamos que se puede introducir la palabra, es decir que no hay ninguna palabra ya en ese sitio.
									for($j = 0; $j < $longitudPalabra && $sopaDeLetras[($inicioFila+$j)][$inicioColumna] == 0; $j++){

											if($j == ($longitudPalabra-1)){
												$introducir = true;


											}
									}
								}
								//si el espacio esta libre introducimos la palabra
								if($introducir == true){

										for($h = 0; $h < $longitudPalabra; $h++){
											$sopaDeLetras[($inicioFila + $h)][$inicioColumna]= $palabrasDivididas[$i][$h];


										}
								}
							break;


							//vertical inverso
						case 4:
					//introducimos aleatoriamente la posicion de inicio donde se van a colocar las palabras
										$inicioFila = rand(0,9);
										$inicioColumna = rand(0,9);

										//comprobamos en primer lugar que haya suficiente espacio en la sopa de letras para introducir la palabra
								if(($inicioFila-$longitudPalabra) > 0){

									//comprobamos que se puede introducir la palabra, es decir que no hay ninguna palabra ya en ese sitio.
									for($j = 0; $j < $longitudPalabra && $sopaDeLetras[($inicioFila - $j)][$inicioColumna] == 0; $j++){

											if($j == ($longitudPalabra - 1)){
												$introducir = true;


											}
										}
								}
								//si el espacio esta libre introducimos la palabra
								if($introducir == true){

										for($h = 0; $h < $longitudPalabra; $h++){
											$sopaDeLetras[($inicioFila - $h)][$inicioColumna] = $palabrasDivididas[$i][$h];


										}
								}
								break;
								//diagonal hacia abajo de derecha a izquierda			
						default:
							# code...
							break;
						}	
					}
				}	
			return $sopaDeLetras;

	}
	//esta funcion lo que haces es coger todas las palabras que estan en el array 
	function dividirPalabras($palabras){
			for($i = 0; $i < count($palabras); $i++){
				$palabrasDivididas[$i] = str_split($palabras[$i]);
			}
			return $palabrasDivididas;
	}

	//LLENAR HUECOS DE LA SOPA DE LETRAS CON LETRAS ALEATORIAS. chr devuelve un carácter específico. ord() devuelve el valor ASCII de un caracter. Aquí está diciendo que si la posición determinada de la sopa está vacía (no contiene palabra) que la rellene con una letra random entre la A y la Z
	function completarSopa($sopaDeLetras){
			for($i = 0; $i < 10; $i++){
				for($j = 0; $j< 10; $j++){
					if($sopaDeLetras[$i][$j] === 0){
						$sopaDeLetras[$i][$j] = chr(rand(ord("A"), ord("Z")));
					}
				}

			}
			return $sopaDeLetras;
	}
?>