<?php

try {

  $base = new PDO("mysql:host=localhost; dbname=agenda7" , "root" , "");

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

      header("location:desplegable\pag_principal.html");


  }else{

      header("location:login.html");

  }



} catch (Exception $e) {

  die("Error: " . $e->getMessage());

}


?>
