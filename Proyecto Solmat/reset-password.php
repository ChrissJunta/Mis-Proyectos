<?php

    session_start();
 
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
    {
        header("location: login.php");
        exit;
    }

    require_once "config.php";
 
    $new_password = $confirm_password = ""; 
    $new_password_err = $confirm_password_err = "";
 
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

    if(empty(trim($_POST["new_password"])))
    {
        $new_password_err = "Please enter the new password.";     
    } 
    elseif(strlen(trim($_POST["new_password"])) < 6)
    {
        $new_password_err = "La contraseña al menos debe tener 6 caracteres.";
    } else
    {
        $new_password = trim($_POST["new_password"]);
    }
    
    if(empty(trim($_POST["confirm_password"])))
    {
        $confirm_password_err = "Por favor confirme la contraseña.";
    } 
    else
    {
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($new_password_err) && ($new_password != $confirm_password))
        {
            $confirm_password_err = "Las contraseñas no coinciden.";
        }
    }

    if(empty($new_password_err) && empty($confirm_password_err))
    {
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql))
        {

            mysqli_stmt_bind_param($stmt, "si", $param_password, $param_id);
            
            $param_password = password_hash($new_password, PASSWORD_DEFAULT);
            $param_id = $_SESSION["id"];
            
            if(mysqli_stmt_execute($stmt))
            {
                session_destroy();
                header("location: login.php");
                exit();
            } 
            else
            {
                echo "Algo salió mal, por favor vuelva a intentarlo.";
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
<title>Administracion | Cambio de Contraseña</title>
<meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ 	width:100%;
	overflow:hidden }
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

    <div class="wrapper">
        <h2>Cambia tu contraseña aquí</h2>
        <p>Complete este formulario para restablecer su contraseña.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_password_err)) ? 'has-error' : ''; ?>">
                <label>Nueva contraseña</label>
                <input type="password" name="new_password" class="form-control"  style="width: 200px;" value="<?php echo $new_password; ?>">
                <span class="help-block"><?php echo $new_password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirmar contraseña</label>
                <input type="password" name="confirm_password"  style="width: 200px;" class="form-control">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Enviar">
                <a class="btn btn-link" href="login.php">Cancelar</a>
            </div>
        </form>
    </div>  
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