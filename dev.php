<?php
require "zxcd9.php";
byteMe($_SESSION['id'],'dev',0.10);
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

  <div class="col-md-offset-1 col-md-7">
      <div style="border:solid 1px #c5d6de;background:#fff;text-align:center;padding:0">
        
        <table class="table table-bordered" style="margin-top:0em;line-height:0.9;vertical-align:middle;border:0;padding-bottom:0;margin-bottom:0" >
          <thead style="background:#f6f8fa">
            <th colspan="4">System Development Timeline</th>
          </thead>
            <tr>
              <th><center>System</th>
              <th>Description</th>
              <th>Timeline</th>
              <th>Status</th>
            </tr>
            <tr>
              <td>Human Resources</td>
              <td>Foundation of all SLP Online activity. Serves as HR records and univeral account database.</td>
              <td>Jan 2016</td>
              <td><span class="glyphicon glyphicon-ok colgreen" style="font-size:22px"></span></td>
            </tr>
            <tr>
              <td>HanapBuhay</td>
              <td>Employment facilitation tool for matching labor and market demand and supply.</td>
              <td>Q1</td>
              <td><span class="glyphicon glyphicon-ok colgreen" style="font-size:22px"></span></td>
            </tr>
            <tr>
              <td>E-Library</td>
              <td>Ultimate repository and information dissemination system for everything SLP.</td>
              <td>Q2</td>
              <td><span class="glyphicon glyphicon-ok colgreen" style="font-size:22px"></span></td>
            </tr>
            <tr>
              <td>Finance</td>
              <td>Financial management system to standardize data to-and-from Regional Offices and automatically generate reports.</td>
              <td>Q3</td>
              <td>In Development</td>
            </tr>
            <tr>
              <td>Feedback Portal</td>
              <td>System to collect and respond to all types of feedback for program and system development.</td>
              <td>Q4</td>
              <td>In Development</td>
            </tr>
            <tr>
              <td><strike>Performance Management</strike></td>
              <td><strike>Standardization of feedback rating system. Planned features include online training modules and webinars.</strike></td>
              <td><strike>Q4</strike></td>
              <td>-</td>
            </tr>
            <tr>
              <td>SLPIS Integration</td>
              <td>For a new and improved SLPIS experience</td>
              <td>Q4</td>
              <td>-</td>
            </tr>
        </table>

      </div>
  </div>

  <div class="col-md-3" style="">
      <div style="border:solid 1px #c5d6de;background:#fff;text-align:center;padding:1em">
        <img src="imgs/appteaser.png" style="width:80%;margin-bottom:1em"><br>
        <b style="margin-top:1em">Mobile Version?</b>
        <br><span style="font-size:13px;text-align:justify">
        The entire SLP.PH system should already work responsively on all desktop, laptop, tablet, or mobile browsers. An actual Android mobile app version of this system is also in the works although no timeline is clear yet.
        <br><br>
        As a preview, you may download a <i>proof-of-concept version</i> of the SLP mobile app below.</span>
        <br><br>
        <a href="http://slp.ph/SLP.apk" download><img src="imgs/dlandroid.png" style="width:70%"></a><br>
        <span style="font-size:10px">If prompted, press "keep." File is not harmful.</span>
      </div>
  </div>

</div>
</body>
</html>
