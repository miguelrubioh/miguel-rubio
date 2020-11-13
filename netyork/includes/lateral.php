




<!--barra lateral -->
<aside id="sidebar">
   
    
     <?php if(isset($_SESSION['usuario'])): ?>
        <div id="usuario-logueado" class="bloque">
            <h3>Bienvenido,<?=$_SESSION['usuario']['Correo_Empresa'];?></h3>
            
            
            <a href="cerrar.php" class="boton" >Cerrar Sesión </a>
            <a href="cerrar.php" class="boton" >Clientes </a>
            <a href="cerrar.php" class="boton" >Ventas </a>
            <a href="cerrar.php" class="boton" >Perfil </a>
             
        </div>
    <?php endif; ?>
    
    <div id="login" class="bloque">
        <h3> Logeate en netyork </h3>
        
        <?php if(isset($_SESSION['error_login'])): ?>
        <div class="alerta alerta-error">
            <?=$_SESSION['error_login'];?>
        </div>
        <?php endif; ?>
        
        
        <form action="login.php" method="POST">
            <label for="Correo_Empresa">Email</label>
            <input type="email" name="Correo_Empresa"/>

            <label for="password">Contraseña</label>
            <input type="text" name="password"/>

            <input type="submit" value="Entrar"/>
        </form>
    </div>

    <div id="register" class="bloque">
        <h3> Registrate </h3>
        <?php if(isset($_SESSION['completado'])): ?>
               <div class="alerta alerta-exito">
                   <?= $_SESSION['completado']?>  
                </div>
        <?php elseif(isset($_SESSION['errores']['general'])): ?>
                <div class="alerta alerta-exito">
                   <?= $_SESSION['errores']['general']?>  
                </div>
        
        <?php endif; ?>
        <form action="registro.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre'): '';?>

            <label for="rut_empresa">Rut empresa</label>
            <input type="text" name="rut_empresa"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'rut_empresa'): '';?>
            </br>

            <label for="Correo_Empresa">Email</label>
            <input type="email" name="Correo_Empresa"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'Correo_Empresa'): '';?>

            </br>

            <label for="password">Contraseña</label>
            <input type="password" name="password"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password'): '';?>

            <input type="submit" name="submit" value="Registrar"/>
        </form>
        <?php borrarError();?>
        
    </div>
</aside>          

