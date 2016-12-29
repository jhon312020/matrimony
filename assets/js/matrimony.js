$(document).ready(function(){

	$(".data-table").DataTable();
    
	$.ajaxSetup({
	       headers: {
	           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	       }
	});

	$('#add_role').submit(function(){
		if ($('#role_name').val().trim() == '') {
			displayAlert('For your information','Kindly fill the role name');
			return false;
		}
		changeStatus(':submit','disable');
		$.ajax({
			url: $('#base_url').val()+'admin/addRole',
			data:$('#add_role').serialize(),
			async:false,
			method : 'POST',
			success: function(result){
	        	if (result.error) {
	        		displayAlert('For your information',result.error);
	        	} else {
	        		displayAlert('Success','Created the role successfully');
	        		$('#add_role').trigger('reset');
	        	}
	        }
	   	});
		changeStatus(':submit','enable');
		return false;
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