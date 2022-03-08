<?php

if(isset($_GET['id'])){
include ('database.php');
$cliente = new Database();
$id = intval($_GET['id']);
$res = $cliente->delete($id);
if ($res) {
    header("location: listado_clientes.php");
}else {
    echo "Error al eliminar registro!";
}

}

?>