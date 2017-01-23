$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );

    $('#registration-submit').click(function() {
          window.scrollTo(0, 0);
          $('#registrtion-loader').show();
          $('#result_message').hide();
          data = {
            username : $('#username').val(),
            password : $('#password').val(),
            gender : $('input[name=gender]:checked').val(),
            email : $('#email').val(),
            phone_number : $('#phone_number').val(),
            date_of_birth : $('#selected_month').val()+'/'+$('#selected_date').val()+'/'+$('#selected_year').val()
          };
          $.ajax({
            async: false,
            method: "POST",
            data : data,
            url : $('#registration-form').attr('action'),
            success : function(result) {
              if (result.success == true) {
                $('#result_message').removeClass('alert alert-danger');
                $('#result_message').addClass('alert alert-success');
                $('#result_message').html(result.message);
                document.getElementById('registration-form').reset();
              } else {
                $('#result_message').removeClass('alert alert-success');
                $('#result_message').addClass('alert alert-danger');
                $('#result_message').html(result.message);
              }
              $('#registrtion-loader').hide();
              $('#result_message').show();
            }
          });
        });
});

function toggleForm(tohide, toshow) {
    $('#'+tohide).hide();
    $('#'+toshow).show();
}

function updateProfile(form_id) {
    $.ajax({
        async: false,
        method: "POST",
        data : $('#'+form_id).serialize(),
        url : $('#'+form_id).attr('action'),
        success : function(result) {
          if (result.success == true) {
            $('#'+form_id).find('input, select, textarea').each(function(){
                if ($(this).is("select")) {
                    $('#'+$(this).attr('id')+'_label').text($(this).find('option:selected').text());
                } else {
                    $('#'+$(this).attr('id')+'_label').text($(this).val());
                }
            });
            toggleForm(form_id,form_id.replace('-form',''));
          }
        }
    });
}