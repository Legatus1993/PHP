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
<form action="" method="POST">
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
<input type="submit" value="=" name="izracunaj"/>
<?php 
$greske = "";             																								// Varijabla za moguce greske pri unosu
$rezultat="";            																								//Varijabla za rezultate
if(isset($_POST["izracunaj"])) {                            																//Provjera submit dugmica	
$operacija=$_POST["operacija"];																							
if(!empty($_POST["x"]) && !empty($_POST["y"]) && $_POST["x"] !== 0 && $_POST["y"] !== 0) {									//Provjera dali je ista uneseno u polja
	if(is_numeric($_POST["x"]) && is_numeric($_POST["y"])) {																//Provjera dali su unijeti brojevi
		
		
		
switch($operacija) {  																									//Racunanje i unos u sesiju
	
	case "+" :
	$rezultat=$_POST["x"]+$_POST["y"];
	$_SESSION["sabiranja"][] = strval($_POST["x"])." + ".strval($_POST["y"])." = ".strval($rezultat);
	break;
	case "-" :
	$rezultat=$_POST["x"]-$_POST["y"];
	$_SESSION["oduzimanja"][] = strval($_POST["x"])." - ".strval($_POST["y"])." = ".strval($rezultat);
	break;
	case "*" :
	$rezultat=$_POST["x"]*$_POST["y"];
	$_SESSION["mnozenja"][] = strval($_POST["x"])." * ".strval($_POST["y"])." = ".strval($rezultat);
	break;
	case "/" :
	if( !empty($_POST["x"]) && !empty($_POST["y"]) ) {
	$rezultat=$_POST["x"]/$_POST["y"];
	$_SESSION["dijeljenja"][] = strval($_POST["x"])." / ".strval($_POST["y"])." = ".strval($rezultat);
	break;
	}
	else { $greske = "Dijeljenje sa nulom  nije definisano"; }
	 default:
       $rezultat="0";

	}
	}
	
else {																													//Izbacivanje greske ako uneseno nisu brojevi
	$greske = "Niste unijeli odgovarajuce vrijednosti.";															
}
}
else {																													//Izbacivanje greske ako su polja prazna
	$greske = "Molimo unesite oba broja.";																					
}
unset($_SERVER['QUERY_STRING']);
}

									
$arrRacunanja = array();																								//Niz koji upisuje vrijednosti sesije
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

<!-- Istorija i pretraga racunanja -->
</form>
<form action="" method="POST">
<!-- Pretrazivanje istorije racunanja -->
<input type="text" name="pretraga" placeholder="Unesite rezultat koji zelite da nadjete." size="40px"/>
<input type="submit" name="pretrazi" value="Pronadji" />
<!-- Istorija racunanja -->
<textarea rows="10" cols="100">                                                                                  		
<?php																														//Izbacivanje istorije racunanja
foreach ($arrRacunanja as $svi) {
    echo $svi;	
	echo "\n";
}
?>
</textarea>
<!-- Polje u kojem se pretrazuju rezultati pretrage -->
<textarea rows="10" cols="100">                                                                                  		
<?php							
if(isset($_POST["pretrazi"])) {																							   //Pretrazivanje rezultata	
foreach ($arrRacunanja as $rezovi) {
    $pretragaipo = explode (" = ", $rezovi);
	if($pretragaipo[1] == $_POST["pretraga"])
    echo $rezovi;
	echo "\n";
}
}
?>
</textarea>
</form>
<!-- Izbacivanje mogucih gresaka, ako budes mijenjao ili dodavao nesto dodaj iza size unutar " '' " -->
<?php 																														//Izbacivanje mogucih gresaka
if($greske !== "" ) {
echo '<input type="text" name="greske" value="'.$greske.'" size="150px"/>';
}
?>																				
</body>
</html>

 