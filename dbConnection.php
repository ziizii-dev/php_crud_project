<?php
        //   $host = 'localhost';
        //   $dbname = 'php_course';
        //   $user = 'root';
        //   $password = 123456; 
        $host = 'localhost';
        $dbname = 'ziizii';
        $user = 'root';
        $password = "Hello*111#";
             try {
              $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
              $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
              // echo "connection success";
          } catch (PDOException $e) {
              echo "Connection failed: " . $e->getMessage();
              exit();
          }
          function testInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }          
    ?>
