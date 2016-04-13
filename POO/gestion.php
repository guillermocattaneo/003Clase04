<?php
require"clases/estacionamiento.php";

$patente=$_POST['patente'];
$foto=$_FILES['foto']['name'];

$accion=$_POST['estacionar'];


$nomext=explode(".", $foto);	//nombre y extencion, NomExt








move_uploaded_file($_FILES['foto']['tmp_name'], 
	"fotitos/$patente.$nomext[1]");
//move_uploaded_file($_FILES['foto']['tmp_name'], "fotitos/".$patente.$nomext['1']); otra forma


if($accion=="ingreso")
{
	var_dump($_POST);
	echo "<br><br>";
	var_dump($_FILES);			//al ponerle enctype, de encryptar, ya no viene como antes por el post, sino que por el FILES :Oh! 
	echo "<br><br>";
	var_dump($foto);	//trae el nombre del archivo
	
	estacionamiento::Guardar( $patente, $patente.".".$nomext[1]);
//if con ->que la foto no pese mas de un mb
	//SOLO archivos JPG o PNG
	//Si el archivo de foto existe, renombrar el viejo.


//	die();	//hasta aca. y no ejecuta nada mas.
}
else
{
	estacionamiento::Sacar($patente, $patente.".".$nomext[1]);

		//var_dump($datos);
}

header("location:index.php");
?>
