<?php 
require("mailer/PHPMailerAutoload.php");
require("mailer/class.phpmailer.php");
require("mailer/class.smtp.php");

//$recips = array("livelihood04b@dswd.gov.ph", "livelihoodunit_dswd4a@yahoo.com", "slpunit.fo3@e-dswd.net", "livelihood02@dswd.gov.ph", "livelihood.fo1@dswd.gov.ph","gbmillete.fo5@e-dswd.net", "livelihoodcar@dswd.gov.ph", "livelihoodcrg@dswd.gov.ph", "livelihood06@dswd.gov.ph", "livelihood07@dswd.gov.ph", "livelihood08@dswd.gov.ph", "livelihood09@dswd.gov.ph", "livelihood10@dswd.gov.ph","livelihood11@dswd.gov.ph","livelihood12@dswd.gov.ph","slp.foncr@e-dswd.net");

      $from = "noreply@slp.ph";
      $fromname = "SLP Online";

      $myvar = file_get_contents('mail.html');
      $message = 'hallo';
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
      $mail->SMTPAuth = true;
      $mail->SMTPSecure = 'ssl';
      $mail->Host = "sg2plcpnl0084.prod.sin2.secureserver.net";
      $mail->Port = 465;
      $mail->IsHTML(true);
      $mail->Username = "slponline";
      $mail->Password = "Jiji98909";
      $mail->From = "SLP Online <noreply@slp.ph>";
      $mail->SetFrom($from,$fromname);
      $mail->Subject = "BOOM!!";
      $mail->Body = $myvar;
      $mail->AddAddress("jmodelacruz@e-dswd.net");
      
     if(!$mail->Send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
     } else {
        echo "Message has been sent";
     }


?>