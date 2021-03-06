
$(document).ready(function() {
    $('#nickname').tooltip({'trigger':'focus', 'title': 'Hello!'});
    $('#extName').tooltip({'trigger':'focus', 'title': 'If applicable'});
    $('#emailaddress').tooltip({'trigger':'focus', 'title': 'Important: Valid email. This will be: username.'});
    $('#contactnumber').tooltip({'trigger':'focus', 'title': 'Important: Mobile num. only'});
    $('#employdate').tooltip({'trigger':'focus', 'title': 'Date started at SLP'});
    $('#password').tooltip({'trigger':'focus', 'title': 'This is for your SLP Online account.'});
    $('#remarks').tooltip({'trigger':'focus', 'title': 'Feel free to tell us anything'});
    $('#compnotes').tooltip({'trigger':'focus', 'title': 'For comments on your cpu'}); 
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };

    $('#captchaOperation').html([randomNumber(1, 10), '+', randomNumber(1, 10), '='].join(' '));
    var found3 = [];
            $("#region option").each(function() {
                  if($.inArray(this.value, found3) != -1) $(this).remove();
                  found3.push(this.value);
            });
    

    $('#editForm').bootstrapValidator({
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
                    notEmpty: {
                        message: 'This is a required field'
                    }
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
                    },
                    notEmpty: {
                        message: 'This is a required field'
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
                    },
                    notEmpty: {
                        message: 'This is a required field'
                    }
                }
            },
            password: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z0-9 .]+$/,
                        message: 'Only numbers, letters, and (.)'
                    },
                    stringLength: {
                        min: 6,
                        message: 'Passwords must be at least 6 characters'
                    },
                    notEmpty: {
                        message: 'This is a required field'
                    }
                }
            },
            password2: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z0-9 .]+$/,
                        message: 'Only numbers, letters, and (.)'
                    },
                    identical: {
                        field: 'password',
                        message: 'The passwords do not match'
                    },
                    notEmpty: {
                        message: 'This is a required field'
                    }
                }
            },
            remarks: {
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z0-9 \.\!]+$/,
                        message: 'Only alphabetical, numbers, (.) and (!)'
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
          'sex'                  : sexload,
          'birthdate'            : $('input[name=birthdate]').val(),
          'emailaddress'         : $('input[name=emailaddress]').val(),
          'contactnumber'        : $('input[name=contactnumber]').val(),
          'designation'          : $('#designation option:selected').val(),
          'position'             : $('#position option:selected').val(),
          'employstatus'         : $('#employstatus option:selected').val(),
          'employdate'           : $('input[name=employdate]').val(),
          'fundsource'           : $('#fundsource option:selected').val(),
          'region'               : $('#region option:selected').text(),
          'province'             : $('#province option:selected').text(),
          'municipality'         : $('#municipality option:selected').text(),
          'remarks'              : $('input[name=remarks]').val(),
          'comptype'             : $('#comptype option:selected').val(),
          'compyear'             : $('#compyear option:selected').val(),
          'compstatus'           : $('#compstatus option:selected').val(),
          'compnotes'            : $('input[name=compnotes]').val(),
          'id'                   : window.confirmcode
        };
        console.log(formData);
                $.ajax({
                   url: "edituser.php",
                   type: "POST",
                   data: formData,
                   success: function(data)
                   {
                      if (data == "loginok") {
                        document.getElementById("hrsubmit").disabled = false;
                        document.getElementById("hrsubmit").classList.remove("disabled");
                        $("#hrsubmit").html('Submit');
                        $("#loadicon").hide();
                        $("#maincontent").hide();
                        $(".successcontent").show();
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
                $("#editForm").unbind('submit');
                return false;
    });//endsuccess
    
});
