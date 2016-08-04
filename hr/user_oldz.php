<?php
require "../zxcd9.php";
  byteMe($_SESSION['id'],'hr_profile',0.10);

  $_GET   = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
  $_SESSION['uid'] = $_GET['id'];
  $query = "SELECT firstname, middlename, lastname, nickname, sex, birthdate, emailaddress, contactnumber, designation, position, employstatus, employdate, fundsource, region, province, municipality, comptype, compyear, compstatus, compnotes, inactive, feeling FROM HRDB WHERE id = :id";
  $query_params = array(':id' => $_GET['id']);
        try 
        { 
            $stmt = $db->prepare($query); 
            $result = $stmt->execute($query_params);
        } 
        catch(PDOException $ex) 
        { 
            echo "failed";
            die;
        }

        $row = $stmt->fetch();
        $filter = $row['region'];
        if ($filter == "NPMO") {
          $filter = "";
        }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SLP | HR</title>
    <meta name="description" content="SLP DSWD Livelihood"/>
    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
    <link rel="shortcut icon" href="../imgs/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../imgs/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/flatbootstrap.css"/>
    <link rel="stylesheet" href="http://slp.ph/css/pikaday.css"/>
    <link rel="stylesheet" type="text/css" href="../css/DTbootstrap.css">
    <link href="../css/jquery.tagit.css" rel="stylesheet" type="text/css">
    <link href="../css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="../js/jquery.dataTables.js"></script>
    <script src="../js/DTbootstrap.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="../js/tag-it.js" type="text/javascript" charset="utf-8"></script>

<script type="text/javascript" src="http://momentjs.com/downloads/moment.min.js"></script>
    
    
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
.navbar {
  margin-bottom: 0
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
.successcontent {
  display:none;
}
.cleanselect {
  -webkit-appearance:none;-moz-appearance:none;-ms-appearance:none;appearance:none;background:#fff url(arrows.png) no-repeat right 9px;
}
.form-control {
  margin-bottom: 1em
}
.custom-date-style {
  background-color: red !important;
}
.input{ 
}
.input-wide{
  width: 500px;
}
table a:not(.btn), .table a:not(.btn) {
  text-decoration: none;
}
.btn:hover, .btn:focus, .btn.focus {
  color: #000;
}
.disabled {
  background:rgba(1,1,1,0.2);
  border:0px solid;
  cursor:progress;
}
#slideout {
      z-index: 998;
      position: fixed;
      top: 25%;
      right: 0;
      width: 35px;
      padding: 12px 0;
      text-align: center;
      background: #5cb85c;
      -webkit-transition-duration: 0.3s;
      -moz-transition-duration: 0.3s;
      -o-transition-duration: 0.3s;
      transition-duration: 0.3s;
      -webkit-border-radius: 5px 0px 0px 5px;
      -moz-border-radius: 5px 0px 0px 5px;
      border-radius: 5px 0px 0px 5px;
    }
    #slideout_inner {
      z-index: 999;
      position: fixed;
      top: 25%;
      right: -250px;
      background: #5cb85c;
      width: 250px;
      padding: 0;
      height: 170px;
      -webkit-transition-duration: 0.3s;
      -moz-transition-duration: 0.3s;
      -o-transition-duration: 0.3s;
      transition-duration: 0.3s;
      text-align: left;
      -webkit-border-radius: 0px 0 0px 5px;
      -moz-border-radius: 0px 0 0px 5px;
      border-radius: 0px 0 0px 5px;
    }
    #slideout_inner textarea {
      z-index: 999;
      margin-right: 5px;
      width: 210px;
      height: 100px;
      margin-bottom: 6px;
    }
    #slideout:hover {
      z-index: 999;
      right: 250px;
    }
    #slideout:hover #slideout_inner {
      z-index: 999;
      right: 0;
    }
    tbody tr {
  cursor: pointer;
}

.modal:before {
  content: '';
  display: inline-block;
  height: 100%;
  vertical-align: middle;
  margin-right: -4px; /* Adjusts for spacing */
}

.modal-dialog {
  display: inline-block;
  text-align: left;
  vertical-align: middle;
}
.sorting, .sorting_asc, .sorting_desc {
    background : none;
}
table.dataTable thead .sorting, 
table.dataTable thead .sorting_asc, 
table.dataTable thead .sorting_desc {
    background : none;
}
.autocomplete-suggestions { cursor:pointer;border: 1px solid #999; background: #FFF; cursor: default; overflow: auto; -webkit-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); -moz-box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); box-shadow: 1px 4px 3px rgba(50, 50, 50, 0.64); }
.autocomplete-suggestion { cursor:pointer;padding: 2px 5px; white-space: nowrap; overflow: hidden; }
.autocomplete-no-suggestion { padding: 2px 5px;}
.autocomplete-selected { background: #F0F0F0; }
.autocomplete-suggestions strong { font-weight: bold; color: #000; }
.autocomplete-group { padding: 2px 5px; }
.autocomplete-group strong { font-weight: bold; font-size: 16px; color: #000; display: block; border-bottom: 1px solid #000; }
</style>
</head>
<body>
  <div id="slideout">
    <img src="http://img.usabilitypost.com.s3.amazonaws.com/1104/css_slideout/feedback.png" alt="Feedback" />
    <div id="slideout_inner">
      <span id="loadicon" class="glyphicon glyphicon-refresh spin" style="color:#fff;font-size:50px;padding:10px;"></span>
      <div id="formz">
      <form>
          <div class="form-group">
            <div class="col-sm-12">
                <textarea name="feedback" class="form-control" id="feedback" placeholder="Any comments or suggestions are welcome!" style="resize:none;padding-top:8px;padding-bottom:8px;" rows="3"></textarea>
            </div>
          </div>
      </form>
          <div class="form-group">
              <button class="btn btn-primary" id="sendfeedback" style="padding:4px;margin-left:1em">Submit</button>
          </div>
      
      </div>
    </div>
  </div>
<?php
include "../nav.php";
if( $stmt->rowCount() <= 0)
{
    die("<div class='col-md-12'><center><h2>Oops!</h2>This user / record does not exist.<br><br><a href='index.php'><button class='btn btn-primary'>Go Back</button></a></center></div>");
}
?>
<div class="container-fluid"><br>
  <div class="row">
    <div class="col-md-12" style="">
      <div style="background:#fff;margin-bottom:1em;padding:1.2em;" class="col-md-12">

        <div class="col-md-2" style="background:#fff;"><center>
          <?php
          if ($row['sex'] == "0") {
            echo '<img src="../imgs/partner.png" style="margin-bottom:5px">';
          } else {
            echo '<img src="../imgs/female.png" style="margin-bottom:5px">';
          }
          $byte = $db->prepare("SELECT SUM(amt) as total FROM bytez m WHERE m.hrdbid='".$_GET['id']."' ");
          $byte->execute();
          $bytez = $byte->fetch();
          ?>
          <br><span class="glyphicon glyphicon-flash"></span>Bytez: <b><?php echo number_format($bytez['total']); ?></b><br>
        <span class="glyphicon glyphicon-question-sign" id="tooltip3" data-toggle="popover" data-original-title="Bytez <span class='glyphicon glyphicon-flash'>" data-content="Bytez are automatically earned by using the system. What are they for? Nothing for now." rel="popover" data-placement="top" data-trigger="hover" ></span><br>
          <span style="color:#ccc"><span id="feelingstat"><?php if ($row['feeling']!="") { echo $row['feeling']; } else { if ($_SESSION['id']==$_GET['id']) { echo "How are you feeling, ".$row['firstname']."? &nbsp;"; } } ?></span>
            <?php if ($_SESSION['id']==$_GET['id']) { ?>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#feelModal" style="margin-top:-3px;border:0;font-size:12px;background:#18bc9c;padding:2px;padding-right:7px;padding-left:7px"><span class="glyphicon glyphicon-pencil"></span></button>
            <?php } ?>
<!-- Modal -->
  <div class="modal fade" id="feelModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="padding:1em">
        <div class="modal-body">
              <div class="form-group" style="margin-bottom:0">
                <input class="form-control" id="feelvalue" name="feelvalue" placeholder="How are you feeling, <?php echo $row['firstname']; ?>?">
              </div>
              <button type="button" class="btn btn-primary pull-right" style="margin-top:0;" id="saveFeeling">Save</button>
              <div class="clearfix"></div>
        </div>
      </div>
      
    </div>
  </div>
<!-- Modal -->
  <div class="modal fade" id="requestTWG" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="padding:1em">
        <div class="modal-body">
              <div class="form-group" style="margin-bottom:0">
                <select class="form-control" id="reqtwg_option">
                  <option value="">Add/Edit/Delete</option>
                  <option>Add</option>
                  <option>Edit</option>
                  <option>Delete</option>
                </select>
              </div>
              <div class="form-group" style="margin-bottom:0">
                <input class="form-control" id="reqtwg_name" name="reqtwg_name" placeholder="Complete name of TWG">
              </div>
              <div class="form-group" style="margin-bottom:0">
                <input class="form-control" id="reqtwg_remarks" name="reqtwg_remarks" placeholder="Explanation / Remarks">
              </div>
              <button type="button" class="btn btn-primary pull-right" style="margin-top:0;" id="saveRequest">Send Request</button>
              <div class="clearfix"></div>
        </div>
      </div>
      
    </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="twgmodal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="padding:1em;padding-top:0">
        <div class="modal-body" style="padding-top:0">
          <h2>Technical Working Groups</h2>
              <div class="form-group" >
                <select class="form-control" style="margin-bottom:0" id="twgname">
                    <option value="" selected>Select TWG</option>
                    <option>Management Committee</option>
                  </select>
              </div>
              <div class="form-group">
                  <select class="form-control" style="margin-bottom:0" id="twgtype">
                    <option value="" selected>Select Type</option>
                    <option>NITWG</option>
                    <option>DSWD</option>
                    <option>SLP</option>
                  </select>
              </div>
              <div class="form-group">
                  <select class="form-control" style="margin-bottom:0" id="twgstatus">
                    <option value="" selected>Select Status</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                  </select>
              </div>
              <div class="form-group">
                  <select class="form-control" style="margin-bottom:0" id="twgmember">
                    <option value="" selected>Select Membership</option>
                    <option value="1">Focal Person</option>
                    <option value="0">Alternate</option>
                  </select>
              </div>
              <button type="button" class="btn btn-primary pull-right" style="margin-top:0;" id="saveTWG">Save</button>
              <div class="clearfix"></div>
        </div>
      </div>
      
    </div>
  </div>
          </span>
          </center>
        </div>
        <div class="col-md-8" style="background:#fff;">
          <b><font size="3"><?php if ($row['nickname'] != "") { echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname'].' ('.$row['nickname'].')'; } else { echo $row['firstname'].' '.$row['middlename'].' '.$row['lastname']; } ?></font></b>
          <br>
          <span style="color:#999;">
            <?php if ($row['region'] == "NPMO") { echo $row['region']; } else { echo $row['region'].' - '.$row['province'].' - '.$row['municipality']; }?>
            <br>
            <?php echo $row['designation'];?><br>
            <?php echo $row['emailaddress'];?><br>
            <?php echo $row['contactnumber'];?><br>
            <?php if ($_SESSION['permlvl'] > 0) {
              echo "<span style='color:#d9534f;'>";
              echo "Birthdate: ".$row['birthdate']."<br>";
              echo "Employment Status: ".$row['employstatus']."<br>";
              echo "Fund Source: ".$row['fundsource']."<br>";
              echo "</span>";
            } ?>
            <br>
            <table class="table table-bordered table-hover" style="width:480px">
              <tr><th colspan="2" style="vertical-align:middle">
                <span style="color:#2c3e50">Working Groups 
                  <div style="margin-top:3px;display:inline"><span class="glyphicon glyphicon-question-sign" id="tooltip1" data-toggle="popover" data-original-title="Technical Working Groups" data-content="<span class='glyphicon glyphicon-star' style='color:#ffcc09'></span> - Indicates head / focal person<br><b>NITWG</b> - National Inter-agency TWG<br><b>DSWD</b> - TWG within DSWD<br><b>SLP</b> - TWG within SLP" rel="popover" data-placement="top" data-trigger="hover" ></span></div></span><button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#requestTWG" style="margin-top:2px;padding:0;padding-left:3px;padding-right:3px;font-size:11px;font-weight:bold">Request Change</button><?php if ($_SESSION['id']==9) { echo '<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#twgmodal" style="margin-top:2px;padding:0;padding-left:3px;padding-right:3px;font-size:10px;font-weight:bold">Add</button>'; } ?>
              </th><tr>
<?php
try {
  $stmt3 = $db->prepare("SELECT groupname, groupdesc, isactive, groupleader FROM HRgroups WHERE HRDBid = :HRDBid");
  $stmt3->bindParam(':HRDBid', $_GET['id']);
  $stmt3->execute();
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}//endtry

    while ($row4 = $stmt3->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
      if ($row4[2]=="1") {
        $row4[2]="Active";
      } else {
        $row4[2]="Inactive";
      }
      if ($row4[3]==1) {
        $row4[3]=" &nbsp;<span class='glyphicon glyphicon-star' style='color:#ffcc09'></span>";
      } else {
        $row4[3]="";
      }
      if ($row4[1]==null) {
        echo '<tr><td style="font-size:13px">'.$row4[0].$row4[3].'</td><td style="font-size:13px;width:130px"><center>'.$row4[2].'</center></td></tr>'; 
      } else {
        echo '<tr><td style="font-size:13px">'.$row4[0].$row4[3].'</td><td style="font-size:13px;width:130px"><center>'.$row4[1].'-'.$row4[2].'</center></td></tr>'; 
      }
    }

$row5 = $stmt3->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT);
if ($stmt3->rowCount() <= 0) {
  echo "<tr><td colspan='2'>None</td></tr>";
}
  
              ?>
            </table>
            <?php
              if ($_SESSION['permlvl'] > 0 || ($_SESSION['id'] == $_GET['id'])) {
                echo '<a href="edit.php?id='.$_GET['id'].'"><button class="btn btn-success" style="padding:5px;margin-top:1em"><span class="glyphicon glyphicon-cog"></span> &nbsp;Edit</button></a>&nbsp; ';
              }
              if ($_SESSION['permlvl'] > 0) {
                echo '<button class="btn btn-danger" id="deleterecord" style="padding:5px;margin-top:1em"><span class="glyphicon glyphicon-remove"></span> &nbsp;Delete</button></a>';
              }
              if ($_SESSION['permlvl'] > 1) {
                echo '&nbsp; <button class="btn btn-info" id="levelup" style="padding:5px;margin-top:1em"><span class="glyphicon glyphicon-arrow-up"></span> &nbsp;Level</button> &nbsp<button class="btn btn-warning" id="resetpass" style="padding:5px;margin-top:1em"><span class="glyphicon glyphicon-eye-open"></span> &nbsp;Reset Password</button></a> &nbsp<button class="btn btn-warning" id="resend" style="padding:5px;margin-top:1em"><span class="glyphicon glyphicon-eye-open"></span> &nbsp;Resend Confirmation</button></a>';
              }
              
              if ($_SESSION['id'] == 1330) {
                echo '<button class="btn btn-warning" id="resend" style="padding:5px;margin-top:1em"><span class="glyphicon glyphicon-eye-open"></span> &nbsp;Resend Confirmation</button>';
              }
            ?>
          </span>
        </div>
        <div class="col-md-2" style="text-align:right">
          <b>DSWD Computer</b>
            <br>
          <span style="color:#999;">
            <?php
              if ($row['comptype'] == "") {
                echo "none issued";
              } else {
                echo $row['comptype']."<br>".$row['compyear'];
              }
            ?>
          </span>
        </div>

      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12" style="">
      <div style="background:#fff;margin-bottom:1em;padding:1.2em;padding-top:0em" class="col-md-12">
          <div class="row col-md-12" style="margin-top:0">
            <h3 style="margin-bottom:0"><b>ROVER</b></h3>
            Click on rows to view more<br><br>
          </div>
          <div class="col-md-8" style="margin-left:0;padding-left:0">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-hover hover" id="viewdata" style="background-color:#fff;width:100%">
                    <thead>
                      <tr>
                        <th colspan="3">When</th>
                        <th colspan="2">Where</th>
                        <th colspan="5">What</th>
                      </tr>
                      <tr style="display:none">
                        <th>id</th>
                        <th>When</th>
                        <th>End Date</th>
                        <th>Event</th>
                        <th>Where</th>
                        <th>What</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                    </thead>
              </table>
              <!--<a href="rover.php"><button class="btn btn-warning">Dashboard Preview</button></a>-->
              <script>
              function parseDate(str) {
                var zz = moment(str).format("D MMM");
                var t = str.split("-");
                var d = t[1]+"/"+t[2];
                return zz;
              }
              function parseDate2(str) {
                var zz = moment(str).format("D-MMMM");
                var t = zz.split("-");
                var d = "<center><b style='font-size:16px'>"+t[0]+"</b><br>"+t[1];
                return d;
              }
              function parseImg(str) {
                if (str=="AM") {

                }
              }
              oTable = $('#viewdata').dataTable({
                "aProcessing": true,
                "aServerSide": true,
                "orderCellsTop": true,
                "ajax": "hr_rover.php",
                "aaSorting": [9,'desc'],
                "dom": '<"top">rt<"bottom"p><"clear">',
                "fnRowCallback":
                  function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
                    $(nRow).attr('id', aData[0]);
                    return nRow;
                  },
                "aoColumnDefs": [
                        { 
                           "aTargets":[1],
                           "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                            {
                                $(nTd).css('text-align', 'center');
                                $(nTd).css('width', '19%');
                                $(nTd).css('font-size', '12.5px');
                            },
                            "mData": null,
                            "mRender": function( data, type, full) {
                                if (data[1] == data[2]) {
                                  return '<td style="vertical-align:middle"><div style="vertical-align:middle">'+parseDate2(data[1])+'</div></td>'; 
                                } else {
                                  return '<td><div class="col-md-5" style="margin:0;padding:0">'+parseDate2(data[1])+' '+data[6]+'</div> <div style="margin:0;padding:0" class="col-md-1">-</div> <div class="col-md-5" style="margin:0;padding:0">'+parseDate2(data[2])+' '+data[7]+'</div></td>';
                                }
                            }
                        },
                        { 
                           "aTargets":[2],
                           "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                            {
                                $(nTd).css('width', '20%');
                            }
                        },
                        { 
                           "aTargets":[5],
                           "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                            {
                                $(nTd).css('font-size', '14px');
                            },
                            "mData": null,
                            "mRender": function( data, type, full) {
                                return '<td><span style="color:#00AADe;font-weight:bold;">'+data[3]+'</span> - '+data[5]+'</td>';
                            }
                        },
                        { 
                           "aTargets":[8],
                           "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                            {
                                $(nTd).css('text-align', 'center');
                                $(nTd).css('font-size', '14px');
                            },
                            "mData": null,
                            "mRender": function( data, type, full) { 
                                if (data[9]>0) {
                                  return '<td><a href="viewrover.php?id='+data[0]+'"><span class="label label-success">File</span><br><span class="label label-primary">More</span></a></td>';
                                } else {
                                  return '<td><a href="viewrover.php?id='+data[0]+'"><span class="label label-primary">More</span></a></td>';
                                }                              
                            }
                        },
                        { 
                           "aTargets":[9],
                            "mData": null,
                            "mRender": function( data, type, full) {
                                return '<td>'+data[8]+'</td>';
                            }
                        },
                        { "bVisible": false, "aTargets":[0,2,3,6,7,9] }
                                ]
              });
$('#viewdata').on( 'click', 'tbody tr', function () {
          var redirection = $(this).attr('id');
          window.location.href = "viewrover.php?id="+redirection;
        });

            </script>
          </div>
          <div class="col-md-4">
            <div style="<?php if ($_SESSION['permlvl'] > 0 || ($_SESSION['id'] == $_GET['id'])) { echo ''; } else { echo 'display:none;'; } ;?>">
              <form id="postRover" action="" method="post" >
                        <div class="form-group" >
                            <div class="input-group">
                              <input type="text" class="form-control" aria-label="..." placeholder="Start Date" id="startdate" name="startdate" value="<?php echo $row["startdate"]; ?>">
                              <div class="input-group-btn">
                                <button id="ampm1" type="button" class="btn dropdown-toggle" data-toggle="dropdown" style="border: 2px solid #dce4ec;background:#dce4ec">AM / PM <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right" id="selectampm1">
                                  <li><a href="javascript:return false;">AM</a></li>
                                  <li><a href="javascript:return false;">PM</a></li>
                                </ul>
                              </div><!-- /btn-group -->
                            </div><!-- /input-group -->
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                              <input type="text" class="form-control" aria-label="..." placeholder="End Date" id="enddate" name="enddate">
                              <div class="input-group-btn">
                                <button id="ampm2" type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border: 2px solid #dce4ec;background:#dce4ec">AM / PM <span class="caret"></span></button>
                                <ul class="dropdown-menu dropdown-menu-right" id="selectampm2">
                                  <li><a href="javascript:return false;">AM</a></li>
                                  <li><a href="javascript:return false;">PM</a></li>
                                </ul>
                              </div><!-- /btn-group -->
                            </div><!-- /input-group -->
                        </div>
                          <div class="form-group">
                              <select class="form-control cleanselect" name="event" id="event" required>
                                <option value="" selected>Select Event</option>
                                <option>Official CDO</option>
                                <option>Internal CDO</option>
                                <option>Meeting outside Metro Manila</option>
                                <option>Meeting within Metro Manila</option>
                                <option>Meeting within Central Office</option>
                                <option>Field Monitoring</option>
                                <option value="Leave">Leave (Vacation, Sick, Forced, etc)</option>
                                <option>Workshop</option>
                                <option>Training</option>
                                <option>DSWD Event</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <input type="text" class="form-control" placeholder="Venue" id="venue" name="venue">
                          </div>
                          <div class="form-group">
                              <textarea name="remarks" maxlength="255" class="form-control" id="remarks" placeholder="Remarks" style="resize:none;padding-top:8px;padding-bottom:8px;" rows="3"></textarea>
                          </div>
<?PhP
$sql = "SELECT id, CONCAT(lastname, ', ', firstname) as name FROM HRDB";
$partnerIDArray = [];
$partnerArray = [];

foreach ($db->query($sql) as $results)
{
  $partnerIDArray[] = intval($results["id"]);
  $partnerArray[] = $results["name"];
}
?>
<script>
$(document).ready(function() {
  window.selectPartner = "";
  window.taggedPeople = [];
$(function () {
    'use strict';
    var partnerIDArray = <?php echo json_encode($partnerIDArray);?>;
    var partnerArray = <?php echo json_encode($partnerArray);?>;
    var arr = [];
    var element = {};
    
    for (var i = 0; i < partnerArray.length; i++) {
        var idname=partnerIDArray[i];
        var name=partnerArray[i];
        element[idname] = name;
    }
    var countriesArray = $.map(element, function (value, key) { return { value: value, data: key }; });
    $('#autocompleteajax').autocomplete({
        lookup: countriesArray,
        lookupFilter: function(suggestion, originalQuery, queryLowerCase) {
            var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
            return re.test(suggestion.value);
        },
        onSelect: function(suggestion) {
            window.selectPartner = suggestion.data;
            $('#idg').show();
            $("#subsector").tagit("createTag", suggestion.value);
            $('#autocompleteajax').val('');
            $("#tagpart").show();
            window.taggedPeople.push(suggestion.data);
            console.log(window.taggedPeople);
        },
        onHint: function (hint) {
            $('#autocomplete-ajax-x').val(hint);
        },
        onInvalidateSelection: function() {
            $('#selction-ajax').html('Selected Partner: <b><font color="#e74c3c">none</font></b>');
        }
    });
});
});
</script></form>
                            <div class="form-group">
                                    <input type="text" name="autocompleteajax" id="autocompleteajax" class="form-control" placeholder="Tag other people.."/>
                                    <input type="hidden" id="autocomplete-ajax-x" disabled="disabled"/>
                            </div>
                            <span id="tagpart" style="padding-left:5px;display:none">Tagged:</span>
                            <div class="form-group" style="margin-bottom:0.2em;" id="idg">
                                  <input name="subsector" id="subsector" value="" type="">
                            </div>

                            <button id="addrover" class="btn btn-info pull-right" style="">Add Record</button>
                  </div>
          </div>
          
      </div>
    </div>
  </div>


  <br><center>
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
</div><!--endcontainerfluid-->

<script src="http://slp.ph/js/pikaday.min.js"></script>
<script>
$(document).ready(function() {
  $("#tooltip1").popover({
        html : true
      });
  $("#tooltip3").popover({
        html : true
      });
$("#saveFeeling").click(function(event) {
  var formData = {
      'id'        : "<?php echo $_GET['id']; ?>",
      'feeling'   : document.getElementById("feelvalue").value
      };
                $.ajax({
                   url: "addfeel.php",
                   type: "POST",
                   data: formData,
                   success: function(data)
                   {
                      if (data == "good") {
                        $("#sucsubtext").html("Status update added")
                        $('#myModal').modal();
                        $('#myModal').on('hidden.bs.modal', function () {
                            location.reload();
                        })
                      } else {
                        alert(data);
                      }
                      return false;
                   }
                });//endAjax
});
$("#saveTWG").click(function(event) {
  var formData = {
      'id'        : "<?php echo $_GET['id']; ?>",
      'twgname'   : $('#twgname option:selected').val(),
      'twgtype'   : $('#twgtype option:selected').val(),
      'twgstatus' : $('#twgstatus option:selected').val(),
      'twgmember' : $('#twgmember option:selected').val()
      };
                $.ajax({
                   url: "addTWG.php",
                   type: "POST",
                   data: formData,
                   success: function(data)
                   {
                      if (data == "good") {
                        $("#sucsubtext").html("TWG added")
                        $('#myModal').modal();
                        $('#myModal').on('hidden.bs.modal', function () {
                            location.reload();
                        })
                      } else {
                        alert(data);
                      }
                      return false;
                   }
                });//endAjax
});
      
  time1 = "";
  time2 = "";
  $('#selectampm1 li').on('click', function(){
      time1 = $(this).text();
      $('#ampm1').html(time1 + ' <span class="caret"></span>');
  });
  $('#selectampm2 li').on('click', function(){
      time2 = $(this).text();
      $('#ampm2').html(time2 + ' <span class="caret"></span>');
  });

  $("#addrover").click(function(event) {
    event.preventDefault();
    event.stopImmediatePropagation();
    
    errors = 0;
    errorlist = "";
    if ($('input[name=startdate]').val() == "") {
      errors++;
      errorlist = "Please enter start date\n";
    }
    if ($('input[name=enddate]').val() == "") {
      errors++;
      errorlist = errorlist + "Please enter end date\n";
    }
    if (time1 == "") {
      errors++;
      errorlist = errorlist + "Please select time (AM/PM) for start date\n";
    }
    if (time2 == "") {
      errors++;
      errorlist = errorlist + "Please select time (AM/PM) for end date\n";
    }
    if ($('#event option:selected').val() == "") {
      errors++;
      errorlist = errorlist + "Please select event";
    }
    if (errors == 0) {
      $("#addrover").html("Processing..");
      var formData = {
              'id'                 : '<?php echo $_GET["id"]; ?>',
              'startdate'          : $('input[name=startdate]').val(),
              'starttime'          : time1,
              'enddate'            : $('input[name=enddate]').val(),
              'endtime'            : time2,
              'event'              : $('#event option:selected').val(),
              'venue'              : $('input[name=venue]').val(),
              'remarks'            : $('textarea[name=remarks]').val(),
              'subsector'          : window.taggedPeople.toString()
            };
      $.ajax({
                       url: "addrover.php",
                       type: "POST",
                       data: formData,
                       success: function(data)
                       {
                          if (data == "good") {
                            $("#sucsubtext").html("Rover record added")
                            $('#myModal').modal();
                            document.getElementById("startdate").value = "";
                            document.getElementById("enddate").value = "";
                            document.getElementById("remarks").value = "";
                            $("#addrover").html("Add Record");
                            $('#event').get(0).selectedIndex = 0;
                            var table = $('#viewdata').DataTable();
                            table.ajax.reload();
                          } else {
                            alert(data);
                          }
                       }
                    });//endAjax
      } else {
        alert(errorlist);
      }


    });

  $('#subsector').tagit({
        readOnly: true,
        onTagClicked: function(evt, ui) {
            var tagname = ($('#subsector').tagit('tagLabel', ui.tag));
            $("#subsector").tagit("removeTagByLabel", tagname);
        }
    });
    $('#idg').hide();
  $("#loadicon").hide();
  $("#deleterecord").click(function(event) {
    var r = confirm("You are about to delete a record. This will be recorded. Are you sure?");
    if (r == true) {
      var formData = {
      'id'        : "<?php echo $_GET['id']; ?>",
      'deleter'   : "<?php echo $_SESSION['id']; ?>"
      };
                $.ajax({
                   url: "delrecord.php",
                   type: "POST",
                   data: formData,
                   success: function(data)
                   {
                      if (data == "good") {
                        alert("Success!");
                        location.href = "index.php";
                      } else {
                        alert(data);
                      }
                      return false;
                   }
                });//endAjax
    }
  });
  $("#levelup").click(function(event) {
        var formData = {
          'id'        : "<?php echo $_GET['id']; ?>"
        };
        $.ajax({
           url: "levelup.php",
           type: "POST",
           data: formData,
           success: function(data)
           {
              if (data == "good") {
                $("#sucsubtext").html("User level increased")
                $('#myModal').modal();
                $('#myModal').on('hidden.bs.modal', function () {
                    location.reload();
                })
              } else {
                alert(data);
              }
           }
        });//endAjax
  });
  $("#resetpass").click(function(event) {
        var formData = {
          'id'        : "<?php echo $_GET['id']; ?>"
        };
        $.ajax({
           url: "resetpass.php",
           type: "POST",
           data: formData,
           success: function(data)
           {
              if (data == "good") {
                $("#sucsubtext").html("Password reset")
                        $('#myModal').modal();
                        $('#myModal').on('hidden.bs.modal', function () {
                            location.reload();
                        })
              } else {
                alert(data);
              }
           }
        });//endAjax
  });

  $("#resend").click(function(event) {
        var formData = {
          'id'        : "<?php echo $_GET['id']; ?>"
        };
        $.ajax({
           url: "resend.php",
           type: "POST",
           data: formData,
           success: function(data)
           {
              if (data == "good") {
                $("#sucsubtext").html("Confirmation email resent")
                $('#myModal').modal();
              } else {
                alert(data);
              }
           }
        });//endAjax
  });
  $("#saveRequest").click(function(event) {
        var formData = {
          'option'         : $('#reqtwg_option option:selected').val(),
          'twgname'        : $('input[name=reqtwg_name]').val(),
          'twgremarks'        : $('input[name=reqtwg_remarks]').val()
        };
        $.ajax({
           url: "reqTWG.php",
           type: "POST",
           data: formData,
           success: function(data)
           {
              if (data == "good") {
                $("#sucsubtext").html("TWG change request sent")
                        $('#myModal').modal();
                        $('#myModal').on('hidden.bs.modal', function () {
                            location.reload();
                        })
              } else {
                alert(data);
              }
           }
        });//endAjax
  });
  $("#sendfeedback").click(function(event) {
      sendFeedback("viewdata_user",$('textarea[name=feedback]').val(),"<?php echo $_SESSION['id']; ?>");
  });
}); //enddocready
</script>
<script>
    var picker2 = new Pikaday({ 
      field: $('#startdate')[0], 
      format: 'M/D/YYYY'
    });
    var picker3 = new Pikaday({ 
      field: $('#enddate')[0], 
      format: 'M/D/YYYY'
    });
</script>
<script type="text/javascript" src="../js/feedback.js"></script>
<script type="text/javascript" src="../js/jquery.autocomplete.min.js"></script>
</body>
</html>
