    $(document).ready(function(){
	
      $(".enabled_user").click(function(e){ 
		var pageURL = $(location). attr("href");
		
				e.preventDefault();
				var userstatus = $(this).attr('rel');
				var user_id = $(this).attr('user_id');
			
				swal({
				  title: "Are you sure, you want to disable the account?",
				  text: "",
				  icon: "warning",
				  buttons: [
					'No, cancel it!',
					'Yes, I am sure!'
				  ],
				  dangerMode: true,
				}).then(function(isConfirm) {
				  if (isConfirm) {
					swal({
					  title: 'Disabled!',
					   text: 'User has been Disabled successfully!',
					  icon: 'success'
					}).then(function() {
					
					
						$.ajax({
							type: "POST",
							url: baseURL+'administrator/user_enabled_disabled',
							data: {
								user_id : user_id,
								userstatus : userstatus
							},
							success: function(msg){
								if(msg==1){
								 window.location.href = pageURL; 
								 
								}
							}

						});

					});
				  } else {
					swal("Cancelled", "", "error");
				  }
				});
		});
		
			$(".disabled_user").click(function(e){ 
			var pageURL = $(location). attr("href");
				e.preventDefault();
				var userstatus = $(this).attr('rel');
				
				var user_id = $(this).attr('user_id');
				swal({
				  title: "Are you sure, you want to enable the account?",
				  text: "",
				  icon: "warning",
				  buttons: [
					'No, cancel it!',
					'Yes, I am sure!'
				  ],
				  dangerMode: true,
				}).then(function(isConfirm) {
				  if (isConfirm) {
					swal({
					  title: 'Enabled!',
					  text: 'User has been Enabled successfully!',
					  icon: 'success'
					}).then(function() {
				
						$.ajax({
							type: "POST",
							url: baseURL+'administrator/user_enabled_disabled',
							data: {
								user_id : user_id,
								userstatus : userstatus
							},
							success: function(msg){
								if(msg==1){
								  window.location.href = pageURL; 
								 
								}
							}

						});

					});
				  } else {
					swal("Cancelled", "", "error");
				  }
				});
		});
	   /************ End here ******************************/
	   
	   
	   
	   
	   	$( "#my_form_researcher" ).submit(function( event ){ //on form submit       
        var proceed = true;
        //loop through each field and we simply change border color to red for invalid fields       
        $("#my_form_researcher input[required=true],#my_form_researcher radio[required=true],#my_form_researcher file[required=true]").each(function(){
                $(this).css('border-color',''); 
                if(!$.trim($(this).val())){ //if this field is empty 
                    $(this).css('border-color','red'); //change border color to red   
					proceed = false; //set do not proceed flag
                }
                //check invalid email
                var email_reg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; 
                if($(this).attr("type")=="email" && !email_reg.test($.trim($(this).val()))){
                    $(this).css('border-color','red'); //change border color to red  
					proceed = false; //set do not proceed flag            
                }
        });
        if(proceed){
			//H5_loading.show();
			var fname = $('#fname').val();
			var emailid = $('#emailid').val();
			var password = $('#password').val();
			
			$.ajax({
				type: "POST",
				url: baseURL+'/administrator/addResearcher',
				data: {
				fname : fname,
				emailid : emailid,
				password : password

				},
				success: function(msgData) {
				console.log(msgData);
					//H5_loading.hide();
					if(msgData==1){
						window.location.href=baseURL+'administrator/researcher';
					}if(msgData==2){
						$('#researcher-error').show();
					}
				}
			});
				
        }
        event.preventDefault(); 
    });
	$("#my_form_researcher input[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
	});
	
	
	   $(".researcher_enabled_user").click(function(e){ 
		var pageURL = $(location). attr("href");
		
				e.preventDefault();
				var userstatus = $(this).attr('rel');
				var id = $(this).attr('id');
			
				swal({
				  title: "Are you sure, you want to disable the researcher?",
				  text: "",
				  icon: "warning",
				  buttons: [
					'No, cancel it!',
					'Yes, I am sure!'
				  ],
				  dangerMode: true,
				}).then(function(isConfirm) {
				  if (isConfirm) {
					swal({
					  title: 'Disabled!',
					   text: 'Researcher user has been Disabled successfully!',
					  icon: 'success'
					}).then(function() {
					
					
						$.ajax({
							type: "POST",
							url: baseURL+'administrator/researcher_user_enabled_disabled',
							data: {
								id : id,
								userstatus : userstatus
							},
							success: function(msg){
								if(msg==1){
								window.location.href = pageURL; 
								 
								}
							}

						});

					});
				  } else {
					swal("Cancelled", "", "error");
				  }
				});
		});
		
			$(".researcher_disabled_user").click(function(e){ 
			var pageURL = $(location). attr("href");
				e.preventDefault();
				var userstatus = $(this).attr('rel');
				
				var id = $(this).attr('id');
				swal({
				  title: "Are you sure, you want to enable the researcher?",
				  text: "",
				  icon: "warning",
				  buttons: [
					'No, cancel it!',
					'Yes, I am sure!'
				  ],
				  dangerMode: true,
				}).then(function(isConfirm) {
				  if (isConfirm) {
					swal({
					  title: 'Enabled!',
					  text: 'Researcher user has been Enabled successfully!',
					  icon: 'success'
					}).then(function() {
				
						$.ajax({
							type: "POST",
							url: baseURL+'administrator/researcher_user_enabled_disabled',
							data: {
								id : id,
								userstatus : userstatus
							},
							success: function(msg){
								if(msg==1){
								  window.location.href = pageURL; 
								 
								}
							}

						});

					});
				  } else {
					swal("Cancelled", "", "error");
				  }
				});
		});
	
		$(".researcher_delete").click(function(e){ 
			var pageURL = $(location). attr("href");
				e.preventDefault();
				var id = $(this).attr('id');
				swal({
				  title: "Are you sure, you want to delete this researcher?",
				  text: "",
				  icon: "warning",
				  buttons: [
					'No, cancel it!',
					'Yes, I am sure!'
				  ],
				  dangerMode: true,
				}).then(function(isConfirm) {
				  if (isConfirm) {
					swal({
					  title: 'Deleted!',
					  text: 'Researcher user has ben deleted successfully!',
					  icon: 'success'
					}).then(function() {
				
						$.ajax({
							type: "POST",
							url: baseURL+'administrator/researcher_delete',
							data: {
								id : id
								
							},
							success: function(msg){
								if(msg==1){
								  window.location.href=baseURL+'administrator/researcher';
								 
								}
							}

						});

					});
				  } else {
					swal("Cancelled", "", "error");
				  }
				});
		});
		
		
		$(".visit_user_delete").click(function(e){ 
			var pageURL = $(location). attr("href");
				e.preventDefault();
				var id = $(this).attr('id');
				swal({
				  title: "Are you sure, you want to delete this record?",
				  text: "",
				  icon: "warning",
				  buttons: [
					'No, cancel it!',
					'Yes, I am sure!'
				  ],
				  dangerMode: true,
				}).then(function(isConfirm) {
				  if (isConfirm) {
					swal({
					  title: 'Deleted!',
					  text: 'Record  has been deleted successfully!',
					  icon: 'success'
					}).then(function() {
				
						$.ajax({
							type: "POST",
							url: baseURL+'administrator/visit_user_delete',
							data: {
								id : id
								
							},
							success: function(msg){
								if(msg==1){
								  window.location.href=baseURL+'administrator/visit-user';
								 
								}
							}

						});

					});
				  } else {
					swal("Cancelled", "", "error");
				  }
				});
		});
		$('body').on('click', '.DownloadSearch', function() {
		
		H5_loading.show();
			var searchid = $(this).attr('searchid');
			var order_id = $(this).attr('order_id');
			var single_record_id = $(this).attr('single_record_id');
			var DownloadSearch = $(this).attr('DownloadSearch');
			
			
			//var baseUrl = $('#baseUrl').val();
			$.ajax({
			type: "POST",
			url: baseURL+'/dashboard/DownloadSearchData',
			data: {
			  searchid : searchid,
			  order_id : order_id,
			  single_record_id : single_record_id,
			  DownloadSearch : DownloadSearch

			},
			success: function(msgData) {
			 H5_loading.hide();
			  window.location.href = baseURL+'assets/csv/'+msgData;
			}
			});
		});
			$('body').on('click', '.importFile', function() {
		
			H5_loading.show();
			var filename = $(this).attr('filename');
			$.ajax({
				type: "POST",
				url: baseURL+'/administrator/cronJobExportData',
				data: {
					filename : filename
				  },
				success: function(msgData) {
				 H5_loading.hide();
				 if(msgData==1){
				 $('#s-message').show();
				 }
				  //window.location.href = baseURL+'assets/csv/'+msgData;
				}
			});
		});
		
		$(".assigned-reseacher").click(function(){ 
			var orderid = $(this).attr('rel');
			$('#orderid').val(orderid);
			
		 });
		
		 $("#reseacher-submit").click(function(){ 
		var pageURL = $(location). attr("href");
		var orderid = $('#orderid').val();
				var user_id = $('#select_reseacher').val();
			
				swal({
				  title: "Are you sure, you want to assign this ?",
				  text: "",
				  icon: "warning",
				  buttons: [
					'No, cancel it!',
					'Yes, I am sure!'
				  ],
				  dangerMode: true,
				}).then(function(isConfirm) {
				  if (isConfirm) {
					swal({
					  title: 'Assigned!',
					   text: 'Requested data has been assigned successfully!',
					  icon: 'success'
					}).then(function() {
					
					
						$.ajax({
							type: "POST",
							url: baseURL+'administrator/assigned_researcher',
							data: {
								user_id : user_id,
								orderid : orderid
							},
							success: function(msg){
								if(msg==1){
								 window.location.href = pageURL; 
								 
								}
							}

						});

					});
				  } else {
					swal("Cancelled", "", "error");
				  }
				});
		});
		
		
		
		$(".user_delete").click(function(e){ 
			var pageURL = $(location). attr("href");
				e.preventDefault();
				var id = $(this).attr('id');
				swal({
				  title: "Are you sure, you want to delete this User?",
				  text: "",
				  icon: "warning",
				  buttons: [
					'No, cancel it!',
					'Yes, I am sure!'
				  ],
				  dangerMode: true,
				}).then(function(isConfirm) {
				  if (isConfirm) {
					swal({
					  title: 'Deleted!',
					  text: 'user has ben deleted successfully!',
					  icon: 'success'
					}).then(function() {
				
						$.ajax({
							type: "POST",
							url: baseURL+'administrator/researcher_delete',
							data: {
								id : id
								
							},
							success: function(msg){
								if(msg==1){
								  window.location.href=baseURL+'administrator/users';
								 
								}
							}

						});

					});
				  } else {
					swal("Cancelled", "", "error");
				  }
				});
		});
		
$('body').on('click', '.downloadcsv', function() {
	var relVal = $(this).attr('rel');
	swal({
							 title: "Are you sure you want to download this search records",
							  text: "",
							  icon: "warning",
							  buttons: [
								'No, cancel it!',
								'Yes, I am sure!'
							  ],
							  dangerMode: true,
						}).then(function(isConfirm) {
						  if (isConfirm) {
							swal({
							  title: 'Download Data!',
							  text: 'This search has been start download successfully!',
							  icon: 'success'
							}).then(function() {
							   $('#loading').show(); 
										$.ajax({
										type: "POST",
										url: baseURL+'dashboard/downloadBuySearchRecord',
										data: {
											sid:relVal
										},
										success: function(msgData) {
											$('#loading').hide(); 
										 window.location.href = baseURL+'assets/csv/'+msgData;
										}
										});

							});
						  } else {
							swal("Cancelled", "", "error");
						  }
						});
});




	//End here	
	
    });




