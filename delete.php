<?php
 require_once ('DakdragerDatabase.php');
 if(isset($_GET['id'])){
   $id = $_GET['id'];
   try{
    $stmt = $con->prepare("DELETE FROM Automerk Where AutomerkCode=?");
    $stmt->execute(array($id));
    header('Location:index.php');
   } catch (PDOException $ex){

echo $ex->getMessage();
   }
 }
 ?>
