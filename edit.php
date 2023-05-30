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
  include("update.php");
  ?>
    <div class="container">
        <div class="row">
            <div class="col-4 offset-md-3">
                 <h1>Edit Page</h1>
            <form  action="<?= $_SERVER['PHP_SELF']?>"   method="post">
            <!-- <form    method="post"> -->
            <?php if (isset($project['id'])): ?>
                  <input type="hidden" name="id" class="form-control"  value ="<?php echo $project['id']?>" aria-describedby="emailHelp">
               <?php else: ?>
                <input type="hidden" name="id" class="form-control" value ="<?php echo $_POST['id']?>" aria-describedby="emailHelp">
               <?php endif; ?>
            <!-- <input type="hidden" name="id" class="form-control"  value ="<?php echo $project['id']?>" aria-describedby="emailHelp"> -->
            
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <!-- <input type="name" name="name" class="form-control"  value ="<?php echo $project['name']?>" aria-describedby="emailHelp"> -->
                <!-- <small class="text-danger"><?php echo $errorName; ?></small> -->
                <?php if (isset($project['name'])): ?>
                  <input type="name" name="name" class="form-control"  value ="<?php echo $project['name']?>" aria-describedby="emailHelp">
               <?php else: ?>
                <input type="name" name="name" class="form-control"  value ="<?php echo $_POST['name']?>" aria-describedby="emailHelp">
                <small class="text-danger"><?php echo $errorName; ?></small>
               <?php endif; ?>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Description</label>
                <!-- <input type="text" name="description" class="form-control"  value ="<?php echo $project['description']?>"> -->
                <!-- <small class="text-danger"><?php echo $errorDescription; ?></small> -->
                <?php if (isset($project['description'])): ?>
                  <input type="name" name="description" class="form-control"  value ="<?php echo $project['description']?>" aria-describedby="emailHelp">
               <?php else: ?>
                <input type="name" name="description" class="form-control"   value ="<?php echo $_POST['description']?>" aria-describedby="emailHelp">
                <small class="text-danger"><?php echo $errorDescription; ?></small>
               <?php endif; ?>
              </div>
              <div class="mb-3">

                <label for="exampleInputPassword1"  class="form-label">Status</label>
                <div class="form-group">
                  <label for=""></label>
                  <select class="form-control" name="status" id="">
                  <?php if (isset($project['status'])): ?>
                    <option value="<?php echo $project['status']; ?>" selected>  <?php echo  $project['status'] == 1 ?"Active":"Inactive"; ?> </option>
                    <option  name="status" value="active" >Active</option>
                    <option  name="status" value="inactive" >Inactive</option>
               <?php else: ?>
                <option  value ="<?php echo $_POST['status'] == 1 ? 'Active':"Inactive" ?>" selected><?php echo $_POST['status'] == 1 ? 'Active':"Inactive" ?> </option>
                    <option  name="status" value="active" >Active</option>
                    <option  name="status" value="inactive" >Inactive</option>
                
               <?php endif; ?>
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