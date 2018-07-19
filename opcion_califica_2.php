<?php session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/custom.css">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
  
    <table class="table table-bordered">
		<tbody>
			<tr>
			<td>DEPENDENCIA: 	<?php  echo $_SESSION['de_depe_mpub']  ;?> </td>
			<td>  			<?php echo  $_SESSION['de_comision']                   ;?> </td>
			</tr>
  
		</tbody>
	</table>
  
  
  
    <form class="form-signin" action="opcion_califica.php" method="post">
            <h2 class="h3 mb-3 font-weight-normal">CALIFIQUE SU ATENCION</h2>
     
	 
	 
	 <div class="btn-group">
	 
		<table style="width:100%">
		<tbody>
		<tr>
			<td><img src="img/muy_bueno.png" alt="Muy Bueno"> </td>   <td><img src="img/bueno.png" alt="Bueno"> </td>   <td><img src="img/malo.png" alt="malo"></td><td><img src="img/muy_malo.png" alt="Muy malo"> </td>
		</tr>
		<tr>
			<td><button  type="submit"  name="button_4"  class="btn btn-primary 	btn-lg "	value="4"  >MUY BUENO</button> </td>    <td><button type="submit"  name="button_3" class="btn btn-success	btn-lg" 	value="3"  >BUENO    </button></td>  <td><button type="submit"  name="button_2" class="btn btn-warning 	btn-lg" 	value="2"  >REGULAR  </button></td><td><button type="submit"  name="button_1" class="btn btn-danger 	btn-lg"  	value="1"  >MALO     </button></td>
			    
		</tr>
		</tbody>
		</table>
	
	 </div>
     <!--  <button class="btn btn-primary btn-sm" type="submit"  value="Ingresar"   >Validar Atención</button> -->
	 <!--
		<button  type="submit"  name="button_4" class="btn btn-primary 	btn-lg " 	value="4"  >MUY BUENO</button>
		<button type="submit"  name="button_3" class="btn btn-success	btn-lg" 	value="3"  >BUENO    </button>
		<button type="submit"  name="button_2" class="btn btn-warning 	btn-lg" 	value="2"  >REGULAR  </button>
		<button type="submit"  name="button_1" class="btn btn-danger 	btn-lg"  	value="1"  >MALO     </button>
		
		
		-->
		
		
		
		
		<!--<button type="button" class="btn btn-outline-dark">Dark</button>
		<button type="button" class="btn btn-outline-secondary">Secondary</button>
		<button type="button" class="btn btn-outline-info">Info</button>
		<button type="button" class="btn btn-outline-light">Light</button>
		-->
    <!--  <p class="mt-5 mb-3 text-muted">&copy; 2018</p>-->
    </form>
  </body>
</html>


<?php 
/*session_start();*/
$insert = 0 ;

   if (isset($_POST["button_4"]))
		{
				$_SESSION['opcion'] = $_POST["button_4"]; 
				$insert  = $_SESSION['opcion'];
			//echo $_POST["button_4"];
		}
	else
	{
		if (isset($_POST["button_3"]))
		{
				$_SESSION['opcion'] = $_POST["button_3"]; 
					$insert  = $_SESSION['opcion'];
			//echo $_POST["button_3"];
		}
		else
		{
			if (isset($_POST["button_2"]))
			{
					$_SESSION['opcion'] = $_POST["button_2"]; 
						$insert  = $_SESSION['opcion'];
				//echo $_POST["button_2"];
			}	
			else
			{
					if (isset($_POST["button_1"]))
			{
						$_SESSION['opcion'] = $_POST["button_1"]; 
							$insert  = $_SESSION['opcion'];
					//	echo $_POST["button_1"];
			}	
				
			}
			
			
		}
		
	}	
	
	
	
   /*if (isset($_SESSION['opcion'] ))*/
   	if ( $insert  > 0 ) 
   {
	   
	//session_start();
		//variable de conexion: recibe dirección del host , usuario, contraseña y el nombre base de datos
		/*$mysqli = new mysqli("localhost", "usu_atencion", "123456", "bd_atencion_usuario") or die ("Error de conexion porque: ".$mysqli->connect_errno);*/
		$mysqli = new mysqli("localhost", "id6512559_user", "fiscalia", "id6512559_bd_atencio_usuario") or die ("Error de conexion porque: ".$mysqli->connect_errno);
		// comprobar la conexión 
		if (mysqli_connect_errno()) 
		{
	    	printf("Falló la conexión: %s\n", mysqli_connect_error());
	   		exit();
		}
	
		$_anio				= date('Y');
		$_opcion			= $_SESSION['opcion'];
		$_id_depe_mpub 		= $_SESSION['id_depe_mpub'] ;
		$_id_comision		= $_SESSION['id_comision'] ;
		$_id_usuario_app	= $_SESSION['id_usuario_app'] ;
		$_id_atencion		= $_SESSION['id_atencion'] ;
		$_id_app 			= $_SESSION['id_app'] 	;
	
	
	$sql = "INSERT INTO ficha (
					
					id_depe_mpub,
					id_comision,
					id_usuario_app,
					id_app,
					ficha_valor,
				
					id_atencion,
					ficha_anio)
					VALUES(
					$_id_depe_mpub,
					$_id_comision ,
					'$_id_usuario_app' ,
					$_id_app 	,
					'$_opcion',
					
					$_id_atencion,
					$_anio
					)  ";
	
	if ($mysqli->query($sql)!== TRUE) 
	{
		echo "Error: " . $sql . "<br>" . $mysqli->error;
    ///echo "New record created successfully";
} 

else {
   echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=finaliza.php'>";
}

$mysqli->close();
	
   }
	
		
?>

