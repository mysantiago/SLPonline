<?php
require "zxcd9.php";
byteMe($_SESSION['id'],'main',0.10);
$stmt = $db->prepare("SELECT COUNT(id) as total FROM PRTemployers UNION SELECT SUM(numopenings) FROM PRTdemand UNION SELECT COUNT(id) FROM PRTsupply UNION SELECT COUNT(id) FROM HRDB UNION SELECT COUNT(id) FROM HRDB WHERE CONFIRMED = 1 UNION SELECT SUM(logincount) FROM HRDB UNION SELECT COUNT(id) FROM DOCDB UNION SELECT COUNT(id) FROM monicadb UNION (SELECT SUM(amt) FROM bytez m WHERE m.hrdbid='".$_SESSION['id']."')");
$stmt->execute();
$totalarray = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $totalarray[] = $row['total'];
}
function timeago($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '0 seconds';
    }

    $a = array( 365 * 24 * 60 * 60  =>  'year',
                 30 * 24 * 60 * 60  =>  'month',
                      24 * 60 * 60  =>  'day',
                           60 * 60  =>  'hour',
                                60  =>  'minute',
                                 1  =>  'second'
                );
    $a_plural = array( 'year'   => 'years',
                       'month'  => 'months',
                       'day'    => 'days',
                       'hour'   => 'hours',
                       'minute' => 'minutes',
                       'second' => 'seconds'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SLP Online</title>
    <meta name="description" content="SLP DSWD Livelihood"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="imgs/favicon.ico" type="image/x-icon">
    <link rel="icon" href="imgs/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/flatbootstrap.min.css"/>
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.js"></script>
    <script src="js/DTbootstrap.js"></script>
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
  <div id="slideout">
    <img src="http://img.usabilitypost.com.s3.amazonaws.com/1104/css_slideout/feedback.png" alt="Feedback" />
    <div id="slideout_inner">
      <span id="loadicon" class="glyphicon glyphicon-refresh spin" style="color:#fff;font-size:50px;padding:10px;display:none;"></span>
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
<div class="row" style="margin-right:0">

  <div class="col-md-3 padfix padfix2" style="">
    <div class="row">
      <div style="border:solid 1px #c5d6de;margin-left:1em;background:#fff;text-align:center;padding:1em">
        <?php
            if ($_SESSION['sex'] == "0") {
              echo '<img src="imgs/partner.png" style="margin-bottom:5px">';
            } else {
              echo '<img src="imgs/female.png" style="margin-bottom:5px">';
            }
        ?>
        <br><br>
        <?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?><br>
        <?php echo $_SESSION['designation']; ?><br>
        <a href="hr/user.php?id=<?php echo $_SESSION['id']; ?>"><span class="label label-info labelhover">View Profile</span></a><br>
        <br>
        <span class="glyphicon glyphicon-flash"></span>Bytez: <b><?php echo number_format($totalarray[8]); ?></b><br>
        <span class="glyphicon glyphicon-question-sign" id="tooltip1" data-toggle="popover" data-original-title="Bytez <span class='glyphicon glyphicon-flash'>" data-content="Bytez are automatically earned by using the system. What are they for? Nothing for now." rel="popover" data-placement="top" data-trigger="hover" ></span>
      </div>
    </div>
    <div class="row" style="margin-top:1em">
      <div style="border:solid 1px #c5d6de;margin-left:1em;background:#fff;text-align:center;padding:0;">

        <!--shoutbox table-->
        <table class="table table-bordered" style="margin-top:0em;line-height:0.9;vertical-align:middle;border:0;" id="shoutbox">
          <thead style="background:#f6f8fa">
            <th><b>National Shoutbox</b></th>
          </thead>
          <tbody style="height:300px;overflow-y:scroll;display:block">
<?php
      $stmtcom = $db->prepare("SELECT t.firstname, m.msg, m.added, t.region, t.id FROM shoutbox m LEFT JOIN HRDB t ON m.hrdbid=t.id ORDER BY m.id DESC LIMIT 15");
      $stmtcom->execute();
      while ($row8 = $stmtcom->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
            echo '<tr><td style="font-size:12px;vertical-align:middle"><div class="row nopad" style="vertical-align:middle" data-bg-text="'.timeago(strtotime($row8[2])).'"><div class="col-sm-12 nopad" style="text-align:left;line-height:1.1;padding-left:0.7em">'.$row8[1].' -<a href="http://slp.ph/hr/user.php?id='.$row8[4].'" style="color:#00ADDe;text-decoration:none">'.ucwords(strtolower($row8[0])).'</a></span><span style="color:#888;"> ('.$row8[3].')</span></div><div class="clearfix"></div></div></td></tr>';
      }
?>
          </tbody>
        </table>
        <!--shoutbox table-->


        <div class="form-group" style="margin:0;padding:0 1em 0 1em;margin-bottom:1em">
                    <div class="input-group" style="margin-bottom:0;margin-top:1em">
                      <input id="comment" name="comment" class="form-control" placeholder="" style="height:31.4px">
                      <div class="input-group-btn">
                        <button id="postcomment" class="btn btn-primary" style="padding:2px 8px 4px 8px">Post</button>
                      </div>
                    </div><!-- /input-group -->
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>
  <div class="col-md-9" style="padding:1em;padding-top:0;">

      <!--row1-->
      <div class="row" style="height:100%;">

          <!--HR-->
          <div class="col-xs-12 col-md-6 padfix" style="height:100%;">
            <div class="dashpanel">
              <div class="dashpanelheader">Human Resources</div>
            <div style="text-align:left;padding-left:1.2em;margin-bottom:0;padding-bottom:0">National database for HR data and universal access accounts</div>
            <br>
                    <div style="width:100%;text-align:center;margin-top:0">
                      <div style="width:32.5%;display:inline-block;padding-top;0">
                        <h3 style="margin-bottom:0;margin-top:0" id="hr1"></h3>
                        <span class="bluetext">Accounts</span>
                      </div>
                      <div style="width:32.5%;display:inline-block;">
                        <h3 style="margin-bottom:0;margin-top:0;" id="hr2"></h3>
                        <span class="bluetext">Confirmed</span>
                      </div>
                      <div style="width:32.5%;display:inline-block;">
                        <h3 style="margin-bottom:0;margin-top:0" id="hr3"></h3>
                        <span class="bluetext">Login Count</span>
                      </div>
                    </div>
                    <br>
            </div>
          </div>

          <!--HB-->
          <div class="col-xs-12 col-md-6 padfix3" style="height:100%;margin-bottom:1em;">
            <div class="dashpanel">
            <div class="dashpanelheader">HanapBuhay</div>
            <div class="dashpanelsubhead">EF tool for labor/market demand and supply</div>
            <br>
                  <div style="width:100%;">
                      <div style="width:32.5%;display:inline-block;">
                        <h3 style="margin-bottom:0;margin-top:0" id="hb1"></h3>
                        <span class="bluetext">Partners</span>
                      </div>
                      <div style="width:32.5%;display:inline-block;">
                        <h3 style="margin-bottom:0;margin-top:0;" id="hb2"></h3>
                        <span class="bluetext">Job Opportunities</span>
                      </div>
                      <div style="width:32.5%;display:inline-block;">
                        <h3 style="margin-bottom:0;margin-top:0" id="hb3"></h3>
                        <span class="bluetext">Participants</span>
                      </div>
                    </div>
                    <br>
            </div>
          </div>

      </div>
      <!--row1-->

      <div class="row">

          <div class="col-xs-12 col-md-6 padfix" style="height:100%;">
            <div class="dashpanel">
            <div class="dashpanelheader" style="margin-top:0">Virtual Cabinet</div>
            <div class="dashpanelsubhead">Repository for all SLP files</div>
            <br>
                    <div style="width:100%;">
                        <h3 style="margin-bottom:0;margin-top:0" id="vc1"></h3>
                        <span class="bluetext">Files</span>
                    </div>
                    <br>
            </div>
          </div>
          <div class="col-xs-12 col-md-6 padfix3" style="height:100%;">
            <div class="dashpanel">
            <div class="dashpanelheader">MonicaDB</div>
            <div class="dashpanelsubhead">Historical accomplishment 2011-2015</div>
            <br>
                    <div style="width:100%;">
                        <h3 style="margin-bottom:0;margin-top:0" id="md1"></h3>
                        <span class="bluetext">Records</span>
                    </div>
                    <br>
            </div>
          </div>
      </div>

      <div class="row padfix4" style="">
        <div class="col-xs-12 col-md-6" style="height:100%;">
          <div class="dashpanel">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-hover hover" id="viewdata" style="background-color:#fff;width:100%">
                      <thead style="background:#f6f8fa">
                        <tr>
                          <th></th>
                          <th>Feedback for System Development</th>
                          <th>Votes</th>
                          <th>Status &nbsp;<span class="glyphicon glyphicon-question-sign" id="tooltip2" data-toggle="popover" data-original-title="Status" data-content="<span class='glyphicon glyphicon-ok colgreen'></span> <span style='font-size:13px'>- Accepted / Completed</span><br><span class='glyphicon glyphicon-adjust' style='color:#5cb85c'></span> <span style='font-size:13px'>- Accepted / Queued</span><br><span class='glyphicon glyphicon-eye-open' style='color:#f0ad4e'></span> <span style='font-size:13px'>- Viewed / For Discussion</span>" rel="popover" data-placement="top" data-trigger="hover" style="margin-top:3px"></span></th>
                          <th>Already?</th>
                        </tr>
                      </thead>
                </table>
                <div class="clearfix" style="margin-bottom:0.8em" />
          </div>
        </div>
        <div class="col-xs-12 col-md-6 padfix3" style="height:100%;">
            <div class="dashpanel">
            <div class="dashpanelheader">MonicaDB</div>
            <div class="dashpanelsubhead">Historical accomplishment 2011-2015</div>
            <br>
                    <div style="width:100%;">
                        <h3 style="margin-bottom:0;margin-top:0" id="md1"></h3>
                        <span class="bluetext">Records</span>
                    </div>
                    <br>
            </div>
          </div>

      </div>
  </div>
</div>
<script src="js/countUp.js"></script>
<script type="text/javascript" src="js/feedback.js"></script>
<script>
$("#tooltip1").popover({html : true});
$("#tooltip2").popover({html : true});

$("#comment").keyup(function (e) {
    if (e.keyCode == 13) {
      if ($("#comment").val() == "") {
        return false;
      }
        $("#postcomment").html("...");
  document.getElementById("postcomment").disabled = true;
    var formData = {
      'action'        : "comment",
      'hrdbid'       : "<?php echo $_SESSION['id']; ?>",
      'comment'       : $('input[name=comment]').val()
    };
                $.ajax({
                   url: "addcomment.php",
                   type: "POST",
                   data: formData,
                   success: function(data)
                   {
                      if (data == "commented") {
                        $("#shoutbox").append('<tr><td style="font-size:12px;vertical-align:middle"><div class="row nopad" style="vertical-align:middle" data-bg-text="now"><div class="col-sm-12 nopad" style="text-align:left;line-height:1.1;padding-left:1em"> '+$('input[name=comment]').val()+' -<a href="http://slp.ph/hr/viewdata/user.php?id=" style="color:#00ADDe;text-decoration:none"><?php echo $_SESSION["firstname"]; ?></a></span><span style="color:#888;"> (<?php echo $_SESSION["filter"];?>)</span></div><div class="clearfix"></div></div></td></tr>');
                        $("#comment").val("");
                      } else {
                        alert(data);
                      }
                        $("#postcomment").html("Post");
                        document.getElementById("postcomment").disabled = false;
                   }
                });
                //endAjax
    }
 });

$("#postcomment").click(function(event) {
if ($("#comment").val() == "") {
  return false;
}
  $("#postcomment").html("...");
  document.getElementById("postcomment").disabled = true;
    var formData = {
      'action'        : "comment",
      'hrdbid'       : "<?php echo $_SESSION['id']; ?>",
      'comment'       : $('input[name=comment]').val()
    };
                $.ajax({
                   url: "addcomment.php",
                   type: "POST",
                   data: formData,
                   success: function(data)
                   {
                      if (data == "commented") {
                        $("#shoutbox").append('<tr><td style="font-size:12px;vertical-align:middle"><div class="row nopad" style="vertical-align:middle" data-bg-text="now"><div class="col-sm-12 nopad" style="text-align:left;line-height:1.1;padding-left:1em"> '+$('input[name=comment]').val()+' -<a href="http://slp.ph/hr/viewdata/user.php?id=" style="color:#00ADDe;text-decoration:none"><?php echo $_SESSION["firstname"]; ?></a></span><span style="color:#888;"> (<?php echo $_SESSION["filter"];?>)</span></div><div class="clearfix"></div></div></td></tr>');
                        $("#comment").val("");
                      } else {
                        alert(data);
                      }
                        $("#postcomment").html("Post");
                        document.getElementById("postcomment").disabled = false;
                   }
                });
                //endAjax
}); //endpost
$.fn.DataTable.ext.pager.numbers_length = 5;
  oTable = $('#viewdata').dataTable({
    "aProcessing": true,
    "aServerSide": true,
    "orderCellsTop": true,
    "pageLength": 6,
    "order": [[2, "desc" ]],
    "ajax": "dt_feedbackmain.php",
    "dom": '<"top">rt<"bottom"><"row"<"col-sm-3"><"col-sm-6 text-center"p><"col-sm-3">><"clear">',
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
                    $(nTd).css('text-align', 'left');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                    return '<td>'+data[1]+'</td>';
                }
            },
            { 
               "aTargets":[2],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('width', '10%');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                    if (data[4]>0) {
                      return '<td><b style="font-weight:900;font-size:20px">'+data[2]+'</b><br><span class="label label-danger" onclick="triggerVote('+data[0]+',0)" style="cursor:pointer">Unvote</span></td>';
                    } else {
                      return '<td><b style="font-weight:900;font-size:20px">'+data[2]+'</b><br><span class="label label-success" onclick="triggerVote('+data[0]+',1)" style="cursor:pointer"><span class="glyphicon glyphicon-arrow-up"></span> Vote</span></td>';
                    }                    
                }
            },
            { 
               "aTargets":[3],
               "fnCreatedCell": function(nTd, sData, oData, iRow, iCol)
                {
                    $(nTd).css('text-align', 'center');
                    $(nTd).css('width', '18%');
                },
                "mData": null,
                "mRender": function( data, type, full) {
                    if (data[3] == 3) {
                      return '<td style="vertical-align:middle;"><span style="padding-top:0.5em;font-size:22px;color:#5cb85c;" class="glyphicon glyphicon-ok"></span></td>'; 
                    } else if (data[3] == 2) {
                      return '<td style="vertical-align:middle;"><span style="padding-top:0.5em;font-size:22px;color:#5cb85c;" class="glyphicon glyphicon-adjust"></span></td>'; 
                    } else if (data[3] == 1) {
                      return '<td style="vertical-align:middle;"><span style="padding-top:0.5em;font-size:22px;color:#f0ad4e;" class="glyphicon glyphicon-eye-open"></span></td>'; 
                    } else {
                      return '<td> - </td>';
                    }
                }
            },
            { "bVisible": false, "aTargets":[0,4] }
                    ]
  });
$("#sendfeedback").click(function(event) {
      sendFeedback("maindashboard",$('textarea[name=feedback]').val(),"<?php echo $_SESSION['id']; ?>");
});
  function triggerVote(str,str2) {
    var formData = {
              'action' : str2, 
              'feedbackid' : str
            };
    $.ajax({
                   url: "castvote.php",
                   type: "POST",
                   data: formData,
                   success: function(data)
                   {
                      if (data == "good") {
                        alert("Success!");
                        window.location.reload();
                      } else if (data == "alreadyvote") {
                        alert("You already voted for this");
                      } else {
                        alert(data);
                      }
                      return false;
                   }
                });//endAjax
  }

var options = {
  useEasing : true, 
  useGrouping : true, 
  separator : ',', 
  decimal : '.', 
  prefix : '', 
  suffix : '' 
};
var c1 = new CountUp("hr1", 0, "<?php echo $totalarray[3]; ?>", 0, 3, options);
var c2 = new CountUp("hr2", 0, "<?php echo $totalarray[4]; ?>", 0, 3, options);
var c3 = new CountUp("hr3", 0, "<?php echo $totalarray[5]; ?>", 0, 3, options);
var c4 = new CountUp("hb1", 0, "<?php echo $totalarray[0]; ?>", 0, 3, options);
var c5 = new CountUp("hb2", 0, "<?php echo $totalarray[1]; ?>", 0, 3, options);
var c6 = new CountUp("hb3", 0, "<?php echo $totalarray[2]; ?>", 0, 3, options);
var c7 = new CountUp("vc1", 0, "<?php echo $totalarray[6]; ?>", 0, 3, options);
var c8 = new CountUp("md1", 0, "<?php echo $totalarray[7]; ?>", 0, 3, options);
c1.start();
c2.start();
c3.start();
c4.start();
c5.start();
c6.start();
c7.start();
c8.start();
</script>
</body>
</html>
