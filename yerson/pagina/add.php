<?php
function get($conn,$sql)
  {
    $results = mysqli_query($conn, $sql);
    $r = [];

      while($row = mysqli_fetch_assoc($results)) {
       array_push($r,$row);
      }
      return $r;

  }
  $conn = mysqli_connect("localhost", "root", "", "agenda8");
  if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
  }



$clase=$_POST["clase"];
echo $clase;
switch ($clase) {
  case 'nota':
  {
    $id_criterio=$_POST["id_criterio"];
    $sql=
    "
    SELECT * FROM nota WHERE id_criterio like '$id_criterio' 
    ";
    $notas = get($conn,$sql);
    $total=0;
    for ($x = 0; $x < sizeof($notas); $x++)
    {
        $total+=$notas[$x]["peso_nota"];
    }
    if($total+$_POST["peso_nota"]>100)
    {
      echo "El porcentaje total es mayor que 100";
      break;
    }
$sql ="INSERT INTO nota
    (
    id_nota,
    id_criterio,
    nombre_nota,
    peso_nota,
    valor_nota)
    VALUES

      ('',
      '" . $_POST["id_criterio"] . "',
      '" . $_POST["nombre_nota"] . "',
      '" . $_POST["peso_nota"] . "',
      '" . $_POST["valor_nota"] . "'
)";
mysqli_query($conn, $sql);
break;
}

  case 'criterio':
  {
    $id_corte=$_POST["id_corte"];
    $sql=
    "
    SELECT * FROM criterio WHERE id_corte like '$id_corte' 
    ";
    $notas = get($conn,$sql);
    $total=0;
    for ($x = 0; $x < sizeof($notas); $x++)
    {
        $total+=$notas[$x]["peso_criterio"];
    }
    if($total+$_POST["peso_criterio"]>100)
    {
      echo "El porcentaje total es mayor que 100";
      break;
    }

$sql ="INSERT INTO criterio
    (
    id_criterio,
    id_corte,
    peso_criterio,
    promedio_criterios,
    nombre_criterio)
    VALUES

      ('',
      '".$_POST["id_corte"]."',
      '".$_POST["peso_criterio"]."',
      '',
      '".$_POST["nombre_criterio"]."'
)";
mysqli_query($conn, $sql);
break;
}

  case 'corte':
  {
$sql ="INSERT INTO corte
    (
    id_corte,
    id_materia,
    nombre_corte,
    promedio_corte
)
    VALUES

      ('',
     '".$_POST["id_materia"]."',
      '".$_POST["nombre_corte"]."',
      ''
)";
mysqli_query($conn, $sql);
    break;
	}

}
echo $sql . "<br>";
echo "agregado con exito";
?>
