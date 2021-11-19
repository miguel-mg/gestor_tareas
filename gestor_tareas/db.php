<?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    set_error_handler(function ($level, $message, $file = '', $line = 0)
    {
        throw new ErrorException($message, 0, $level, $file, $line);
    });

    try{
        $mysqli = new mysqli('localhost', 'root', '', 'gestor_tareas');

        if (mysqli_connect_errno()) {
            echo '{"error":"No se conectó a la bdd"}';
            exit();
        }
    }
    catch(Exception $e){
        echo '{"error":"No se conectó a la bdd"}';
        exit();
    }

?>