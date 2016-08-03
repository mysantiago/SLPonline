<?php
require "zxcd9.php";


//start post
if(!empty($_POST)) 
{ 
//filter input
$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $id = test_input($_POST['feedbackid']);
    if ($_POST['action']=="1") {
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
        byteMe($_SESSION['id'],'vote',2);

        echo "good";
    } else {
        try {
            $stmt = $db->prepare("DELETE FROM feedback_votes WHERE hrdbid = :hrdbid AND feedbackid = :feedbackid");
            $stmt->bindParam(':hrdbid', $_SESSION['id']);
            $stmt->bindParam(':feedbackid', $id);
            $stmt->execute();
        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }//endtry
        echo "good";
    }
}//end post
     
?>