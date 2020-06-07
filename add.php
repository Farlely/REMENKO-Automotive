<?php
require_once ('DakdragerDatabase.php');
require_once ('hearder.php');

if(isset($_POST['btn_submit'])) {
  $automerkcode = $_POST['AutomerkCode'];
  $automerk = $_POST['Automerk'];


  if(!empty($automerkcode)){
  try{
     $stmt = $conn->prepare("INSERT INTO Automerk (AutomerkCode,Automerk)
     Values(:AutomerkCode,:Automerk)");
     $stmt->execute(array('AutomerkCode'=>$automerkcode,':Automerk'=>$automerk));
    header('location:index.php');
  }catch(PDOException $ex){
     echo $ex->getMessage();
  }
  }else {
    echo "Input Automerk";
  }
}
?>

<h2>Add Automerk</h2>
<form action="" method="post">
<table cellpadding="5px">
  <tr>
    <td>AutomerkCode</td>
    <td><input type="text" name="AutomerkCode"></td>
  </tr>
  <tr>
    <td>Automerk</td>
    <td><input type="text" name="Automerk"></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" name="btn_submit" a href="index.php"></td>
  </tr>
</table>
</form>
