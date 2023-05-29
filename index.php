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
echo "create success";
}

  
  }; 
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

</head>

<body>
  
    <!-- <a href="read.php">List Page</a> <br> <br> -->
   
    <div>
    <div class="container">
      <div class="row">
      
          <div class="col-4">
          <h1>PHP CRUD</h1>
            <div class="">
            <form action="<?= $_SERVER['PHP_SELF']?>"  method="post">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small class="text-danger"><?php echo $errorName; ?></small>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <input type="text" name="description" class="form-control" id="exampleInputPassword1">
                <small class="text-danger"><?php echo $errorDescription; ?></small>
              </div>
              <div class="mb-3">

                <label for="exampleInputPassword1"  class="form-label">Status</label>
                <div class="form-group">
                  <label for=""></label>
                  <select class="form-control" name="status" id="">
                  <!-- <option  name=""></option> -->
                    <option  name="status" value="active" >Active</option>
                    <option  name="status" value="inactive" >Inactive</option>

                  </select>
                  <!-- <small class="text-danger"><?php echo $errorStatus; ?></small> -->
                </div>
                <!-- <input type="text" name="status" class="form-control" id=""> -->
              </div>
              
              <button type="submit" class="btn btn-primary form-control" name="addBtn">Submit</button>
            </form>
          </div>
        </div>
        <div class="col mt-2">
        <h1>Categories Data Lists</h1>

        <table border= "1" class="table table-striped table-bordered">
        <thead>
              <tr>
                <th>Sr</th>
                <th>Name</th>
                <th>Description</th>
                <th>Status</th>
                <th>Created at</th>
                <th>Updated at</th>
                <th>Action</th>
              </tr>
        </thead>
        <tbody>
          

           <?php
           require_once("dbConnection.php");

           $stmt = $pdo->query("SELECT * FROM categories");
           $stmt->execute();
           $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
      
        //    foreach ($results as &$result) {
        //     if ($result['status'] === '1') {
        //         $result['status'] = 'active';
        //     }
        // }
        foreach ($results as $key=>$result) {
          $newKey = $key+1;
          echo "<tr>";
          echo  "<td>"."$newKey"."</td>";
          echo  "<td>".$result['name']."</td>";
          echo  "<td>".$result['description']."</td>";
          echo  "<td>".($result['status'] == 1 ? "active" : "inactive")."</td>";
          echo  "<td>".$result['created_at']."</td>";
          echo  "<td>".$result['updated_at']."</td>";
          echo "<td>";
          echo    "<a href='update.php? id=".$result['id']."'".">Update</a>";
          echo    "<a href='delete.php? id=".$result['id']."'".">Delete</a>";
          echo "</td>";
           echo  " </tr>";
      }
        
       
           ?>
        </tbody>
    </table>
        </div>
        
      </div>
    </div>
    
  </div>
</body>

</html>