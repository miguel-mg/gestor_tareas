<?php
    include("db.php");
    try{
        if(isset($_POST['id'])){
            $id = $_POST['id'];

            $stmt = $mysqli->prepare("DELETE FROM tasks WHERE id = ?");
            $stmt->bind_param('d', $id);
            if($stmt->execute()){
                echo '{"ok":"Tarea eliminada"}';
            }
            else{
                echo '{"error":"No se pudo eliminar la tarea"}';
            }
        }
        else{
            echo '{"error":"No se especificó la tarea"}';
        }
    }
    catch(Exception $e){
        echo '{"error":"Error in '.$e->getFile().', line '.$e->getLine().': '.$e->getMessage().'"}';
    }

?>