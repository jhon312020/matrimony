$(document).ready(function(){

  if (typeof $('#success_status').val() != 'undefined') {
    displayAlert('Success',$('#success_status').val());
  }
  if (typeof $('#error_status').val() != 'undefined') {
    displayAlert('For Your Information ',$('#error_status').val());
  }

  $('[data-toggle="tooltip"]').tooltip();

  $(document).on('click','.minimize-form', function(){
    $(this).parent().parent().parent().find('form').hide();
    $(this).addClass('hide');
    $('.maximize-form').removeClass('hide');
  });

  $(document).on('click','.maximize-form', function(){
    $(this).parent().parent().parent().find('form').show();
    $(this).addClass('hide');
    $('.minimize-form').removeClass('hide');
  });

  $(document).on('click','.jsendInterest',function(){
    element = $(this);
    data = {interested_id:$(this).attr('data-target')};
    url = $(this).attr('data-action');
    $.ajax({
            async: false,
            method: "POST",
            data : data,
            url : url,
            success : function(result) {
              if (result.success) {
                $(element).removeClass('jsendInterest');
                $(element).removeAttr('data-target');
                $(element).removeAttr('data-action');
                $(element).text('Interested');
                displayAlert('Success','Your request has been sent');
              }
            }
    }); 
  });

    $(".dropdown").focus(
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

    $('#contact-form-submit').click(function() {
          $('#result_message').hide();
          $.ajax({
            async: false,
            method: "POST",
            data : $('#contact-form').serialize(),
            url : $('#contact-form').attr('action'),
            success : function(result) {
              if (result.success == true) {
                $('#result_message').removeClass('alert alert-danger');
                $('#result_message').addClass('alert alert-success');
                $('#result_message').html(result.message);
                document.getElementById('contact-form').reset();
              } else {
                $('#result_message').removeClass('alert alert-success');
                $('#result_message').addClass('alert alert-danger');
                $('#result_message').html(result.message);
              }
              $('#result_message').show();
            }
          });
    });


    $('#profile_id_search_form').submit(function(){
      if ($('#profile_id').val() == '') {
        return false;
      }
      window.location.href = $(this).attr('action')+'/'+$('#profile_id').val();
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
                    $('.'+$(this).attr('id')+'_label').text($(this).find('option:selected').text());
                } else {
                  switch ($(this).attr('id')) {
                    case 'annual_income':
                      $('#'+$(this).attr('id')+'_label').text(result.data.annual_income);
                      break;
                    case 'date_of_birth':
                      $('#'+$(this).attr('id')+'_label').text($(this).val());
                      $('.age_label').text(result.data.age+' Yrs');
                      break;
                    case 'preference_above_height':
                      $('#'+$(this).attr('id')+'_label').text($(this).val()+' Cm');
                      $('.'+$(this).attr('id')+'_label').text($(this).val()+' Cm');
                      break;
                    case 'facebook':
                    case 'twitter':
                    case 'google_plus':
                      $('.'+$(this).attr('id')+'_label').attr('href',$(this).val());
                      break;
                    default:
                      $('#'+$(this).attr('id')+'_label').text($(this).val());
                      $('.'+$(this).attr('id')+'_label').text($(this).val());
                      break;
                  }
                }
            });
            toggleForm(form_id,form_id.replace('-form',''));
          }
        }
    });

}

function displayAlert(title, message) {
  $('#alertModal').find('.modal-title').html(title);
  $('#alertModal').find('.modal-body p').html(message);
  $('#alertModal').modal('show');
}