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
            $uploadname = $ext.'_'.$_SESSION['pageid'].'.'.$file_ext;
            $uploadfile = $uploaddir.$uploadname;
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
            $uploadname2 = $ext.'_'.$_SESSION['pageid'].'.'.$file_ext;
            $uploadfile = $uploaddir.$uploadname2;
            

              try{
                       $edit = $db->prepare("Select name from hr_profilepics where hrdbid=:hrdbid");
                        $edit->bindParam(':hrdbid',$_SESSION['pageid']);
                        $edit->execute();
                           $edit_row = $edit->fetch(PDO::FETCH_ASSOC);
                        unlink('../../docs/profilepics/'.$edit_row['name']);
                    }catch(PDOException $e){
                      echo "Error. ". $e->getMessage();
                    } 
            if(is_uploaded_file($_FILES['file']['tmp_name'])) {
               try {
                      move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);
                      $stmt = $db->prepare("UPDATE hr_profilepics SET hrdbid=:pageid, name=:file, filename=:file1, dtetme=:dt WHERE hrdbid=:pageid");
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
?>
