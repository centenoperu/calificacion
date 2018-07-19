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

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  
  <body class="text-center">
  <table class="table table-bordered">
	<tbody>
		<tr>
			<td>DEPENDENCIA: <?php echo $_SESSION['de_depe_mpub']  ;	  ?> </td>
			<td>  <?php    echo  $_SESSION['de_comision'] ;?> </td>
			</tr>
 
	</tbody>
</table>
  
   
    <form class="form-signin" action="ingresaid.php" method="post">
       <!--  <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> -->
      <h1 class="h3 mb-3 font-weight-normal">Ingrese sus Credenciales</h1>
      <label for="id_atencion" class="sr-only">ID ATENCION</label>
	   
	   <div class="card mb-4 box-shadow">
	   	   <div>
	  <input type="number" id="id_atencion" class="form-control" name="txtidatencion" placeholder="Codigo de Atención" required autofocus>
		</div>
		</div>
		
		<div class="card mb-4 box-shadow">
	  <div>
      <button class="btn btn-primary btn-sm" type="submit"  value="Ingresar"   >Validar Atención</button>
	  </div>
      </div>
    </form>
  </body>
</html>



<?php
	if(isset($_POST['txtidatencion'])) 
	{
		/*session_start();*/
		//variable de conexion: recibe dirección del host , usuario, contraseña y el nombre base de datos
		

		//$login = $mysqli->real_escape_string($_POST['txtlogin']);	
		//$pass = $mysqli->real_escape_string($_POST['txtpass']);
		
		$_SESSION['id_atencion'] = $_POST['txtidatencion']; 
		
	/*	$resultado = $mysqli->query("SELECT * FROM usuario_app where ID_USUARIO_APP='$login' and password='$pass' and activo!=0");  */
		//$resultado = $mysqli->query("SELECT * FROM usuario_app where ID_USUARIO_APP='$login' and password='$pass' ");  
		//$valida=$resultado->num_rows;
		
		{
		
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=opcion_califica.php'>";
			
		}
		
	}
	
	
?>

		