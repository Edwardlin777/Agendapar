<?php

  $conn = mysqli_connect("localhost", "root", "", "agenda8");
  if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
  }



$clase=$_POST["clase"];
echo $clase;
switch ($clase) {
  case 'nota':
  {
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
