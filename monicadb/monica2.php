<?php
require "../zxcd9.php";
byteMe($_SESSION['id'],'mdb_names',0.10);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SLP | MonicaDB</title>
    <meta name="description" content="SLP DSWD Livelihood"/>
    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
    <link rel="shortcut icon" href="../imgs/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../imgs/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/flatbootstrap.css"/>
    <link href="../css/jquery.tagit.css" rel="stylesheet" type="text/css">
    <link href="../css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery-1.10.2.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/tag-it.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="../js/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.11/js/jquery.dataTables.js"></script>
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
                  <h2 style="font-size:47px;font-weight:900;margin-bottom:0">Historical Data</h2>
                  SLP accomplishment for 2011-2015<br>
                  <span style="color:red">Currently only contains data for region CARAGA</span>
                  <div class="row" style="margin-top:1em;" id="selector">
                    <div class="btn-group" role="group" aria-label="..." style="margin-left:1em">
                      <button id="btngeo" type="button" class="btn btn-default"><span class="glyphicon glyphicon-map-marker"></span> Geo</button>
                      <button id="btndate" type="button" class="btn btn-default"><span class="glyphicon glyphicon-calendar"></span> Date</button>
                      <button id="btnname" type="button" class="btn btn-default active"><span class="glyphicon glyphicon-user"></span> Name</button>
                    </div>
                  </div>

                  <!--geo-->
                  <div class="row" id="geo" style="margin-top:2em">
                      Data view: <span class="glyphicon glyphicon-user"></span> Names<br>
                      <div class="pull-left col-md-3" style="text-align:right;margin-top:1em;margin-bottom:1em;margin-left:0">
                        <input id="searchbox" type="text" class="form-control" placeholder="Search MonicaDB.." style="height:35px"/>
                      </div>
                        <div style="margin-right:1em">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-hover hover" id="viewdata" style="background-color:#fff;">
                          <thead>
                            <th>id</th>
                            <th></th>
                            <th>Name</th>
                            <th>Birthdate</th>
                            <th>HHID</th>
                            <th>Province</th>
                            <th>City/Muni</th>
                            <th>Brgy</th>
                            <th>SEAK</th>
                            <th>SCF</th>
                            <th>MFI</th>
                            <th>NGA/LGU</th>
                            <th>Assets</th>
                            <th>PEAF</th>
                            <th>ST</th>
                            <th>CBLA</th>
                            <th>lastname</th>
                          </thead>
                        </table>
                  <!--end geo-->

          </div>
        </div>
    </div>
  </div>
</div>
<script>
$("#searchbox").keyup(function() {
   oTable.fnFilter(this.value);
});
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
    "ajax": "dt_monica_names.php",
    "dom": '<"top">rt<"bottom"p><"clear">',
    "aaSorting": [0,'desc'],
    "bSortClasses": false,
    "aoColumnDefs": [
            { 
               "aTargets":[1],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'left');
                    $(nTd).css('font-size', '15px');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                    if (data[1]=="M") {
                      return '<td><span class="glyphicon glyphicon-user" style="color:#00ADDe"></span></td>';
                    } else {
                      return '<td><span class="glyphicon glyphicon-user" style="color:#FF4081"></span></td>';
                    }
                }
            },
            { 
               "aTargets":[2],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'left');
                    $(nTd).css('font-size', '15px');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                    return '<td>'+data[16]+', '+data[2]+'</td>';
                }
            },
            { 
               "aTargets":[3],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('font-size', '13px');
                },
            },
            { 
               "aTargets":[4],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('font-size', '13px');
                },
            },
            { 
               "aTargets":[5],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'left');
                    $(nTd).css('font-size', '13px');
                },
            },
            { 
               "aTargets":[6],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'left');
                    $(nTd).css('font-size', '13px');
                },
            },
            { 
               "aTargets":[7],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'left');
                    $(nTd).css('font-size', '13px');
                },
            },
            { 
               "aTargets":[8],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                    if (data[8] > 0) {
                      return '<td><span style="color:#5cb85c" class="glyphicon glyphicon-ok"></span></td>';
                    } else {
                      return '<td> - </td>';
                    }
                }
            },
            { 
               "aTargets":[9],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                    if (data[9] > 0) {
                      return '<td><span style="color:#5cb85c" class="glyphicon glyphicon-ok"></span></td>';
                    } else {
                      return '<td> - </td>';
                    }
                }
            },
            { 
               "aTargets":[10],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                    if (data[10] > 0) {
                      return '<td><span style="color:#5cb85c" class="glyphicon glyphicon-ok"></span></td>';
                    } else {
                      return '<td> - </td>';
                    }
                }
            },
            { 
               "aTargets":[11],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                    if (data[11] > 0) {
                      return '<td><span style="color:#5cb85c" class="glyphicon glyphicon-ok"></span></td>';
                    } else {
                      return '<td> - </td>';
                    }
                }
            },
            { 
               "aTargets":[12],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                    if (data[12] > 0) {
                      return '<td><span style="color:#5cb85c" class="glyphicon glyphicon-ok"></span></td>';
                    } else {
                      return '<td> - </td>';
                    }
                }
            },
            { 
               "aTargets":[13],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                    if (data[13] > 0) {
                      return '<td><span style="color:#5cb85c" class="glyphicon glyphicon-ok"></span></td>';
                    } else {
                      return '<td> - </td>';
                    }
                }
            },
            { 
               "aTargets":[14],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                    if (data[14] > 0) {
                      return '<td><span style="color:#5cb85c" class="glyphicon glyphicon-ok"></span></td>';
                    } else {
                      return '<td> - </td>';
                    }
                }
            },
            { 
               "aTargets":[15],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                    if (data[15] > 0) {
                      return '<td><span style="color:#5cb85c" class="glyphicon glyphicon-ok"></span></td>';
                    } else {
                      return '<td> - </td>';
                    }
                }
            },
            { "bVisible": false, "aTargets":[0,16] }
    ]
  });

$(document).ready(function() {
$('#selector button').click(function() {
  $(this).addClass('active').siblings().removeClass('active');
  if ($(this).attr('id') == 'btngeo') {
      window.location.href = "index.php";
  }
  if ($(this).attr('id') == 'btndate') {
      window.location.href = "index.php";
  }
  if ($(this).attr('id') == 'btnname') {
      //null
  }

});
});
</script>
</body>
</html>
