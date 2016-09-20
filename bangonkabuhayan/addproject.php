<?php
require "../zxcd9.php";
byteMe($_SESSION['id'],'bkadd',0.10);
?>
        <?php
                     
                     
                      try 
                      {

                       $query = "SELECT * from bk_step1 order by id DESC limit 0,1"; 
                       
                       $stmt = $db->prepare($query);
             

                       $result = $stmt->execute(); 
                    //   $lastId = $db->lastInsertId('id');
                       $row = $stmt->fetch();
                    
                      } 
                      catch(PDOException $ex) 
                      { die("Failed to run query: " . $ex->getMessage()); }      
               

                      $_SESSION['sid']=$row['id'];
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
    <link rel="stylesheet" href="../css/flatbootstrap.css"/>
    <script src="../js/jquery-1.10.2.min.js"></script>
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
    height: 40px;
    
}
.navbar {min-height:45px !important;background-color: #000}
#bootstrapSelectForm .selectContainer .form-control-feedback {
    right: -15px;
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
.progress {
    overflow: hidden;
    height: 20px;
    margin-bottom: 20px;
    background-color: #f5f5f5;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
    box-shadow: inset 0 1px 2px rgba(0,0,0,.1);
}
.progress-bar {
    float: left;
    width: 0;
    height: 100%;
    font-size: 12px;
    line-height: 20px;
    color: #fff;
    text-align: center;
    background-color: #428bca;
    -webkit-box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
    box-shadow: inset 0 -1px 0 rgba(0,0,0,.15);
    -webkit-transition: width .6s ease;
    transition: width .6s ease;
}
.bs-wizard {margin-top: 40px;}

/*Form Wizard*/
.bs-wizard {border-bottom: solid 1px #e0e0e0; padding: 0 0 10px 0;}
.bs-wizard > .bs-wizard-step {padding: 0; position: relative;}
.bs-wizard > .bs-wizard-step + .bs-wizard-step {}
.bs-wizard > .bs-wizard-step .bs-wizard-stepnum {color: #595959; font-size: 16px; margin-bottom: 5px;}
.bs-wizard > .bs-wizard-step .bs-wizard-info {color: #999; font-size: 14px;}
.bs-wizard > .bs-wizard-step > .bs-wizard-dot {position: absolute; width: 30px; height: 30px; display: block; background: #fbe8aa; top: 45px; left: 50%; margin-top: -15px; margin-left: -15px; border-radius: 50%;} 
.bs-wizard > .bs-wizard-step > .bs-wizard-dot:after {content: ' '; width: 14px; height: 14px; background: #fbbd19; border-radius: 50px; position: absolute; top: 8px; left: 8px; } 
.bs-wizard > .bs-wizard-step > .progress {position: relative; border-radius: 0px; height: 8px; box-shadow: none; margin: 20px 0;}
.bs-wizard > .bs-wizard-step > .progress > .progress-bar {width:0px; box-shadow: none; background: #fbe8aa;}
.bs-wizard > .bs-wizard-step.complete > .progress > .progress-bar {width:100%;}
.bs-wizard > .bs-wizard-step.active > .progress > .progress-bar {width:50%;}
.bs-wizard > .bs-wizard-step:first-child.active > .progress > .progress-bar {width:0%;}
.bs-wizard > .bs-wizard-step:last-child.active > .progress > .progress-bar {width: 100%;}
.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot {background-color: #f5f5f5;}
.bs-wizard > .bs-wizard-step.disabled > .bs-wizard-dot:after {opacity: 0;}
.bs-wizard > .bs-wizard-step:first-child  > .progress {left: 50%; width: 50%;}
.bs-wizard > .bs-wizard-step:last-child  > .progress {width: 50%;}
.bs-wizard > .bs-wizard-step.disabled a.bs-wizard-dot{ pointer-events: none; }
/*END Form Wizard*/
</style>
</head>
<body>
<?php require "../nav.php"; ?>
<div class="row" style="margin:0;padding:0">

  <div class="col-md-offset-2 col-md-8">
      <div style="border:solid 1px #c5d6de;background:#fff;text-align:center;padding:2em;margin-bottom:2em">
        <h2>BANGON KABUHAYAN</h2>
        NOMINATION FORM<br><br>
        <div class="row bs-wizard" style="border-bottom:0;">
            
                <div class="col-xs-3 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Basic Information</div>
                </div>
                <div class="col-xs-3 bs-wizard-step disabled"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Methodology</div>
                </div>
                <div class="col-xs-3 bs-wizard-step disabled"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Results</div>
                </div>
                <div class="col-xs-3 bs-wizard-step disabled"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Step 4</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">Reccomendations</div>
                </div>
            </div>
            <br><br>
        <form>
          <div class="form-group">
            <input class="form-control" placeholder="Name of Project" type="text" id="projectname" name="projectname" >
          </div>
          <div class="form-group">
              <select class="form-control cleanselect" name="region" id="region" onchange="getProv()">
                  <option value="" selected>Select Region</option>
                  <?php
                      $query = "SELECT * FROM lib_regions"; 
                      try 
                      { $stmt = $db->prepare($query); $result = $stmt->execute(); } 
                      catch(PDOException $ex) 
                      { die("Failed to run query: " . $ex->getMessage()); } 
                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                         echo "<option value='".$row['regid']."'>".$row['regname']."</option>";
                      }
                  ?>
              </select>
          </div>
          <div class="form-group">
                  <select class="form-control cleanselect" id="province" name="province" onchange="getCitymun()">
                    <option value="" selected>Select Province</option>
                  </select>
          </div>
          <div class="form-group">
                    <select class="form-control cleanselect" id="municipality" name="municipality" >
                      <option value="" selected>Select City/Municipality</option>
                    </select>
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Project Start Date(MM/DD/YYYY)" type="text" id="projectsd" name="projectsd">
          </div>
          <div class="form-group">
            <input class="form-control" placeholder="Average Annual Income of Project" type="text" id="AveAnnIncProject" name="AveAnnIncProject">
          </div>
          <h3>Type of Project Registration (if applicable)</h3><br>
          <div class="form-group" style="margin-top:0.5em;margin-left:2em">
              <div class="checkbox-inline" >
               <label><input type="checkbox" value="0" id="cda" name="cda" onchange="Cda();">CD</label>
              </div>
              <div class="checkbox-inline">
                <label><input type="checkbox" value="0" id="dole" name="dole" onchange="Dole();">DOLE</label>
              </div>
              <div class="checkbox-inline">
                <label><input type="checkbox" value="0" id="dti" name="dti" onchange="Dti();">DTI</label>
              </div> 
              <div class="checkbox-inline" >
                <label><input type="checkbox" value="0" id="sec" name="sec" onchange="Sec();">SEC</label>
              </div>
          </div>


   

          <div class="form-group">
                  <select class="form-control cleanselect" id="modality" name="modality" onchange="getBaby(this.id)">
                    <option value="" selected>Select Project Modalities</option>
                    <option value="mod_scf">SCF</option>
                    <option value="mod_cbla">CBLA</option>
                    <option value="mod_peaf">PEAF</option>
                    <option value="mod_st">ST</option>
                  </select>
          </div>

          <div class="row" id="mod_scf" name="mod_scf" style="display:none;">
                <div class="col-md-8">
                  <div class="input-group" style="margin-bottom:1em;" id="scf_activity" name="scf_activity">
                      <span class="input-group-addon" style="min-width:80px">SCF</span>
                      <input type="text" class="form-control" placeholder="Type of Activity" id="mod_scf" name="mod_scf">
                  </div>
                </div>
                <div class="col-md-2" style="padding-left:0;">
                      <div class="form-group">
                              <select class="form-control cleanselect" id="scf_start" name="scf_start">
                                <option value="" selected>Start Date</option>
                                <option value="01/01/2016">Jan 2016</option>
                                <option value="02/01/2016">Feb 2016</option>
                                <option value="03/01/2016">Mar 2016</option>
                                <option value="04/01/2016">Apr 2016</option>
                                <option value="05/01/2016">May 2016</option>
                                <option value="06/01/2016">Jun 2016</option>
                                <option value="07/01/2016">Jul 2016</option>
                                <option value="08/01/2016">Aug 2016</option>
                                <option value="09/01/2016">Sep 2016</option>
                                <option value="10/01/2016">Oct 2016</option>
                                <option value="11/01/2016">Nov 2016</option>
                                <option value="12/01/2016">Dec 2016</option>
                              </select>
                      </div>
                </div>
                <div class="col-md-2" style="padding-left:0;">
                      <div class="form-group">
                              <select class="form-control cleanselect" id="scf_end" name="scf_end">
                                <option value="" selected>End Date</option>
                                <option value="01/01/2016">Jan 2016</option>
                                <option value="02/01/2016">Feb 2016</option>
                                <option value="03/01/2016">Mar 2016</option>
                                <option value="04/01/2016">Apr 2016</option>
                                <option value="05/01/2016">May 2016</option>
                                <option value="06/01/2016">Jun 2016</option>
                                <option value="07/01/2016">Jul 2016</option>
                                <option value="08/01/2016">Aug 2016</option>
                                <option value="09/01/2016">Sep 2016</option>
                                <option value="10/01/2016">Oct 2016</option>
                                <option value="11/01/2016">Nov 2016</option>
                                <option value="12/01/2016">Dec 2016</option>
                              </select>
                      </div>
                </div>
          </div>
          <div class="row" id="mod_cbla" name="mod_cbla" style="display:none;">
                <div class="col-md-8">
                  <div class="input-group" style="margin-bottom:1em;" id="cbla_activity" name="cbla_activity">
                      <span class="input-group-addon" style="min-width:80px">CBLA</span>
                      <input type="text" class="form-control" placeholder="Type of Activity" id="mod_cbla" name="mod_cbla">
                  </div>
                </div>
                <div class="col-md-2" style="padding-left:0;">
                      <div class="form-group">
                              <select class="form-control cleanselect" id="cbla_start" name="cbla_start">
                                <option value="" selected>Start Date</option>
                                <option value="01/01/2016">Jan 2016</option>
                                <option value="02/01/2016">Feb 2016</option>
                                <option value="03/01/2016">Mar 2016</option>
                                <option value="04/01/2016">Apr 2016</option>
                                <option value="05/01/2016">May 2016</option>
                                <option value="06/01/2016">Jun 2016</option>
                                <option value="07/01/2016">Jul 2016</option>
                                <option value="08/01/2016">Aug 2016</option>
                                <option value="09/01/2016">Sep 2016</option>
                                <option value="10/01/2016">Oct 2016</option>
                                <option value="11/01/2016">Nov 2016</option>
                                <option value="12/01/2016">Dec 2016</option>
                              </select>
                      </div>
                </div>
                <div class="col-md-2" style="padding-left:0;">
                      <div class="form-group">
                              <select class="form-control cleanselect" id="cbla_end" name="cbla_end">
                                <option value="" selected>End Date</option>
                                <option value="01/01/2016">Jan 2016</option>
                                <option value="02/01/2016">Feb 2016</option>
                                <option value="03/01/2016">Mar 2016</option>
                                <option value="04/01/2016">Apr 2016</option>
                                <option value="05/01/2016">May 2016</option>
                                <option value="06/01/2016">Jun 2016</option>
                                <option value="07/01/2016">Jul 2016</option>
                                <option value="08/01/2016">Aug 2016</option>
                                <option value="09/01/2016">Sep 2016</option>
                                <option value="10/01/2016">Oct 2016</option>
                                <option value="11/01/2016">Nov 2016</option>
                                <option value="12/01/2016">Dec 2016</option>
                              </select>
                      </div>
                </div>
          </div>
          <div class="row" id="mod_peaf" name="mod_peaf" style="display:none;">
                <div class="col-md-8">
                  <div class="input-group" style="margin-bottom:1em;" id="peaf_activity" name="peaf_activity">
                      <span class="input-group-addon" style="min-width:80px">PEAF</span>
                      <input type="text" class="form-control" placeholder="Type of Activity" id="mod_peaf" name="mod_peaf">
                  </div>
                </div>
                <div class="col-md-2" style="padding-left:0;">
                      <div class="form-group">
                              <select class="form-control cleanselect" id="peaf_start" name="peaf_start">
                                <option value="" selected>Start Date</option>
                                <option value="01/01/2016">Jan 2016</option>
                                <option value="02/01/2016">Feb 2016</option>
                                <option value="03/01/2016">Mar 2016</option>
                                <option value="04/01/2016">Apr 2016</option>
                                <option value="05/01/2016">May 2016</option>
                                <option value="06/01/2016">Jun 2016</option>
                                <option value="07/01/2016">Jul 2016</option>
                                <option value="08/01/2016">Aug 2016</option>
                                <option value="09/01/2016">Sep 2016</option>
                                <option value="10/01/2016">Oct 2016</option>
                                <option value="11/01/2016">Nov 2016</option>
                                <option value="12/01/2016">Dec 2016</option>
                              </select>
                      </div>
                </div>
                <div class="col-md-2" style="padding-left:0;">
                      <div class="form-group">
                              <select class="form-control cleanselect" id="peaf_end" name="peaf_end">
                                <option value="" selected>End Date</option>
                                <option value="01/01/2016">Jan 2016</option>
                                <option value="02/01/2016">Feb 2016</option>
                                <option value="03/01/2016">Mar 2016</option>
                                <option value="04/01/2016">Apr 2016</option>
                                <option value="05/01/2016">May 2016</option>
                                <option value="06/01/2016">Jun 2016</option>
                                <option value="07/01/2016">Jul 2016</option>
                                <option value="08/01/2016">Aug 2016</option>
                                <option value="09/01/2016">Sep 2016</option>
                                <option value="10/01/2016">Oct 2016</option>
                                <option value="11/01/2016">Nov 2016</option>
                                <option value="12/01/2016">Dec 2016</option>
                              </select>
                      </div>
                </div>
          </div>
          <div class="row" id="mod_st" name="mod_st" style="display:none;">
                <div class="col-md-8">
                  <div class="input-group" style="margin-bottom:1em;" id="st_activity" name="st_activity">
                      <span class="input-group-addon" style="min-width:80px">ST</span>
                      <input type="text" class="form-control" placeholder="Type of Activity" id="mod_st" name="mod_st">
                  </div>
                </div>
                <div class="col-md-2" style="padding-left:0;">
                      <div class="form-group">
                              <select class="form-control cleanselect" id="st_start" name="st_start">
                                <option value="" selected>Start Date</option>
                                <option value="01/01/2016">Jan 2016</option>
                                <option value="02/01/2016">Feb 2016</option>
                                <option value="03/01/2016">Mar 2016</option>
                                <option value="04/01/2016">Apr 2016</option>
                                <option value="05/01/2016">May 2016</option>
                                <option value="06/01/2016">Jun 2016</option>
                                <option value="07/01/2016">Jul 2016</option>
                                <option value="08/01/2016">Aug 2016</option>
                                <option value="09/01/2016">Sep 2016</option>
                                <option value="10/01/2016">Oct 2016</option>
                                <option value="11/01/2016">Nov 2016</option>
                                <option value="12/01/2016">Dec 2016</option>
                              </select>
                      </div>
                </div>
                <div class="col-md-2" style="padding-left:0;">
                      <div class="form-group">
                              <select class="form-control cleanselect" id="st_end" name="st_end">
                                <option value="" selected>End Date</option>
                                <option value="01/01/2016">Jan 2016</option>
                                <option value="02/01/2016">Feb 2016</option>
                                <option value="03/01/2016">Mar 2016</option>
                                <option value="04/01/2016">Apr 2016</option>
                                <option value="05/01/2016">May 2016</option>
                                <option value="06/01/2016">Jun 2016</option>
                                <option value="07/01/2016">Jul 2016</option>
                                <option value="08/01/2016">Aug 2016</option>
                                <option value="09/01/2016">Sep 2016</option>
                                <option value="10/01/2016">Oct 2016</option>
                                <option value="11/01/2016">Nov 2016</option>
                                <option value="12/01/2016">Dec 2016</option>
                              </select>
                      </div>
                </div>
          </div>
          <div class="form-group">
                  <select class="form-control cleanselect" id="fundsource" name="fundsource" onchange="getBaby(this.id)">
                    <option value="" selected>Select Fund Source</option>
                    <option value="fund_dswd">DSWD</option>
                    <option value="fund_lgu">LGU</option>
                    <option value="fund_mfi">MFI</option>
                    <option value="fund_partner">Partner</option>
                    <option value="fund_participant">Participant Counterpart</option>
                  </select>
          </div>
          <div class="input-group" style="margin-bottom:1em;display:none" id="fund_dswd" name="fund_dswd">
              <span class="input-group-addon" style="min-width:200px">DSWD</span>
              <input type="text" class="form-control" placeholder="Amount provided by fund source (in PHP)" id="fund_dswd" name="fund_dswd">
          </div>
          <div class="input-group" style="margin-bottom:1em;display:none" id="fund_lgu" name="fund_lgu">
              <span class="input-group-addon" style="min-width:200px">LGU</span>
              <input type="text" class="form-control" placeholder="Amount provided by fund source (in PHP)" id="fund_lgu" name="fund_lgu" aria-describedby="sizing-addon2">
          </div>
          <div class="input-group" style="margin-bottom:1em;display:none" id="fund_mfi" name="fund_mfi">
              <span class="input-group-addon" style="min-width:200px">MFI</span>
              <input type="text" class="form-control" placeholder="Amount provided by fund source (in PHP)" id="fund_mfi" name="fund_mfi" aria-describedby="sizing-addon2">
          </div>
          <div class="input-group" style="margin-bottom:1em;display:none" id="fund_partner" name="fund_partner">
              <span class="input-group-addon" style="min-width:200px">Partner</span>
              <input type="text" class="form-control" placeholder="Amount provided by fund source (in PHP)" id="fund_partner" name="fund_partner" aria-describedby="sizing-addon2">
          </div>
          <div class="input-group" style="margin-bottom:1em;display:none" id="fund_participant" name="fund_participant">
              <span class="input-group-addon" style="min-width:200px">Participant Counterpart</span>
              <input type="text" class="form-control" placeholder="Amount provided by fund source (in PHP)" id="fund_participant" name="fund_participant" aria-describedby="sizing-addon2">
          </div>
          <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" placeholder="Contact Name" type="text" id="contactname" name="contactname" required>
                </div>          
                <div class="form-group">
                  <input class="form-control" placeholder="Contact Designation / Position" type="text" id="contactdp" name="contactdp" required>
                </div>          
                <div class="form-group">
                  <input class="form-control" placeholder="Contact Number" type="text" id="contactno" name="contactno" required>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" placeholder="Alternate Contact Name" type="text" id="altconname" name="altconname" required>
                </div>          
                <div class="form-group">
                  <input class="form-control" placeholder="Alternate Contact Designation / Position" type="text" id="altcontactdp" name="altcontactdp" required>
                </div>          
                <div class="form-group">
                  <input class="form-control" placeholder="Alternate Contact Number" type="text" id="altcontactno" name="altcontactno" required>
                </div>
              </div>
          </div>
          <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <input class="form-control" placeholder="Partner" type="text" id="partner1" name="partner1" >
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Partner" type="text" id="partner2" name="partner2" >
                </div>
                <div class="form-group">
                  <input class="form-control" placeholder="Partner" type="text" id="partner3" name="partner3" >
                </div>
              </div>
              <div class="col-md-2" style="padding-left:0">
                <div class="form-group">
                  <select class="form-control cleanselect" id="f1" name="f1">
                    <option value="" selected>Partner Type</option>
                  <option value="fund_dswd,">DSWD</option>
                    <option value="fund_lgu,">LGU</option>
                    <option value="fund_mfi,">MFI</option>
                    <option value="fund_partner,">Partner</option>
                    <option value="fund_participant,">Participant Counterpart</option>
                  </select>
                </div>          
                <div class="form-group">
                  <select class="form-control cleanselect" id="f2" name="f2" >
                    <option value="" selected>Partner Type</option>
                    <option value="fund_dswd,">DSWD</option>
                    <option value="fund_lgu,">LGU</option>
                    <option value="fund_mfi,">MFI</option>
                    <option value="fund_partner,">Partner</option>
                    <option value="fund_participant,">Participant Counterpart</option>
                  </select>
                </div>
                <div class="form-group">
                  <select class="form-control cleanselect" id="f3" name="f3" >
                    <option value="" selected>Partner Type</option>
                      <option value="fund_dswd,">DSWD</option>
                    <option value="fund_lgu,">LGU</option>
                    <option value="fund_mfi,">MFI</option>
                    <option value="fund_partner,">Partner</option>
                    <option value="fund_participant,">Participant Counterpart</option>
                  </select>
                </div>
              </div>
              <div class="col-md-4" style="padding-left:0;padding-right:0">
                <div class="form-group">
                  <input class="form-control" placeholder="Input Provided" type="text" id="input1" name="input1">
                </div>          
                <div class="form-group">
                  <input class="form-control" placeholder="Input Provided" type="text" id="input2" name="input2">
                </div>          
                <div class="form-group">
                  <input class="form-control" placeholder="Input Provided" type="text" id="input3" name="input3" >
                </div>          
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <input class="form-control" placeholder="Contact details" type="text" id="contactdetails1" name="contactdetails1">
                </div>          
                <div class="form-group">
                  <input class="form-control" placeholder="Contact details" type="text" id="contactdetails2" name="contactdetails2">
                </div>          
                <div class="form-group">
                  <input class="form-control" placeholder="Contact details" type="text" id="contactdetails3" name="contactdetails3">
                </div>     
              </div>
          </div>



          <div class="form-group">
            <button class="btn btn-info btn-md pull-right" id="submitpass" type="" >Next &nbsp;<span class="glyphicon glyphicon-arrow-right"></span></button>
          </div>
          <div class="clearfix"></div>

        </form>
      </div>
  </div>

</div>
<!-- Modal -->
      <div class="modal fade" id="myModal" role="dialog" style="margin-top:3em">
        <div class="modal-dialog modal-sm">

          <div class="modal-content" style="padding:1em;padding-top:0.5em;">
                  <h3 style="color:#5cb85c;margin-bottom:6px">Success!</h3>
                  <span style="font-size:13px" id="sucsubtext">Step 1 saved!</span><br><br>
                  <button type="button" class="btn btn-primary pull-right" style="background:#5cb85c;border:0;margin-top:0;padding:5px 10px 5px 10px" id="okaybtn" data-dismiss="modal">Okay</button>
                  <div class="clearfix"></div>
          </div>
          
        </div>
      </div>
      <!-- Modal -->


<script>

function getBaby(parent) {
  var str = $('#'+parent+' option:selected').val();
  $('#'+str).fadeIn(399);
  document.getElementById(parent).selectedIndex = "0";
}
function getProv() {
  var formData = { 
    'action' : 'province',
    'regionid' : $('#region option:selected').val()
  };
  $.ajax({
  type: "POST",
  url: "../hr/add/getLocations.php",
  data: formData,
  success: function(data) {
            $("#province").prop('disabled', false);
            $("#province").html(data);
        }

  });
}
function getCitymun() {
  var formData = { 
    'action' : 'citymun',
    'provid' : $('#province option:selected').val()
  };
  $.ajax({
  type: "POST",
  url: "../hr/add/getLocations.php",
  data: formData,
  success: function(data) {
            $("#municipality").prop('disabled', false);
            $("#municipality").html(data);
        }

  });
}
function Cda() {
  
        if (document.getElementById('cda').checked) {
             document.getElementById('cda').value=1;
        } else {
            document.getElementById('cda').value=0;        
        }   
}

function Dole() {
  
        if (document.getElementById('dole').checked) {    
             document.getElementById('dole').value=1;
        } else {
            document.getElementById('dole').value=0;       
        }   
}

function Dti() {
  
        if (document.getElementById('dti').checked) {    
             document.getElementById('dti').value =1;
        } else {
            document.getElementById('dti').value =0;    
        }   
}

function Sec() {
  
        if (document.getElementById('sec').checked) {            
             document.getElementById('sec').value =1;
        } else {
            document.getElementById('sec').value =0;           
        }   
}




$("#submitpass").click(function(event) {
  event.preventDefault();
  event.stopImmediatePropagation();
  $("#submitpass").html("Processing..");
  document.getElementById("submitpass").disabled = true;

  var formData = {


       'action'           :'submitpass',
       'projectname'      :$('input[name=projectname]').val(), 
       'region'           :$('#region option:selected').val(),
       'province'         :$('#province option:selected').val(),
       'municipality'     :$('#municipality option:selected').val(),
       'projectsd'        :$('input[name=projectsd]').val(), 
       'AveAnnIncProject' :$('input[name=AveAnnIncProject]').val(),
       'cda'              :$('input[name=cda]').val(),
       'dole'             :$('input[name=dole]').val(),
       'dti'              :$('input[name=dti]').val(),
       'sec'              :$('input[name=sec]').val(),
       'mod_scf'          :$('input[name=mod_scf]').val(),
       'scf_start'        :$('#scf_start option:selected').val(),
       'scf_end'          :$('#scf_end option:selected').val(),
       'mod_cbla'         :$('input[name=mod_cbla]').val(),
       'cbla_start'       :$('#cbla_start option:selected').val(),
       'cbla_end'         :$('#cbla_end option:selected').val(),
       'mod_peaf'         :$('input[name=mod_peaf]').val(),
       'peaf_start'       :$('#peaf_start option:selected').val(),
       'peaf_end'         :$('#peaf_end option:selected').val(),
       'mod_st'           :$('input[name=mod_st]').val(),
       'st_start'         :$('#st_start option:selected').val(),
       'st_end'           :$('#st_end option:selected').val(),
       'fund_dswd'        :$('input[name=fund_dswd]').val(), 
       'fund_lgu'         :$('input[name=fund_lgu]').val(), 
       'fund_mfi'         :$('input[name=fund_mfi]').val(), 
       'fund_partner'     :$('input[name=fund_partner]').val(), 
       'fund_participant' :$('input[name=fund_participant]').val(), 
       'contactname'      :$('input[name=contactname]').val(), 
       'altconname'       :$('input[name=altconname]').val(),
       'contactdp'        :$('input[name=contactdp]').val(),
       'altcontactdp'     :$('input[name=altcontactdp]').val(),
       'contactno'        :$('input[name=contactno]').val(),
       'altcontactno'     :$('input[name=altcontactno]').val(),
       'partner1'         :$('input[name=partner1]').val(),
       'partner2'         :$('input[name=partner2]').val(),
       'partner3'         :$('input[name=partner3]').val(),
       'f1'               :$('#f1 option:selected').val(),
       'f2'               :$('#f2 option:selected').val(),
       'f3'               :$('#f3 option:selected').val(),
       'input1'           :$('input[name=input1]').val(),
       'input2'           :$('input[name=input2]').val(),
       'input3'           :$('input[name=input3]').val(),
       'contactdetails1'  :$('input[name=contactdetails1]').val(),
       'contactdetails2'  :$('input[name=contactdetails2]').val(),
       'contactdetails3'  :$('input[name=contactdetails3]').val()

     };

  $.ajax({
       url: "functionz.php",
       type: "POST",
       data: formData,
       success: function(data)
       {
                if (data=="success") {
                    document.getElementById("submitpass").disabled = false;
                  $("#sucsubtext").html("Step 1 saved!");
                      $('#myModal').modal();
                      $('#myModal').on('hidden.bs.modal', function () {location.href = "../bangonkabuhayan/addproject_step2.php"; });
                    } else {
                     document.getElementById("submitpass").disabled = false;
                       $("#sucsubtext").html("Step 1 saved!");
                      $('#myModal').modal();
                      $('#myModal').on('hidden.bs.modal', function () {location.href = "../bangonkabuhayan/addproject_step2.php"; });


                    }

       }
    });//endajax
});


</script>
</body>
</html>
