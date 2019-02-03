<?php
function conectar(){
	$conect=new mysqli("localhost","root","","nutricion");
	if($conect->connect_errno){
		return null;
	}
	return $conect;
}
function covertirlibras($libras){
	return $resultado= ($libras/2.2046);
}
function calcularIMC($altura,$peso){
	$imc=$peso/($altura*$altura);
	return  $imc;	
}
function calcularEstado($imc){
	$conectar=conectar();
	$sql=$conectar->query("SELECT inicio,final,clasificacion FROM imc");

	if($sql!=null){
		if($sql->num_rows>0){
			while ($lineas=mysqli_fetch_array($sql)) {
				
				if ($imc>=$lineas[0] && $imc<=$lineas[1]) {
					return $lineas[2];
				}
				
			}

		}

	}
}

function calcularIndicegrasaCorporal($cintura,$cuello,$cadera,$altura,$sexo){

if ($sexo=='Masculino') {
	$al=0.15456*log10($altura*100);
	$rest=0.19077*log10($cintura-$cuello);
	$denominador=1.0324-$rest;
	return  495/ ($denominador+$al)-450;

}
$CintMasCadera=$cintura+$cadera;
return 495/(1.29579-0.35004*log10(($cintura+$cadera)-$cuello)+0.221*log10($altura*100))-450;


}


function calcularEstadograsaCorporal($genero,$IndiceGrasa){
 $conectar=conectar();

 if ($genero=='Femenino') {
   $sql=$conectar->query("SELECT inicio,final,clasificacion FROM indicegrasa where genero='femenino'");

	if($sql!=null){
		if($sql->num_rows>0){
			while ($lineas=mysqli_fetch_array($sql)) {
				
				if ($IndiceGrasa>=$lineas[0] && $$IndiceGrasa<=$lineas[1]) {
					return $lineas[2];
				}
				
			}

		}

	}


 }

 if($genero=='Masculino'){
$sql=$conectar->query("SELECT inicio,final,clasificacion FROM indicegrasa where genero='Masculino'");

	if($sql!=null){
		if($sql->num_rows>0){
			while ($lineas=mysqli_fetch_array($sql)) {
				
				if ($IndiceGrasa>=$lineas[0] && $IndiceGrasa<=$lineas[1]) {
					return $lineas[2];
				}
				
			}

		}

	}


 }




}


function menu(){
	return '<nav class="navbar navbar-inverse">'. 
  '<div class="container-fluid">'.
    '<div class="navbar-header">'.
      '<a class="navbar-brand" href="index.php">Sistema De IMC</a>'.
    '</div>'.
    '<ul class="nav navbar-nav">'.
      '<li class="active"><a href="index.php">Home</a></li>'.
      '<li><a href="AgregarUsuario.php">Abrir Cuenta</a></li>'.
      '<li><a href="rutinas.php">Sugerencia De Rutinas</a></li> '.
      '<li><a href="#">Page 3</a></li>'. 
    '</ul>'.
  '</div>'.
'</nav>'; 

}
function css(){
 return '<meta charset="utf-8">'.
 '<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">'; 
}


?>