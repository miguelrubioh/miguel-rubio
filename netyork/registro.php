<?php



if (isset($_POST)){
    
    require_once 'includes/conexion.php';
    
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
   
    
    
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db,$_POST['nombre']) : false;
    $rut_empresa= isset($_POST['rut_empresa']) ? mysqli_real_escape_string($db,$_POST['rut_empresa']) : false;
    $Correo_Empresa = isset($_POST['Correo_Empresa']) ? mysqli_real_escape_string($db,trim($_POST['Correo_Empresa'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;
  
    
    // ARRAY DE ERRORES
     $errores = array();
   // validar datos antes de guardarlos en bd
    
    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true; 
    }else{
        $nombre_validado = false; 

        $errores['nombre'] = "el nombre no es valido";
    }
    
    if(!empty($rut_empresa) && !is_numeric($rut_empresa)){
        $rut_empresa_validado = true; 
    }else{
        $rut_empresa_validado = false; 

        $errores['rut_empresa'] = "el rut de la empresa no es valido";
    }
    
    if(!empty($Correo_Empresa) && filter_var($Correo_Empresa,FILTER_VALIDATE_EMAIL)){
        $Correo_Empresa_validado = true; 
    }else{
        $Correo_Empresa_validado = false; 

        $errores['Correo_Empresa'] = "el email no es valido";
    }
    
    if(!empty($password)){
        $password_validado = true; 
    }else{
        $password_validado = false; 

        $errores['password'] = "la contraseña esta vacia";
    }
    
    $guardar_usuario =false;
    if(count($errores)==0){
        $guardar_usuario=true;
        
        //cifrar contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
        
       /* var_dump($password);
        var_dump($password_segura);
        var_dump(password_verify($password, $password_segura));
        die();*/
        
        $sql = "INSERT INTO empresa VALUES('$rut_empresa','$password_segura', '$nombre' , null, null, null , '$Correo_Empresa', null, null, null);";
        $guardar = mysqli_query($db, $sql);
        
        var_dump(mysqli_error($db));
        die();
        
        
        
        
        if($guardar){
            
            $_SESSION['completado'] = "El registro fue un éxito";
        }else{
             $_SESSION['errores']['general'] = " Fallo del registro ";
        }
    }else{
        $_SESSION['errores'] = $errores;
    }
}
 cabecera('Location: index.php');
   


?>

