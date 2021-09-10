<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("location:../login.php");
}else{
    if($_SESSION['usuario']=="ok"){
        $nombreUsuario=$_SESSION["nombreUsuario"];
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

 <?php $url="http://".$_SERVER['HTTP_HOST']."/Crud_PHP"?>


<body>
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="#">Admin ACME S.A.<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/Admin/inicio.php">Inicio</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/Admin/seccion/Vehiculos.php">Vehículos</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>">Sitio Web</a>
            <a class="nav-item nav-link" href="<?php echo $url;?>/Admin/seccion/Cerrar.php">Cerrar sesión</a>
        </div>
    </nav>
    <div class="container">
        <br/>
        <div class="row">