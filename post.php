<form method="POST">
  X <input name="X" type="text" size="25">
  Y <input name="Y" type="text" size="25">
  <input type="submit" value="Submit">
  <br>
  <?php
  echo $_POST["X"] + $_POST["Y"];  
  ?>
  <br>
</form> <br> 
  