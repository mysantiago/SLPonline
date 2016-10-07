<?php
require "../zxcd9.php";

function besIsLove($idbes)
{
  try{
  $stmt2 = $db->prepare("DELETE from fin_allotments where allotid=:allotid");
  $stmt2->bindparam(':allotid',$idbes);
  $stmt2->execute();
 } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }//endtry
}



$dates = date("mdY h:i:sa");
if(!empty($_POST)) 
{ 
    if($_POST['action'] == "addf") 
    {
      
              try   
                  { 
                   
                     $stmt = $db->prepare("INSERT INTO fin_admincosts
                     (
                     uacs,subaro,amount,dte,hrdbid,dateadded
                     )
                      VALUES
                      ( 
                          :uacs,
                         :subaro,
                         :amount,
                         :dt,
                         :id1,
                         :dt1                                         
                         )

                       ");
                      $stmt->bindParam(':uacs',$_POST['uacs']);
                      $stmt->bindParam(':subaro',$_POST['subaro']);
                      $stmt->bindParam(':amount', $_POST['amount']);
                      $stmt->bindParam(':dt', $_POST['dateacc']);
                      $stmt->bindParam(':id1', $_SESSION['id']);
                      $stmt->bindParam(':dt1', $dates);
                                 
                     $stmt->execute();
                  
                  } 
                catch(PDOException $e) 
                  {
                      echo "Error: " . $e->getMessage();
                  }
   

        }




if($_POST['action'] == "addfundallo") {
              try   
                  { 
                  
                   
                     $stmt1 = $db->prepare("INSERT INTO fin_allotments
                      (region,
                        type,
                        subtype,
                        saa,
                        uacs,
                        fundsource,
                        fundsourceyear,
                        amount,
                        d8,
                        hrdbid,
                        dateadded)
                      VALUES
                      ( 
                         :region,
                         :type,
                         :subtype,
                         :saa,
                         :uacs1,
                         :fundsource,
                         :fundsourceyear,
                         :amt,
                         :d8,
                         :hrid,
                         :dateadd                                         
                         )

                       ");
                      $stmt1->bindParam(':region',$_POST['region']);
                      $stmt1->bindParam(':type',$_POST['fundtype']);
                      $stmt1->bindParam(':subtype', $_POST['subtype']);
                      $stmt1->bindParam(':saa', $_POST['saa']);
                      $stmt1->bindParam(':uacs1', $_POST['uacs1']);
                      $stmt1->bindParam(':fundsource', $_POST['fundsource']);
                      $stmt1->bindParam(':fundsourceyear', $_POST['fundsourceyear']);
                      $stmt1->bindParam(':amt', $_POST['amt']);
                      $stmt1->bindParam(':d8', $_POST['d8']);
                      $stmt1->bindParam(':hrid', $_SESSION['id']);
                      $stmt1->bindParam(':dateadd', $dates);
                      $stmt1->execute();
                    }        
                catch(PDOException $e) 
                  {
                      echo "Error: " . $e->getMessage();
                  }
                  echo "success";
    }




}






?>
