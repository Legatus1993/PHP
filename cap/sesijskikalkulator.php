<html>

<!-- Mozes mijenjati i dodavati sve u htmlu samo ne diraj name i value -->
<head>
	<link type="text/css" rel="stylesheet" href="phhp.css"/>
</head>
<body>
<?php
session_start();
?>
<!-- Forma za unosenje brojeva i biranje operacije -->
<form action="" method="GET">
<!-- Prvi broj -->
<input type="text" name="x"/>
<!-- Biranje operacije -->
<select name="operacija">
  <option name="sabiranje" value="+" >+</option>
  <option name="oduzimanje" value="-" >-</option>
  <option name="mnozenje" value="*">*</option>
  <option name="dijeljenje" value="/">/</option>
</select>
<!-- Drugi broj -->
<input type="text" name="y"/>
<!-- Dugme submit (=) za izracunavanje -->
<input type="submit" value="="/>
<?php 
$greske = "";
$rezultat="";
if(isset($_GET["operacija"])) {
$operacija=$_GET["operacija"];
if(!empty($_GET["x"]) && !empty($_GET["y"]) && $_GET["x"] !== 0 && $_GET["y"] !== 0) {
	if(is_numeric($_GET["x"]) && is_numeric($_GET["y"])) {
		
		
		
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
	if( !empty($_GET["x"]) && !empty($_GET["y"]) ) {
	$rezultat=$_GET["x"]/$_GET["y"];
	$_SESSION["dijeljenja"][] = strval($_GET["x"])." / ".strval($_GET["y"])." = ".strval($rezultat);
	break;
	}
	else { $greske = "Dijeljenje sa nulom  nije definisano"; }
	 default:
       $rezultat="0";

	}
	}
	
else {
	$greske = "Niste unijeli odgovarajuce vrijednosti.";
}
}
else {
	$greske = "Molimo unesite oba broja.";
}
}

									
$arrRacunanja = array();
if(isset($_SESSION["sabiranja"])) {
foreach ($_SESSION["sabiranja"] as $rez) {
    array_push($arrRacunanja, $rez);
}
}
if(isset($_SESSION["oduzimanja"])) {
foreach ($_SESSION["oduzimanja"] as $rez) {
    array_push($arrRacunanja, $rez);
}
}
if(isset($_SESSION["mnozenja"])) {
foreach ($_SESSION["mnozenja"] as $rez) {
    array_push($arrRacunanja, $rez);
}
}
if(isset($_SESSION["dijeljenja"])) {
foreach ($_SESSION["dijeljenja"] as $rez) {
    array_push($arrRacunanja, $rez);
}
}

?>
<!-- Rezultati racunanja -->
<input type="text" value="<?php echo $rezultat; ?>" />

<!-- Istorija racunanja -->
<textarea rows="10" cols="100">                                                                                  
<?php
foreach ($arrRacunanja as $svi) {
    echo $svi;	
	echo "\n";
}
?>
</textarea>
</form>
<!-- Izbacivanje mogucih gresaka, ako budes mijenjao ili dodavao nesto dodaj iza size unutar " '' " -->
<?php 
if($greske !== "" ) {
echo '<input type="text" name="greske" value="'.$greske.'" size="150px"/>';
}
?>																				
</body>
</html>

 