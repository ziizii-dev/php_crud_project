<?php 
include("create.php");
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
            include("read.php");
            ?>
        </tbody>
    </table>
        </div>
        
      </div>
    </div>
    
  </div>
</body>

</html>