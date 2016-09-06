<?php
echo "<a href='".dirname( __FILE__ )."/testme.php'>click me</a><br>";

$address = "http://".$_SERVER[HTTP_HOST];
echo "<br><br>";
echo $address;
?>
