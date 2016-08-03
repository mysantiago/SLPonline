
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>SLP | Office</title>
    <meta name="description" content="SLP DSWD Livelihood"/>
    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">
    <link rel="shortcut icon" href="imgs/favicon.ico" type="image/x-icon">
    <link rel="icon" href="imgs/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/flatbootstrap.css"/>
    <link rel="stylesheet" href="css/pikaday.css"/>
    <link href="css/jquery.tagit.css" rel="stylesheet" type="text/css">
    <link href="css/tagit.ui-zendesk.css" rel="stylesheet" type="text/css">
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="js/tag-it.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" src="js/jquery.autocomplete.min.js"></script>
    <style>

body {
    background-color: #f7f9fb;
    background-size: cover;
    font-family: "Lato";
}
.navbar-nav > li > a, .navbar-brand {
    padding-top:15px !important; 
    padding-bottom:0 !important;
    
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
table {
  border-collapse: inherit;
}
.slpdrop {
  font-weight:900;
  font-size:24px;
  margin-top:1em;
  margin-bottom:1.5em;
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
  border:solid 1px #c5d6de;margin:1em;margin-top:0;background:#fff;text-align: center
}
.bluetext {
  color: #00ADDe;
}
.brandimg {
display:none;
}
.navbar-brand > img {
 display:none;
}

@media (min-width: 990px) {
  .brandimg {
    display:inline;margin-right:0.5em;margin-top:-0.19em;margin-bottom:0;padding-bottom:0;height:50px;margin-top:10px;
  }
  .navbar-brand > img {
    display: block;
  }
  .navbar-nav > li > a, .navbar-brand {
  height:0px;
  }
}

</style>
</head>
<body>


<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="navbar-header" >
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>
    <a class="navbar-brand" href="../" style="font-weight:900;font-size:40px">
      <img src="imgs/slpmedium.png" class="brandimg">
    </a>
   <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle slpdrop" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            Human Resources <span class="caret"></span></a>
          <ul class="dropdown-menu slpdropsub">
            <li><a href="">Add Data</a></li>
            <li><a href="">View Data</a></li>
            <li><a href="">My Profile / ROVER</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle slpdrop" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            HanapBuhay <span class="caret"></span></a>
          <ul class="dropdown-menu slpdropsub">
            <li><a href="">Partners</a></li>
            <li><a href="">Jobs</a></li>
            <li><a href="">Supply</a></li>
            <li><a href="">Support</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle slpdrop" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            SLP Angel <span class="caret"></span></a>
          <ul class="dropdown-menu slpdropsub">
            <li><a href="">Search</a></li>
            <li><a href="">Upload</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle slpdrop" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
            MonicaDB <span class="caret"></span></a>
          <ul class="dropdown-menu slpdropsub">
            <li><a href="">Date/Time Data</a></li>
            <li><a href="">Names</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav" style="float:right;">
        <li class="dropdown" style="color:rgba(255,255,255,0.5);margin-top:0.5em;padding-right:1em">
            v1.0
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="row">

  <div class="col-md-3" style="padding:1em;padding-left:1em;padding-top:0">
    <div style="border:solid 1px #c5d6de;margin-left:1em;background:#fff;text-align:center;padding:1em">
      <img src="imgs/partner.png"><br><br>
      Juan de la Cruz<br>
      Information Technology Officer<br>
      How are you feeling, Migs?<br>
      <br>
      Bytes:<br>
      <span class="glyphicon glyphicon-question-sign" id="tooltip1" data-toggle="popover" data-original-title="Technical Working Groups" data-content="<span class='glyphicon glyphicon-star' style='color:#ffcc09'></span> - Indicates head / focal person<br><b>NITWG</b> - National Inter-agency TWG<br><b>DSWD</b> - TWG within DSWD<br><b>SLP</b> - TWG within SLP" rel="popover" data-placement="top" data-trigger="hover" ></span>
    </div>
  </div>
  <div class="col-md-9" style="padding:1em;padding-top:0">
      <div class="row">
          <div class="col-md-6">
            <div class="dashpanel">
            <span style="float:left;font-weight:900;padding:0.5em;padding-left:1em">Human Resources</span>
            <br><br>
                    <div style="width:100%;">
                      <div style="width:32.5%;display:inline-block;">
                        <h3 style="margin-bottom:0;margin-top:0">1,028</h3>
                        <span class="bluetext">Accounts</span>
                      </div>
                      <div style="width:32.5%;display:inline-block;">
                        <h3 style="margin-bottom:0;margin-top:0;">983</h3>
                        <span class="bluetext">Confirmed</span>
                      </div>
                      <div style="width:32.5%;display:inline-block;">
                        <h3 style="margin-bottom:0;margin-top:0">1,028</h3>
                        <span class="bluetext">ROVER Records</span>
                      </div>
                    </div>
                    <br>
            </div>
          </div>
          <div class="col-md-6">
            <div class="dashpanel">
            <span style="float:left;font-weight:900;padding:0.5em;padding-left:1em">HanapBuhay</span>
            <br><br>
                  <div style="width:100%;">
                      <div style="width:32.5%;display:inline-block;">
                        <h3 style="margin-bottom:0;margin-top:0">1,028</h3>
                        <span class="bluetext">Partners</span>
                      </div>
                      <div style="width:32.5%;display:inline-block;">
                        <h3 style="margin-bottom:0;margin-top:0;">983</h3>
                        <span class="bluetext">Openings</span>
                      </div>
                      <div style="width:32.5%;display:inline-block;">
                        <h3 style="margin-bottom:0;margin-top:0">1,028</h3>
                        <span class="bluetext">Participants</span>
                      </div>
                    </div>
                    <br>
            </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-6">
            <div class="dashpanel">
            <span style="float:left;font-weight:900;padding:0.5em;padding-left:1em">SLP Angel &nbsp;<span class="label label-danger">New</span></span>
            <br><br>
                    <div style="width:100%;">
                        <h3 style="margin-bottom:0;margin-top:0">1,028</h3>
                        <span class="bluetext">Files</span>
                    </div>
                    <br>
            </div>
          </div>
          <div class="col-md-6">
            <div class="dashpanel">
            <span style="float:left;font-weight:900;padding:0.5em;padding-left:1em">MonicaDB &nbsp;<span class="label label-danger">New</span></span>
            <br><br>
                    <div style="width:100%;">
                        <h3 style="margin-bottom:0;margin-top:0">1,028</h3>
                        <span class="bluetext">Records</span>
                    </div>
                    <br>
            </div>
          </div>
      </div>

      <div class="row" style="padding:1em;padding-top:0">
        <div class="dashpanel">
          <table cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-hover hover" id="viewdata" style="background-color:#fff;width:100%">
                    <thead>
                      <tr>
                        <th>Feedback</th>
                        <th>Votes</th>
                        <th>Status</th>
                      </tr>
                    </thead>
              </table>
        </div>
      </div>
  </div>

</div>

</body>
</html>
