<?php
require_once ('DakdragerDatabase.php');
require_once ('hearder.php');

if(isset($_POST['btn_submit'])) {
  $automodelCode = $_POST['AutomodelCode'];
  $autoModel = $_POST['Automodel'];
  $automerkCode = $_POST['AutomerkCode'];


  if(!empty($automodelCode)){
  try{
     $stmt = $conn->prepare("INSERT INTO Automodel (AutomodelCode,Automodel,AutomerkCode)
     Values(:AutomodelCode,:Automodel,:AutomerkCode)");
     $stmt->execute(array('AutomodelCode'=>$automodelCode,'Automodel'=>$autoModel,':AutomerkCode'=>$automerkCode));
    header('location:indexAutomodel.php');
  }catch(PDOException $ex){
     echo $ex->getMessage();
  }
  }else {
    echo "Input Automodel";
  }
}
?>
<br/><br/> <br/><br/><br/><br/>
<center>
  <h1>Hallo Medewerker</h1>
  <h6> Automodel Toegevoegen</h6>
<form action="" method="post">
<table cellpadding="5px">
  <tr>
    <td>AutomodelCode</td>
    <td><input type="text" name="AutomodelCode"></td>
  </tr>
  <tr>
    <td>Automodel</td>
    <td><input type="text" name="Automodel"></td>
  </tr>
  <tr>
    <td>AutomerkCode</td>
    <td><input type="text" name="AutomerkCode"></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="submit" name="btn_submit" a href="indexAutomodel.php"></td>
  </tr>
</table>
</form>
<br/><br/> <br/><br/><br/><br/> <br/><br/><br/><br/> <br/><br/><br/><br/> <br/><br/>

<div class="">



<table class="table table-striped">

  <thead>
<tr>
  <th><h2>AutomodelCode</h2></th>
  <th><h2>Automodel</h2></th>
  <th><h2>AutomerkCode</h2></th>
  <th><h2>Action</h2></th>
  <th><h2>Autobouwjaar Toegevoegen</h2></th>

</tr>
</thead>
<tbody>
<?php
 $stmt = $conn->prepare("SELECT * FROM Automodel ORDER BY AutomodelCode");
 $stmt->execute();
 $results = $stmt->fetchALL();
 foreach ($results as $row) {
 ?>
<tr>

  <td><h3><?=$row['AutomodelCode']?></h3></td>
  <td><h3><?=$row['Automodel']?></h3></td>
  <td><h3><?=$row['AutomerkCode']?></h3></td>


  <td>
    <a href="edit.php?id=<?=$row['AutomerkCode'];?>" class="btn btn-info">Edit</a>
    <a href="#" class='btn btn-danger'>Delete</a>
  </td>

  <td>
  <button type="button" class="btn btn-warning"><a href="indexAutobouwjaar.php">Toegevoegd</a></button>
  </td>
</tr>

<?php
}
 ?>
</tbody>
</table>
</div>
</center>
<br/><br/> <br/><br/>
<h1><a href=" load_data_select.php"> Voor klanten </a></h1>
  </body>
</html>
