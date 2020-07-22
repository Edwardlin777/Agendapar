<?php
$add_nombres=$_POST["nombres"];
$add_apellidos=$_POST["apellidos"];
$add_email=$_POST["email"];
$add_password=$_POST["password"];
$add_confirm_password=$_POST["confirm_password"];

//confirmar contraseña
if ($add_password==$add_confirm_password) {


  // Create connection
  $conn = mysqli_connect("localhost", "root", "", "agenda8");

  // Check connection
  if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
  }

  /*echo "Conxion exitosa a la base de datos cameo";
  echo "<br>";*/

  $sql = "INSERT INTO estudiante
    (id_estudiante,
    nombres,
    apellidos,
    email,
    password) VALUES

      ('',
      '$add_nombres',
      '$add_apellidos',
      '$add_email',
      '$add_password')";



  if (mysqli_query($conn, $sql)) {

        echo "Agenda creada con exito";
        header("location:login.html");

  } else {
        echo "Error: " . $sql . mysqli_error($conn);
        echo "<br>";
        echo "Error Mysql: " . mysqli_error($conn);
  }
  mysqli_close($conn);

  }else {

      header("location:login.html");

  }
?>
