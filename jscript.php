$(document).ready(function(){
	show();
});

// Display All Records
function show(){
	$.ajax({
		url: 'controller.php',
		method: 'post',
		data: {showRecords:1},
		dataType: 'json',
		cache:false,
		success:function(response){
			$('#dataTable').html(response);
		}
	});
}
// End Display all records

// POPHOVER view
$(document).ready(function(){
    $(document).on('mouseover', '.image', function(event){
		
     $anchor = $(event.target);
     var id = $anchor.attr('user-data');
     if ($anchor.hasClass('image')) {
     	$.ajax({
     		url: 'controller.php',
     		method: 'post',
     		data:{showSelectedRecords:1, id:id},
     		dataType: 'json',
     		success:function(response){
	     	$html = response;
	     	$('#'+id+'').popover({
    		// trigger : 'hover',
    		html : true,
    		placement: 'right',
    		container: 'body',
            content : $html
    		});
     		}
     	});
     }
    });

// Alternative code for popover
    /*$('.image').popover({
		content:fetchData,
		html:true,
		container: 'body',
		placement: 'left'
	});

    function fetchData(){
		var fetch_data = '';
		var element = $(this);
		var id = element.attr("user-data");
		$.ajax({
			url:"controller.php",
			method:"POST",
			dataType: 'json',
			async:false,
			data:{showSelectedRecords:1,user_id:id},
			success:function(data){
				fetch_data = data;
			}
		});
		return fetch_data;
	}*/
//  End Alternative code for popover



}); 
// End POPHOVER view 

// Add New Profile
$(document).ready(function(){
	$(document).on('submit', '#addEmpForm', function(event){
		event.preventDefault();
		$form = $(this);
		// console.log($form.attr('action'));
		// alert('I am ready');
		$.ajax({
			url: $form.attr('action'),
			method: $form.attr('method'),
			dataType: 'json',
			contentType: false,
			processData: false,
			cache: false,
			data: new FormData(this),
			success: function(response){
				console.log(response);
				// show();
				// $('#msg').html(response);
				// $('#addEmpForm')[0].reset();
			}
		});
	});
});
// Edit 
$(document).ready(function(){
	$(document).on('click', '#edit', function(event){
		event.preventDefault();
		$anchor = $(event.target);
		var id = $anchor.attr('user-data');
		// alert(id);
		$.ajax({
			url: 'controller.php',
			method: 'post',
			dataType: 'json',
			data:{showEditRecords:1,id:id},
			success:function(response){
				$('#UpdateFormDisplay').html(response);
				// console.log(response);
			}
		});
	});
});
// End Edit

// Update
$(document).ready(function(){
	$(document).on('submit', '#updateProfileForm', function(event){
		event.preventDefault();
		$form = $(this);
		$.ajax({
			url: $form.attr('action'),
			method: $form.attr('method'),
			// dataType: 'json',
			contentType: false,
			processData: false,
			cache: false,
			data: new FormData(this),
			success: function(response){
				show();
				$('#updateProfileModal').modal('toggle');
				// console.log(response);
			}
		});
	});
});
// End Update


// Delete 
$(document).ready(function(){
	$(document).on('click', '#delete', function(event){
		event.preventDefault();
		$anchor = $(event.target);
		var id = $anchor.attr('user-data');
		// if (confirm("Are you sure?")) {
	 //    }
  //   	return false;
		$.ajax({
			url: 'controller.php',
			method: 'post',
			dataType: 'json',
			data:{deleteRecords:1,id:id},
			success:function(response){
				show();
				console.log(response);
			}
		});
	});
});
// End Delete


// Status
$(document).ready(function(){
	$(document).on('click', '#status', function(event){
		event.preventDefault();
		$anchor = $(event.target);
		var id = $anchor.attr('user-data');
		var status = $anchor.attr('emp-status');

       // alert(id);
		$.ajax({
			url: 'controller.php',
			method: 'post',
			// dataType: 'json',
			data:{StatusEmp:1,id:id,status:status},
			success:function(response){
				show();
				location.reload();
				// console.log(response);
			}
		});
	});
});
// End Status