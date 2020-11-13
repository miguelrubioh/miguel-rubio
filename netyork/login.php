<?php
//iniciar la sesios y con bd

require_once 'includes/conexion.php';
require_once 'includes/helpers.php';

if (isset($_POST)) {
    $Correo_Empresa = trim($_POST['Correo_Empresa']);
    $password = $_POST['password'];

//comprobar tabla emppreesa
    $sql = "SELECT * FROM empresa WHERE Correo_Empresa = '$Correo_Empresa'";
    $login = mysqli_query($db, $sql);

    if ($login && mysqli_num_rows($login) == 1) {
        $usuario = mysqli_fetch_assoc($login);
        // var_dump($usuario);
        //die();
        //comprobar contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
        $verify = password_verify($password, $password_segura);
        
        //var_dump($password);
        // var_dump($usuario['Contrasenha']);
         
        
        if ($verify){
            //utilizart sesion para guardar datos del usuario logueado
            $_SESSION['usuario'] = $usuario;
           
            if (isset($_SESSION['error_login'])){
                session_unset($_SESSION['error_login']);
                
            }
        } else {
            //error
            $_SESSION['error_login'] = "login incorrecto";
        }
    } else {
        $_SESSION['error_login'] = "login incorrecto";
    }
    
}
header('Location: index-user.php');
?>







//redirigir al index.php

