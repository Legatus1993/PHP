<?php
$niz = array("kruska","jabuka","narandza");
array_push($niz, "limun", "banana");
foreach ($niz as $clan) {
	echo $clan; echo "\n";
}
echo "<hr>";
array_pop($niz);
foreach ($niz as $clan) {
	echo $clan; echo "\n";
}



?>