<form method="GET">
  X <input name="X" type="text" size="25">
  Y <input name="Y" type="text" size="25">
  <input type="submit" value="Submit">
  <?php
  echo $_GET["X"] + $_GET["Y"];  
  ?>
</form> <br> 


