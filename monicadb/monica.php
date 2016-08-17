<?php
require "zxcd9.php";
if(empty($_SESSION['emailaddress'])) 
{ 
    header("Location: index.php"); 
    die("Redirecting to login"); 
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SLP | Office</title>
    <meta name="description" content="SLP DSWD Livelihood"/>
    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
    <link rel="shortcut icon" href="../imgs/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../imgs/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/flatbootstrap.css"/>
    <script src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" language="javascript" src="../js/jquery.dataTables.js"></script>
    <script src="../js/DTbootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <style>

body {
    background-color: #f7f9fb;
    background-size: cover;
    font-family: "Lato";
}
.navbar-nav > li > a, .navbar-brand {
    padding-top:15px !important; 
    padding-bottom:0 !important;
    height: 45px;
}
.navbar {min-height:45px !important;background-color: #000}
#bootstrapSelectForm .selectContainer .form-control-feedback {
    right: -15px;
}
.slidedown {
  -webkit-transform: scaleY(0);
       -o-transform: scaleY(0);
      -ms-transform: scaleY(0);
          transform: scaleY(0);
  
  -webkit-transform-origin: top;
       -o-transform-origin: top;
      -ms-transform-origin: top;
          transform-origin: top;
  
  -webkit-transition: -webkit-transform 0.2s ease;
            -o-transition: -o-transform 0.2s ease;
          -ms-transition: -ms-transform 0.2s ease;
                  transition: transform 0.2s ease;
}

.slidedown.active {
  -webkit-transform: scaleY(1);
       -o-transform: scaleY(1);
      -ms-transform: scaleY(1);
          transform: scaleY(1);
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
#slideout {
      z-index: 998;
      position: fixed;
      top: 25%;
      left: 0;
      width: 35px;
      padding: 12px 0;
      text-align: center;
      background: #6DAD53;
      -webkit-transition-duration: 0.3s;
      -moz-transition-duration: 0.3s;
      -o-transition-duration: 0.3s;
      transition-duration: 0.3s;
      -webkit-border-radius: 0 5px 5px 0;
      -moz-border-radius: 0 5px 5px 0;
      border-radius: 0 5px 5px 0;
    }
    #slideout_inner {
      z-index: 999;
      position: fixed;
      top: 25%;
      left: -250px;
      background: #6DAD53;
      width: 250px;
      padding: 0;
      height: 165px;
      -webkit-transition-duration: 0.3s;
      -moz-transition-duration: 0.3s;
      -o-transition-duration: 0.3s;
      transition-duration: 0.3s;
      text-align: left;
      -webkit-border-radius: 0 0 5px 0;
      -moz-border-radius: 0 0 5px 0;
      border-radius: 0 0 5px 0;
    }
    #slideout_inner textarea {
      z-index: 999;
      width: 190px;
      height: 100px;
      margin-bottom: 6px;
    }
    #slideout:hover {
      z-index: 999;
      left: 250px;
    }
    #slideout:hover #slideout_inner {
      z-index: 999;
      left: 0;
    }
.fileUpload {
    position: relative;
    overflow: hidden;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
.autocomplete-suggestions { cursor:pointer;border: 1px solid #999; background: #FFF; cursor: default; overflow: auto; -webkit-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); -moz-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); }
.autocomplete-suggestion { cursor:pointer;padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-no-suggestion { padding: 2px 5px;}
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: bold; color: #000; }
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { font-weight: bold; font-size: 16px; color: #000; display: block; border-bottom: 1px solid #000; }

.spinner {
  margin: 20px auto 0;
  width: 90px;
  text-align: center;
}

.spinner > div {
  width: 20px;
  height: 50px;
  background-color: #333;
  border-radius: 10px;
  display: inline-block;
  -webkit-animation: sk-bouncedelay 1.6s infinite ease-in-out both;
  animation: sk-bouncedelay 1.6s infinite ease-in-out both;
}

.spinner .bounce1 {
    background: red;
  -webkit-animation-delay: -1.2s;
  animation-delay: -1.2s;
}

.spinner .bounce2 {
    background: yellow;
  -webkit-animation-delay: -0.8s;
  animation-delay: -0.8s;
}

.spinner .bounce3 {
    background: blue;
  -webkit-animation-delay: -0.4s;
  animation-delay: -0.4s;
}

@-webkit-keyframes sk-bouncedelay {
  0%, 80%, 100% { -webkit-transform: scale(0) }
  40% { -webkit-transform: scale(1.0) }
}

@keyframes sk-bouncedelay {
  0%, 80%, 100% { 
    -webkit-transform: scale(0.0);
    transform: scale(0.0);
  } 40% { 
    -webkit-transform: scale(2.0);
    transform: scale(1.0);
  }
}
.loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 999999;
    background-color: rgba(255,255,255,0.8);
    text-align: center;
    vertical-align: middle;
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
thead th {
  text-align: center;
  cursor: pointer;
}
</style>
</head>
<body>
<div class="loader vcenter" style="display:none;" id="loadoverlay">
    <div class="spinner" style="margin-top:-2em;text-align:center">
      <h3 style="font-weight:normal;display:block">Uploading..</h3><br>
      <div class="bounce1"></div>
      <div class="bounce2"></div>
      <div class="bounce3"></div>
    </div>

</div>


<?php include "../nav.php"; ?>
<script>
emailmaster = [];
i = 0;
function changeValue2(str){
      if (str=="recip_region") {
          $("#recip_region").prop('disabled',true);
      }
      $("#nonesel").hide();
      var option=$("#"+str+" option:selected").val();
      $("#subsector").tagit("createTag", option);
      $('#'+str).get(0).selectedIndex = 0;
      var aData = { 
          'action'    : "getemails", 
          'filter'    : option
      }
    $.ajax({
       url: "functions.php",
       type: "POST",
       data: aData,
       success: function(data)
       {
          emailmaster.push([option,data]);
       },
       dataType:"json"
    });//endajax

}
function typeChange(str){
      var option=$("#"+str+" option:selected").html();
      if (option == "Internal Memorandum (within CO)" || option == "External Memorandum (to regions)") {
        $("#docsubject").slideDown(500);
        $("#docauthor").slideDown(500);
        $("#doctitle").fadeOut(500);
      } else {
        $("#docsubject").fadeOut(500);
        $("#docauthor").fadeOut(500);
        $("#doctitle").slideDown(500);
      }
}
</script>
<div class="container-fluid">
  <div class="col-md-12" style="">
      <div style="background:#fff;margin-bottom:1em;padding:1.2em;" class="col-md-12">
          <div class="col-md-12" id="contentblock">
                  <h2 style="font-size:47px;font-weight:900;margin-bottom:0">Monica DB</h2>
                  SLP accomplishment for 2011-2015
                  <div class="row" style="margin-top:1em;" id="selector">
                    <div class="btn-group" role="group" aria-label="..." style="margin-left:1em">
                      <button id="btngeo" type="button" class="btn btn-default active"><span class="glyphicon glyphicon-map-marker"></span> Geo</button>
                      <button id="btndate" type="button" class="btn btn-default"><span class="glyphicon glyphicon-calendar"></span> Date</button>
                      <button id="btnname" type="button" class="btn btn-default"><span class="glyphicon glyphicon-user"></span> Name</button>
                    </div>
                  </div>

                  <!--geo-->
                  <div class="row" id="geo" style="margin-top:2em">
                      Data view: <span class="glyphicon glyphicon-map-marker"></span> Geographical Location
                          <div class="row" style="margin-top:1em;display:none;">
                            <div class="form-group col-md-4">
                              <select class="form-control" disabled>
                                <option value="">CARAGA</option>
                              </select>
                            </div>
                            <div class="form-group col-md-4">
                              <select class="form-control" disabled>
                                <option value="">Province</option>
                              </select>
                            </div>
                            <div class="form-group col-md-4">
                              <select class="form-control" disabled>
                                <option value="">Municipality</option>
                              </select>
                            </div>
                          </div>
                        <div style="margin-right:1em">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-hover hover" id="viewdata" style="background-color:#fff;">
                          <thead>
                            <th>PHYSICAL</th>
                            <th>MD</th>
                            <th>EF</th>
                            <th>SEA-K</th>
                            <th>SCF</th>
                            <th>MFI</th>
                            <th>NGA/LGU</th>
                            <th>ASSETS</th>
                            <th>PEAF</th>
                            <th>ST</th>
                            <th>CBLA</th>
                            <th>SCF Amount</th>
                            <th>MFI Amount</th>
                            <th>NGA/LGU Amount</th>
                            <th>Assets Amount</th>
                          </thead>
                        </table>

                        <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-hover hover" id="viewdata2" style="background-color:#fff;">
                          <thead>
                            <th>FINANCIAL</th>
                            <th>MD</th>
                            <th>EF</th>
                            <th>SEA-K</th>
                            <th>SCF</th>
                            <th>MFI</th>
                            <th>NGA/LGU</th>
                            <th>ASSETS</th>
                            <th>PEAF</th>
                            <th>ST</th>
                            <th>CBLA</th>
                            <th>SCF Amount</th>
                            <th>MFI Amount</th>
                            <th>NGA/LGU Amount</th>
                            <th>Assets Amount</th>
                          </thead>
                        </table>
                        </div>
                  </div>
                  <!--end geo-->

                  <!--dates-->
                  <div class="row" id="date" style="margin-top:1em;display:none;">
                      Data view:  <span class="glyphicon glyphicon-calendar"></span> Date
                        <div style="margin-right:1em;margin-top:1em">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-hover hover" id="datedata" style="background-color:#fff;width:100%">
                          <thead>
                            <th>DATE</th>
                            <th>SEAK</th>
                            <th>SEAK Amount</th>
                            <th>SCF</th>
                            <th>SCF Grants</th>
                            <th>MFIs</th>
                            <th>NGA/LGUs</th>
                            <th>PEAF</th>
                            <th>ST</th>
                            <th>CBLA</th>
                          </thead>
                        </table>
                        </div>
                  </div>
                  <!--end dates-->
          </div>
        </div>
    </div>
  </div>
</div>
<script>
  function toTitleCase(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}
function com(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
var oTable = "";

  $.fn.DataTable.ext.pager.numbers_length = 5;
  oTable = $('#viewdata').dataTable({
    "aProcessing": true,
    "aServerSide": true,
    "orderCellsTop": true,
    "ajax": "dt_monica.php",
    "dom": '<"top">rt<"bottom"><"clear">',
    "aaSorting": [0,'desc'],
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
                  if (data[0]==null) {
                    return '<td><b>'+com(data[5])+'</b></td>';
                  } else {
                    return '<td>'+com(data[5])+'</td>';
                  }
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
                    return '<td><b>'+com(data[6])+'</b></td>';
                  } else {
                    return '<td>'+com(data[6])+'</td>';
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
                  if (data[0]==null) {
                    return '<td><b>'+com(data[7])+'</b></td>';
                  } else {
                    return '<td>'+com(data[7])+'</td>';
                  }
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
                  if (data[0]==null) {
                    return '<td><b>'+com(data[8])+'</b></td>';
                  } else {
                    return '<td>'+com(data[8])+'</td>';
                  }
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
                  if (data[0]==null) {
                    return '<td><b>'+com(data[9])+'</b></td>';
                  } else {
                    return '<td>'+com(data[9])+'</td>';
                  }
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
                  if (data[0]==null) {
                    return '<td><b>'+com(data[10])+'</b></td>';
                  } else {
                    return '<td>'+com(data[10])+'</td>';
                  }
                }
            },
            { "bVisible": false, "aTargets":[11,12,13,14] }
    ]
  });

oTable = $('#viewdata2').dataTable({
    "aProcessing": true,
    "aServerSide": true,
    "orderCellsTop": true,
    "ajax": "dt_monica.php",
    "dom": '<"top">rt<"bottom"><"clear">',
    "aaSorting": [0,'desc'],
    "aoColumnDefs": [
            { 
               "aTargets":[11],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('font-size', '13px');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                  if (data[0]==null) {
                    return '<td><b>'+com(data[11])+'</b></td>';
                  } else {
                    return '<td>'+com(data[11])+'</td>';
                  }
                }
            },
            { 
               "aTargets":[12],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('font-size', '13px');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                  if (data[0]==null) {
                    return '<td><b>'+com(data[12])+'</b></td>';
                  } else {
                    return '<td>'+com(data[12])+'</td>';
                  }
                }
            },
            { 
               "aTargets":[13],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('font-size', '13px');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                  if (data[0]==null) {
                    return '<td><b>'+com(data[13])+'</b></td>';
                  } else {
                    return '<td>'+com(data[13])+'</td>';
                  }
                }
            },
            { 
               "aTargets":[14],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('font-size', '13px');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                  if (data[0]==null) {
                    return '<td><b>'+com(data[14])+'</b></td>';
                  } else {
                    return '<td>'+com(data[14])+'</td>';
                  }
                }
            },
            { "bVisible": false, "aTargets":[1,2,3,4,5,6,7,8,9,10] }
    ]
  });
daterollup = "";
oTable = $('#datedata').dataTable({
    "aProcessing": true,
    "aServerSide": true,
    "orderCellsTop": true,
    "ajax": "dt_monica_date.php",
    "dom": '<"top">rt<"bottom"><"clear">',
    "aaSorting": [10,'asc'],
    "pageLength": 13,
    "aoColumnDefs": [
            { 
               "aTargets":[0],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('font-size', '13px');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                  if (data[0]=="December") {
                      if (daterollup=="boom") {
                        data[0] = "PHP"
                        return '<td></td>';
                      } else {
                        daterollup = "boom";
                        return '<td>'+data[0]+'</td>';
                      }

                  } else {

                        return '<td>'+data[0]+'</td>';

                  }
                }
            },
            { 
               "aTargets":[1],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('font-size', '13px');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                  if (data[0]=="PHP" && daterollup=="boom") {
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
                  if (data[0]=="PHP" && daterollup=="boom") {
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
                  if (data[0]=="PHP" && daterollup=="boom") {
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
                  if (data[0]=="PHP" && daterollup=="boom") {
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
                  if (data[0]=="PHP" && daterollup=="boom") {
                    return '<td><b>'+com(data[5])+'</b></td>';
                  } else {
                    return '<td>'+com(data[5])+'</td>';
                  }
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
                  if (data[0]=="PHP" && daterollup=="boom") {
                    return '<td><b>'+com(data[6])+'</b></td>';
                  } else {
                    return '<td>'+com(data[6])+'</td>';
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
                  if (data[0]=="PHP" && daterollup=="boom") {
                    return '<td><b>'+com(data[7])+'</b></td>';
                  } else {
                    return '<td>'+com(data[7])+'</td>';
                  }
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
                  if (data[0]=="PHP" && daterollup=="boom") {
                    return '<td><b>'+com(data[8])+'</b></td>';
                  } else {
                    return '<td>'+com(data[8])+'</td>';
                  }
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
                  if (data[0]=="PHP" && daterollup=="boom") {
                    return '<td><b>'+com(data[9])+'</b></td>';
                  } else {
                    return '<td>'+com(data[9])+'</td>';
                  }
                }
            },
            { "bVisible": false, "aTargets":[10] }
    ]
  });


$(document).ready(function() {
$('#selector button').click(function() {
  $(this).addClass('active').siblings().removeClass('active');
  if ($(this).attr('id') == 'btngeo') {
      $("#geo").fadeIn();
      $("#date").fadeOut();
  }
  if ($(this).attr('id') == 'btndate') {
      $("#geo").fadeOut();
      $("#date").fadeIn();
  }
  if ($(this).attr('id') == 'btnname') {
      window.location.href = "monica2.php";
  }

});

});
</script>
</body>
</html>
