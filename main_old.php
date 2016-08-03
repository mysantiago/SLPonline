<?php
//require "zxcd9.php";
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SLP</title>
    <meta name="description" content="SLP DSWD Livelihood"/>
    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
    <link rel="shortcut icon" href="imgs/favicon.ico" type="image/x-icon">
    <link rel="icon" href="imgs/favicon.ico" type="image/x-icon">
    <script src="js/jquery-1.10.2.min.js"></script>
    <link rel="stylesheet" href="css/flatbootstrap.css"/>
    <style>

body {
    background-color: #fff;
    background-size: cover;
    font-family: "Lato";
    height:100%;
}
html {
  height:100%;
}
.navbar-nav > li > a, .navbar-brand {
    padding-top:15px !important; 
    padding-bottom:0 !important;
    height: 45px;
    color: #000 !important;
}
.navbar-nav > li > a, .navbar-brand:hover {
    color: #ccc !important;
}
.navbar {
  min-height:45px !important;
   background-color: transparent;
   background: transparent;
   border-color: transparent;
}

.navbar li a { 
  color: #000 !important;
  font-weight: bold;
} 
.navbar li a:hover { 
  color: #ccc !important;
  font-weight: bold;
} 

#bootstrapSelectForm .selectContainer .form-control-feedback {
    right: -15px;
}
.disabled {
  background:rgba(1,1,1,0.2);
  border:0px solid;
  cursor:progress;
}
.spin {
  -webkit-animation: spin 1000ms infinite linear;
  -moz-animation: spin 1000ms infinite linear;
  -o-animation: spin 1000ms infinite linear;
  animation: spin 1000ms infinite linear;
}

@-moz-keyframes spin {
  from {
    -moz-transform: rotate(0deg);
  }
  to {
    -moz-transform: rotate(360deg);
  }
}

@-webkit-keyframes spin {
  from {
    -webkit-transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(360deg);
  }
}

@keyframes spin {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}

.page-center {
    width: 100%;
    height:100%;
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
h3 {
  font-size:20px;
  margin-right:1em; 
  padding-left: 1em;
  padding-right: 1em;
  padding-top:2em;
  padding-bottom:2em;
  color:#333;
  font-weight:900;
  display: inline;
}
h3 > a {
  position: relative;
  text-decoration: none;
}

h3 > a:hover {
  color: #00ADDe;
}
h3 > a:before {
  margin-bottom: -0.2em;
  content: "";
  position: absolute;
  width: 100%;
  height: 2px;
  bottom: 0;
  left: 0;
  background-color: #ddd;
  visibility: hidden;
  -webkit-transform: scaleX(0);
  transform: scaleX(0);
  -webkit-transition: all 0.3s ease-in-out 0s;
  transition: all 0.3s ease-in-out 0s;
}
h3 > a:hover:before {
  visibility: visible;
  -webkit-transform: scaleX(1);
  transform: scaleX(1);
}
</style>
</head>
<body>
    <div class="page-center" style="height:2%;">
        <div class="page-center-in">
            <div class="container-fluid">
              <div class="row" style="text-align:right;margin:0;color:#d1d1d1;">
                Logged in as: <b><?php echo $_SESSION['firstname'].' '.$_SESSION['lastname'];?></b>
              </div>
            </div>
        </div>
    </div>
    <div class="page-center" style="height:8%;">
        <div class="page-center-in">
            <div class="container-fluid">
              <div class="row" style="text-align:center;padding:1em;margin:0;padding-top:0;color:#d1d1d1;letter-spacing:2px">
                SLP Online
              </div>
            </div>
        </div>
    </div>
    <div class="page-center" style="height:25%;">
        <div class="page-center-in">
            <div class="container-fluid">
              <div class="row col-xs-12" style="text-align:center;padding:1em;padding-top:2em;margin:0;font-weight:700;color:#333;">
                <h3><a href="hr" id="hr">Human Resources</a></h3>
                <h3><a href="partners" id="hb">HanapBuhay</a></h3>
                <h3><a href="office" id="angel">SLP Angel</a></h3>
                <h3><a href="monicadb" id="monicadb">MonicaDB</a></h3>
              </div>
            </div>
        </div>
    </div>
    <div class="page-center" style="height:40%;">
        <div class="page-center-in">
            <div class="container-fluid">
              <div class="row vcenter" style="text-align:center;padding:1em;margin:0;color:#333;">
                <div id="descriptions" style="display:none;margin-top:-3em;font-size:16px;padding-left:6em;padding-right:6em">
                  
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="page-center" style="height:15%;">
        <div class="page-center-in">
            <div class="container-fluid">
              <div class="row" style="text-align:center;padding:1em;margin:0;color:#333;vertical-align:bottom;font-size:12px">
                v1.0
              </div>
            </div>
        </div>
    </div>

<script>
$(document).ready(function() {
    $("#hr").hover(
      function() {
        $('#descriptions').html("A national database for all SLP HR data which functions as a universal account for all SLP systems.<br><br>Includes <b>ROVER</b> which functions as a tool for tracking SLP staff and events.");
        $('#descriptions').fadeIn();
      }, function() {
        $('#descriptions').fadeOut();
      });
    $("#hb").hover(
      function() {
        $('#descriptions').html("An employment facilitation tool for matching labor/market demand and supply.");
        $('#descriptions').fadeIn();
      }, function() {
        $('#descriptions').fadeOut();
      });
    $("#angel").hover(
      function() {
        $('#descriptions').html("The ultimate repository for all SLP files, documents, memos, guides, templates, etc..");
        $('#descriptions').fadeIn();
      }, function() {
        $('#descriptions').fadeOut();
      });
    $("#monicadb").hover(
      function() {
        $('#descriptions').html("A database for 2011-2015 accomplishment. Can be used to counter-check previously served beneficiaries.");
        $('#descriptions').fadeIn();
      }, function() {
        $('#descriptions').fadeOut();
      });
});
</script>

</body>
</html>
