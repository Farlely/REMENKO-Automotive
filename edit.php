<?php
require_once ('DakdragerDatabase.php');
if(isset($_POST['btn_submit'])){
  $automerkcode = $_POST['AutomerkCode'];
   $automerk = $_POST['Automerk'];
   $automodelcode = $_POST['AutomodelCode'];

   if(!empty($automerkcode)){
     try{
      $stmt = $con->prepare("UPDATE Automerk set AutomerkCode= :automerkcode, Automerk= :automerk,
                       AutomodelCode = :automodelcode WHERE AutomerkCode = :id");
      $stmt->execute(array(':automerk' =>$automerk,':automodelcode' =>$automodelcode , 'id'=>$automerkcode));
     if($stmt){
       header('index.php');
     }
      header('Location:index.php');
     }catch(PDOException $ex){
        echo $ex->getMessage();
     }
   }else{
     echo "INPUT NAME";
   }


}
$automerkcode = 0;
$automerk = '';
$automodelcode= '';
if (isset($_GET['id'])){
     $id = $_GET['id'];

     $stmt = $con->prepare('SELECT * FROM Automerk WHERE AutomerkCode = :id');
     $stmt->execute(array(':id'=>$id));
     $row = $stmt->fetch();
     $automerkcode = $row['AutomerkCode'];
     $automerk = $row['Automerk'];
     $automodelcode = $row['AutomodelCode'];

}
 ?>
 <?php require 'hearder.php'; ?>
 <div class="container">
   <div class="card mt-5">
     <div class="card-header">
<h2>Edit Automerk</h2>
</div>
<div class="card-body">
<form action="" method="post">

  <div class="form-group">
  <label for="automerk">AutomerkCode</label>
  <td><input type="text" name="automerk" value="<?=$automerk;?>" class="form-control"></td>
</div>
<div class="form-group">
  <label for="AutomodelCode">AutomodelCode</label>
  <td><input type="nummer" name="automodelcode" value="<?=$automodelcode;?>" class="form-control"></td>
</div>
<div class="form-group">
  <td><input type="hidden" name="automerkcode" value="<?=$automerkcode;?>"></td>
</div>
<div class="form-group">

  <td><input type="submit" name="btn_submit" class="btn btn-info"></td>
</div>

</form>
</div>
</div>
</div>
