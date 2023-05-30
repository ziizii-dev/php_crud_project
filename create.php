<?php 
   require_once("dbConnection.php");
   $name=$description="";
   $errorName=$errorDescription="";
 if(isset($_POST['addBtn'])){ 

  if( empty($_POST['name']) || empty($_POST['description'])  ){
    $errorName = "Please Fill Name Field!";
  }else{
    $name = testInput($_POST['name']);
  }
  if(empty($_POST['name']) || empty($_POST['description']) ){
    $errorDescription = "Please Fill Description Field!";
  }else{
   
  $description = testInput($_POST['description']);
  }
if($name == null  && $description == null){
      
}else{
  $status =testInput (($_POST['status'] == 'active') ? "1" : "0");
  $stmt = $pdo->prepare("INSERT INTO categories (name,description,status) VALUES (:name,:description,:status)");
  $stmt->bindParam(':name',$name);
  $stmt->bindParam(':description',$description);
  $stmt->bindParam(':status',$status);
  $stmt->execute();
// echo "create success";
}

  
  }; 
   
?>