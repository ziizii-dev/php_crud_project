<?php
   
    require_once("dbConnection.php");
    // $name=$description="";
    $errorName=$errorDescription="";
    // $projectId = $_GET['id'];
  // echo ($projectId); 
    $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = :id");
    $stmt->bindParam(':id', $_GET['id']);
    // echo ($projectId); 
    $stmt->execute();
    $project = $stmt->fetch(PDO::FETCH_ASSOC);
    $name=$description="";
    $errorName=$errorDescription="";
if (isset($_POST['updateBtn'])) {
  if( empty($_POST['name'])){
    $errorName = "Please Fill Name Field!";
  }else{
    $name = testInput($_POST['name']);
  }
  if(empty($_POST['description']) ){
    $errorDescription = "Please Fill Description Field!";
  }else{
   
  $description = testInput($_POST['description']);
  }

  if($name && $description){
    $projectId = $_POST['id'];
    echo $projectId;
    $name = $_POST['name']; 
    $description = $_POST['description'];
    $status =testInput (($_POST['status'] == 'active') ? 1 : 0);
    $stmt = $pdo->prepare("UPDATE categories SET name = :name,description=:description, status = :status WHERE id = :id");

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':status', $status);
     $stmt->bindParam(':id', $projectId);
    $stmt->bindParam(':description', $description);
    $stmt->execute();
    print_r($stmt);
     header("Location: index.php");
    echo "update success";
    exit();
  }   
}

    ?>