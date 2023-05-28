<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Document</title>
 </head>
 <body>
 
    <?php
   
    require_once("dbConnection.php");
    // $name=$description="";
    $errorName=$errorDescription="";
    $projectId = $_GET['id'];
    // echo ($projectId); 
    $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = :id");
    $stmt->bindParam(':id', $projectId);
    $stmt->execute();
    $project = $stmt->fetch(PDO::FETCH_ASSOC);
    

if (isset($_POST['updateBtn'])) {

    
    $projectId = $_POST['id'];
    $nme = $_POST['name'];
    $status = ($_POST['status'] == 'active') ? "1" : "0";
    $description = $_POST['description'];
    //print_r($_POST);
    $stmt = $pdo->prepare("UPDATE categories SET name = :name,description=:description, status = :status WHERE id = :id");
    $stmt->bindParam(':name', $nme);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $projectId);
    $stmt->bindParam(':description', $description);
    $stmt->execute();
    header("Location: index.php");
    echo "update success";
    exit();
   
}

    ?>
    <div class="container">
        <div class="row">
            <div class="col-4 offset-md-3">
                 <h1>Edit Page</h1>
            <form  action="<?= $_SERVER['PHP_SELF']?>"   method="post">
            <input type="hidden" name="id" class="form-control"  value ="<?php echo $project['id']?>" aria-describedby="emailHelp">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="name" name="name" class="form-control"  value ="<?php echo $project['name']?>" aria-describedby="emailHelp">
                <small class="text-danger"><?php echo $errorName; ?></small>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <input type="text" name="description" class="form-control"  value ="<?php echo $project['description']?>">
                <small class="text-danger"><?php echo $errorDescription; ?></small>
              </div>
              <div class="mb-3">

                <label for="exampleInputPassword1"  class="form-label">Status</label>
                <div class="form-group">
                  <label for=""></label>
                  <select class="form-control" name="status" id="">
                 <option value="<?php echo $project['status']; ?>" selected>  <?php echo  $project['status']; ?> </option>
                 <option  name="status" value="active" >Active</option>
                    <option  name="status" value="inactive" >Inactive</option>
                 <!-- <?php foreach ($options as $option): ?>
                        <option value="<?php echo $option['status']; ?>" <?php if ($option['status'] == $project['status']) echo 'selected'; ?>>
                            <?php echo $option['status']; ?>
                        </option>
                    <?php endforeach; ?> -->
                  </select>
                
                 
                </div>
                <!-- <input type="text" name="status" class="form-control" id=""> -->
              </div>
              
              <button type="submit" class="btn btn-primary form-control" name="updateBtn">Update</button>
            </form>
          
            </div>

        </div>

    </div>
    
 </body>
 </html>