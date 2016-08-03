<?php
require "zxcd9.php";
byteMe($_SESSION['id'],'opsdash',0.10);
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
    <link rel="stylesheet" type="text/css" href="css/DTbootstrap.css">
    <script src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
    <script src="js/DTbootstrap.js"></script>
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

<!-- CONTENT -->
<div class="row" style="margin:0;padding:0">

  <div class="col-md-12">
      <div style="border:solid 1px #c5d6de;background:#fff;text-align:center;padding:2em;padding-top:1em;margin-bottom:2em">
        
        <h2>PROJECT MONITORING: <select id="typefilter" onchange="changeType()"><option selected>Employment Facilitation</option><option>Microenterprise Development</select></h2>
        Based on SLPIS encoding as of: &nbsp;<select><option selected> - </option></select><br>
        Viewing as: <b><?php echo $_SESSION['filter']; ?></b>
        <br>
        <br>
        <table class="table table-bordered table-striped table-hover" id="viewdata">
          <thead>
            <tr style="cursor:default">
              <th colspan="3" style="cursor:default">TOTAL</th>
              <th colspan="5" style="cursor:default">CURRENT</th>
              <th colspan="4" style="cursor:default">BALANCE</th>
            </tr>
            <tr style="font-size:12px;text-align:left">
              <th>Region</th>
              <th>Target Participants</th>
              <th>Financial Allocation</th>
              <th>Projects</th>
              <th>Participants</th>
              <th>% of Total Participants</th>
              <th>Total Project Cost</th>
              <th>% of Finanical Allocation</th>
              <th>Participants</th>
              <th>% of Total Participants</th>
              <th>Financial Allocation</th>
              <th>% of Financial Allocation</th>
              <th>track</th>
          </thead>
        </table>

          <div class="pull-left">
            <a href="export.php"><button class="btn btn-primary" style="font-size:12px;padding:5px">Export to Excel</button></a>
          </div>
          <div class="clearfix"></div>
      </div>
  </div>

</div>
<!-- CONTENT -->

<script>
function com(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
function colorize(str) {
  if (str > 60) {
    return "<span style='color:#2ecc71'>"+str+"%</span>";
  } else if (str > 40) {
    return "<span style='color:#27ae60'>"+str+"%</span>";
  } else if (str >20) {
    return "<span style='color:#c0392b'>"+str+"%</span>";
  } else {
    return "<span style='color:#e74c3c'>"+str+"%</span>";
  }
}
function changeType() {
      var regionvalue = document.getElementById("typefilter").value;
      if (regionvalue == "Employment Facilitation") {
        oTable.fnFilter("", 12, false);
        oTable.fnFilter("EF", 12, true);
        oTable.fnSort( [14,'asc'] );
      } else {
        console.log("asdz");
        oTable.fnFilter("", 12, false);
        oTable.fnFilter("MD", 12, true);
        oTable.fnSort( [14,'asc'] );
      }
}
$.fn.DataTable.ext.pager.numbers_length = 5;
  oTable = $('#viewdata').dataTable({
    "aProcessing": true,
    "aServerSide": true,
    "orderCellsTop": true,
    "pageLength": 18,
    "order": [[14, "asc" ]],
    "ajax": "dt_opsdashboard.php",
    "dom": '<"top">rt<"bottom"><"clear">',
    "aoColumnDefs": [
            { 
               "aTargets":[1],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('font-size', '13px');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                  if (data[0]==null) {
                    return '<td><b>'+com(data[1])+'</b></td>';
                  } else {
                    return '<td>'+com(data[1])+'</td>';
                  }
                }
            },
            { 
               "aTargets":[2],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('font-size', '13px');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                  if (data[0]==null) {
                    return '<td><b>'+com(data[2])+'</b></td>';
                  } else {
                    return '<td>'+com(data[2])+'</td>';
                  }
                }
            },
            { 
               "aTargets":[3],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('font-size', '13px');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                  if (data[0]==null) {
                    return '<td><b>'+com(data[3])+'</b></td>';
                  } else {
                    return '<td>'+com(data[3])+'</td>';
                  }
                }
            },
            { 
               "aTargets":[4],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('font-size', '13px');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                  if (data[0]==null) {
                    return '<td><b>'+com(data[4])+'</b></td>';
                  } else {
                    return '<td>'+com(data[4])+'</td>';
                  }
                }
            },
            { 
               "aTargets":[5],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('font-size', '13px');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                    val = data[4]/data[1];
                    val = val*100;
                    return '<td>'+colorize(val.toFixed(2))+'</td>';
                }
            },
            { 
               "aTargets":[6],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('font-size', '13px');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                  if (data[0]==null) {
                    return '<td><b>'+com(data[5])+'</b></td>';
                  } else {
                    return '<td>'+com(data[5])+'</td>';
                  }
                }
            },
            { 
               "aTargets":[7],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('font-size', '13px');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                    return '<td>'+colorize( ((data[5]/data[2])*100).toFixed(2) )+'</td>';
                }
            },
            { 
               "aTargets":[8],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('font-size', '13px');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                    return '<td>'+com(data[1]-data[4])+'</td>';
                }
            },
            { 
               "aTargets":[9],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('font-size', '13px');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                    return '<td>'+(((data[1]-data[4]) /data[1])*100).toFixed(2)+'%</td>';
                }
            },
            { 
               "aTargets":[10],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('font-size', '13px');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                    return '<td>'+com(data[2]-data[5])+'</td>';
                }
            },
            { 
               "aTargets":[11],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('font-size', '13px');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                    return '<td>'+(( (data[2]-data[5]) /data[2])*100).toFixed(2)+'%</td>';
                }
            },
            { "bVisible": false, "aTargets":[12,13,14] }
                    ]
  });
  oTable.fnFilter("EF", 12, true);
</script>


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
