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
//testinput
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
function byteMe ($recipient,$page,$amt) {
global $db;    
        try {
            $stmt = $db->prepare("INSERT IGNORE INTO bytez (hrdbid,pagename,amt,added) VALUES (:hrdbid,:pagename,:amt,:added)");
            $stmt->bindParam(':hrdbid', $recipient);
            $stmt->bindParam(':pagename', $page);
            $stmt->bindParam(':amt', $amt);
            $stmt->bindParam(':added', date("Y-m-d H:i:s"));
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }//endtry
            
}
function addNotification ($recipient,$notifier,$notifmsg,$eventname,$eventlink) {
global $db;    
        try {
            $stmt = $db->prepare("INSERT IGNORE INTO notifications (recipient,notifier,msg,eventname,eventlink,added) VALUES (:recipient,:notifier,:msg,:eventname,:eventlink,:added)");
            $stmt->bindParam(':recipient', $recipient);
            $stmt->bindParam(':notifier', $notifier);
            $stmt->bindParam(':msg', $notifmsg);
            $stmt->bindParam(':eventname', $eventname);
            $stmt->bindParam(':eventlink', $eventlink);
            $stmt->bindParam(':added', date("Y-m-d"));
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }//endtry
            
}
function addNotificationDoc ($recipient,$notifier,$notifmsg,$eventname,$eventlink,$docid) {
global $db;    
        try {
            $stmt = $db->prepare("INSERT IGNORE INTO notifications (recipient,notifier,msg,eventname,eventlink,added,docdbid) VALUES (:recipient,:notifier,:msg,:eventname,:eventlink,:added,:docdbid)");
            $stmt->bindParam(':recipient', $recipient);
            $stmt->bindParam(':notifier', $notifier);
            $stmt->bindParam(':msg', $notifmsg);
            $stmt->bindParam(':eventname', $eventname);
            $stmt->bindParam(':eventlink', $eventlink);
            $stmt->bindParam(':added', date("Y-m-d"));
            $stmt->bindParam(':docdbid', $docid);
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }//endtry
            
}
if(empty($_SESSION['emailaddress'])) { 
    header("Location: http://slp.ph/"); 
    die("Redirecting to login.."); 
}
?>