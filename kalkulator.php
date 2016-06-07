<form action="" method="GET">
<input type="text" name="x"/>
<select name="operacija">
  <option name="sabiranje" value="+">+</option>
  <option name="oduzimanje" value="-">-</option>
  <option name="mnozenje" value="*">*</option>
  <option name="dijeljenje" value="/">/</option>
</select>
<input type="text" name="y"/>
<input type="submit" value="="/>
<?php 
$operacija=$_GET["operacija"];
switch($operacija) {
	case "+" :
	$rezultat=$_GET["x"]+$_GET["y"];
	break;
	case "-" :
	$rezultat=$_GET["x"]-$_GET["y"];
	break;
	case "*" :
	$rezultat=$_GET["x"]*$_GET["y"];
	break;
	case "/" :
	$rezultat=$_GET["x"]/$_GET["y"];
	break;
}
?>
<input type="text" value="<?php echo $rezultat; ?>" />
</form>

