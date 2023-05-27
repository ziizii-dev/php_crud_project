
<?php
// var_dump($_GET['id']);

require_once("dbConnection.php");
$id =$_GET['id'];
 echo($id);
$stmt = $pdo->prepare("DELETE FROM categories WHERE id = :id");
// print_r($stmt);
$stmt->bindParam(':id', $id);
 $stmt->execute();
header("Location: index.php");
exit();
?>