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
	<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css' integrity='sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T' crossorigin='anonymous'>
	</head>
	";
	echo "<h2>Cortes</h2>";
	echo "<form action='add.php' method='POST'>
	<p>
			<b>Añadir corte</b>
	  		<input hidden type='text' name='clase' value='corte'>
			<input hidden type='numeric' name='id_materia' value='$id_materia'>
	        <input type='text' name='nombre_corte' placeholder='Nombre corte'>
	        <input type='number' name='peso_corte' placeholder='peso'>
	  		<!--<input type='number' name='promedio_corte' placeholder='promedio'>-->


		   	<input type='submit' value='+'>
	</p>

	</form>

	";
	for ($c = 0; $c < sizeof($cortes); $c++)
	{
	 $id_corte = $cortes[$c]["id_corte"];
	 $sql = "SELECT * FROM criterio WHERE id_corte like '$id_corte' ";
	 $criterios = get($conn,$sql);
	 echo "<div class = 'separar card' style = ' width: 80%'>
	<h3>" . $cortes[$c]["nombre_corte"] . "</h3>
	<form action='add.php' method='POST'>
				<!--<input type='submit' name='id_corte' value='-'>-->

	</form>";
	 echo "<form action='add.php' method='POST'>
	<p>
				<b>Añadir criterio</b>
	  			<input hidden type='text' name='clase' value='criterio'>
				<input hidden type='numeric' name='id_corte' value='$id_corte'>
	  			<input type='text' name='nombre_criterio' placeholder='Nombre nuevo criterio'>
	  			<input type='number' name='peso_criterio' placeholder='peso del criterio'>
				<!--<input type='number' name='promedio_criterios' placeholder='promedio'>-->
				<input type='submit' value='+'>
	</p>
	</form>";

	  for ($cr = 0; $cr < sizeof($criterios); $cr++)
	  {
	  $id_criterio = $criterios[$cr]["id_criterio"];
	$sql = "SELECT * FROM nota WHERE id_criterio like '$id_criterio' ";
	$notas = get($conn,$sql);
	echo "<div class = 'separar card' style = ' width: 80%'>";
	echo "<h4 >" . $criterios[$cr]["nombre_criterio"] . "</h4>";
	echo "<form action='add.php' method='POST'>
	<p>
					<b >Añadir notas</b>
	  				<input hidden type='text' name='clase' value='nota'>
					<input hidden type='numeric' name='id_criterio' value='$id_criterio'>

					<input type='text' name='nombre_nota' placeholder='Nombre nueva nota'>
	  				<input type='number' name='peso_nota' placeholder='peso nota'>
	  				<input type='number' name='valor_nota' placeholder='valor nota'>
					<input type='submit' value='+'>
	</p>
	</form>";

		for ($n = 0; $n < sizeof($notas); $n++)
	   {
		 echo "<div class = 'separar card' style = ' width: 80%'>
		 <p >" . $notas[$n]["nombre_nota"]
		 . "  <b>"
		 . $notas[$n]["peso_nota"]
		 . "</b>%  "
		 . $notas[$n]["valor_nota"]
		 . "  "
		 . "</p>
		 </div>";
	   }
	  echo "</div>";
	  }
	 echo "</div>";
	}
	echo "</div>";
	mysqli_close($conn);
	?>
