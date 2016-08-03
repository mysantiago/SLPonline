<?php
$username = "slpuser"; 
$password = "turtles9"; 
$host = "localhost"; 
$dbname = "slponline"; 

$options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); 
try 
{ 
    $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
    $db->exec("SET time_zone = '+0:00'");
} 
catch(PDOException $ex) 
{ 
    die("Failed to connect: " . $ex->getMessage()); 
} 
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
session_start(); 
$now = time();
if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
    session_unset();
    session_destroy();
    session_start();
}
$_SESSION['discard_after'] = $now + 1800;
if ($_SESSION['exporttype']=="EF") {
echo "SLP ONLINE - OPERATIONS DASHBOARD (http://slp.ph)<br>";
echo "Downloaded on ".date("m/d/Y H:i:s")."<br>";
echo "<center>EMPLOYMENT FACILITATION</center>"
?>
<table id="viewdata" border="1" cellspacing="0">
          <thead>
            <tr style="cursor:default">
              <th colspan="3" style="cursor:default">TOTAL</th>
              <th colspan="5" style="cursor:default">CURRENT</th>
              <th colspan="4" style="cursor:default">BALANCE</th>
            </tr>
            <tr style="font-size:12px;text-align:left">
              <th>Region</th>
              <th>Target Participants</th>
              <th>Financial Allocation</th>
              <th>Projects</th>
              <th>Participants</th>
              <th>% of Total Participants</th>
              <th>Total Project Cost</th>
              <th>% of Finanical Allocation</th>
              <th>Participants</th>
              <th>% of Total Participants</th>
              <th>Financial Allocation</th>
              <th>% of Financial Allocation</th>
          </thead>
<?php
	$filter = $_SESSION['filter'];
	if ($filter == "NPMO") {
	$stmt = $db->prepare("SELECT * FROM opsdashboard WHERE track = 'EF'");
	} else {
	$stmt = $db->prepare("SELECT * FROM opsdashboard WHERE track = 'EF' AND region = '".$_SESSION['filter']."'"); 
	}

	$stmt->execute();

	while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
	    echo '<tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td><td>'.$row[7].'</td><td>'.$row[8].'</td><td>'.$row[9].'</td><td>'.$row[10].'</td><td>'.$row[11].'</td><td>'.$row[12].'</td><td>http://slp.ph/hanapbuhay/partnerdetails.php?id='.$row[13].'</td></tr>';
	}

} else {
echo "SLP ONLINE - OPERATIONS DASHBOARD (http://slp.ph)<br>";
echo "Downloaded on ".date("m/d/Y H:i:s")."<br>";
echo "<center>MICROENTERPRISE DEVELOPMENT</center>"
?>
<table id="viewdata" border="1" cellspacing="0">
          <thead>
            <tr style="cursor:default">
              <th colspan="3" style="cursor:default">TOTAL</th>
              <th colspan="5" style="cursor:default">CURRENT</th>
              <th colspan="4" style="cursor:default">BALANCE</th>
            </tr>
            <tr style="font-size:12px;text-align:left">
              <th>Region</th>
              <th>Target Participants</th>
              <th>Financial Allocation</th>
              <th>Projects</th>
              <th>Participants</th>
              <th>% of Total Participants</th>
              <th>Total Project Cost</th>
              <th>% of Finanical Allocation</th>
              <th>Participants</th>
              <th>% of Total Participants</th>
              <th>Financial Allocation</th>
              <th>% of Financial Allocation</th>
          </thead>
<?php
	$filter = $_SESSION['filter'];
	if ($filter == "NPMO") {
	$stmt = $db->prepare("SELECT region, parti FROM opsdashboard WHERE track = 'EF'");
	} else {
	$stmt = $db->prepare("SELECT * FROM opsdashboard WHERE track = 'EF' AND region = '".$_SESSION['filter']."'"); 
	}

	$stmt->execute();

	while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
	      echo '<tr><td>'.$row[0].'</td><td>'.$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td><td>'.$row[7].'</td><td>'.$row[8].'</td><td>'.$row[9].'</td><td>'.$row[10].'</td><td>'.$row[11].'</td><td>'.$row[12].'</td><td>'.$row[13].'</td><td>'.$row[14].'</td><td>'.$row[15].'</td><td>'.$row[16].'</td><td>'.$row[17].'</td><td>'.$row[18].'</td><td>'.$row[19].'</td><td>'.$row[20].'</td><td>'.$row[21].'</td><td>'.$row[22].'</td><td>'.$row[23].'</td><td>'.$row[24].'</td></tr>';
	}

}
echo "</table>";
?>