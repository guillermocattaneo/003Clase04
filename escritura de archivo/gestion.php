<?php

/*	1- si es un ingreso lo guardo en ticket.txt
 	2- si es salida leo el archivo:
 	leer del archivo todos los datos, guardarlos en un array
	si la patente existe en el archivo .
	 sobreescribo el archivo con todas las patentes
	 y su horario si la patente solicitada
	... calculo el costo de estacionamiento a 
	20$ el segundo y lo muestro.
	si la patente no existe mostrar mensaje y 
	el boton que me redirija al index  
	3- guardar todo lo facturado en facturado.txt*/

var_dump($_POST);

echo "<br>";
echo "<br>";

$patente=$_POST['patente'];
$foto=$_POST['foto'];
$accion=$_POST['estacionar'];
$ahora=date("Y-m-d H:i:s"); //Formato de fecha que le pasa el año, mes y día, hora, minuto y segundos
$listaEstacionados=array(); // Asi se crea un array (cadena)
$esta=false;


if($accion == "ingreso")
{
	//Proceso para ingresar un auto (La variable $accion en este if compara si es ingreso o egreso, que es el valor que tiene en index.php)
	var_dump($_FILES);
	die();	//hasta aca. y no ejecuta nada mas.
	$archivo=fopen("ticket.txt", "a");
	fwrite($archivo, $patente."[".$ahora."\n"); // en HANDLE hay que poner el nombre de la variable que tiene la ruta del archivo
	fclose($archivo);
}

else
{
	//Proceso para el egreso de un auto si existe

	$archivo=fopen("ticket.txt", "r");
	
	while (!feof($archivo))
	{
		$renglon=fgets($archivo); //retorna todo un renglon
		$auto=array();
		$auto=explode("[", $renglon);
		

		if ($auto[0] == $patente) 
		{
			$esta=true;
			$tiempo=strtotime($ahora)-strtotime($auto[1]);
			echo "tiempo transcurrido $tiempo";
			echo "<br>";
		}
		else
		{
			
			$listaEstacionados[]=$auto;

		}
	
	}



fclose($archivo);


if ($esta==true)
{
	$archivo=fopen("ticket.txt", "w");
	foreach ($listaEstacionados as $autito => $value)
	{
		fwrite($archivo, $autito[0]."[".$autito[1]."\r\n");
	}
	fclose($archivo);
}


//var_dump($listaEstacionados);

}





?>
<br>
<br>
<a href="index.php">Volver</a>