<?php

include("includes/conexion.php");

if (isset($_POST['agregar-cliente'])){
    if (strlen($_POST['ID_Venta'])>= 1 && strlen($_POST['Correo_Cliente'])>= 1){
            /*$ID_Venta = trim($_POST['ID_Venta']);*/
            $Fecha = trim($_POST['Fecha']);
            $Monto = trim($_POST['Monto']);
            $Detalle = trim($_POST['Detalle']);
            $Correo_Cliente = trim($_POST['Correo_Cliente']);
            $Correo_Vendedor = trim($_POST['Correo_Vendedor']);
           
           
         /* <td><?php echo $mostrar['Correo_Cliente']?></td>
            <td><?php echo $mostrar['Nombre']?></td>
            <td><?php echo $mostrar['Telefono']?></td>
            <td><?php echo $mostrar['Region']?></td>
            <td><?php echo $mostrar['Empresa']?></td>
            <td><?php echo $mostrar['Ultima_Compra']?></td>
            <td><?php echo $mostrar['Correo_Vendedor']?></td>
            <td><?php echo $mostrar['RUT_Empresa']?></td>*/   
            
            $consulta = "INSERT INTO venta(ID_Venta,Fecha, Monto, Detalle, Correo_Cliente, Correo_Vendedor, RUT_Empresa); "
                    . "VALUES (select(ID_Venta  ),['$Fecha'],['$Monto'],['$Detalle'],['$Correo_Cliente'],['select(Correo_Vendedor)'],['select(RUT_Empresa)');";
            
            /*var_dump($consulta);
            die();*/
            
            $resultado = mysqli_query($db, $consulta);
            
            if($resultado){       
               ?> <h3 class="ok"> se agrego la venta correctamente</h3> <?php
            }else{
                 ?> <h3 class="error"> error no agregon venta </h3> <?php
            }
           
    }else{
         ?> <h3 class="error"> por favor agregar campos correctamente </h3> <?php
    }
}
 /*<div>
        <form method="POST">
            <h1> Agrega Las Ventas </h1>   
            <input type="text" name="ID_venta"  placeholder="Id">
            <input type="text" name="Fecha" placeholder="Fecha">
            <input type="text" name="Monto" placeholder="Monto">
            <input type="text" name="Detalle" placeholder="Detalle">
            <input type="text" name="Correo_Cliente" placeholder="Correo cliente">
            <input type="text" name="Correo_Vendedor" placeholder="Correo vendedor">
            <input type="text" name="RUT_Empresa" placeholder="Rut Empresa">
            <input type="submit" name="agregar-venta">
        </form>
    </div> */

?>

 