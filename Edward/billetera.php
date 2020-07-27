<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="estilos_css/estiloBilletera.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="contenedor">
    <h1>Ingresa tu gasto diario</h1>

      <form action="" method="post">

      <b>Tus gastos basados en tu diario son:</b><br><br>


        <input type="number" min="0" name="gasto1" placeholder="gasto1" ><br><br>
        <input type="number" min="0" name="gasto2" placeholder="gasto2"><br><br>
        <input type="number" min="0" name="gasto3" placeholder="gasto3"><br><br>
        <input type="number" min="0" name="gasto4" placeholder="gasto4"><br><br>
        <input type="number" min="0" name="gasto5" placeholder="gasto5"><br><br>
        <input type="number" min="0" name="gasto6" placeholder="gasto6"><br><br>

        <input type="submit" name='calcular' value="Calcular" class="botton">

      </form>

      <?php

      if(isset($_POST['calcular'])){

        if (empty($_POST['gasto1'])) {
          $add_gasto1 = 0;
        }else{
        $add_gasto1 = $_POST['gasto1'];

        }if (empty($_POST['gasto2'])) {
          $add_gasto2 = 0;
        }else{
        $add_gasto2 = $_POST['gasto2'];

        }if (empty($_POST['gasto3'])) {
          $add_gasto3 = 0;
        }else{
        $add_gasto3 = $_POST['gasto3'];

        }if (empty($_POST['gasto4'])) {
          $add_gasto4 = 0;
        }else{
        $add_gasto4 = $_POST['gasto4'];

        }if (empty($_POST['gasto5'])) {
          $add_gasto5 = 0;
        }else{
        $add_gasto5 = $_POST['gasto5'];

        }if (empty($_POST['gasto6'])) {
          $add_gasto6 = 0;
        }else{
        $add_gasto6 = $_POST['gasto6'];

        }

        $diario = $add_gasto1 + $add_gasto2 + $add_gasto3 + $add_gasto4 + $add_gasto5 + $add_gasto6;

        $semanal = $diario * 7;
        $mesual = $diario * 30;
        $anual = $diario * 365;

        echo "<b><br>Tu diario: " . $diario . "</b>";
        echo "<b><br>Tu semanal: " . $semanal . "</b>";
        echo "<b><br>Tu mensual: " . $mesual . "</b>";
        echo "<b><br>Tu anual: " . $anual . "</b><br>";

      }

      ?>

      <br><b><a href="paginaPrincipal.php">Volver al inicio</a></b>

    </div>
  </body>
</html>
