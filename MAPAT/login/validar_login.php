<?php

try {

  $base = new PDO("mysql:host=localhost; dbname=agenda8" , "root" , "");

  $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT * FROM estudiante where email= :email and password= :password";

  $resultado = $base->prepare($sql);

  $email = htmlentities(addslashes($_POST['email']));

  $password = htmlentities(addslashes($_POST['password']));

  $resultado->bindValue(":email", $email);

  $resultado->bindValue(":password", $password);

  $resultado->execute();

  $numero_registro = $resultado->rowCount();

  if($numero_registro!=0){

      session_start();
      $add_email=$_POST["email"];


      // Create connection
      $conn = mysqli_connect("localhost", "root", "", "agenda8");
      $cambiados = 0;

      // Check connection
      if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
      }

      echo "Connected successfully";
      echo "<br><br>";

      $sql = "SELECT * FROM estudiante WHERE email like '$add_email' ";

      $peticion = mysqli_query($conn, $sql);

      if ($peticion) {
            echo "Operacion completada";

            $cambiados = mysqli_affected_rows($conn);

              if ($cambiados > 0) {
                echo "<br><br>";

                while($row = $peticion->fetch_assoc()) {
                  echo "El id de " . $add_email . " es: " . $row["id_estudiante"];
                  $_SESSION['id_estudiante']=$row['id_estudiante'];
                    }
              }
                else
                  {
                    echo "<br><br>";
                    echo "Datos no encontrados";
                  }
      } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
      mysqli_close($conn);

      $_SESSION['emailEstudiante']=$_POST['email'];

      header("location:../paginaPrincipal.php");


  }else{

      header("location:login.html");

  }



} catch (Exception $e) {

  die("Error: " . $e->getMessage());

}
?>
