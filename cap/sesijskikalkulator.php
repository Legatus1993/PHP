<html>
<head>
	<link type="text/css" rel="stylesheet" href="phhp.css"/>
</head>

<body>
<?php
session_start();
?>
<div class="inputt">
<form action="" method="GET">
<input type="text" name="x"/>
<select name="operacija">
  <option name="sabiranje" value="+" selected >+</option>
  <option name="oduzimanje" value="-" >-</option>
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
	$_SESSION["racunanja".$rezultat] = strval($_GET["x"])." + ".strval($_GET["y"])." = ".strval($rezultat)."  ";
	break;
	case "-" :
	$rezultat=$_GET["x"]-$_GET["y"];
	$_SESSION["racunanja"].$rezultat = strval($_GET["x"])." - ".strval($_GET["y"])." = ".strval($rezultat)."  ";
	break;
	case "*" :
	$rezultat=$_GET["x"]*$_GET["y"];
	$_SESSION["racunanja".$rezultat] = strval($_GET["x"])." * ".strval($_GET["y"])." = ".strval($rezultat)."  "; 
	case "/" :
	$rezultat=$_GET["x"]/$_GET["y"];
	$_SESSION["racunanja".$rezultat] = strval($_GET["x"])." / ".strval($_GET["y"])." = ".strval($rezultat)."  ";
	break;
	 default:
       $rezultat="Molimo izaberite operaciju";
}
?>
<input type="text" value="<?php echo $rezultat; ?>" />

</form>
</div>

<div class="outputt">
<textarea rows="4" cols="50">
<?php
foreach ($_SESSION as $rez) {
	echo $rez; echo "\n";	
}
?>
</textarea>
</div>

</body>
</html>
