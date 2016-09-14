<?php
$username = "jmigdela_slpmain"; 
$password = "turtles98"; 
$host = "localhost"; 
$dbname = "jmigdela_slponline";

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
if(!empty($_SESSION['emailaddress'])) { 
    header("Location: main.php"); 
}
?>
<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>SLP Online</title>
    
<style>
body {
  font-family: "Lato", "Helvetica Neue", Helvetica, Arial, sans-serif;
  background: #eceff4;
}
.vcenter {
  min-height: 90%;  
  min-height: 90vh; 

  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex; 
  
    -webkit-box-align : center;
  -webkit-align-items : center;
       -moz-box-align : center;
       -ms-flex-align : center;
          align-items : center;
  width: 100%;
         -webkit-box-pack : center;
            -moz-box-pack : center;
            -ms-flex-pack : center;
  -webkit-justify-content : center;
          justify-content : center;
}
.dashcount {
  height: 120px;
  text-align: center;
  font-weight:bold;
  margin-top: 2em;
  color:#00ADDe;
  font-size: 14px;
}
.dashspan {
  font-family: "Lato", "Helvetica Neue", Helvetica, Arial, sans-serif;
  color:#333;
  font-size: 40px;
  font-weight:900;
  display:block;
  padding-bottom: 0;
  margin-bottom: 0;
}
.page-center {
    width: 100%;
    border-collapse: collapse
}
.page-center {
    display: table
}

.page-center-in {
    display: table-cell;
    vertical-align: middle;
    padding: 15px 0
}
.container-fluid {
    margin-right: auto;
    margin-left: auto
}
.sign-box {
    width: 100%;
    max-width: 322px;
    margin: 0 auto;
    background: #fff;
    border: 1px solid #d8e2e7;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    padding: 20px;
    font-size: 1rem;
    position: relative
}
.sign-box2 {
    background: #fff;
    border: 1px solid #d8e2e7;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    padding: 20px;
    font-size: 1rem;
    width:100%;
}

.sign-box .sign-avatar {
    width: 120px;
    height: 120px;
    margin: 0 auto 10px
}

.sign-box .sign-avatar img {
    display: block;
    width: 100%;
    -webkit-border-radius: 50%;
    border-radius: 30%
}

.sign-box .sign-avatar.no-photo {
    border: 2px solid #c5d6de;
    text-align: center;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    line-height: 96px;
    color: #c5d6de;
    font-size: 3.125rem;
    font-weight: 700
}

.activity-line-item .activity-line-item-user .activity-line-item-user-name,
.full-count,
.profile-card .profile-card-name {
    font-weight: 600
}

.sign-box .sign-title {
    font-size: 1.25rem;
    text-align: center;
    margin: 0 0 15px;
    line-height: normal
}

.sign-box .btn {
    display: block;
    min-width: 108px;
    margin: 16px auto 12px
}

.sign-box .btn.sign-up {
    margin-top: 18px
}

.sign-box .sign-note {
    text-align: center
}

.sign-box a {
    text-decoration: none;
    color: #0082c6;
    border-bottom: solid 1px transparent
}

.sign-box a:hover {
    border-bottom-color: rgba(0, 130, 198, .5)
}

.sign-box .form-group {
    margin-bottom: 12px;
    zoom: 1
}

.sign-box .form-group:after,
.sign-box .form-group:before {
    content: " ";
    display: table
}

.sign-box .checkbox {
    margin: 0
}

.sign-box .checkbox label,
.sign-box .reset {
    font-size: .875rem
}

.sign-box .close {
    position: absolute;
    right: 10px;
    top: 4px;
    opacity: 1;
    color: #c5d6de
}

.sign-box .close:hover {
    color: #00a8ff
}
.borderright {
  border-right:0px solid #ccc;
}
@media (min-width:992px) {
  .borderright {
    border-right:1px solid #ccc;
  }
}
</style>
</head>
<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid" style="background:">
              <div class="row vcenter" style="text-align:center;padding:1em;margin:0;background:">

                <div class="col-md-10 sign-box2" style="background:#fff;height:80%">

<!--box1-->
<div class="col-md-8 borderright" style="padding-right:3em;text-align:left;margin-right:0;font-size:15px;text-align:center">
    <div id="bgsplash" class="col-md-12" style="height:400px;border-radius:5px;background:url('imgs/bg_index1.jpg');background-size:cover;transition: background 1.5s linear;text-align:right;padding-top:1em">
      <img src="imgs/slpthumb.jpg" style="float:right;padding-left:5px"> &nbsp; 
      <img src="imgs/dswdthumb.png" style="float:right">
      <div style="position:absolute;bottom:0;right:5px;color:#fff">v1.0</div>
    </div>

</div>
<!--box1-->

                  <!--LOGIN-->
                  <div class="col-md-4">
                    <h2 style="font-weight:bold;">LOGIN</h2>
                    <form class="sign-box" style="border:0;padding-right:0;padding-left:0" autocomplete="off">
                    <div class="form-group">
                            <input type="text" class="form-control" placeholder="E-Mail" id="username" name="email" required value="<?php
echo $_COOKIE['rememberme']; ?>"/>
                        </div>
                        <div class="form-group" style="margin-bottom:5px">
                            <input type="password" class="form-control" placeholder="Password" id="password" name="password" required/>
                        </div>
                        <div class="form-group" style="margin-bottom:1em">
                          <div class="col-md-6" style="text-align:left;padding:0">
                            <div class="checkbox pull-left">
                                <input type="checkbox" id="remember" name="remember" style="font-size:18px;width:1em;margin:0;padding:0;margin-right:5px;height:15px;margin-top:2.5px;margin-left:2px" <?php if(isset($_COOKIE['rememberme'])) { echo 'checked'; } else { echo ''; } ?>/>
                                <label for="remember" style="font-size:14px;display:inline;">Remember me</label>
                            </div>
                          </div>
                          <div class="col-md-6" style="text-align:right;padding:0">
                            <div class="pull-right reset" style="font-size:14px" id="forgotform">
                                <span id="forgot"><a href="#">Forgot Password</a></span>
                            </div>
                          </div>
                          <br>
                        </div>
                        <div class="row">
                          <button class="btn btn-info" style="padding: 5px, 10px, 5px, 10px" id="status">LOG IN</button>
                        </div>
                        <span id="loadicon" class="glyphicon glyphicon-refresh spin" style="font-size:30px;display:none;"></span>
                        <div id="statusdisp" class="col-sm-12 padstop" style="color:red;text-align:center;display:none;font-size:15px"></div>
                        <div style="margin-top:4em">Looking for SLPIS? Visit:</div>
                        <a href="http://slpis.dswd.gov.ph" target="blank">http://slpis.dswd.gov.ph</a>
                      </form>
                  </div>
                </div>
              </div>

            </div>
        </div>
    </div><!--.page-center-->

      <!-- Modal -->
      <div class="modal fade" id="fModal" role="dialog" style="margin-top:3em">
        <div class="modal-dialog modal-sm">

          <div class="modal-content" style="padding:1em;padding-top:0.5em;">
                  <h3 style="margin-bottom:6px" id="modalhead">Reset Password</h3>
                  <span style="font-size:13px" id="modalsub">Please enter your registered email address below. We will send you an email with a link for password recovery.</span><br>
                  <form action="" method="post" id="forgotForm" autocomplete="off">
                      <input class="form-control" name="emailadd" id="emailadd" placeholder="you@youremail.com" style="margin-bottom:0.5em;margin-top:1em;"> 
                      <button type="button" class="btn btn-primary pull-right" style="background:#5cb85c;border:0;margin-top:0;padding:5px 10px 5px 10px" id="submitBtn">Submit</button>
                  </form>
                  <div class="clearfix"></div>
          </div>
          
        </div>
      </div>
      <!-- Modal -->
<noscript id="deferred-styles">
<link rel="stylesheet" href="css/flatbootstrap.min.css">
</noscript>
<script>
      var loadDeferredStyles = function() {
        var addStylesNode = document.getElementById("deferred-styles");
        var replacement = document.createElement("div");
        replacement.innerHTML = addStylesNode.textContent;
        document.body.appendChild(replacement)
        addStylesNode.parentElement.removeChild(addStylesNode);
      };
      var raf = requestAnimationFrame || mozRequestAnimationFrame ||
          webkitRequestAnimationFrame || msRequestAnimationFrame;
      if (raf) raf(function() { window.setTimeout(loadDeferredStyles, 0); });
      else window.addEventListener('load', loadDeferredStyles);
    </script>
</body>
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
//------page
bgnum = 0;
setInterval(changeBG, 3000);
function changeBG() {
    if (bgnum == 0) {
      document.querySelector("#bgsplash").style.backgroundImage = "url(imgs/bg_index2.jpg)";  
      bgnum = 1;
    } else if (bgnum == 1) {
      document.querySelector("#bgsplash").style.backgroundImage = "url(imgs/bg_index3.jpg)";  
      bgnum = 2;
    } else {
      document.querySelector("#bgsplash").style.backgroundImage = "url(imgs/bg_index1.jpg)";  
      bgnum = 0;
    }
}
$(document).ready(function() {
  $("#loadicon").hide();
  $("#statusdisp").hide();
});
//------page

//------login
$("#status").click(function(event) {
  event.preventDefault();
  event.stopImmediatePropagation();
        $("#statusdisp").hide();
        $("#loadicon").show();
        $("#loadicon").addClass("spin");
        $("#loadicon").addClass("padstop");
        $("#status").html('Processing..');
        document.getElementById("status").classList.add("disabled");
        document.getElementById("status").disabled = true;

var formData = {
      'emailaddress'       : $('input[name=email]').val(),
      'password'           : $('input[name=password]').val(),
      'rememberme'         : document.getElementById("remember").checked
    };

    $.ajax({
       url: "login2.php",
       type: "POST",
       data: formData,
       success: function(data)
       {
          if (data == "loginok") {
            $("#loadicon").hide();
            $("#statusdisp").html('<font color="green">Success!</font>');
            document.getElementById("statusdisp").classList.add("good");
            $("#statusdisp").show();
            window.location.href = "main.php";

          } else {
            alert(data);
            $("#loadicon").hide();
            $("#statusdisp").html('Incorrect login.');
            document.getElementById("statusdisp").classList.add("bad");
            $("#statusdisp").show();

            $("#status").html("LOG IN");
            document.getElementById("status").classList.remove("disabled");
            document.getElementById("status").disabled = false;
          }
          return false;
       }
    });//endajax
return false;

  });
//------login


//------forgot
$("#forgot").click(function(event) {$('#fModal').modal();});
$('input[name=emailadd]').on('keydown', function(e) {
    if (e.which == 13) {
        e.preventDefault();
    }
});
$("#submitBtn").click(function(event) {
  $("#submitBtn").html("Processing..");
  document.getElementById("submitBtn").disabled = true;
  var forgotData = {'emailaddress'       : $('input[name=emailadd]').val()};
  $.ajax({
       url: "forgot.php",
       type: "POST",
       data: forgotData,
       success: function(data)
       {
          if (data == "loginok") {
            $("#modalhead").html('Success!');
            $("#modalsub").html('A password retrieval email was sent to the specified email address');
            $("#forgotForm").hide();
          } else {
            //alert(data);
            document.getElementById("submitBtn").disabled = false;
            $("#submitBtn").html("Submit");
          }
       }
    });
});
//------forgot
</script>
</html>