$(document).ready(function() {
	var baseUrl = $('#baseUrl').val();
	$('.bbox1').show();
	
	
	
	/************ validation Start Code of Js ************/	
	$(".numbervalidation").on("keypress keyup blur",function (event) {    
           $(this).val($(this).val().replace(/[^\d].+/, ""));
            if ((event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
   });
   $("#view_add_filter").click(function() {
	var className = $("#additionals_filters").attr('class');
	if (className == "hide"){
            $("#additionals_filters").addClass('show');
            $("#additionals_filters").removeClass('hide');
        } else {
			$("#additionals_filters").removeClass('show');
             $("#additionals_filters").addClass('hide');
        }
	return false;
	});
	
	
	$("#sale_price_start").on("blur",function (event) {    
          var v1 = $('#sale_price_start').val();
          var v2 = $('#sale_price_end').val();
          if(v1==''){
            $(this).val('');
            $('#error_sale_price_start').show();
            return false;
          }else{
			if( parseInt(v2) >= parseInt(v1)){
					$('#error_sale_price_start').hide();
					 return false;
				  }else{
					   $('#error_sale_price_end').show();
						$('#error_sale_price_end').html('sale start price less than sale end price');
						$('#sale_price_end').val('');
						return false;
				}
          }
   });
   $("#sale_price_end").on("blur",function (event) {    
           var v1 = $('#sale_price_start').val();
          var v2 = $('#sale_price_end').val();
          if(v2==''){
            $(this).val('');
            $('#error_sale_price_end').show();
            return false;
          }else{
			  
			  if( parseInt(v2) >= parseInt(v1)){
				 $('#error_sale_price_end').hide();
				return false;
			  }else{
					$('#error_sale_price_end').show();
					$('#error_sale_price_end').html('sale start price less than sale end price');
					$('#sale_price_start').val('');
					$(this).val('');
					return false;
			  }
           
          }
   });
   $("#taxable_value_start").on("blur",function (event) {    
          var v1 = $('#taxable_value_start').val();
		  var v2 = $('#taxable_value_end').val();
          if(v1==''){
            $(this).val('');
            $('#error_taxable_value_start').show();
            return false;
          }else{
			  if( parseInt(v2) >= parseInt(v1)){
				 $('#error_taxable_value_start').hide();
				return false;
			  }else{
				   $('#error_taxable_value_end').show();
					$('#error_taxable_value_end').html('start taxable value less than end Taxable value');
					$('#taxable_value_end').val('');
					return false;
			  }
          }
   });
   $("#taxable_value_end").on("blur",function (event) {    
          var v1 = $('#taxable_value_start').val();
		  var v2 = $('#taxable_value_end').val();
		  
          if(v2==''){
            $(this).val('');
            $('#error_taxable_value_end').show();
            return false;
          }else{
			  if( parseInt(v2) >= parseInt(v1)){
				 $('#error_taxable_value_end').hide();
				return false;
			  }else{
				   $('#error_taxable_value_end').show();
					$('#error_taxable_value_end').html('start taxable value less than end Taxable value');
					$(this).val('');
					return false;
			  }
            
          }
   });
   $("#count_start").on("blur",function (event) {    
          var v1 = $('#count_start').val();
		   var v2 = $('#count_end').val();
          if(v1==''){
            $('#error_count_start').show();
            return false;
          }else{
			  if( parseInt(v2) >= parseInt(v1)){
					$('#error_count_start').hide();
					 return false;
				  }else{
					   $('#error_count_end').show();
						$('#error_count_end').html('start count value less than end count value');
						$('#count_end').val('');
						return false;
					  
				  }
			}
   });
   
    $("#count_end").on("blur",function (event) {    
          var v1 = $('#count_start').val();
		   var v2 = $('#count_end').val();
          if(v2==''){
            $('#error_count_end').show();
            return false;
          }else{
				  if( parseInt(v2) >= parseInt(v1)){
					 $('#error_count_start').hide();
					 $('#error_count_end').hide();
					 return false;
				  }else{
						$('#error_count_end').show();
						$('#error_count_end').html('start count value less than end count value');
						$('#count_start').val('');
						return false;
				  }
            
          }
   });	
	$("#square_feet_start").on("blur",function (event) {    
          var v1 = $('#square_feet_start').val();
		   var v2 = $('#square_feet_end').val();
          if(v1==''){
            $(this).val('');
            $('#error_square_feet_start').show();
            return false;
          }else{
			 if( parseInt(v2) >= parseInt(v1)){
				  $('#error_square_feet_start').hide();
				 return false;
			  }else{
					$('#error_square_feet_end').show();
					$('#error_square_feet_end').html('square feet value less than end square feet');
					$('#square_feet_end').val('');
					return false;
			  }
          }
   });
   $("#square_feet_end").on("blur",function (event) {    
          var v1 = $('#square_feet_start').val();
		   var v2 = $('#square_feet_end').val();
          if(v2==''){
            $(this).val('');
            $('#error_square_feet_end').show();
            return false;
          }else{
			  if( parseInt(v2) >= parseInt(v1)){
				  $('#error_square_feet_start,#error_square_feet_end').hide();
				 return false;
			  }else{
					$('#error_square_feet_end').show();
					$('#error_square_feet_end').html('square feet value less than end square feet');
					$('#square_feet_end').val('');
					return false;
			  }
            
          }
   });
 
   
   	$("#price_per_square_feet_start").on("blur",function (event) {    
           var v1 = $('#price_per_square_feet_start').val();
		   var v2 = $('#price_per_square_feet_end').val();
          if(v1==''){
            $(this).val('');
            $('#error_price_per_square_feet_start').show();
            return false;
          }else{
			  
            if( parseInt(v2) >= parseInt(v1)){
				$('#error_price_per_square_feet_start').hide();
				 return false;
			  }else{
					$('#error_price_per_square_feet_end').show();
					$('#error_price_per_square_feet_end').html('price per square feet value less than end price per square feet');
					$('#price_per_square_feet_end').val('');
					return false;
			  }
          }
   });
   
    $("#price_per_square_feet_end").on("blur",function (event) {    
          var v1 = $('#price_per_square_feet_start').val();
		   var v2 = $('#price_per_square_feet_end').val();
          if($(this).val()==''){
            $(this).val('');
            $('#error_price_per_square_feet_end').show();
            return false;
          }else{
			  if( parseInt(v2) >= parseInt(v1)){
				$('#error_price_per_square_feet_end').hide();
				 return false;
			  }else{
					$('#error_price_per_square_feet_end').show();
					$('#error_price_per_square_feet_end').html('price per square feet value less than end price per square feet');
					$('#price_per_square_feet_end').val('');
					return false;
			  }
            
          }
   });
   $("#year_renovated_start").on("blur",function (event) {    
           var v1 = $('#year_renovated_start').val();
		   var v2 = $('#year_renovated_end').val();
          if(v1==''){
            $(this).val('');
            $('#error_year_renovated_start').show();
            return false;
          }else{
			if( parseInt(v2) >= parseInt(v1)){
				$('#error_year_renovated_start').hide();
				 return false;
			  }else{
					$('#error_year_renovated_end').show();
					$('#error_year_renovated_end').html('year renovated value less than end year renovated');
					$('#year_renovated_end').val('');
					return false;
			  }
          }
   });
   $("#year_renovated_end").on("blur",function (event) {    
          var v1 = $('#year_renovated_start').val();
		   var v2 = $('#year_renovated_end').val();
          if(v2==''){
            $(this).val('');
            $('#error_year_renovated_end').show();
            return false;
          }else{
			  if( parseInt(v2) >= parseInt(v1)){
				$('#error_year_renovated_start,#error_year_renovated_end').hide();
				 return false;
			  }else{
					$('#error_year_renovated_end').show();
					$('#error_year_renovated_end').html('year renovated value less than end year renovated');
					$('#year_renovated_end').val('');
					return false;
			  }
            
          }
   });
  $("#year_built_start").on("blur",function (event) {    
          var value = $(this).val();
          if($(this).val()==''){
            $(this).val('');
            $('#error_year_built_start').show();
            return false;
          }else{
			  
            $('#error_year_built_start').hide();
            return false;
          }
   });
   $("#year_built_end").on("blur",function (event) {    
          var value = $(this).val();
		  var year_built_start = $('#year_built_start').val();
          if($(this).val()==''){
            $(this).val('');
            $('#error_year_built_end').show();
            return false;
          }else{
			  if( $('#year_built_end').val() >= year_built_start){
				 if($('#year_built_end').val() > '2022' ){
					   $('#error_year_built_end').show();
					  $('#error_year_built_end').html('End year built value not greater than current year');  
					$(this).val('');
					 return false;
				  }else{
					  
				$('#error_year_built_end').hide();
					 return false;
				  }
			  }else{
					$('#error_year_built_end').show();
					$('#error_year_built_end').html('year built value less than end year built');
					$('#year_built_start').val('');
					$(this).val('');
					return false;
			  }
            
          }
   });
   
  /* Clear Filter *****/
	$("#clearZipbtn").click(function () {
			$('.caseZip').filter(':checkbox').prop('checked',false);
			  return false;
	});

	$("#clearZoningbtn").click(function () {
		  $('.caseZoning').filter(':checkbox').prop('checked',false);
	  });
	 $("#clearProUsebtn").click(function () {
		  $('.caseProUse').filter(':checkbox').prop('checked',false);
	  });
	 $("#clearNeighborhoodbtn").click(function () {
		  $('.caseNeighborhood').filter(':checkbox').prop('checked',false);
	  });
	 $("#clearWardbtn").click(function () {
		  $('.caseWard').filter(':checkbox').prop('checked',false);
	  });
	 $("#clearTaxDeductionbtn").click(function () {
		  $('.caseTaxDeduction').filter(':checkbox').prop('checked',false);
	  });
	  
	 $("#clearsale_pricebtn").click(function () {
			$('#sale_price_start,#sale_price_end').val('');
			  return false;
	});
	$("#cleartaxable_valuebtn").click(function () {
			$('#taxable_value_start,#taxable_value_end').val('');
			  return false;
	});
	$("#clearcountbtn").click(function () {
			$('#count_start,#count_end').val('');
			  return false;
	});
	$("#clearsquare_feetbtn").click(function () {
			$('#square_feet_start,#square_feet_end').val('');
			  return false;
	});
	$("#clearprice_per_square_feetbtn").click(function () {
			$('#price_per_square_feet_start,#price_per_square_feet_end').val('');
			  return false;
	});
	$("#clearyear_renovatedbtn").click(function () {
			$('#year_renovated_start,#year_renovated_end').val('');
			  return false;
	});
	$("#clearyear_builtbtn").click(function () {
			$('#year_built_start,#year_built_end').val('');
			  return false;
	});
/********* Clear End here *********/
/************** DownloadSearchlimit5  *******/
$('body').on('click', '.DownloadSearchlimit5', function() {
	
		//H5_loading.show();
			var searchid = $(this).attr('searchid');
			var order_id = $(this).attr('order_id');
			var single_record_id = $(this).attr('single_record_id');
			var DownloadSearchlimit5 = $(this).attr('DownloadSearchlimit5');
			$.ajax({
			type: "POST",
			url: baseUrl+'/dashboard/DownloadSearchDatalimit5',
			data: {
			  searchid : searchid,
			  order_id : order_id,
			  single_record_id : single_record_id,
			  DownloadSearch : DownloadSearchlimit5

			},
			success: function(msgData) {
			 //H5_loading.hide();
			 window.location.href = baseUrl+'assets/csv/'+msgData;
			}
			});
		});

/********* End here *********/
/*********** Cart Remove item ********/
$('body').on('click', '.removeitem', function() {
		var removeitem = $(this).attr('rel');
		var baseUrl = $('#baseUrl').val();
		var pageURL = $(location). attr("href");
		var JobId =$(this).attr('rel');
		swal({
			 title: "Are you sure you want to remove this search from cart ?",
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
              title: 'Removed!',
              text: 'This search has been remove successfully!',
              icon: 'success'
            }).then(function() {
			
				H5_loading.show(); 
				$.ajax({
					type: "POST",
					url: baseUrl+'dashboard/removeCartItem',
					data: {
					  removeitem : removeitem

					},
					success: function(msgData) {
					 H5_loading.hide();
					  $('#tr_'+removeitem).remove();
					  updateCartAmount();
					  var pageURL = $(location).attr("href");
					  window.location.href=pageURL;
					}
			});

			});
          } else {
            swal("Cancelled", "", "error");
          }
        });
           
});
/********* Cart Remove item  End here *********/
/*********** Login poup open ********/
$("#viewbtnpopup").click(function () {
	$('#login_popup').modal('show');
  });
/********* End Here ***********/
/************* Register and Login Process **************/
	$( "#my_form_registrattion" ).submit(function( event ){ //on form submit
			var fullname = $('#fullname').val();
			var regEmail = $('#reg-email').val();
			var regPassword = $('#reg-password').val();
			var regConfirmPassword = $('#reg-confirm-password').val();	
            var proceed = true;
         $("#my_form_registrattion input[required=true]").each(function(){
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
				
				if(regPassword!==regConfirmPassword){
					$('#reg-error-passnomatch').show();
					$('#reg-error-passnomatch').css('color','#ed5151');
					$('#reg-password').css('border-color','red'); //change border color to red  
					$('#reg-confirm-password').css('border-color','red'); //change border color to red  
					proceed = false; //set do not proceed flag    
				}
				
        });
        if(proceed){
			H5_loading.show();
			$.ajax({
				type: "POST",
				crossDomain: true,
				url: baseUrl+'/login/userRegistartionWithAjax',
				data: {
				name : fullname,
				email : regEmail,
				password : regPassword

				},
				success: function(msgData) {
					H5_loading.hide();
				   if(msgData==2){
						$('#reg-error-2').show();
						$('#reg-msg-1').hide();
					}
					 if(msgData==1){
						$('#fullname,#reg-email,#reg-password,#reg-confirm-password').val('');
						$('#reg-error-2').hide();
						$('#reg-msg-1').show();
					}
				}
			});
				
        }
        event.preventDefault(); 
    });
	$("#my_form_registrattion input[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
	});
	
	$("#reg-confirm-password").keyup(function() { 
        $('#reg-error-passnomatch').hide();
	});
	
	$( "#my_form_login" ).submit(function( event ){ //on form submit       
        var proceed = true;
        $("#my_form_login input[required=true]").each(function(){
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
			H5_loading.show();
			var loginEmail = $('#login-email').val();
			var loginPass = $('#login-pass').val();
			
			var searchid = $("input[name='searchid[]']")
              .map(function(){return $(this).val();}).get();
			var packageamount = $("input[name='packageamount[]']")
              .map(function(){return $(this).val();}).get();
			var totalamount = $("input[name='totalamount']")
              .map(function(){return $(this).val();}).get();
			$.ajax({
				type: "POST",
				crossDomain: true,
				url: baseUrl+'/login/userloginWithAjax',
				data: {
					loginEmail : loginEmail,
					loginPass : loginPass,
					searchid : searchid,
					packageamount : packageamount,
					totalamount : totalamount
				},
				success: function(msgData) {
					H5_loading.hide();
					if(msgData==1){
						var pageURL = $(location). attr("href");
						//alert(pageURL);
						//window.location.href=baseUrl+'payment-method';
						window.location.href=baseUrl+'pricing';
					}else{
					$('#login-error').show();
					return false;
					}
				}
			});
				
        }
        event.preventDefault(); 
    });
	$("#my_form_login input[required=true]").keyup(function() { 
        $(this).css('border-color',''); 
	});
/*********** End here Register and Login process **********/

/********* Start Pagination ***************/
var pageURL = $(location).attr("href");
	var viewSearchData = baseUrl+'view-search-data';
	if(pageURL==viewSearchData){ 
		loadPaginationViewSearchData(0);
	}
	$('#pagination_search').on('click','a',function(e){
				e.preventDefault(); 
				var pageno = $(this).attr('data-ci-pagination-page');
				loadPaginationViewSearchData(pageno);
	});
	// Load pagination
	function loadPaginationViewSearchData(pagno){
		H5_loading.show();
		var formData = $("#search-form").serialize();
	   $.ajax({
			url: baseUrl+'advancedsearch/loadRecordForSearch/'+pagno,
			type: 'post',
			dataType: 'json',
			data  :{
				pagno :pagno,
				formdata : formData
			},
			success: function(response){
				H5_loading.hide();
				$('#pagination_search').html(response.pagination);
				createTable(response.result,response.row);
			}
		});
	}
    // Create table list
			function createTable(result,sno){
				var countTable =result.length;
				sno = Number(sno);
				$('#postsList').empty();
				if(countTable > 0){
					for(index in result){
						var user_id = result[index].user_id;
						var user_plan = result[index].user_plan;
						var title = result[index].title;
						var interested_in = result[index].interested_in;
						var field_5 = result[index].field_5;
						var field_8 = result[index].field_8;
						var field_12 = result[index].field_12;
						var field_13 = result[index].field_13;
						var tentative_selling = result[index].tentative_selling;
						sno+=1;
						var pathurl = baseUrl+'view-profile/'+user_id;
						
						
						$('#postsList').append();
					}	
				}else{
					var tr = '<div class="blog-one-item row">';					
						tr += "No Data Found";
						
						tr += "</div>";
						$('#postsList').append(tr);
				}
				
			}	


/******** End here**************************/




/********* Document End here *********/

});
/************update Cart Amount ***********/
function updateCartAmount() {
  var sum = 0.0;
   	$('.price').each(function() {
			var price = $(this).attr('data-price');
			var amount = parseFloat(price);
			console.log(amount);
			
			sum += amount;
		});
		$('#total').html('<h3><strong>$'+sum.toFixed(2)+'</strong></h3>');
		$('#totalamount').val(sum.toFixed(2));
  }
 /********** update Cart Amount End Here **************/ 
function animationFunction(){
		var bbox1= $('.bbox1').attr('rel');
		var bbox2= $('.bbox2').attr('rel');
		var bbox3= $('.bbox3').attr('rel');
		var bbox4= $('.bbox4').attr('rel');
		if(bbox1==1){
			$('.bbox2').show(); $('.bbox1').hide(); $('.bbox1').attr("rel","0");$('.bbox2').attr("rel","1");
		}
		if(bbox2==1){
			$('.bbox3').show();$('.bbox1,.bbox2').hide();$('.bbox1,.bbox2').attr('rel','0');
			$('.bbox3').attr('rel','1');
		}
		 if(bbox3==1){
			$('.bbox4').show(); $('.bbox1,.bbox2,.bbox3').hide();$('.bbox1,.bbox2,.bbox3').attr('rel','0');
			$('.bbox4').attr('rel','1');
		}
		if(bbox4==1){
			$('.bbox1').show();$('.bbox4,.bbox2,.bbox3').hide();$('.bbox4,.bbox2,.bbox3').attr('rel','0');
			$('.bbox1').attr('rel','1');
		}
	
}
setInterval("animationFunction()", 6000);


window.onscroll = function() {myFunction()};

var header = document.getElementById("header");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}

// Start Dashboard
jQuery(function ($) {

    $(".sidebar-dropdown > a").click(function() {
	  $(".sidebar-submenu").slideUp(200);
	  if (
	    $(this)
	      .parent()
	      .hasClass("active")
	  ) {
	    $(".sidebar-dropdown").removeClass("active");
	    $(this)
	      .parent()
	      .removeClass("active");
	  } else {
	    $(".sidebar-dropdown").removeClass("active");
	    $(this)
	      .next(".sidebar-submenu")
	      .slideDown(200);
	    $(this)
	      .parent()
	      .addClass("active");
	  }
	});

	$("#close-sidebar").click(function() {
	  $(".page-wrapper").removeClass("toggled");
	});
	$("#show-sidebar").click(function() {
	  $(".page-wrapper").addClass("toggled");
	});
  
   
});



