<?php
require "zxcd9.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SLP Online</title>
    <meta name="description" content="SLP DSWD Livelihood"/>
    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
    <link rel="shortcut icon" href="imgs/favicon.ico" type="image/x-icon">
    <link rel="icon" href="imgs/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/flatbootstrap.css"/>
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>

body {
    background-color: #f7f9fb;
    background-size: cover;
    font-family: "Lato";
}
.navbar-nav > li > a, .navbar-brand {
    padding-top:15px !important; 
    padding-bottom:0 !important;
    height: 40px;
    
}
.navbar {min-height:45px !important;background-color: #000}
#bootstrapSelectForm .selectContainer .form-control-feedback {
    right: -15px;
}
.disabled {
  background:rgba(1,1,1,0.2);
  border:0px solid;
  cursor:progress;
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
table {
  border-collapse: inherit;
}
.slpdrop {
  margin-bottom:1em;
}
.slpdropsub {
  background: #000;
  color:#fff;
}
.slpdropsub li a {
  background: #000;
  color:#fff;
}
-webkit-tap-highlight-color: rgba(0,0,0,0);
button {
    outline: none;
}
.navbar-default .navbar-nav > .open > a, .navbar-default .navbar-nav > .open > a:hover, .navbar-default .navbar-nav > .open > a:focus {
  background: #000;
}
.dashpanel {
  border:solid 1px #c5d6de;margin:1em;margin-top:0;background:#fff;text-align: center;
  height:100%;
  border-radius: 4px;
}
.bluetext {
  color: #00ADDe;
}
.padfix {
  padding-right: 0;
  margin-bottom:1em;
  margin-right: 1em;
}
.padfix2{
  padding-right:0em;
  padding-left: 1em;
}
.padfix3 {
  padding-left:1em;
  padding-right:0;
}
.padfix4 {
  padding: 1em;
  padding-right:0;
}
.dashpanelheader {
  font-weight:900;padding-top:0.5em;padding-left:1em;font-size:18px;
  margin-bottom: 0;text-align: left;
}
@media (min-width: 990px) {
  .slpdrop {
    font-weight:900;
    font-size:22px;
  }
  .padfix {
    padding-right: 0;
    margin-right: 0;
    margin-bottom: 0;
  }
  .padfix2{
    padding-right:0em;
    padding-left: 2em;
  }
  .padfix3 {
    padding-left:0;
    padding-right: 1em;
  }
  .padfix4 {
    padding: 1em;
    padding-right:1em;
  }
}
.dashpanelsubhead {
  text-align:left;padding-left:1.2em;margin-bottom:0;padding-bottom:0;
}
thead th {
  text-align: center;
  cursor: pointer;
}
.dataTables_paginate {
  float:none;
}
h3 {
  font-weight: 400
}
.nopad {
  margin:0;
  padding:0;
  padding-top:4px;
}
.nopad::after {
    color: #ccc;
    content: attr(data-bg-text);
    display: block;
    font-size: 12px;
    text-align:right;
    line-height: 1;
    padding:0;
    margin:0;
    margin-top: 0px;
    position: relative;
    bottom: 0px;
    right: 0px;
}
.labelhover:hover {
  background: #000;
  color: #fff;
}
</style>
</head>
<body>
<?php require "nav.php"; ?>
<div class="row" style="margin:0;padding:0">

  <div class="col-md-offset-3 col-md-6">
      <div style="border:solid 1px #c5d6de;background:#fff;text-align:center;padding:2em">
        Passwords must be at least six (6) characters in length<br><br>
        <form>
          <div class="form-group">
            <input class="form-control" placeholder="Old Password" type="password" id="oldpass" name="oldpass" required>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="New Password" type="password" id="newpass" name="newpass" required>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Re-type New Password" type="password" id="newpass2" name="newpass2" required>
          </div>
          <div class="form-group">
            <button class="btn btn-primary btn-sm" id="submitpass" type="">Submit</button>
          </div>
        </form>
      </div>
  </div>

</div>
<!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog" style="margin-top:3em">
        <div class="modal-dialog modal-sm">

          <div class="modal-content" style="padding:1em;padding-top:0.5em;">
                  <h3 style="color:#5cb85c;margin-bottom:6px">Success!</h3>
                  <span style="font-size:13px" id="sucsubtext">Boom</span><br><br>
                  <button type="button" class="btn btn-primary pull-right" style="background:#5cb85c;border:0;margin-top:0;padding:5px 10px 5px 10px" id="okaybtn" data-dismiss="modal">Okay</button>
                  <div class="clearfix"></div>
          </div>
          
        </div>
      </div>
      <!-- Modal -->
<script>
$("#submitpass").click(function(event) {
  event.preventDefault();
  event.stopImmediatePropagation();
  $("#submitpass").html("Processing..");
  document.getElementById("submitpass").disabled = true;
  var formData = {
      'oldpass'       : $('input[name=oldpass]').val(), 
      'newpass'       : $('input[name=newpass]').val(), 
      'newpass2'      : $('input[name=newpass2]').val()
  };
  $.ajax({
       url: "chpass.php",
       type: "POST",
       data: formData,
       success: function(data)
       {
          if (data == "good") {
            $("#sucsubtext").html("Password changed")
            $('#myModal').modal();
            $('#myModal').on('hidden.bs.modal', function () {
                location.href = "http://slp.ph/main.php";
            })
          } else {
            alert(data);
            $("#submitpass").html("Submit");
            document.getElementById("submitpass").disabled = false;
          }
       }
    });//endajax


});
</script>
</body>
</html>
