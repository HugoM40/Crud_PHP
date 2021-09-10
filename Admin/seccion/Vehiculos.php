<?php include("../template/cabecera.php"); ?>
<?php
$txtPlaca = (isset($_POST['txtPlaca'])) ? $_POST['txtPlaca'] : "";
$txtColor = (isset($_POST['txtColor'])) ? $_POST['txtColor'] : "";
$txtMarca = (isset($_POST['txtMarca'])) ? $_POST['txtMarca'] : "";
$txtTipos = (isset($_POST['txtTipos'])) ? $_POST['txtTipos'] : "";
$txtConductor = (isset($_POST['txtConductor'])) ? $_POST['txtConductor'] : "";
$txtPropietario = (isset($_POST['txtPropietario'])) ? $_POST['txtPropietario'] : "";
$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

include("../Config/db.php");

switch ($accion) {
    case "Agregar":
        $sentenciaSQL = $conexion->prepare("INSERT INTO vehiculos (Placa,Color,Marca,TipoVehículo,Conductor,Propietario) VALUES (:Placa,:Color,:Marca,:TipoVehiculo,:Conductor,:Propietario);");
        $sentenciaSQL->bindParam(':Placa', $txtPlaca);
        $sentenciaSQL->bindParam(':Color', $txtColor);
        $sentenciaSQL->bindParam(':Marca', $txtMarca);
        $sentenciaSQL->bindParam(':TipoVehiculo', $txtTipos);
        $sentenciaSQL->bindParam(':Conductor', $txtConductor);
        $sentenciaSQL->bindParam(':Propietario', $txtPropietario);
        $sentenciaSQL->execute();
        header("location:Vehiculos.php");

        break;
    case "Modificar":
        $sentenciaSQL = $conexion->prepare("UPDATE  vehiculos SET Color=:Color,Marca=:Marca,TipoVehículo=:TipoVehiculo,Conductor=:Conductor,Propietario=:Propietario  WHERE Placa=:Placa ");
        $sentenciaSQL->bindParam(':Placa', $txtPlaca);
        $sentenciaSQL->bindParam(':Color', $txtColor);
        $sentenciaSQL->bindParam(':Marca', $txtMarca);
        $sentenciaSQL->bindParam(':TipoVehiculo', $txtTipos);
        $sentenciaSQL->bindParam(':Conductor', $txtConductor);
        $sentenciaSQL->bindParam(':Propietario', $txtPropietario);
        $sentenciaSQL->execute();
        header("location:Vehiculos.php");

        break;
        
    case "Cancelar":
        header("location:Vehiculos.php");
        break;
    case "Seleccionar":
        $sentenciaSQL = $conexion->prepare("SELECT * FROM vehiculos WHERE Placa=:Placa");
        $sentenciaSQL->bindParam(':Placa', $txtPlaca);
        $sentenciaSQL->execute();
        $Vehiculo = $sentenciaSQL->fetch(PDO::FETCH_LAZY);
        $txtColor = $Vehiculo['Color'];
        $txtMarca = $Vehiculo['Marca'];
        $txtTipos = $Vehiculo['TipoVehículo'];
        $txtConductor = $Vehiculo['Conductor'];
        $txtPropietario = $Vehiculo['Propietario'];
        break;
    case "Borrar":
        $sentenciaSQL = $conexion->prepare("DELETE FROM vehiculos WHERE Placa=:Placa ");
        $sentenciaSQL->bindParam(':Placa', $txtPlaca);
        $sentenciaSQL->execute();
        header("location:Vehiculos.php");

        break;
}

$sentenciaSQL = $conexion->prepare("SELECT * FROM vehiculos");
$sentenciaSQL->execute();
$listaVehiculos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="col-md-5">
    <div class="card">
        <div class="card-header">
            Ingresar Datos del Vehículo
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="txtPlaca">Placa:</label>
                    <input type="text" required class="form-control" value="<?php echo $txtPlaca; ?>" name="txtPlaca" id="txtPlaca" placeholder="Ingresa la Placa del Vehículo">
                </div>
                <div class="form-group">
                    <label for="txtColor">Color:</label>
                    <input type="text" required class="form-control" value="<?php echo $txtColor; ?>" name="txtColor" id="txtColor" placeholder="Ingresa el Color del Vehículo">
                </div>
                <div class="form-group">
                    <label for="txtMarca">Marca:</label>
                    <input type="text" required class="form-control" value="<?php echo $txtMarca; ?>" name="txtMarca" id="txtMarca" placeholder="Ingresa la Marca del Vehículo">
                </div>
                <div class="form-group">
                    <label for="txtTipos">Tipo de Vehículo:</label>
                    <select name="txtTipos" class="form-control">
                        <option selected>Selecione...</option>
                        <?php
                        if ($txtTipos == 'Particular') {
                        ?>
                            <option selected>Particular</option>
                            <option>Publico</option>
                        <?php
                        } else if ($txtTipos == 'Publico') { ?>
                            <option>Particular</option>
                            <option selected>Publico</option>
                        <?php } else { ?>
                            <option>Particular</option>
                            <option>Publico</option>
                        <?php }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="txtConductor">Conductor:</label>
                    <input type="text" required class="form-control" value="<?php echo $txtConductor; ?>" name="txtConductor" id="txtConductor" placeholder="Ingresa el conductor del Vehículo">
                </div>
                <div class="form-group">
                    <label for="txtPropietario">Propietario:</label>
                    <input type="text" required class="form-control" value="<?php echo $txtPropietario; ?>" name="txtPropietario" id="txtPropietario" placeholder="Ingresa el propietario del Vehículo">
                </div>
                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion"<?php echo ($accion=="Seleccionar")?"disabled":""; ?> value="Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion"<?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion"<?php echo ($accion!="Seleccionar")?"disabled":""; ?> value="Cancelar" class="btn btn-danger">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Placa</th>
                <th>Color</th>
                <th>Marca</th>
                <th>Tipo de Vehículo</th>
                <th>Conductor</th>
                <th>Propietario</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listaVehiculos as $Vehiculo) { ?>
                <tr>
                    <td><?php echo $Vehiculo['Placa']; ?></td>
                    <td><?php echo $Vehiculo['Color']; ?></td>
                    <td><?php echo $Vehiculo['Marca']; ?></td>
                    <td><?php echo $Vehiculo['TipoVehículo']; ?></td>
                    <td><?php echo $Vehiculo['Conductor']; ?></td>
                    <td><?php echo $Vehiculo['Propietario']; ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="txtPlaca" id="txtPlaca" value="<?php echo $Vehiculo['Placa']; ?>" />
                            <input type="submit" name="accion" value="Seleccionar" class="btn btn-warning" />
                            <input type="submit" name="accion" value="Borrar" class="btn btn-danger" />
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php include("../template/pie.php"); ?>