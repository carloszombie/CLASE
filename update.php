<?php  include ("header.php"); ?>
<?php 
    if(isset($_GET['id'])){
        $id = intval($_GET['id']);
    } else{
        header("location: index.php");
    }
?>
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="index.php">Clientes</a></li>
    <li class="breadcrumb-item active" aria-current="page">update clientes</li>
  </ol>
</nav>
<body>
<div class = "container">
    <br></br>
	<div class = "col-sm-8"><h2>Editar Cliente</h2></div>

    <?php
        include ("database.php");
        $clientes = new Database();

        if(isset($_POST) && !empty($_POST)){

            $nombres = $clientes->sanitize($_POST['nombres']);
            $apellidos = $clientes->sanitize($_POST['apellidos']);
            $telefono = $clientes->sanitize($_POST['telefono']);
            $direccion = $clientes->sanitize($_POST['direccion']);
            $correo_electronico = $clientes->sanitize($_POST['correo_electronico']);

            $id_cliente =intval($_POST['id_cliente']);

            $res = $clientes->update($nombres,$apellidos,$telefono,$direccion,$correo_electronico,$id_cliente);

            if ($res){
                $message = "Datos actualizado con éxito!!";
                $class = "alert alert-success";
            }
            else{
                $message = "Error en la actualizaciòn de los datos!!";
                $class = "alert alert-danger";
            }
            ?>
            <div class = "<?php echo $class; ?>"><?php echo $message; ?>
            </div>
            <?php
        }

            $datos_cliente=$clientes->single_record($id);

    ?>


	<div class = "row">
		<form method = "POST">
			<div class = "col-md-6">
            <placeholder>Ingrese su nombre</placeholder>
			<input type = "text" class = "form-control" name = "nombres" id = "nombres" required value ="<?php echo $datos_cliente->nombres; ?>">
            <input type = "hidden" class = "form-control" name = "id_cliente" id = "id_cliente" required value ="<?php echo $datos_cliente->id; ?>">
			</div>

			<div class = "col-md-6">
			<placeholder>Ingrese sus apellidos</placeholder>
			<input type = "text" class = "form-control" name = "apellidos" id = "apellidos" required value ="<?php echo $datos_cliente->apellidos; ?>">
			</div>

			<div class = "col-md-6">
			<placeholder>Ingrese su número de teléfono</placeholder>
			<input type = "number" class = "form-control" name = "telefono" id = "telefono" required value ="<?php echo $datos_cliente->telefono; ?>">
			</div>

			<div class = "col-md-6">
			<placeholder>Ingrese su dirección</placeholder>
			<textarea class = "form-control" name = "direccion" id = "direccion" required>
            <?php echo $datos_cliente->direccion; ?>
            </textarea>
			</div>

			<div class = "col-md-6">
			<placeholder>Ingrese su correo electrónico</placeholder>
			<input type = "email" class = "form-control" name = "correo_electronico" id = "correo_electronico" required value ="<?php echo $datos_cliente->correo_electronico; ?>">
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