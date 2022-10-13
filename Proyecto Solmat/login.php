<?php

    session_start();
 

    if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
    {
        header("location: paciente.php");
        exit;
    }
 

    require_once "config.php";
 
    $username = $password = "";
    $username_err = $password_err = "";
 
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
 
        if(empty(trim($_POST["username"])))
        {
            $username_err = "Por favor ingrese su usuario.";
        } 
        else
        {
            $username = trim($_POST["username"]);
        }
    
    
        if(empty(trim($_POST["password"])))
        {
            $password_err = "Por favor ingrese su contraseña.";
        } 
        else    
        {
            $password = trim($_POST["password"]);
        }
 
        if(empty($username_err) && empty($password_err))
        {
        
            $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
            if($stmt = mysqli_prepare($link, $sql))
            {
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                $param_username = $username;
                if(mysqli_stmt_execute($stmt))
                {
                    mysqli_stmt_store_result($stmt);
                
                    if(mysqli_stmt_num_rows($stmt) == 1)
                    {                    
                        mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                        if(mysqli_stmt_fetch($stmt))
                        {
                            if(password_verify($password, $hashed_password))
                            {
                                session_start();
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["username"] = $username;                            

                                header("location: paciente.php");
                            } 
                            else
                            {
                                $password_err = "La contraseña que has ingresado no es válida.";
                            }
                        }
                    } 
                    else
                    {
                        $username_err = "No existe cuenta registrada con ese nombre de usuario.";
                    }
                } 
                else
                {
                    echo "Algo salió mal, por favor vuelve a intentarlo.";
                }
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($link);
    }
?>
 
 <!DOCTYPE html>
<html lang="en">
<head>
<title>Administracion | Ingreso Al Sistema</title>
<meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{	width:100%;
	overflow:hidden; }
    </style>
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script>
<script type="text/javascript" src="js/Molengo_400.font.js"></script>
<script type="text/javascript" src="js/Expletus_Sans_400.font.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<style type="text/css">.bg, .box2{behavior:url("js/PIE.htc");}</style>
<![endif]-->
</head>
<body id="page2">
<div class="body1">
  <div class="main">
    <!-- header -->
    <header>
      <div class="wrapper">
        <nav>
          <ul id="menu">
          <li><a href="index.html">INICIO</a></li>

        </ul>
      </div>
      <div class="wrapper">
        <h1><a href="index.html" id="logo">CENTRO ESPECIALIZADO PARA MEJORAR PROBLEMAS EN NIÑOS</a></h1>
      </div>
      <div id="slogan"> CENTRO ESPECIALIZADO<span>NUESTRA PRIORIDAD ES AYUDAR</span> </div>
    </header>

<section id="content">
    <center><div class="wrapper">
        <h2>Ingreso al sistema administrativo</h2>
        <p>Por favor, complete sus credenciales para iniciar sesión.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Usuario: </label>
               
                <input type="text" name="username" class="form-control" style="width: 200px;" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
               
            
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña: </label>
                <input type="password"  class="form-control"  style="width: 200px;" name="password" >
                <span class="help-block"><?php echo $password_err; ?></span>
           
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ingresar">
            
            </div>
            <p>¿No tienes una cuenta? <a href="register.php">Regístrate ahora</a>.</p>
        </form>
    </div>  
    <br>
    <br>
    <br>
    </center>
    </content> 
<footer>
      <div class="wrapper">
        <div class="pad1">
          <div class="pad_left1">
            <div class="wrapper">
              <article class="col_1">
                <h3>Ubicanos:</h3>
                <p class="col_address"><strong>Pais:<br>
                  Ciudad:<br>
                  Direccion:<br>
                  Email: samanthaacosta@gmail.com</strong></p>
                <p>Ecuador<br>
                  Ambato<br>
                  Calle San Sebastian y Pasaje Ceuta<br>
                </p>
              </article>
              
            </div>
            <div class="wrapper">
               <article class="col_4 pad_left2">Copyright &copy; <a href="#">Christian Junta</a> Todos los derechos Reservados<br>
                Diseñado por <a target="_blank" href="http://ambicionempresarial.com/"></a></article>
            </div>
          </div>
        </div>
      </div>
    </footer>  
</body>
</html>