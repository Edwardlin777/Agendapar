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
$carrera = get($conn,$sql)[0];
echo "<p> estas cursando la carrera <b>" . $carrera["carrera_cursada"] . "</b></p>";

$id_carrera = $carrera["id_carrera"];
$sql = "SELECT * FROM semestre WHERE id_carrera like '$id_carrera' ";
$semestre = get($conn,$sql)[0];

print_r("Semestre: " . $semestre["id_semestre"]);

$id_semestre = $semestre["id_semestre"];
$sql = "SELECT * FROM materia WHERE id_semestre like '$id_semestre' ";
$materias = get($conn,$sql);


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

//formato deseado
	/*
		$notas = [[["Activida no se que","30","30%"],[]],[["Activida introductoria","20","60%"],[]],[["Actividad leer 30 libros","40","10%"],[]]];
		$criterios = [[["Actividades","30","30%"],$notas],[["Evaluacion","20","60%"],$notas],[["Quiz","40","10%"],$notas]];
		$cortes = [
		[["Cortes primero","40","50%"],$criterios],
		[["Cortes segundo","40","50%"],$criterios]
		];
	*/
