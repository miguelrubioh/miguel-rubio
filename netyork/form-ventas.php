<?php require_once 'includes/cabecera-2.php'; ?>


<!DOCTYPE html>
    <div>
        <form action="" method="POST">
            <h1> Agrega Las Ventas </h1>   
           <input type="number" name="ID_Venta"  placeholder="Id">
            <input type="date" name="Fecha" placeholder="Fecha">
            <input type="number" name="Monto" placeholder="Monto">
            <input type="text" name="Detalle" placeholder="Detalle">
            <input type="email" name="Correo_Cliente" placeholder="Correo cliente">
            <select name="Correo_Vendedor">
                 <option value="0">Correo Vendedor</option>
                <?php
                 
                $query = $db->query("SELECT * FROM vendedor");
                while ($valore = mysqli_fetch_array($query)) {
                    echo '<option value="' . $valore[RUT_Empresa]  . '">' .($valore[Correo_Vendedor])  . '</option>';
                }
                
                
        
        ?>
                 
            </select>
            <select name="RUT_Empresa">
                <option value="0">Rut Empresa</option>
                <?php
                $query = $db->query("SELECT * FROM empresa");
                while ($valores = mysqli_fetch_array($query)) {
                    echo '<option value="' . $valores[RUT_Empresa] . '">' . ($valores[RUT_Empresa]) . '</option>';
                }
                ?>
            </select>
            
            <input type="submit" name="agregar-venta">
           <?php require_once 'includes/register-venta.php'; ?>
        </form>
        
    </div> 

 
    
 
<table border="2">
    <tr>    
        <td>ID_Venta</td>
        <td>Fecha</td>
        <td>Monto</td>
        <td>Detalle</td>
        <td>Correo_Cliente</td>
        <td>Correo_Vendedor</td>
        <td>RUT_Empresa</td>
        
    </tr>

    <?php
    $sql = "SELECT * FROM venta";
    $result = mysqli_query($db, $sql);
    
    

    while($mostrar = mysqli_fetch_array($result)){
        ?>
        <tr>    
            <td><?php echo $mostrar['ID_Venta']?></td>
            <td><?php echo $mostrar['Fecha']?></td>
            <td><?php echo $mostrar['Monto']?></td>
            <td><?php echo $mostrar['Detalle']?></td>
            <td><?php echo $mostrar['Correo_Cliente']?></td>
            <td><?php echo $mostrar['Correo_Vendedor']?></td>
            <td><?php echo $mostrar['RUT_Empresa']?></td>
            <td><?php echo "<a href='modif_prod.php?ID_Venta=".$mostrar['ID_Venta']."'><button type='button' class='btn btn-succes'>Modificar</button></a>"?></td>
            <td><?php echo "<a href='elim_prod.php'><button type='button' class='btn btn-succes'>Eliminar</button></a>"?></td>
        


        </tr>
    <?php
    }
    ?>
</table>


<?php require_once 'includes/footer.php'; ?>
