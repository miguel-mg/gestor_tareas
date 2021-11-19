<?php
    include("db.php");
    try{
        if(isset($_POST['tit'])){
            $tit = $_POST['tit'];
            if(isset($_POST['cat'])){
                $cat = $_POST['cat'];
            }
            $stmt = $mysqli->prepare("INSERT INTO tasks (title) VALUES(?)");
            $stmt->bind_param('s', $tit);
            // insert task
            if($stmt->execute()){
                if(isset($cat) && !is_null($cat)){ // has categories selected
                    $stmt->close();
                    $stmt = $mysqli->prepare("SELECT id FROM tasks WHERE tasks.title = ?");
                    $stmt->bind_param('s', $tit);
                    $result = $stmt->get_result();
                    $stmt->bind_result($task_id);
                    // get new task id
                    if($stmt->execute()){
                        if($r = $stmt->fetch()) {

                            // get categories ids
                            $stmt->close();
                            $stmt = $mysqli->prepare("SELECT categories.id,categories.name FROM categories");
                            $cat_ids = array();
                            if($stmt->execute()){
                                $stmt->bind_result($id,$name);
                                while($r = $stmt->fetch()){
                                     $cat_ids[$name] = $id;
                                }
                            }

                            // add categories for the task
                            foreach($cat as $cat_name){
                                if(array_key_exists($cat_name,$cat_ids)){
                                    $cat_id = $cat_ids[$cat_name];
                                    $stmt = $mysqli->prepare("INSERT INTO cat_task (idCat,idTask) VALUES($cat_id,$task_id)");
                                    $stmt->execute();
                                }
                            }
                            echo '{"ok":"Tarea añadida"}';
                        }
                    }
                }
                else{
                    echo '{"ok":"Tarea añadida sin categorias"}';
                }
            }
            else{
                echo '{"error":"No se pudo añadir la tarea, puede que ya exista"}';
            }

        }
        else{
            echo '{"error":"No se especificó la tarea"}';
        }

    }catch(Exception $e){
        echo '{"error":"Error in '.$e->getFile().', line '.$e->getLine().': '.$e->getMessage().'"}';
    }

?>