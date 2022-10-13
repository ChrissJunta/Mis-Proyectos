<?php

    session_start();
 
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
    {
        header("location: login.php");
        exit;
    }
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido al Sistema Administrativo</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body >
    <div class="page-header">
        <h1>Hola, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenido a nuestro sitio.</h1>
        
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Cambia tu contraseña</a>
        <a href="logout.php" class="btn btn-danger">Cierra la sesión</a>
        
    </p>


</body>
</html>