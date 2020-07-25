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
session_start();
$add_numero_documento=$_SESSION["id_estudiante"];

//confirmar contrase�a



  // Create connection
  $conn = mysqli_connect("localhost", "root", "", "agenda8");

  // Check connection
  if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM estudiante WHERE id_estudiante like '$add_numero_documento' ";
$usuario = get($conn,$sql)[0];
echo "
	<head>
	<link rel='stylesheet' href='style2.css' />
	</head>
	";
?>
<div class="descripcion">
<?php echo "<h1>Hi ". $usuario['nombres'] ." ". $usuario['apellidos']."</h1>";

$sql = "SELECT * FROM carrera WHERE id_estudiante like '$add_numero_documento' ";
$ans = get($conn,$sql);
$carrera=0;
if(count ($ans) != 0)
  $carrera = $ans[0];
else{
  echo "carrera soy";
  header("location:../agregarCarrera/agregarCarrera.html");
  die();
}
echo "<p> Estas cursando la carrera <b>" . $carrera["carrera_cursada"] . "</b></p>";

$id_carrera = $carrera["id_carrera"];
$sql = "SELECT * FROM semestre WHERE id_carrera like '$id_carrera' ";

$ans = get($conn,$sql);
$semestre=0;
if(count ($ans) != 0)
  $semestre = $ans[0];
else{
  echo "tu semestre";
  header("location:../agregarSemestre/agregarSemestre.html");
  die();
}

print_r("Semestre: " . $semestre["id_semestre"]);

$id_semestre = $semestre["id_semestre"];
$sql = "SELECT * FROM materia WHERE id_semestre like '$id_semestre' ";

$ans = get($conn,$sql);
$materias=0;
if(count ($ans) != 0)
  $materias = $ans;
else{

  header("location:../agregarMateria/agregarMateria.html");
  die();
}


echo "<br><br>" . "<h3> Tus materias: </h3>";
for ($x = 0; $x < sizeof($materias); $x++)
{
  $id_materia = $materias[$x]["id_materia"];
  ?>
  <div class="materia">
  <?php
  echo  $materias[$x]["nombre_materia"];
  ?>
  </div>
  <?php

  echo
  "<div class='boton'><form  action='codigomateria.php' method='POST'>

  <input class='boton2' type='submit' value='Ver'>

    <input class='textofantasma' type='text' name='id_materia' value='$id_materia'>



  </form></div><br>";
  /*echo "<div class='ver'>Ver</div>";*/
}
?>
</div>
<?php
mysqli_close($conn);
?>
