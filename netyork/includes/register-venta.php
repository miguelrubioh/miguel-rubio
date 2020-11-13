<?php

require_once 'includes/conexion.php';


if(isset($_POST['agregar-venta'])){
    if (strlen($_POST['ID_Venta'])>= 1){
            $ID_Venta = trim($_POST['ID_Venta']);
            $Fecha = trim($_POST['Fecha']);
           
            $Monto = trim($_POST['Monto']);
            $Detalle = trim($_POST['Detalle']);
            $Correo_Cliente = trim($_POST['Correo_Cliente']);
            
            $Correo_Vendedor = trim($_POST['Correo_Vendedor']);
            
            $RUT_Empresa = trim($_POST['RUT_Empresa']); 
            

             
$consulta = "INSERT INTO
venta.ID_Venta, venta.Fecha, venta.Monto, venta.Detalle, cliente.Correo_Cliente, vendedor.Correo_Vendedor, e.RUT_Empresa) 
 VALUES(['$ID_Venta'],['$Fecha'],['$Monto'],['$Detalle'],['$Correo_Cliente'],['$Correo_Vendedor'],['$RUT_Empresa'])
FROM
venta
INNER JOIN cliente ON venta.Correo_cliente = cliente.Correo_Cliente
INNER JOIN vendedor ON cliente.Correo_Vendedor = vendedor.Correo_Vendedor
INNER JOIN empresa ON vendedor.RUT_Empresa= empresa.RUT_Empresa";   
            

/*$consulta = "INSERT INTO
venta.ID_Venta, venta.Fecha, venta.Monto, venta.Detalle, cliente.Correo_Cliente, vendedor.Correo_Vendedor, e.RUT_Empresa) 
 * VALUES(['$ID_Venta'],['$Fecha'],['$Monto'],['$Detalle'],['$Correo_Cliente'],['$Correo_Vendedor'],['$RUT_Empresa'])
FROM
venta
INNER JOIN cliente ON venta.RUT_Empresa = cliente.RUT_Empresa
INNER JOIN vendedor ON cliente.RUT_Empresa = vendedor.RUT_Empresa
INNER JOIN empresa ON vendedor.RUT_Empresa= empresa.RUT_Empresa";  */ 
            
           /* $consulta = "INSERT INTO venta(ID_Venta, Fecha, Monto, Detalle, Correo_Cliente, Correo_Vendedor, RUT_Empresa)"
                    . "VALUES (['$ID_Venta'],['$Fecha'],['$Monto'],['$Detalle'],['$Correo_Cliente'],['$Correo_Vendedor'],['$RUT_Empresa'])";
            
            */
          var_dump($consulta);
            $resultado = mysqli_query($db, $consulta);
            var_dump($resultado);
            die();
       
            if($resultado){       
               ?> <h3 class="ok"> se agrego la venta correctamente</h3> <?php
            }else{
                 ?> <h3 class="error"> error no agregon venta </h3> <?php
            }
           
    }else{
         ?> <h3 class="error"> por favor agregar campos correctamente </h3> <?php
    }
}


?>

 