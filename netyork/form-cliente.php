
<?php require_once 'includes/cabecera-2.php'; ?>

<?php require_once 'includes/register-cliente.php'; ?>
<!DOCTYPE html>
    <div>
        <form action="register-cliente.php" method="POST">
            <h1> Agrega Clientes </h1>   
           <input type="email" name="Correo_Cliente"  placeholder="Correo Cliente">
            <input type="text" name="Nombre" placeholder="Nombre Cliente">
            <input type="number" name="Telefono" placeholder="Telefono(+569)">
            <input type="text" name="Region" placeholder="Region">
            <input type="text" name="Empresa" placeholder="Nombre Empresa">
            <input type="date" name="Ultima_Compra" placeholder="Fecha Ultima Compra">
            <input type="email" name="Correo_Vendedor" placeholder="Correo Vendedor">
            
            
            <input type="submit" name="agregar-cliente">
        </form>
    </div> 

 <?php 
    
 ?>
<table border="2">
    <tr>    
        <td>Correo Cliente</td>
        <td>Nombre Cliente</td>
        <td>Telefono</td>
        <td>Region</td>
        <td>Empresa</td>
        <td>Ultima Comprar</td>
        <td>Correo Vendedor</td>
        <td>Rut Empresa</td>
        
    </tr>

    <?php
    $sql = "SELECT * FROM cliente";
    $result = mysqli_query($db, $sql);
    
   
    while($mostrar = mysqli_fetch_array($result)){
        ?>
        <tr>    
            <td><?php echo $mostrar['Correo_Cliente']?></td>
            <td><?php echo $mostrar['Nombre']?></td>
            <td><?php echo $mostrar['Telefono']?></td>
            <td><?php echo $mostrar['Region']?></td>
            <td><?php echo $mostrar['Empresa']?></td>
            <td><?php echo $mostrar['Ultima_Compra']?></td>
            <td><?php echo $mostrar['Correo_Vendedor']?></td>
            <td><?php echo $mostrar['RUT_Empresa']?></td>
            
            <td><a href="modif_prod.php?ID_Venta=$mostrar['ID_Venta']"><button type='button' class='btn btn-succes'>Modificar</button></a></td>
            <td><a href="elim_prod.php?ID_Venta=$mostrar['ID_Venta']"><button type='button' class='btn btn-succes'>Eliminar</button></a></td>
            
            
        </tr>
    <?php
    }
    ?>
</table>


<?php require_once 'includes/footer.php'; ?>

