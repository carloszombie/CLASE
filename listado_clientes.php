<?php include("header.php"); ?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
    <li class="breadcrumb-item active" aria-current="page">Listado de clientes</li>
  </ol>
</nav>
<div class = "container">
    <div class = "table-wrapper">
        <div class = "table-title">
            <div class = "row">
                <div class = "col-sm-8"><h2>Listado de Clientes</h2></div>

            </div>
        </div>
    </div>
</div>

<table class = "table table-striped table-bordered" id="clientes">
    <thead>
        <th>ID Registro</th>
        <th>Nombre Completo</th>
        <th>Teléfono</th>
        <th>Dirección</th>
        <th>Correo Electrónico</th>
        <th>Acciones</th>
    </thead>
    <tbody>

        <?php include ('database.php');
            $clientes = new Database();
            $listado = $clientes -> Listadoclientes();

            while ($row = mysqli_fetch_object($listado)){
                $id = $row -> id;
                $nombres = $row -> nombres." ".$row -> apellidos;
                $telefono = $row -> telefono;
                $direccion = $row -> direccion;
                $email = $row -> correo_electronico;
        ?>
        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $nombres; ?></td>
            <td><?php echo $telefono; ?></td>
            <td><?php echo $direccion; ?></td>
            <td><?php echo $email; ?></td>
            <td>
                <a href = "update.php?id=<?php echo $id; ?>" class = "edit btn btn-success" title = "Editar" data-toogle = "tooltip">Editar</a>
                <a href = "delete.php?id = <?php echo $id; ?>" class = "delete btn btn-danger" title = "Eliminar" data-toogle = "tooltip">Eliminar</a>
            </td>
        </tr>

        <?php } ?>

    </tbody>
</table>

<?php include("footer.php"); ?>