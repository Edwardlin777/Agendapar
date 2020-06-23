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
	  $r = []
	  if (mysqli_num_rows($result) > 0) {
		  while($row = mysqli_fetch_assoc($result)) {
		   array_push($r,$row)
		  }
		  return $r;

	  } else {
			return [];
	  }
	}

$id_materia=$_POST["id_materia"];

//confirmar contraseña
if ($add_password==$add_confirm_password) {


  // Create connection
  $conn = mysqli_connect("localhost", "root", "", "agenda8");

  // Check connection
  if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
  }


$sql = "SELECT * FROM materia WHERE id_materia like '$id_materia' ";
$materia = get($conn,$sql)[0];
echo "<h1>estas viendo la materia " . $materia['nombre_materia'] . "</h1>";

$sql = "SELECT * FROM corte WHERE id_materia like '$id_materia' ";
$cortes = get($conn,$sql);

for ($c = 0; $c < sizeof($cortes); $x++)
{
  echo "<h3 class = 'separar'>" . $cortes[$c]["nombre_corte"] . "</h3> ";

  $id_corte = $cortes[$c]["id_corte"]
  $sql = "SELECT * FROM criterio WHERE id_corte like '$id_corte' ";
  $criterios = get($conn,$sql);
  for ($cr = 0; $cr < sizeof($criterios); $x++)
	{
	  echo "<h4 class = 'separar' >" . $criterios[$cr]["nombre_criterio"] . "</h4>";

	  $id_criterio = $cortes[$c]["id_criterio"]
	  $sql = "SELECT * FROM nota WHERE id_criterio like '$id_criterio' ";
	  $notas = get($conn,$sql);
	  for ($n = 0; $n < sizeof($notas); $x++)
		{
		  echo "<p class = 'separar' >" . $notas[$n]["nombre_nota"] . "</p>";
		}
	  echo "<button href = '' > + </button>";
	}
  echo "<button href = '' > + </button>";
}
echo "<button href = '' > + </button>";
mysqli_close($conn);
}
//formato deseado
	/*
		$notas = [[["Activida no se que","30","30%"],[]],[["Activida introductoria","20","60%"],[]],[["Actividad leer 30 libros","40","10%"],[]]];
		$criterios = [[["Actividades","30","30%"],$notas],[["Evaluacion","20","60%"],$notas],[["Quiz","40","10%"],$notas]];
		$cortes = [
		[["Cortes primero","40","50%"],$criterios],
		[["Cortes segundo","40","50%"],$criterios]
		];
	*/
?>