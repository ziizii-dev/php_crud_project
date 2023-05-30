
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
          echo    "<a href='edit.php? id=".$result['id']."'".">Update</a>";
          echo    "<a href='delete.php? id=".$result['id']."'".">Delete</a>";
          echo "</td>";
           echo  " </tr>";
      }
        
       
           ?>