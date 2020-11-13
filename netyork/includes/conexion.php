<?php

$db = mysqli_connect("localhost", "root", "", "bd_prueba");

if(mysqli_connect_errno()){
    echo "la conexion ha fallado".mysqli_connect_error();
}else{
    echo "conexion realizada perfect";
}

mysqli_query($db, "SET NAMES 'utf8'");

//INICIAR LA SESION

 if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 


