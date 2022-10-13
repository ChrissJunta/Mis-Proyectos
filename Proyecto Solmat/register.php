<?php
    require_once "config.php";

    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {

        if(empty(trim($_POST["username"])))
        {
            $username_err = "Por favor ingrese un usuario.";
        } 
        else
        {
            $sql = "SELECT id FROM users WHERE username = ?";
        
            if($stmt = mysqli_prepare($link, $sql))
            {
                mysqli_stmt_bind_param($stmt, "s", $param_username);
                $param_username = trim($_POST["username"]);

                if(mysqli_stmt_execute($stmt))
                {
                    mysqli_stmt_store_result($stmt);
                
                    if(mysqli_stmt_num_rows($stmt) == 1)
                    {
                        $username_err = "Este usuario ya fue tomado.";
                    } 
                    else
                    {
                        $username = trim($_POST["username"]);
                    }
                } 
                else
                {
                    echo "Al parecer algo salió mal.";
                }
            }
            mysqli_stmt_close($stmt);
        }

        if(empty(trim($_POST["password"])))
        {
            $password_err = "Por favor ingresa una contraseña.";     
        }   
        else if(strlen(trim($_POST["password"])) < 6)
        {
            $password_err = "La contraseña al menos debe tener 6 caracteres.";
        } 
        else
        {
            $password = trim($_POST["password"]);
        }
        if(empty(trim($_POST["confirm_password"])))
        {
            $confirm_password_err = "Confirma tu contraseña.";     
        }    
        else
        {
            $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password))
        {
            $confirm_password_err = "No coincide la contraseña.";
        }
    }
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
    {

        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql))
        {
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 

            if(mysqli_stmt_execute($stmt))
            {
                header("location: login.php");
            } else
            {
                echo "Algo salió mal, por favor inténtalo de nuevo.";
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

<body>
    <div class="wrapper">
        <h2>Registro</h2>
        <p>Por favor ingresa tus datos para crear un nuevo usuario.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Usuario</label>
                <input type="text" name="username" class="form-control"  style="width: 200px;" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control"  style="width: 200px;" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirmar Contraseña</label>
                <input type="password" name="confirm_password" class="form-control"  style="width: 200px;" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Ingresar">
                <input type="reset" class="btn btn-default" value="Borrar">
            </div>
            <p>¿Ya tienes una cuenta? <a href="login.php">Ingresa aquí</a>.</p>
        </form>
    </div>    
</body>
</html>