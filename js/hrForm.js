
$(document).ready(function() {
    $('#nickname').tooltip({'trigger':'focus', 'title': 'Hello!'});
    $('#extName').tooltip({'trigger':'focus', 'title': 'If applicable'});
    $('#emailaddress').tooltip({'trigger':'focus', 'title': 'Important: Valid email. This will be your username.'});
    $('#contactnumber').tooltip({'trigger':'focus', 'title': 'Important: Mobile num. only'});
    $('#employdate').tooltip({'trigger':'focus', 'title': 'Date started at SLP'});
    $('#remarks').tooltip({'trigger':'focus', 'title': 'Feel free to tell us anything'});
    $('#compnotes').tooltip({'trigger':'focus', 'title': 'For comments on your cpu'}); 
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };

    $('#captchaOperation').html([randomNumber(1, 10), '+', randomNumber(1, 10), '='].join(' '));

    
    document.getElementById("province").disabled = true;
    document.getElementById("municipality").disabled = true;
    $("#region").change(function() {

      var $dropdown = $(this);
      $.getJSON("../json/regiondata2.json", function(data) {
      
        var key = $dropdown.val();
        var vals = [];
        var $secondChoice = $("#province");
        var $thirdChoice = $("#province");
        switch(key) {
          case 'Select Office':
            $secondChoice.empty();
            $secondChoice.append("<option value=''>-</option>");
            break;
          case 'NPMO':
            $secondChoice.empty();
            $secondChoice.append("<option value=''>-</option>");
            break;
          case 'CAR':
            vals = data.CAR.split(",");
            break;
          case 'NCR':
            vals = data.NCR.split(",");
            break;
          case 'REGION I':
            vals = data.I.split(",");
            break;
          case 'REGION II':
            vals = data.II.split(",");
            break;
          case 'REGION III':
            vals = data.III.split(",");
            break;
          case 'REGION IV-A':
            vals = data.IVA.split(",");
            break;
          case 'REGION IV-B':
            vals = data.IVB.split(",");
            break;
          case 'REGION V':
            vals = data.V.split(",");
            break;
          case 'REGION VI':
            vals = data.VI.split(",");
            break;
          case 'REGION VII':
            vals = data.VII.split(",");
            break;
          case 'REGION VIII':
            vals = data.VIII.split(",");
            break;
          case 'REGION IX':
            vals = data.IX.split(",");
            break;
          case 'REGION X':
            vals = data.X.split(",");
            break;
          case 'REGION XI':
            vals = data.XI.split(",");
            break;  
          case 'REGION XII':
            vals = data.XII.split(",");
            break;
          case 'CARAGA':
            vals = data.CARAGA.split(",");
            break;
          case 'ARMM':
            vals = data.ARMM.split(",");
            break;
          case 'NIR':
            vals = data.NIR.split(",");
            break;
        }
        
        if (key != "NPMO" && key != "Select Office") {
            document.getElementById("province").disabled = false;
            $secondChoice.empty();
            $secondChoice.append("<option>Select Province</option>");
            $.each(vals, function(index, value) {
              $secondChoice.append("<option>" + value + "</option>");
            });
        } else {
            document.getElementById("province").disabled = true;
            document.getElementById("municipality").disabled = true;
        }
        
        

      });
    $("#province").change(function() {

      var $dropdown = $(this);
      var json = $.getJSON("../json/munidata2.json", function(data) {
        var key2 = $dropdown.val();
        var vals = [];
        var $thirdchoice = $("#municipality");
        document.getElementById("municipality").disabled = false;

            if (key2) {       
                for (key in data) {
                    console.log(data[key2]);
                    vals = data[key2].split(",");
                }
            }
        
        
        $thirdchoice.empty();
        $thirdchoice.append("<option>Select Municipality</option>");
        $.each(vals, function(index, value) {
          $thirdchoice.append("<option>" + value + "</option>");
        });

          });//endjson
      });//endprovince
});


    $('#hrForm').bootstrapValidator({
        feedbackIcons: {
            valid: 'blank',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            firstname: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'Only alphabetical characters allowed'
                    },
                    notEmpty: {
                        message: 'This is a required field'
                    }
                }
            },
            midname: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'Only alphabetical characters allowed'
                    },
                }
            },
            lastname: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'Only alphabetical characters allowed'
                    },
                    notEmpty: {
                        message: 'This is a required field'
                    }
                }
            },
            nickname: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z ]+$/,
                        message: 'Only alphabetical characters allowed'
                    }
                }
            },
            extname: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z .]+$/,
                        message: 'Only alphabetical characters allowed'
                    }
                }
            },
            sex: {
                validators: {
                    notEmpty: {
                        message: 'Sex is required'
                    }
                }
            },
            birthdate: {
                validators: {
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'This is not a valid date'
                    }
                }
            },
            emailaddress: {
                validators: {
                    notEmpty: {
                        message: 'This is a required field'
                    },
                    emailAddress: {
                        message: 'Please enter a valid email address'
                    }
                }
            },
            contactnumber: {
                validators: {
                    stringLength: {
                        min: 11,
                        max: 11,
                        message: 'Mobile number is 11 digits (with 0 at start)'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Numbers only please'
                    }
                }
            },
            employdate: {
                validators: {
                    date: {
                        format: 'MM/DD/YYYY',
                        message: 'This is not a valid date'
                    }
                }
            },
            remarks: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z0-9 _\.\!]+$/,
                        message: 'Only alphabetical, numbers, (.), (!), and underscore'
                    }
                }
            },
            comptype: {
                validators: {
                      regexp: {
                          regexp: /^[a-zA-Z0-9 \-]+$/,
                          message: 'Only alphabetical and numerical'
                    }
                }
            },
            compyear: {
                validators: {
                      regexp: {
                          regexp: /^[a-zA-Z0-9 \-]+$/,
                          message: 'Only alphabetical and numerical'
                    }
                }
            },
            compstatus: {
                validators: {
                      regexp: {
                          regexp: /^[a-zA-Z0-9 \-]+$/,
                          message: 'Only alphabetical and numerical'
                    }
                }
            },
            compnotes: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z0-9 _\.\!]+$/,
                        message: 'Only alphabetical, numbers, (.), (!), and underscore'
                    }
                }
            },
            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            }
        }
    })
    .on('success.form.bv', function(e) {
        e.preventDefault();
        e.stopImmediatePropagation();
        $("#loadicon").show();
        $("#loadicon").addClass("spin");
        $("#hrsubmit").html('Processing..');
        document.getElementById("hrsubmit").classList.add("disabled");
        document.getElementById("hrsubmit").disabled = true;
        var formData = {
          'firstname'            : $('input[name=firstname]').val(),
          'midname'              : $('input[name=midname]').val(),
          'lastname'             : $('input[name=lastname]').val(),
          'nickname'             : $('input[name=nickname]').val(),
          'extname'              : $('input[name=extname]').val(),
          'sex'                  : sex,
          'birthdate'            : $('input[name=birthdate]').val(),
          'emailaddress'         : $('input[name=emailaddress]').val(),
          'contactnumber'        : $('input[name=contactnumber]').val(),
          'designation'          : $('#designation option:selected').val(),
          'position'             : $('#position option:selected').val(),
          'employstatus'         : $('#employstatus option:selected').val(),
          'employdate'           : $('input[name=employdate]').val(),
          'fundsource'           : $('#fundsource option:selected').val(),
          'region'               : $('#region option:selected').val(),
          'province'             : $('#province option:selected').val(),
          'municipality'         : $('#municipality option:selected').val(),
          'remarks'              : $('input[name=remarks]').val(),
          'comptype'             : $('#comptype option:selected').val(),
          'compyear'             : $('#compyear option:selected').val(),
          'compstatus'           : $('#compstatus option:selected').val(),
          'compnotes'            : $('input[name=compnotes]').val()
        };
                $.ajax({
                   url: "adduser.php",
                   type: "POST",
                   data: formData,
                   success: function(data)
                   {
                      if (data == "loginok") {
                        $("#loadicon").hide();
                        $("#maincontent").hide();
                        $(".successcontent").show();
                        $('#hrForm').bootstrapValidator('resetForm', true);
                      } else {
                        $("#statusdisp").show();
                        $("#statusdisp").html(data);
                        document.getElementById("hrsubmit").disabled = false;
                        document.getElementById("hrsubmit").classList.remove("disabled");
                        $("#hrsubmit").html('Submit');
                        $("#loadicon").hide();
                      }
                      return false;
                   }
                });//endAjax
                $("#hrForm").unbind('submit');
                return false;
    });//endsuccess
    
});
