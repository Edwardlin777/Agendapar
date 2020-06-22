<?php
  function format($p,$inserted) {
    	$r = [$p[0]];
        
        for ($x = 1; $x < sizeof($p); $x++)
        {
            array_push( $r, $inserted[$x-1], $p[$x] );//array_merge($r,$inserted[$x-1]);
        }
        return $r;
    }
    function show($pi,$pf,$contenido)
    {
        	echo implode(format($pi,$contenido[0]));
            for ($x = 0; $x < sizeof($contenido[1]); $x++)
        	{
             show($pi,$pf,$contenido[1][$x]); //aqui iria otro sql llamando el contenido correspondiente
        	}

            echo implode ($pf);
    }
	function get($conn,$sql,$atributos,$contenidos)
	{
	  $results = mysqli_query($conn, $sql);
	  if (mysqli_num_rows($result) > 0) {
		  $r = [[],[]] ;
		  while($row = mysqli_fetch_assoc($result)) {
		  for ($x = 0; $x < sizeof($atributos); $x++)
			{
				array_push( $r[0],$row[$atributos[$x]]);
			}
			for ($x = 0; $x < sizeof($contenidos); $x++)
			{
				array_push( $r[1],$row[$contenidos[$x]]);
			}
		   return $r;
		  }

	  } else {
			return [];
	  }
	}
    $plantillaInicial = [
    "<p><b>","</b> ","  ","</p>
                <div class='card'style = 'margin-left : 10px'>"
                ];
    $plantillaFinal = ["
                    <div><button type='button' class='btn btn-success'>+</button></div>
                </div>"
                ];
    //$plantilla = ["a:","b:","c:","d:","e:"];format($plantilla,[1,2,3,4]);
    $criterios = [[["Actividades","30","30%"],[]],[["Evaluacion","20","60%"],[]],[["Quiz","40","10%"],[]]];
    $cortes = [
    [["Cortes primero","40","50%"],$criterios],
    [["Cortes segundo","40","50%"],$criterios]
    ];
    show($plantillaInicial,$plantillaFinal,$cortes[0]);








//confirmar contraseña
if ($add_password==$add_confirm_password) {


  // Create connection
  $conn = mysqli_connect("localhost", "root", "", "agenda7");

  // Check connection
  if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
  }


  $sql = "SELECT * FROM usuarios $nombreusuario";
  $atributos = ["nombre","apellido"];
  $sql = "SELECT * FROM materias";
  $atributos = ["nombre_materia","creditos_materia"];
  $contenidos = ["id_corte"];
  get($conn,$sql,$atributos,$contenidos);
  mysqli_close($conn);
}
?>