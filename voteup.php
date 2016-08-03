<?php
//connect
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

//start post
if(!empty($_POST)) 
{ 
//filter input
$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $id = test_input($_POST['feedbackid']);

        try {
            $stmt = $db->prepare("SELECT * FROM feedback_votes WHERE hrdbid = :hrdbid AND feedbackid = :feedbackid");
            $stmt->bindParam(':hrdbid', $_SESSION['id']);
            $stmt->bindParam(':feedbackid', $id);
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }//endtry
        if ($stmt->rowCount() > 0) {
          die("alreadyvote");
        }

        $query = "INSERT IGNORE INTO feedback_votes (feedbackid, hrdbid) VALUES (:feedbackid, :hrdbid)"; 
        $query_params = array( 
            ':feedbackid' => $id,
            ':hrdbid' => $_SESSION['id']
        ); 
        try { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params); 
        } 
        catch(PDOException $ex) { 
            die("Failed to run query: " . $ex->getMessage()); 
        } 

        echo "good";
}//end post
     
?>