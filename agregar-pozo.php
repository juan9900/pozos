<?php 
include ('db.php');
$id = "";

$query = "INSERT INTO pozos (id) VALUES (?)";
$stmt= $conn->prepare($query);
$stmt->bind_param("s",$id);
if($stmt->execute()){
    $query = "SELECT id FROM pozos ORDER BY id DESC LIMIT 1";
    $stmt = $conn->prepare($query);
    if($stmt->execute()){
        $result = $stmt->get_result(); // get the mysqli result
        if(!mysqli_num_rows($result) == 0){
            
            $row = $result->fetch_array();
            $idUltimo = $row['id'];
            echo $idUltimo;
            $conn->close();
            exit();
        }else{
            echo false;
            $conn->close();
            exit();
        }
    }
}


?>