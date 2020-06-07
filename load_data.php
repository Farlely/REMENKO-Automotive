<?php
 //load_data.php
 $connect = mysqli_connect("localhost", "root", "root", "RemenkoAutomotive");
 $output = '';
 if(isset($_POST["AutomerkCode"]))
 {
      if($_POST["AutomerkCode"] != '')
      {
           $sql = "SELECT * FROM Automodel WHERE AutomerkCode = '".$_POST["AutomerkCode"]."'";
      }
      else
      {
           $sql = "SELECT * FROM Automodel";
      }
      $result = mysqli_query($connect, $sql);
      while($row = mysqli_fetch_array($result))
      {

           $output .= '<button onclick="loadDoc()">'.$row["Automodel"].'</button>';

      }
      echo $output;
 }
 ?>
