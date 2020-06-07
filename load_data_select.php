<?php
 //load_data_select.php
 $connect = mysqli_connect("localhost", "root", "root", "RemenkoAutomotive");
 function fill_brand($connect)
 {
      $output = '';
      $sql = "SELECT * FROM Automerk";
      $result = mysqli_query($connect, $sql);
      while($row = mysqli_fetch_array($result))
      {
           $output .= '<option value="'.$row["AutomerkCode"].'">'.$row["Automerk"].'</option>';
      }
      return $output;
 }
 function fill_product($connect)
 {
      $output = '';
      $sql = "SELECT * FROM Automodel";
      $result = mysqli_query($connect, $sql);
      while($row = mysqli_fetch_array($result))
      {

           $output .= '<button onclick="myFunction()">'.$row["Automodel"].'</button>';

      }
      return $output;
 }
 ?>
 <!DOCTYPE html>
 <html>
      <head>
           <title>Select je Automodel</title>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" type="text/css" href="style.css">
      </head>
      <body>
           <br /><br />
           <div class="container">
                <h3>
                     <select name="brand" id="brand">
                          <option value="">Kies je automerk</option>
                          <?php echo fill_brand($connect); ?>
                     </select>
                     <br /><br />
                     <div class="row" id="show_product">
                          <?php echo fill_product($connect);?>

                     </div>

                </h3>
           </div>
      </body>
 </html>
 <script>
 $(document).ready(function(){
      $('#brand').change(function(){
           var AutomerkCode = $(this).val();
           $.ajax({
                url:"load_data.php",
                method:"POST",
                data:{AutomerkCode:AutomerkCode},
                success:function(data){
                     $('#show_product').html(data);
                }
           });
      });
 });
 </script>
 <script>
function loadDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "ajax_info.txt", true);
  xhttp.send();
}
</script>
