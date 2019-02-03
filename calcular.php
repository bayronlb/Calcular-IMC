<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<script src="bootstrap-3.3.7-dist/js/bootstrap.js" ></script>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<title></title>
</head>
<body>
	<?php
	include('conexion.php');
   //variables para los calculos del imc y la grasa coorporal
	$estatura = $_POST['estatura'];
	$peso = $_POST['peso'];
	$edad=$_POST['edad'];
	$cintura=$_POST['cintura'];
	$cuello=$_POST['cuello'];
	$cadera=$_POST['cadera'];
	$genero=$_POST['genero'];
	//convertir las libras a kilogramos para aplicar formula general del imc
	$pesokilogramos= covertirlibras($peso);
    //Calcular el indice de masa coorporal usando la funcion calcularIMC
	$IndiceMasaCorporal=calcularIMC($estatura,$pesokilogramos);
	//Establece el rango de estado de la persona segun su imc usando la funcion calcularEstado 
	$EstadoSegunIndiceMasaCorporal=calcularEstado($IndiceMasaCorporal);
    //calcular el indice de grasa
	$IndiceGrasa= calcularIndicegrasaCorporal($cintura,$cuello,$cadera,$estatura,$genero);
	//Establece un rango segun el nivel de grasacorporal
	$EstadoSegunGrasaCorporal=calcularEstadograsaCorporal($genero,$IndiceGrasa);
	?>
	<div class="row"><br></div>
	<div class="row"><br></div>
	<div class="row"><br></div>
	<div class="row"><br></div>
	<div class="row"></div>
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<h1> Datos Obtenidos </h1>
		<?php 
		echo '<table class="table table-bordered">
		<thead>
			<tr>
				<th>Calcular</th>
				<th>Resultados</th>
				<th>Observación</th>
			</tr>
		</thead>';
		echo '<tbody>';
		echo '<tr>';
		echo '<td>Indice de Masa Corporal</td>';
		echo"<td>$IndiceMasaCorporal</td>";
		echo"<td>$EstadoSegunIndiceMasaCorporal</td>";
		echo'</tr>';
		echo '<tr>';
		echo '<td>Porcentaje de grasa Corporal</td>';
		echo"<td>$IndiceGrasa</td>";
		echo"<td>$EstadoSegunGrasaCorporal</td>";
		echo'</tr>';

		?>	
 <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
 Registrarse 
</button>
		
	</div>

</div>




</body>

</html>