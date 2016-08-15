<?php
require "../zxcd9.php";
function upload_dir(){
  $dir = $_SERVER['DOCUMENT_ROOT']."/SLP.PH2/docs/profilepics/";
  return($dir);
}


if(!empty($_POST)) 
{ 
    if($_POST['action'] == "uploadpics") 
    {
            $ext=date("mdY");
            $maxsize=10000000;
            $FILE_EXTS = array('jpg','jpeg','png', 'bmp', 'tiff');				 
            $file_name = $_FILES['file']['name'];

            $file_name = preg_replace("/ /", "-", $file_name);
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
       

            $file_size = $_FILES['file']['size'];
//datetime
            //$dt = $_POST['dt'];
 //testing
            if($file_name=="") {
              die("No file selected");
            }
            if (!in_array($file_ext, $FILE_EXTS)){
              die("Selected file is invalid.");
            }
            if($_FILES['file']['size']>$maxsize) {
                die("Filesize exceeded");
            }
//$target_dir = "uploads/";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

            $uploaddir = upload_dir();
           // $uploadname = $ext.'_'.$file_name;
            $uploadname = $ext.'_'.$_SESSION['pageid'].'.'.$file_ext;
            $uploadfile = $uploaddir.$uploadname;
            $attempt = "1";
     			//	move_uploaded_file($_FILES["userfile"]["tmp_name"],"images/" . $_FILES["userfile"]["name"]);
				//	$file='images/'.$_FILES['userfile']['name'];
     		//if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) 
     		if(is_uploaded_file($_FILES['file']['tmp_name']))
     		{
				try 	
                	{	
                   move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
                     $stmt = $db->prepare("INSERT INTO hr_profilepics(hrdbid, name, filename ,dtetme) VALUES (:id, :file, :file1,:dt)");
                      $stmt->bindParam(':id',$_SESSION['pageid']);
                      $stmt->bindParam(':file', $uploadname);
                      $stmt->bindParam(':file1', $file_name );
                      $stmt->bindParam(':dt', date("Y-m-d h:i:sa"));
                     
                      $stmt->execute(); 
                  } 
                catch(PDOException $e) 
                  {
                      echo "Error: " . $e->getMessage();
                  }

                    if ($_POST['switch']>0) 
                    {
                          $refid = $db->lastInsertId();
                          sendEmail($refid,$uploadname,$doctype);
                          byteMe($_SESSION['id'],'upload',3);
                          echo "Success";
                    } 
                    else 
                    {
                      echo "Success";
                    }
        }             

    }

//////////////////////////////////////////////////////////////reupload
    if($_POST['action'] == "reuploadpics") {
            $ext=date("mdY");
            $maxsize=10000000;
            $FILE_EXTS = array('jpg','jpeg','png', 'bmp', 'tiff');      
            $file_name = $_FILES['file']['name'];
            $file_name = preg_replace("/ /", "-", $file_name);
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_size = $_FILES['file']['size'];

            if($file_name=="") {
              die("No file selected");
            }
            if (!in_array($file_ext, $FILE_EXTS)){
              die("Selected file is invalid.");
            }
            if($_FILES['file']['size']>$maxsize) {
                die("Filesize exceeded");
            }


            $uploaddir = upload_dir();
              $uploadname = $ext.'_'.$file_name;
            //$uploadname = $ext.'_'.$_FILES['file']['name'];
            $uploadname2 = $ext.'_'.$_SESSION['pageid'].'.'.$file_ext;
            $uploadfile = $uploaddir.$uploadname2;
            

              try{
                       $edit = $db->prepare("Select name from hr_profilepics where hrdbid=:hrdbid");
                        $edit->bindParam(':hrdbid',$_SESSION['pageid']);
                        $edit->execute();
                       //    $rows=$del->fetch();
                           $edit_row = $edit->fetch(PDO::FETCH_ASSOC);
                      
                      //  $direc = $_SERVER['DOCUMENT_ROOT']."/SLP.PH2/docs/profilepics/".$uploadname2;
                     //   unlink($direc);
                        unlink('../../docs/profilepics/'.$edit_row['name']);

                    }catch(PDOException $e){

                      echo "Error. ". $e->getMessage();
                    } 
            if(is_uploaded_file($_FILES['file']['tmp_name'])) {
               try {
              
                      move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
                    $stmt = $db->prepare("UPDATE hr_profilepics SET hrdbid=:pageid, name=:file, filename=:file1, dtetme=:dt WHERE hrdbid=:pageid");
                    // $stmt->bindParam(':id',$_SESSION['id']);
                     $stmt->bindParam(':pageid',$_SESSION['pageid']);

                      $stmt->bindParam(':file', $uploadname2);
                      $stmt->bindParam(':file1', $file_name );
                      $stmt->bindParam(':dt', date("Y-m-d h:i:sa"));
                       
                    $stmt->execute();
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            }
            
       

            echo "Success";
      
    }







}
 					//	move_uploaded_file($_FILES["file"]["tmp_name"], $uploads_dir.$uploadfile);
 					  //  move_uploaded_file($_FILES["file"]["tmp_name"],"../profilepics/" . $uploadfile);
                	//	move_uploaded_file($file_name,"../profilepics/" . $_FILES["file"]["name"]);
                		//move_uploaded_file($uploadfile,$filename);
	                  // move_uploaded_file($file_name, $uploadfile);
	                
	                   // $stmt = $db->prepare("UPDATE hr_profilepics SET name=:file, filename=:file1, dtetme=:dt WHERE id=:id");
	                 
/*
if($_POST['action'] == "upload") {
            $ext=date("mdY");
            $maxsize=10000000;
            $FILE_EXTS = array('jpg','jpeg','png', 'bmp', 'tiff');	

            $file_name = $_FILES['file']['name'];
           $file_name = preg_replace("/ /", "-", $file_name);
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            $file_size = $_FILES['file']['size'];


            if($file_name=="") {
              die("No file selected");
            }
            if (!in_array($file_ext, $FILE_EXTS)){
              die("Selected file is invalid.");
            }
            if($_FILES['file']['size']>$maxsize) {
                die("Filesize exceeded");
            }

            $uploaddir = upload_dir();
             $uploadname = $ext.'_'.$file_name;
            $uploadfile = $uploaddir.$uploadname;

            //if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
			if(is_uploaded_file($_FILES['file']['tmp_name']))
			{
                try {
                	 move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
                    $stmt = $db->prepare("UPDATE hr_profilepics SET name=:file, filaname=:file1, dtetme=:dt WHERE hrdbid=:id");
                    
                    // $stmt->bindParam(':id',$_SESSION['id']);
                  
                 //   $stmt->bindParam(':file', $uploadfile);
                  //   $stmt->bindParam(':file1', $file_name );
                   
					$stmt->bindParam(':file', $uploadfile, PDO::PARAM_STR);       
					$stmt->bindParam(':file1', $file_name, PDO::PARAM_STR);    
					  $stmt->bindParam(':dt', date("Y-m-d h:i:sa"), PDO::PARAM_STR);
 
					$stmt->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);  


                    $stmt->execute();
                } catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
            
			}

            }


         //  $direc = $_SERVER['DOCUMENT_ROOT']."/SLP.PH2/docs/profilepics/".$uploadfile;
            
          //  unlink($direc);

            echo "Success";

}



*/

 /*if($_POST['action'] == "editdetails") {
        $id = test_input($_POST['docdbid']);
        $doctype = test_input($_POST['doctype']);
        $title = test_input($_POST['docsubject']);
        $ddate = test_input($_POST['docdate']);
        $remarks = test_input($_POST['remarks']);

        $stmt = $db->prepare("UPDATE DOCDB SET doctype=:doctype, title=:title, docdate=:docdate, remarks=:remarks WHERE id=:id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':doctype', $doctype);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':docdate', $ddate);
        $stmt->bindParam(':remarks', $remarks);
        $stmt->execute();

        echo "edited";
    }*/







//}

?>
