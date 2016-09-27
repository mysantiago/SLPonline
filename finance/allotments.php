<?php
    $username = "root"; 
    $password = "root"; 
    $host = "localhost"; 
    $dbname = "csc613m";
    try 
    { 
        $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $options);
    $db->exec("SET time_zone = '+0:00'");
    } 
    catch(PDOException $ex) 
    { 
        die("Failed to connect to the database: " . $ex->getMessage()); 
    } 
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
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
    <script src="https://code.highcharts.com/highcharts.js"></script>
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
tr {
  text-align: center;
}
.glyphcenter {
  font-size:12px;
  padding-right:2px;
}

</style>
</head>
<body>
<?php require "navfin.php"; ?>
<script>
$(function () {
  var colors = Highcharts.getOptions().colors;
  regtot = [2,3,34,5,3,2,3,2,2,2,2,2,2,22,34];
  regconf = [2,3,34,5,3,2,3,2,2,2,2,2,2,22,3];
    $('#cont1').highcharts({
        chart: {
            type: 'column',
            backgroundColor: null,
            height: 150
        },
        title: {
            text: ''
        },
        subtitle: {
            text: ''
        },
        credits: {
          enabled: false
        },
        legend: {
          enabled: false
        },
        tooltip: {
                formatter: function() {
                    var point = this.point,
                        s = '<b>'+this.x+'</b><br>Total: <b>'+point.total+'</b><br>'+point.series.name+': <b>'+point.y.toFixed(0)+'</b>';
                    return s;
                },
                hideDelay: 0
            },
        xAxis: {
            categories: [
                'NCR',
                'CAR',
                'I',
                'II',
                'III',
                'IV-A',
                'IV-B',
                'V',
                'VI',
                'VII',
                'VIII',
                'IX',
                'X',
                'XI',
                'XII',
                'CARAGA',
                'ARMM',
                'NIR'
            ],
            crosshair: true,
            minorGridLineWidth: 0,
            minorTickWidth: 0,
            tickWidth: 0,
            labels: {
              enabled: true,
                style: {
                    fontSize:'5px'
                }
            }
        },
        yAxis: {
            min: 0,
            gridLineWidth: 0,
            title: '',
            labels: {
              enabled: false
            }
        },
        plotOptions: {
            column: {
                pointPadding: 0,
                borderWidth: 0
            },
            series: {
                stacking: 'normal'
            }
        },
        series: [{
            name: 'CMF',
            color: colors[3],
            data: [23,23,55,23,15,09,18,20,50,33,38,21,12,10,40,20]
        },{
            name: 'DR',
            color: colors[8],
            data: [43,12,44,22,10,08,25,67,32,10,29,56,19,10,40,20]
        }]
    });
});
</script>
<div class="row" style="margin:0;padding:0">
  <div class="col-md-2">
    <?php require "nav_side.php"; ?>
  </div>
  <div class="col-md-10">
      <div class="row">
        <div class="col-md-12">
            
<div style="border:solid 1px #c5d6de;background:#fff;text-align:left;padding:2em;margin-bottom:2em">
    <div class="row">
      <div class="col-md-4">        
        
        <h2 style="font-size:36px;margin-bottom:0em;margin-top:0em">Fund Allotments</h2>
        Encoded by SLP-NPMO
        <br><br>
        <a href="allotments_add.php"><button class="btn btn-info btn-sm">Add Fund Allotment</button></a>
        <button class="btn btn-success btn-sm" onclick="showsearch()"><span class="glyphicon glyphicon-search"></span>&nbsp; Search</button>
        <br>
      </div>
      <div class="col-md-8" id="cont1" style="">
        a
      </div>
    </div>
        <div class="row" style="margin-top:1em;margin-bottom:1em;display:none;" id="searchfields">
          <div class="row" style="padding:2em;padding-bottom:1em">
              <input class="col-md-12 form-control" placeholder="Sub Aro. #">
          </div>
          <div class="col-md-4">
              <select class="form-control">
                <option>Filter by Region</option>
              </select>
          </div>
          <div class="col-md-4">
              <select class="form-control">
                <option>Filter by Type</option>
                <option>CMF</option>
                <option>DR</option>
              </select>
          </div>
          <div class="col-md-4">
              <select class="form-control">
                <option>Filter by Fund Source</option>
                <option>SLP GAA - MD</option>
                <option>SLP GAA - EF</option>
                <option>BUB</option>
                <option>RRP</option>
              </select>
          </div>
        </div>
        <table class="table table-bordered table-hover" style="margin-top:2em;line-height:0.9;vertical-align:middle;border-top:2;padding-bottom:0;margin-bottom:0" >
          <thead style="background:#f6f8fa">
            <th>Area</th>
            <th>Type</th>
            <th>Sub-Type</th>
            <th>SAA</th>
            <th>UACS</th>
            <th>Fund Source</th>
            <th>Amount</th>
            <th>Date</th>
            <th></th>
          </thead>
            <tr>
              <td>Region IV-B</td>
              <td>CMF</td>
              <td>Grant</td>
              <td>2348712398</td>
              <td>-</td>
              <td>SLP-EF</td>
              <td>468,232.00</td>
              <td>06/17/2016</td>
              <td><span class="glyphicon glyphicon-edit"></span> <span class="glyphicon glyphicon-remove"></span></td>
            </tr>
            <tr>
              <td>Region IV-B</td>
              <td>CMF</td>
              <td>Grant</td>
              <td>3021000003</td>
              <td>-</td>
              <td>SLP-MD</td>
              <td>268,232.00</td>
              <td>06/17/2016</td>
              <td><span class="glyphicon glyphicon-edit"></span> <span class="glyphicon glyphicon-remove"></span></td>
            </tr>
            <tr>
              <td>Region IV-B</td>
              <td>DR</td>
              <td>Admin</td>
              <td>-</td>
              <td>Travelling Expense</td>
              <td>PAMANA</td>
              <td>568,232.00</td>
              <td>06/17/2016</td>
              <td><span class="glyphicon glyphicon-edit"></span> <span class="glyphicon glyphicon-remove"></span></td>
            </tr>
            <tr data-toggle="tooltip" title="<div style='text-align:left'>Realigned to: <span style='font-weight:normal'>Training Expenses</span><br>Amount: <font color=red>-20,000.00</font><br>Original Amount: 188,232.00<br>Date: 09/27/2016</div>" data-html="true" data-placement="left" data-container="body">
              <td>Region IV-B</td>
              <td>DR</td>
              <td>Admin</td>
              <td>-</td>
              <td>Salary</td>
              <td>BUB</td>
              <td>168,232.00</td>
              <td>06/17/2016</td>
              <td><span class="glyphicon glyphicon-edit"></span> <span class="glyphicon glyphicon-remove"></span></td>
            </tr>
            <tr data-toggle="tooltip" title="<div style='text-align:left'>Realigned from: <span style='font-weight:normal'>Salary</span><br>Amount: <span class='colgreen'>+20,000.00</span><br>Original Amount: 1,444,232.00<br>Date: 09/27/2016</div>" data-html="true" data-placement="left" data-container="body">
              <td>NCR</td>
              <td>CMF</td>
              <td>Admin</td>
              <td>-</td>
              <td>Training Expenses</td>
              <td>RRP</td>
              <td>1,468,232.00</td>
              <td>06/17/2016</td>
              <td><span class="glyphicon glyphicon-edit"></span> <span class="glyphicon glyphicon-remove"></span></td>
            </tr>
            <tr>
              <td>Region X</td>
              <td>CMF</td>
              <td>Admin</td>
              <td>-</td>
              <td>Mobile</td>
              <td>RSF</td>
              <td>868,232.00</td>
              <td>06/17/2016</td>
              <td><span class="glyphicon glyphicon-edit"></span> <span class="glyphicon glyphicon-remove"></span></td>
            </tr>
        </table>

        
          </div>
        </div>
  </div>
</div>
<script>
$('[data-toggle="tooltip"]').tooltip();
shown = false;
function showsearch() {
    if (shown == true) {
      $('#searchfields').fadeOut(399);
      shown = false;
    } else {
      shown = true;
      $('#searchfields').slideDown(399);
    }
}
function getProv() {
  var formData = { 
    'action' : 'province',
    'regionid' : $('#region option:selected').val()
  };
  $.ajax({
  type: "POST",
  url: "getLocations.php",
  data: formData,
  success: function(data) {
            $("#province").prop('disabled', false);
            $("#province").html(data);
        }

  });
}
</script>
</body>
</html>
