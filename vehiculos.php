<?php include("template/cabecera.php"); ?>
<?php include("Admin/Config/db.php");
$sentenciaSQL = $conexion->prepare("SELECT * FROM vehiculos");
$sentenciaSQL->execute();
$listaVehiculos = $sentenciaSQL->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach($listaVehiculos as $Vehiculo) {?>
<div class="col-md-3">
    <div class="card">
        <div class="card-body">
            <p class="card-title">Placa: <b> <?php echo $Vehiculo['Placa']; ?>  </b> </p>
            <p class="card-title">Color: <b><?php echo $Vehiculo['Color']; ?>  </b> </p>
            <p class="card-title">Marca: <b><?php echo $Vehiculo['Marca']; ?>  </b> </p>
            <p class="card-title">Tipo de Vehículo: <b><?php echo $Vehiculo['TipoVehículo']; ?> </b>  </p>
            <p class="card-title">Conductor: <b><?php echo $Vehiculo['Conductor']; ?> </b>  </p>
            <p class="card-title">Propietario:<b><?php echo $Vehiculo['Propietario']; ?> </b> </p>
            <a name="" id="" class="btn btn-primary" href="#" role="button"> Ver mas</a>
        </div>
    </div>
</div>
<?php } ?>


<?php include("template/pie.php"); ?>