<?php
$myName="Nemanja";
$myAge=23;
$statement="My name is " . $myName . " and my age is " . $myAge;
for($i=0;$i<100;$i++) {
echo $statement ;
echo "<br>";
}
$z=0;
while($z<100) {
	echo $statement;
	echo "<br>";
	$z++;
}
?>