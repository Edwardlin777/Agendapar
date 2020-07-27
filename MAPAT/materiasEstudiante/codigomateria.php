<?php
	function format($p,$inserted) {
	  	$r = [$p[0]];

	      for ($x = 1; $x < sizeof($p); $x++)
	      {
	          array_push( $r, $inserted[$x-1], $p[$x] );//array_merge($r,$inserted[$x-1]);
	      }
	      return $r;
	  }
	  function get($conn,$sql)
	  {
	    $results = mysqli_query($conn, $sql);
	    $r = [];

	      while($row = mysqli_fetch_assoc($results)) {
	       array_push($r,$row);
	      }
	      return $r;

	  }

	$id_materia=$_POST["id_materia"];

	//confirmar contrase�a



	// Create connection
	$conn = mysqli_connect("localhost", "root", "", "agenda8");

	// Check connection
	if (!$conn) {
	      die("Connection failed: " . mysqli_connect_error());
	}


	$sql = "SELECT * FROM materia WHERE id_materia like '$id_materia' ";
	$materia = get($conn,$sql)[0];

	$sql = "SELECT * FROM corte WHERE id_materia like '$id_materia' ";
	$cortes = get($conn,$sql);
	echo "
	<head>
	<link rel='stylesheet' href='style.css' />
	<link rel='stylesheet' href='estiloCodigoMateria.css'/>
	";
	?>
	<div class ="corte">
	<?php
	echo "<h2>Cortes</h2>";
	echo "<form class='añadir' action='add.php' method='POST'>
	<p>

			<b>Añadir corte</b>
	  		<input hidden type='text' name='clase' value='corte'>
			<input hidden type='nu'me'ric' name='id_materia' value='$id_materia'>
	        <input type='text' name='nombre_corte' placeholder='Nombre corte'>
	        <input type='number' name='peso_corte' placeholder='peso'>
	  		<!--<input type='number' name='promedio_corte' placeholder='promedio'>-->


		   	<input type='submit' value='+' class='botton'>
	</p>

	</form><br>

	";
	for ($c = 0; $c < sizeof($cortes); $c++)
	{
	 $id_corte = $cortes[$c]["id_corte"];
	 $sql = "SELECT * FROM criterio WHERE id_corte like '$id_corte' ";
	 $criterios = get($conn,$sql);
	 echo "<div class = 'corte'>
	<h3>" . $cortes[$c]["nombre_corte"] ." ". $cortes[$c]["peso_corte"] ."% ". "</h3>
	<form action='add.php' method='POST'>
				<!--<input type='submit' name='id_corte' value='-'>-->

	</form>
	<form action='add.php' method='POST'>
	<p>
				<b>Añadir criterio</b>

	  			<input hidden type='text' name='clase' value='criterio'>
				<input hidden type='numeric' name='id_corte' value='$id_corte'>
<div class='input-group mb-3'>
<div class='input-group-prepend'
<span class='input-group-text' id='basic-addon1'>Nombre nuevo criterio</span>
</div>
<input class= 'form-control'   type='text' name='nombre_criterio' aria-describedby='basic-addon1'>

<div class='input-group-prepend'
<span class='input-group-text'  id='basic-addon2'>peso del criterio</span>
</div>
<input class='form-control' style='width:50px' type='number' name='peso_criterio'  aria-describedby='basic-addon2'>
</div>


				<!--<input type='number' name='promedio_criterios' placeholder='promedio'>-->
				<input class='botton' type='submit' value='+'>
	</p>
	</form>";

	  for ($cr = 0; $cr < sizeof($criterios); $cr++)
	  {
	  $id_criterio = $criterios[$cr]["id_criterio"];
	$sql = "SELECT * FROM nota WHERE id_criterio like '$id_criterio' ";
	$notas = get($conn,$sql);
	echo "
	<div class = 'corte5' style = ' width: 80%'>
		<div class='corte3'>
			<h4 >" . $criterios[$cr]["nombre_criterio"]." ". $criterios[$cr]["peso_criterio"] ."% </h4>
			<form action='add.php' method='POST'>
				<p>
					<div class='input-group mb-3'>
						<div class='input-group-prepend'
							<span class='input-group-text' id='basic-addon1'>Nombre nueva nota</span>
						</div>
						<input hidden type='text' name='clase' value='nota'>
						<input hidden type='numeric' name='id_criterio' value='$id_criterio'>

						<input class= 'form-control'  type='text' name='nombre_nota' aria-describedby='basic-addon1'>

						<div class='input-group-prepend'
							<span class='input-group-text' id='basic-addon1'>peso nota</span>
						</div>
						<input class= 'form-control' type='number' name='peso_nota' aria-describedby='basic-addon1'>

						<div class='input-group-prepend'
						<span class='input-group-text' id='basic-addon1'>valor nota</span>
						</div>

						<input class= 'form-control' type='number' name='valor_nota' aria-describedby='basic-addon1'>
					</div>
					<input type='submit' value='+' class='botton'>
				</p>
			</form>
		</div>
	<div class='corte4'> ";
	for ($n = 0; $n < sizeof($notas); $n++)
	{
	  echo "<div class = 'corte2' style = ' width: 80%'>
	  <p >" . $notas[$n]["nombre_nota"]
	  . "  <b>"
	  . $notas[$n]["peso_nota"]
	  . "</b>%  "
	  . $notas[$n]["valor_nota"]
	  . "  "
	  . "</p>
	  </div><br>";
	}
echo "</div> ";
	  echo "</div> <br><br>";
	  }

	 echo "</div><br><br>";
	}
	echo "</div> ";
	?>
	<br>
	<br>
	</div>
	<?php
		mysqli_close($conn);
?>
