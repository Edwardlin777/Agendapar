<?php

session_start();

echo 'Adios ' . $_SESSION['emailEstudiante'] . '<br><br>';

session_destroy();

echo "Su sesion a sido cerrada exitosamente";

echo "<br><br> <a href='login.html' class='link'>¿Desea loguearse de nuevo?</a>";

?>
