<?php
// file: delete.php
require("conexion.php");
require("funciones.php");
 
$idempresa = getParam($_GET["id"], "-1");
$action = getParam($_GET["action"], "");
 
if ($action == "del") {
    $sql = "DELETE FROM empresa WHERE id = ".sqlValue($idempresa, "int");
    mysql_query($sql, $conexion);
    header("location: listado.php");
}
?>