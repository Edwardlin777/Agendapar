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

$add_numero_documento=$_POST["numero_documento"];

//confirmar contraseña
if ($add_password==$add_confirm_password) {


  // Create connection
  $conn = mysqli_connect("localhost", "root", "", "agenda8");

  // Check connection
  if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
  }


$sql = "SELECT * FROM estudiante WHERE id_estudiante like '$add_numero_documento' ";
$usuario = get($conn,$sql)[0];
echo "<h1>Hi ". $usuario['nombre'] ." ". $usuario['apellido']."</h1>";

$sql = "SELECT * FROM carrera WHERE id_estudiante like '$add_numero_documento' ";
$carrera = get($conn,$sql)[0];
echo "<p> estas cursando la carrera <b>" . $carrera["nombre_carrera"] . "</b></p>";

$id_carrera = $carrera["id_carrera"];
$sql = "SELECT * FROM semestre WHERE id_carrera like '$id_carrera' ";
$semestre = get($conn,$sql);

$id_semestre = semestre["id_semestre"];
$sql = "SELECT * FROM materia WHERE id_semestre like '$id_carrera' ";
$materias = get($conn,$sql);


echo "<h2> estas son tus materias </h2>"
for ($x = 0; $x < sizeof($materias); $x++)
{
  echo "<h3>" . $materias[$d]["nombre_materia"] . "</h3> <button href = '' > ver </button>";
}
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