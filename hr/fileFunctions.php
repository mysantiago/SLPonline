<?php
require "../zxcd9.php";

//start post
if(!empty($_POST)) 
{ 
//filter input
$_POST  = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);


        $id = test_input($_POST['docid']);

        if ($_POST['action'] == 'approve') {

            if ($_SESSION['id']==9) {
                $query = " 
                    UPDATE DOCDB 
                    SET approved = 1 
                    WHERE 
                        id = :id
                ";

            } else if ($_SESSION['id']==662) {
                $query = " 
                    UPDATE DOCDB 
                    SET approved = 2 
                    WHERE 
                        id = :id
                ";
            }

                $query_params = array( 
                    ':id' => $id 
                ); 
                 
                try { 
                    $stmt = $db->prepare($query); 
                    $result = $stmt->execute($query_params); 
                    if ($stmt == true) {
                        echo "good";
                    }
                } 
                catch(PDOException $ex) { 
                    die("Failed to run query: " . $ex->getMessage()); 
                }

            if ($_SESSION['id']==9) {
                $query = " 
                    UPDATE HRnotifications 
                    SET isclicked = 0
                    WHERE 
                        DOCDBid = :id
                ";

                $query_params = array( 
                    ':id' => $id 
                ); 
                 
                try { 
                    $stmt = $db->prepare($query); 
                    $result = $stmt->execute($query_params); 
                } 
                catch(PDOException $ex) { 
                    die("Failed to run query: " . $ex->getMessage()); 
                }                
            }
        }

        if ($_POST['action'] == 'delete') {
                $query = "DELETE FROM DOCDB WHERE id = :id";
                $query_params = array( 
                    ':id' => $id 
                ); 
                 
                try { 
                    $stmt = $db->prepare($query); 
                    $result = $stmt->execute($query_params); 
                } 
                catch(PDOException $ex) { 
                    die("Failed to run query: " . $ex->getMessage()); 
                }
                $query = "DELETE FROM HRnotifications WHERE DOCDBid = :id";
                $query_params = array( 
                    ':id' => $id 
                ); 
                 
                try { 
                    $stmt = $db->prepare($query); 
                    $result = $stmt->execute($query_params); 
                    if ($stmt == true) {
                        echo "good";
                    }
                } 
                catch(PDOException $ex) { 
                    die("Failed to run query: " . $ex->getMessage()); 
                } 

        }

        if ($_POST['action'] == 'delete_comment') {
                $query = "DELETE FROM RVcomments WHERE id = :id";
                $query_params = array( 
                    ':id' => $id 
                ); 
                 
                try { 
                    $stmt = $db->prepare($query); 
                    $result = $stmt->execute($query_params); 
                    if ($stmt == true) {
                        echo "good";
                    }
                } 
                catch(PDOException $ex) { 
                    die("Failed to run query: " . $ex->getMessage()); 
                } 

        }

}//end post
     
?>