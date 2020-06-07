<?php
require_once ('DakdragerDatabase.php');
require_once ('hearder.php');

if(isset($_POST['btn_submit'])) {
  $bouwjaarCode = $_POST['BouwjaarCode'];
  $autobouwjaar = $_POST['Autobouwjaar'];
  $automodelCode = $_POST['AutomodelCode'];
  $dakdragercode = $_POST['DakdragerCode'];

  if(!empty($bouwjaarCode)){
  try{
     $stmt = $conn->prepare("INSERT INTO Bouwjaar (BouwjaarCode,Autobouwjaar,AutomodelCode,DakdragerCode)
     Values(:BouwjaarCode,:Autobouwjaar,:AutomodelCode,:DakdragerCode)");


     $stmt->execute(array('BouwjaarCode'=>$bouwjaarCode,'Autobouwjaar'=>$autobouwjaar,':AutomodelCode'=>$automodelCode,':DakdragerCode'=>$dakdragercode));
    header('location:indexAutobouwjaar.php');
  }catch(PDOException $ex){
     echo $ex->getMessage();
  }
  }else {
    echo "Input Autobouwjaar";
  }
}
?>
<br/><br/> <br/><br/><br/><br/>
<center>
  <h1>Autobouwjaar Toegevoegen</h1>
  <h6> </h6>
<form action="" method="post">
<table cellpadding="5px">
  <tr>
    <td>BouwjaarCode</td>
    <td><input type="text" name="BouwjaarCode"></td>
  </tr>
  <tr>
    <td>Autobouwjaar</td>
    <td><input type="text" name="Autobouwjaar"></td>
  </tr>
  <tr>
    <td>AutomodelCode</td>
    <td><input type="text" name="AutomodelCode"></td>
  </tr>
  <tr>
    <td>DakdragerCode</td>
    <td><input type="text" name="DakdragerCode"></td>
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
  <th type="date" id="start" name="trip-start"
       value="2018-07-22"
        ><h2>BouwjaarCode</h2></th>

  <th><h2>AutomodelCode</h2></th>
  <th><h2>DakdragerCode</h2></th>
  <th><h2>Action</h2></th>
  <th><h2>Autobouwjaar Toegevoegen</h2></th>

</tr>
</thead>
<tbody>
<?php
 $stmt = $conn->prepare("SELECT * FROM Bouwjaar ORDER BY BouwjaarCode");
 $stmt->execute();
 $results = $stmt->fetchALL();
 foreach ($results as $row) {
 ?>
<tr>

  <td><h3><?=$row['BouwjaarCode']?></h3></td>
  <td><h3><?=$row['Autobouwjaar']?></h3></td>
  <td><h3><?=$row['DakdragerCode']?></h3></td>
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
