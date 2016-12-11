
/*
 * Green River Tech Domain Password Reset Portal
 * Copyright (C) 2016 Organized Anarchy
 * MIT License
 */
$(function() {
    $('#loader').hide();
    $('#studentPassword').hide();
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "3000",
        "hideDuration": "1000",
        "timeOut": "10000",
        "extendedTimeOut": "5000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    $("#reset-form").on('submit', function(e) {
        e.preventDefault();
          $('#reset-form').hide();
          $('#loader').fadeIn(500);


        //Server call to submit password reset
        $.ajax({
            url: '/api/email.php',
            type: 'POST',
            data: {
                username: $('#username').val(),
                studentID: $('#studentID').val(),
                email: $('#email').val()
            },
            success: function(result) {
                if(result.error ===  401) {
                  $('#loader').hide();
                  $('#reset-form').fadeIn(500);
                  toastr.error(result.msg);
              } else {
                  // Display an info toast with no title
                  $('#loader').hide();

                  $('#studentPassword').html('<h2>Here is your new password!<br><br>' + result.password + '</h2>');
                  $('#studentPassword').show();

                  $('#username').val("");
                  $('#studentID').val("");
                  $('#email').val("");
              }
          }
        });
    });

});
