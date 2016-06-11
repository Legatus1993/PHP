<?php
session_start();
?>
<form action="" method="GET">
<input type="text" name="x"/>
<select name="operacija">
  <option name="sabiranje" value="+" >+</option>
  <option name="oduzimanje" value="-" >-</option>
  <option name="mnozenje" value="*">*</option>
  <option name="dijeljenje" value="/">/</option>
</select>
<input type="text" name="y"/>
<input type="submit" value="="/>
<?php 
$rezultat="";
if(isset($_GET["operacija"])) {
$operacija=$_GET["operacija"];

switch($operacija) {
	
	case "+" :
	$rezultat=$_GET["x"]+$_GET["y"];
	$_SESSION["sabiranja"][] = strval($_GET["x"])." + ".strval($_GET["y"])." = ".strval($rezultat);
	break;
	case "-" :
	$rezultat=$_GET["x"]-$_GET["y"];
	$_SESSION["oduzimanja"][] = strval($_GET["x"])." - ".strval($_GET["y"])." = ".strval($rezultat);
	break;
	case "*" :
	$rezultat=$_GET["x"]*$_GET["y"];
	$_SESSION["mnozenja"][] = strval($_GET["x"])." * ".strval($_GET["y"])." = ".strval($rezultat);
	break;
	case "/" :
	$rezultat=$_GET["x"]/$_GET["y"];
	$_SESSION["dijeljenja"][] = strval($_GET["x"])." / ".strval($_GET["y"])." = ".strval($rezultat);
	break;
	 default:
       $rezultat="0";
}
}


$arrRacunanja = array();
if(!empty($_SESSION["sabiranja"])) {
foreach ($_SESSION["sabiranja"] as $rez) {
    array_push($arrRacunanja, $rez);
}
}
if(!empty($_SESSION["oduzimanja"])) {
foreach ($_SESSION["oduzimanja"] as $rez) {
    array_push($arrRacunanja, $rez);
}
}
if(!empty($_SESSION["mnozenja"])) {
foreach ($_SESSION["mnozenja"] as $rez) {
    array_push($arrRacunanja, $rez);
}
}
if(!empty($_SESSION["dijeljenja"])) {
foreach ($_SESSION["dijeljenja"] as $rez) {
    array_push($arrRacunanja, $rez);
}
}

?>
<input type="text" value="<?php echo $rezultat; ?>" />
<textarea rows="10" cols="100">
<?php
foreach ($arrRacunanja as $svi) {
    echo $svi;	
	echo "\n";

}

?>
</textarea>
</form>

 