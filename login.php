<?php session_start();?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
    <!-- Custom styles for this template -->
  <!--   <link href="signin.css" rel="stylesheet">-->
		
  </head>

  <body class="text-center">
  <br>
    <form class="form-signin" action="login.php" method="post">
      <h1 class="h3 mb-3 font-weight-normal txt  ">Ingrese sus Credenciales</h1>
	  <br>
      <label for="usu" class="sr-only">Usuario</label>
	  <input type="text" id="usu" class="form-control txt " name="txtlogin" placeholder="Usuario" required autofocus>
	  <!--<input class="form-control" id="usu" type="text" name="txtlogin" required="true">-->
      <label for="pass" class="sr-only">Password</label>
      <input type="password" id="pass" name="txtpass" class="form-control txt " placeholder="Password" required>
      <!--<div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>-->
	  <br>
      <button class="btn-primary  btn_2 txt" type="submit"  value="Ingresar"   >Ingresar</button>
         </form>
  </body>
</html>



<?php
	if(isset($_POST['txtpass'])) 
	{
		
		
	/*	session_start();*/
		//variable de conexion: recibe dirección del host , usuario, contraseña y el nombre base de datos
		/*
		$mysqli = new mysqli("localhost", "usu_atencion", "123456", "bd_atencion_usuario") or die ("Error de conexion porque: ".$mysqli->connect_errno);
		*/
		
		
		
		
		$mysqli = new mysqli("localhost", "id6512559_user", "fiscalia", "id6512559_bd_atencio_usuario") or die ("Error de conexion porque: ".$mysqli->connect_errno);
		
		
		// comprobar la conexión 
		if (mysqli_connect_errno()) 
		{
	    	printf("Falló la conexión: %s\n", mysqli_connect_error());
	   		exit();			
		}
		else
		{
			echo '<script language="javascript">';
			echo 'alert("Conexion Satisfactoria")';
			echo '</script>';	
		}

		$login = $mysqli->real_escape_string($_POST['txtlogin']);	
		$pass = $mysqli->real_escape_string($_POST['txtpass']);
		
	/*	$resultado = $mysqli->query("SELECT * FROM usuario_app where ID_USUARIO_APP='$login' and password='$pass' and activo!=0");  */
		/* $resultado = $mysqli->query("SELECT * FROM usuario_app where ID_USUARIO_APP='$login' and password='$pass' ");  */
		
		$resultado = $mysqli->query("SELECT u.id_usuario_app, u.password , ca.id_comision, ca.id_app, ca.id_depe_mpub ,
									c.de_comision, d.de_depe_mpub
									FROM usuario_app u , comision_usuario_app  ca , dependencia d , comision c
									where u.id_usuario_app 	= ca.id_usuario_app 	and 
									d.id_depe_mpub 			= ca.id_depe_mpub		and 
									c.id_comision 			= ca.id_comision  		and 
									c.id_depe_mpub 			= ca.id_depe_mpub 		and
									u.id_usuario_app='$login' 						and 
									u.password='$pass' ");  
		
		$valida=$resultado->num_rows;
			echo $valida ;
		
		if($valida != 0)
		{
			$datosUsu = $resultado->fetch_row();
			$_SESSION['id_usuario_app'] 	= $datosUsu[0];
			/*$_SESSION['password'] 		= $datosUsu[1];				*/
			$_SESSION['id_comision'] 		= $datosUsu[2];				
			$_SESSION['id_app'] 			= $datosUsu[3];		
			$_SESSION['id_depe_mpub'] 		= $datosUsu[4];
			$_SESSION['de_comision'] 		= $datosUsu[5];				
			$_SESSION['de_depe_mpub'] 		= $datosUsu[6];		

			
			
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=ingresaid.php'>";
		}
		else
		{
			echo 	"<script> 
						var textnode = document.createTextNode('Usuario ó Password Incorrecto');
						document.getElementById('msg').appendChild(textnode);
					</script>";
					
		}	
	}
?>	