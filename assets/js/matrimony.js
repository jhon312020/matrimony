$(document).ready(function(){

	if (typeof $('#success_status').val() != 'undefined') {
		displayAlert('Success',$('#success_status').val());
	}
	if (typeof $('#error_status').val() != 'undefined') {
		displayAlert('For Your Information ',$('#error_status').val());
	}

	$(document).on('click','.minimize-form', function(){
		alert($(this).parent().parent().parent().html());
		$(this).parent().parent().parent().find('.show_form').removeClass('show_form').addClass('hide_form');
		$(this).addClass('hide');
		$('.maximize-form').removeClass('hide');
	});

	$(document).on('click','.maximize-form', function(){
		$(this).parent().parent().parent().find('.hide_form').removeClass('hide_form').addClass('show_form');
		$(this).addClass('hide');
		$('.minimize-form').addClass('hide');
	});

	$(".data-table").DataTable();
    
	$.ajaxSetup({
	       headers: {
	           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       }
	});

	$('#add_user').submit(function(){
		if ($('#password').val() != $('#confirm_password').val()) {
			displayAlert('For your information','Password and Confirm password does not match');
			return false;
		}
		return true;
	});

	$(document).on('click','.delete_func', function(){
		deleteModal($(this).attr('data-href'));
	});

	$('#delete-modal-button').click(function(){
		window.location.href= $(this).attr('data-href');
	});

	$('form').validate({
		highlight: function(element) {
            $(element).addClass('red');
        },
        unhighlight: function(element) {
            $(element).removeClass('red');
        }
	});
    
});

function changeStatus(element, status) {
	if (status == 'disable') {
		$(element).addClass('disable');
		$(element).attr('disabled',true);
	} else if(status == 'enable') {
		$(element).removeClass('disable');
		$(element).attr('disabled',false);
	}
}

function displayAlert(title, message) {
  $('#alertModal').find('.modal-title').html(title);
  $('#alertModal').find('.modal-body p').html(message);
  $('#alertModal').modal('show');
}

function deleteModal(href){
	$('#deleteModal').find('#delete-modal-button').attr('data-href',href);
  	$('#deleteModal').modal('show');
}