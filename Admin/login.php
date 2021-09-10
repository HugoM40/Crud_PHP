<?php
session_start();

if($_POST){
    if(($_POST['usuario']=="Hugo")&&($_POST['clave']=="sistema")){
        $_SESSION['usuario']="ok";
        $_SESSION['nombreUsuario']="Hugo";
        header('Location:inicio.php');

    }else{
        $mensaje="Error: El usuario o contraseña son incorrectos";
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
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
            </div>
            <div class="col-md-4">
                <br/><br/><br/>
                <div class="card">
                    <div class="card-header">
                        ACME S.A.
                    </div>
                    <?php if(isset($mensaje)) {?>
                    <div class="card-body">
                        <div class="alert alert-danger" role="alert">
                            <?php echo$mensaje; ?>
                        </div>
                        <?php } ?>
                        <form method="POST">
                            <div class="form-group">
                                <label>Usuario</label>
                                <input type="text" name="usuario" class="form-control" placeholder="Ingresa tu Usuario">
                            </div>
                            <div class="form-group">
                                <label>Contraseña:</label>
                                <input type="password" name="clave" class="form-control" placeholder="Ingresa tu Contraseña">
                            </div>
                            <button type="submit" class="btn btn-primary">Iniciar Sesion</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

