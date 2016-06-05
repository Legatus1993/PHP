<?php
$c_name="user";
$c_value="Nemanja Nisic";
setcookie($c_name, $c_value, time() + (86400 * 30), "/");
echo $_COOKIE[$c_name];
?>