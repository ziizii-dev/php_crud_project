<?php 
          require_once("dbConnection.php");
        if(isset($_POST['addBtn'])){
          $name = testInput($_POST['name']);
          $description = $_POST['description'];
          $status = ($_POST['status'] == 'active') ? "1" : "0";
          $stmt = $pdo->prepare("INSERT INTO categories (name,description,status) VALUES (:name,:description,:status)");
          $stmt->bindParam(':name',$name);
          $stmt->bindParam(':description',$description);
          $stmt->bindParam(':status',$status);
          $stmt->execute();
           header("Location: create.php");
          exit();
              
          };   
?>