<?php  include ("header.php");
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Clientes</a></li>
    <li class="breadcrumb-item active" aria-current="page">Alta clientes</li>
  </ol>
</nav>
<body>
<div class = "container">
    <br></br>
	<div class = "col-sm-8"><h2>Agregar Cliente</h2></div>

    <?php
        include ("database.php");
        $clientes = new Database();

        if(isset($_POST) && !empty($_POST)){

            $nombres = $clientes->sanitize($_POST['nombres']);
            $apellidos = $clientes->sanitize($_POST['apellidos']);
            $telefono = $clientes->sanitize($_POST['telefono']);
            $direccion = $clientes->sanitize($_POST['direccion']);
            $correo_electronico = $clientes->sanitize($_POST['correo_electronico']);

            $res = $clientes->create($nombres,$apellidos,$telefono,$direccion,$correo_electronico);

            if ($res){
                $message = "Datos insertados con éxito!!";
                $class = "alert alert-success";
            }
            else{
                $message = "Error en la inserción de los datos!!";
                $class = "alert alert-danger";
            }
            ?>
            <div class = "<?php echo $class; ?>"><?php echo $message; ?>
            </div>
            <?php
        }
    ?>


	<div class = "row">
		<form method = "POST">
			<div class = "col-md-6">
            <placeholder>Ingrese su nombre</placeholder>
			<input type = "text" class = "form-control" name = "nombres" id = "nombres" required>
			</div>

			<div class = "col-md-6">
			<placeholder>Ingrese sus apellidos</placeholder>
			<input type = "text" class = "form-control" name = "apellidos" id = "apellidos" required>
			</div>

			<div class = "col-md-6">
			<placeholder>Ingrese su número de teléfono</placeholder>
			<input type = "number" class = "form-control" name = "telefono" id = "telefono" required>
			</div>

			<div class = "col-md-6">
			<placeholder>Ingrese su dirección</placeholder>
			<textarea class = "form-control" name = "direccion" id = "direccion" required></textarea>
			</div>

			<div class = "col-md-6">
			<placeholder>Ingrese su correo electrónico</placeholder>
			<input type = "email" class = "form-control" name = "correo_electronico" id = "correo_electronico" required>
			</div>

            <br></br>
            <div class = "col-md-12 pull-right">
                <button type = "submit" class = "btn btn-success"> Guardar Registro </button>
            </div>
		</form>

	</div>
	</div>
</body>

<?php  include ("footer.php");
?>