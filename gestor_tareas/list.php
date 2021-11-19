<?php
    include("db.php");

    $query = "SELECT t1.id AS id, t1.title as tit, (
                SELECT GROUP_CONCAT(t2.name)
                FROM categories t2
                WHERE t2.id IN (
                    SELECT t3.idCat
                    FROM cat_task t3
                    WHERE t3.idTask = t1.id)
                ) AS cate
            FROM tasks t1
            ORDER BY t1.id";

    $stmt = $mysqli->prepare($query);
    $stmt->bind_result($id,$tit,$cate);
    if($stmt->execute()){
        $rows = array();
        $n=0;
        while($r = $stmt->fetch()){
            $rows[$n]['id'] = $id;
            $rows[$n]['cate'] = $cate;
            $rows[$n]['tit'] = $tit;
            $n+=1;
        }
        echo json_encode($rows);
    }
    else{
        echo '{"error":"No se pudo obtener las tareas"}';
    }
?>