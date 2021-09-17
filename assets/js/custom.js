$(document).ready(function() {
	
	var arr = [];
	var uncheckarr = [];
	var baseUrl = $('#baseUrl').val();
	$('.bbox1').show();
	$('.open_filter').click(function() {
	$('.filter_sidebar').css('display', 'block');
	$('.filter_sidebar_body').removeClass("non-active");
	$('.filter_sidebar_body').addClass("active");
	$('body').css('overflow', 'hidden');
	});
	$('.close_filter').click(function() {
	$('.filter_sidebar').css('display', 'none');
	$('.filter_sidebar_body').removeClass("active");
	$('.filter_sidebar_body').addClass("non-active");
	$('body').css('overflow', 'auto');
	});
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
            $("#view_add_filter").addClass('open');
        } else {
			$("#additionals_filters").removeClass('show');
             $("#additionals_filters").addClass('hide');
             $("#view_add_filter").removeClass('open');
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
						$('#error_count_end').html('start number of units value less than end number of units value');
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
						$('#error_count_end').html('start number of units value less than end number of units value');
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
					$('#error_square_feet_end').html('square foot value less than end square feet');
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
					$('#error_square_feet_end').html('square foot value less than end square foot');
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
					$('#error_price_per_square_feet_end').html('price per square foot value less than end price per square foot');
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
					$('#error_price_per_square_feet_end').html('price per square foot value less than end price per square foot');
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
					  $('#error_year_built_end').html('End year built greater than min year and less than or equal to 2022');  
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
			 $('.remove-zip-div').remove();
			 /*************/
				$('.filter_sidebar').css('display', 'none');
				$('.filter_sidebar_body').removeClass("active");
				$('.filter_sidebar_body').addClass("non-active");
				$('body').css('overflow', 'auto');
				/*************/
		       loadPaginationForViewSearch(0);
	});
	$("#clearZoningbtn").click(function () {
		  $('.caseZoning').filter(':checkbox').prop('checked',false);
		  $('.remove-zoning-div').remove();
		   /*************/
				$('.filter_sidebar').css('display', 'none');
				$('.filter_sidebar_body').removeClass("active");
				$('.filter_sidebar_body').addClass("non-active");
				$('body').css('overflow', 'auto');
				/*************/
		  loadPaginationForViewSearch(0);
	  });
	$("#clearProUsebtn").click(function () {
		  $('.caseProUse').filter(':checkbox').prop('checked',false);
		  $('.remove-use-div').remove();
		   /*************/
				$('.filter_sidebar').css('display', 'none');
				$('.filter_sidebar_body').removeClass("active");
				$('.filter_sidebar_body').addClass("non-active");
				$('body').css('overflow', 'auto');
				/*************/
		  loadPaginationForViewSearch(0);
	  });
	$("#clearNeighborhoodbtn").click(function () {
		  $('.caseNeighborhood').filter(':checkbox').prop('checked',false);
		  $('.remove-neighborhood-div').remove();
		   /*************/
				$('.filter_sidebar').css('display', 'none');
				$('.filter_sidebar_body').removeClass("active");
				$('.filter_sidebar_body').addClass("non-active");
				$('body').css('overflow', 'auto');
				/*************/
		  loadPaginationForViewSearch(0);
	  });
	$("#clearWardbtn").click(function () {
		  $('.caseWard').filter(':checkbox').prop('checked',false);
		  $('.remove-ward-div').remove();
		   /*************/
				$('.filter_sidebar').css('display', 'none');
				$('.filter_sidebar_body').removeClass("active");
				$('.filter_sidebar_body').addClass("non-active");
				$('body').css('overflow', 'auto');
				/*************/
		  loadPaginationForViewSearch(0);
	  });
	$("#clearTaxDeductionbtn").click(function () {
		  $('.caseTaxDeduction').filter(':checkbox').prop('checked',false);
		  $('.remove-taxDeduction-div').remove();
			$('.close_filter').trigger('click');
			loadPaginationForViewSearch(0);
	  });
	$("#clearland_rangebtn").click(function () {
			$('#land_range_start,#land_range_end').val('');
			$('.close_filter').trigger('click');
			loadPaginationForViewSearch(0);
			 return false;
	});
	$("#clearsale_datebtn").click(function () {
			$('#from,#to').val('');
			$('.close_filter').trigger('click');
			loadPaginationForViewSearch(0);
			  return false;
	});
	$("#clearsale_pricebtn").click(function () {
			$('#sale_price_start,#sale_price_end').val('');
			$('.close_filter').trigger('click');
			loadPaginationForViewSearch(0);
			  return false;
	});
	$("#cleartaxable_valuebtn").click(function () {
			$('#taxable_value_start,#taxable_value_end').val('');
			$('.close_filter').trigger('click');
			loadPaginationForViewSearch(0);
			  return false;
	});
	$("#clearcountbtn").click(function () {
			$('#count_start,#count_end').val('');
			$('.close_filter').trigger('click');
			loadPaginationForViewSearch(0);
			  return false;
	});
	$("#clearsquare_feetbtn").click(function () {
			$('#square_feet_start,#square_feet_end').val('');
			$('.close_filter').trigger('click');
			loadPaginationForViewSearch(0);
			  return false;
	});
	$("#clearprice_per_square_feetbtn").click(function () {
			$('#price_per_square_feet_start,#price_per_square_feet_end').val('');
			$('.close_filter').trigger('click');
			loadPaginationForViewSearch(0);
			  return false;
	});
	$("#clearyear_renovatedbtn").click(function () {
			$('#year_renovated_start,#year_renovated_end').val('');
			$('.close_filter').trigger('click');
			loadPaginationForViewSearch(0);
			  return false;
	});
	$("#clearyear_builtbtn").click(function () {
			$('#year_built_start,#year_built_end').val('');
			$('.close_filter').trigger('click');
			loadPaginationForViewSearch(0);
			  return false;
	});
/********* Clear End here *********/
	$('body').on('click', '.remove-zoning', function() {
		var relV = $(this).attr('rel');
		 $('.caseZoning').filter(function(){return this.value==relV}).prop('checked',false);
		     $(this).parent().remove();
			 loadPaginationForViewSearch(0);
	  });
	$('body').on('click', '.remove-use', function() {
		var relV = $(this).attr('rel');
		 $('.caseProUse').filter(function(){return this.value==relV}).prop('checked',false);
		     $(this).parent().remove();
			 loadPaginationForViewSearch(0);
	  });
	$('body').on('click', '.remove-zip', function() {
		var relV = $(this).attr('rel');
		 $('.caseZip').filter(function(){return this.value==relV}).prop('checked',false);
		     $(this).parent().remove();
			 loadPaginationForViewSearch(0);
	  });
	$('body').on('click', '.remove-neighborhood', function() {
		var relV = $(this).attr('rel');
		 $('.caseNeighborhood').filter(function(){return this.value==relV}).prop('checked',false);
		     $(this).parent().remove();
			 loadPaginationForViewSearch(0);
	  });
	$('body').on('click', '.remove-ward', function() {
		var relV = $(this).attr('rel');
		 $('.caseWard').filter(function(){return this.value==relV}).prop('checked',false);
		     $(this).parent().remove();
			 loadPaginationForViewSearch(0);
	  });
	$('body').on('click', '.remove-taxDeduction', function() {
		var relV = $(this).attr('rel');
		 $('.caseTaxDeduction').filter(function(){return this.value==relV}).prop('checked',false);
		     $(this).parent().remove();
			 loadPaginationForViewSearch(0);
	  });
	$('body').on('click', '.remove-landarea', function() {
		  $('#land_range_start,#land_range_end').val('');
		$(this).parent().remove();
	    loadPaginationForViewSearch(0);
	  });
	$('body').on('click', '.remove-sale-date', function() {
		  $('#from,#to').val('');
		$(this).parent().remove();
	    loadPaginationForViewSearch(0);
	  });
	$('body').on('click', '.remove-sale-price', function() {
		$('#sale_price_start,#sale_price_end').val('');
		$(this).parent().remove();
		loadPaginationForViewSearch(0);
	 });
	$('body').on('click', '.remove-taxable-value', function() {
		$('#taxable_value_start,#taxable_value_end').val('');
		$(this).parent().remove();
		loadPaginationForViewSearch(0);
	 });
	$('body').on('click', '.remove-unitrange', function() {
		$('#count_start,#count_end').val('');
		$(this).parent().remove();
		loadPaginationForViewSearch(0);
	 });
	$('body').on('click', '.remove-squarefeet', function() {
		$('#square_feet_start,#square_feet_end').val('');
		$(this).parent().remove();
		loadPaginationForViewSearch(0);
	 });
	$('body').on('click', '.remove-pricepersquarefeet', function() {
		$('#price_per_square_feet_start,#price_per_square_feet_end').val('');
		$(this).parent().remove();
		loadPaginationForViewSearch(0);
	 });
	$('body').on('click', '.remove-yearrenovated', function() {
		$('#year_renovated_start,#year_renovated_end').val('');
		$(this).parent().remove();
		loadPaginationForViewSearch(0);
	 });
	$('body').on('click', '.remove-yearbuilt', function() {
		$('#year_built_start,#year_built_end').val('');
		$(this).parent().remove();
		loadPaginationForViewSearch(0);
	 });
	 
	 $('body').on('click', '.remove-propertyCheck', function() {
		var relV = $(this).attr('rel');
		 $('.propertycls').filter(function(){return this.value==relV}).prop('checked',false);
		     $(this).parent().remove();
			 loadPaginationForViewSearch(0);
	  });
	  $('body').on('click', '.remove-beds', function() {
		$('#beds').val(0);
		$(this).parent().remove();
		loadPaginationForViewSearch(0);
	 });
	 $('body').on('click', '.remove-bath', function() {
		$('#bath').val(0);
		$(this).parent().remove();
		loadPaginationForViewSearch(0);
	 });
	 $('body').on('click', '.remove-miles', function() {
		$('#miles').val('');
		$(this).parent().remove();
		loadPaginationForViewSearch(0);
	 });
	 $('body').on('click', '.remove-searchboxForAddress', function() {

		$('#autocomplete,#lat,#lng,#place_id').val('');
		
		$(this).parent().remove();
		loadPaginationForViewSearch(0);
	 });
	 
	$("input[name='zoning[]']").on('click', function () {
	if($(this).prop("checked") == true){
			 var zoning =   $(this).val();
			 if ($("input[name='zoning[]']").is(':checked')) {
				  var tr='<div class="remove-zoning-div remove-zoning-div-'+zoning+' csf">\
					<input type="hidden" name="zoning-d[]"   rel="'+zoning+'" class="zoning-d" />\
				   '+zoning+'<span aria-hidden="true" class="remove-zoning" rel="'+zoning+'">×</span>\
					</div>';
					$('#search_filter_list').prepend(tr);
			}
         }
		 if($(this).prop("checked") == false){
			  var zoning =   $(this).val();
			 $('.remove-zoning-div-'+zoning).remove();
		} 
    });	
	$("input[name='use[]']").on('click', function () {
	 if($(this).prop("checked") == true){
			 var use =   $(this).val();
			 var newString = use.replace(/[ ,]+/g, "-");
			if ($("input[name='use[]']").is(':checked')) {
				  var tr='<div class="remove-use-div-'+newString+' csf">\
			<input type="hidden" name="use-d[]" rel="'+use+'" class="use-d" />\
				   '+use+'<span aria-hidden="true" class="remove-use" rel="'+use+'">×</span>\
					</div>';
					$('#search_filter_list').prepend(tr);
			}
         }
		 if($(this).prop("checked") == false){
			  var use =   $(this).val();
			   var newString = use.replace(/[ ,]+/g, "-");
			   $('.remove-use-div-'+newString).remove();
			  //$('.use-d').filter(function(){return this.rel==use}).parent().remove();
		} 
    });
	$("input[name='zip[]']").on('click', function () {
	 if($(this).prop("checked") == true){
			 var zip =   $(this).val();
			 if ($("input[name='zip[]']").is(':checked')) {
				  var tr='<div class="remove-zip-div-'+zip+' csf">\
			<input style="display:none;" name="zip-d[]" rel="'+zip+'" class="zip-d" />\
				   '+zip+'<span aria-hidden="true" class="remove-zip" rel="'+zip+'">×</span>\
					</div>';
					$('#search_filter_list').prepend(tr);
			}
         }
		 if($(this).prop("checked") == false){
			  var zip =   $(this).val();
			 $('.remove-zip-div-'+zip).remove();
		} 
    });
    $("input[name='neighborhood[]']").on('click', function () {
	 if($(this).prop("checked") == true){
			 var neighborhood =   $(this).val();
			 var newString = neighborhood.replace(/[ ,]+/g, "-");
			 if ($("input[name='neighborhood[]']").is(':checked')) {
				  var tr='<div class="remove-neighborhood-div-'+newString+' csf">\
			<input style="display:none;" name="neighborhood-d[]" rel="'+neighborhood+'" class="neighborhood-d" />\
				   '+neighborhood+'<span aria-hidden="true" class="remove-neighborhood" rel="'+neighborhood+'">×</span>\
					</div>';
					$('#search_filter_list').prepend(tr);
			}
         }
		 if($(this).prop("checked") == false){
			  var neighborhood =   $(this).val();
			  var newString = neighborhood.replace(/[ ,]+/g, "-");
			  $('.remove-neighborhood-div-'+newString).remove();
		} 
    });
	$("input[name='ward[]']").on('click', function () {
	 if($(this).prop("checked") == true){
			 var ward =   $(this).val();
			 var newString = ward.replace(/[ ,]+/g, "-");
			 if ($("input[name='ward[]']").is(':checked')) {
				  var tr='<div class="remove-ward-div-'+newString+' csf">\
			<input style="display:none;" name="ward-d[]" rel="'+ward+'" class="ward-d" />\
				   '+ward+'<span aria-hidden="true" class="remove-ward" rel="'+ward+'">×</span>\
					</div>';
					$('#search_filter_list').prepend(tr);
			}
         }
		 if($(this).prop("checked") == false){
			  var ward =   $(this).val();
			   var newString = ward.replace(/[ ,]+/g, "-");
			  $('.remove-ward-div-'+newString).remove();
		} 
    });
	$("input[name='taxDeduction[]']").on('click', function () {
	 if($(this).prop("checked") == true){
			 var taxDeduction =   $(this).val();
			  var newString = taxDeduction.replace(/[ ,]+/g, "-");
			 if ($("input[name='taxDeduction[]']").is(':checked')) {
				  var tr='<div class="remove-taxDeduction-div-'+newString+' csf">\
			<input style="display:none;" name="taxDeduction-d[]" rel="'+taxDeduction+'" class="taxDeduction-d" />\
				   '+taxDeduction+'<span aria-hidden="true" class="remove-taxDeduction" rel="'+taxDeduction+'">×</span>\
					</div>';
					$('#search_filter_list').prepend(tr);
			}
         }
		 if($(this).prop("checked") == false){
			  var taxDeduction =   $(this).val();
			   var newString = taxDeduction.replace(/[ ,]+/g, "-");
			 $('.remove-taxDeduction-div-'+newString).remove();
		} 
    });
    $("input[name='propertyCheck[]']").on('click', function () {
	if($(this).prop("checked") == true){
			 var propertyCheck =   $(this).val();
			 var propertyName = '';
			 if(propertyCheck=='person'){
				propertyName = 'Person';
			 }
			 if(propertyCheck=='business'){
				propertyName ='Business'; 
			 }
			 if(propertyCheck=='govt'){
				propertyName = 'Government';
			 }
			 if(propertyCheck=='property_owns_multiple'){
				propertyName = 'Owns Multiple';
			 }
			 if ($("input[name='propertyCheck[]']").is(':checked')) {
				  var tr='<div class="remove-propertyCheck-div-'+propertyCheck+' csf">\
					<input type="hidden" name="propertyCheck-d[]"   rel="'+propertyCheck+'" class="propertyCheck-d" />\
				   '+propertyName+'<span aria-hidden="true" class="remove-propertyCheck" rel="'+propertyCheck+'">×</span>\
					</div>';
					$('#search_filter_list').prepend(tr);
			}
         }
		 if($(this).prop("checked") == false){
			  var propertyCheck =   $(this).val();
			 $('.remove-propertyCheck-div-'+propertyCheck).remove();
		} 
    });	

$("#beds").on('change', function () {
	var beds =   $(this).val();
	$('.remove-beds-div-'+beds).remove();
	var tr='<div class="remove-beds-div-'+beds+' csf">\
					<input type="hidden" name="beds-d[]"   rel="'+beds+'" class="zoning-d" />Beds:\
				   '+beds+'<span aria-hidden="true" class="remove-beds" rel="'+beds+'">×</span>\
					</div>';
					$('#search_filter_list').prepend(tr);
	});
 $("#bath").on('change', function () {
	var bath =   $(this).val();
	$('.remove-bath-div-'+bath).remove();
	var tr='<div class="remove-bath-div-'+bath+' csf">\
					<input type="hidden" name="bath-d[]"   rel="'+bath+'" class="zoning-d" />Bath:\
				   '+bath+'<span aria-hidden="true" class="remove-bath" rel="'+bath+'">×</span>\
					</div>';
					$('#search_filter_list').prepend(tr);
	});
	
	
	$("#miles").on("blur",function (event) {    
         var miles = $("#miles").val();
		  $('.remove-miles-div').remove();
		 var tr='<div class=" remove-miles-div remove-miles-div-'+miles+' csf">\
					<input type="hidden" name="miles-d[]"   rel="'+miles+'" class="miles-d" />Miles:\
				   '+miles+'<span aria-hidden="true" class="remove-miles" rel="'+miles+'">×</span>\
					</div>';
					$('#search_filter_list').prepend(tr);
		 
        });
	$("#autocomplete").on("blur",function (event) {    
		var searchboxForAddress = $("#autocomplete").val();
		var newString = searchboxForAddress.replace(/[ ,]+/g, "-");
		$('.remove-searchboxForAddress-div').remove();
		
			var tr='<div class="remove-searchboxForAddress-div-'+newString+' csf">\
					<input type="hidden" name="searchboxForAddress-d[]"   rel="'+newString+'" class="searchboxForAddress-d" />Address:\
				   '+searchboxForAddress+'<span aria-hidden="true" class="remove-searchboxForAddress" rel="'+newString+'">×</span>\
					</div>';
					$('#search_filter_list').prepend(tr);
				
         
        });
	

/********* End here *********/

/********* Cart Remove item  End here *********/
/*********** Login poup open ********/
$("#viewbtnpopup").click(function () {
	$('#login_popup').modal('show');
  });
/********* End Here ***********/
$("#land_range_start").on("blur",function (event) {    
          var v1 = $("#land_range_start").val();
		   var v2 = $("#land_range_end").val();
          if(parseInt(v1) <= 111){
            $(this).val(112);
           return false;
          }else{
			   if(parseInt(v1) >v2){ 
			   $("#land_range_end").val('');
			   }
            $('#error_land_range_start').hide();
            return false;
          }
        });
	$("#land_range_end").on("blur",function (event) {    
         var v1 = $("#land_range_start").val();
		   var v2 = $("#land_range_end").val();
          if((parseInt(v2) >= v1) && (parseInt(v2) <= 12919556)){
            $('#error_land_range_end').hide();
            return false;
          }else{
            $(this).val('');
            $('#error_land_range_end').show();
            return false;
          }
        });




$(".search-filter").click(function() { 
    $('#Chkallcount,#Chkall').val(0);
		arr.splice(0,arr.length);
		$('.CheckAll').prop("checked", false);
		$('.close_filter').trigger('click');
		loadPaginationForViewSearch(0);
});


$(".search-filter-change").click(function() { 
     $('#Chkallcount,#Chkall').val(0);
		arr.splice(0,arr.length);
		$('.CheckAll').prop("checked", false);
		$('.close_filter').trigger('click');
		loadPaginationForViewSearch(0);
});

$(".search-filter-input").click(function(event) { 
	event.preventDefault();
	var RelV = $(this).attr('rel');
	if(RelV=='landarea'){
		var v1 = $("#land_range_start").val();
		var v2 = $("#land_range_end").val();
		if(v1=='' && v2==''){
			$("#land_range_start,#land_range_end").addClass('error-class');
		}
		else if(v1==''){
			$("#land_range_start").addClass('error-class');
		}
		else if(v2==''){
			$("#land_range_end").addClass('error-class');
		}
		else{
			$('.landareacls').remove();
			$('.close_filter').trigger('click');
			var tr='<div class="remove-additionals-filters-div csf landareacls">\
				Land Area Range:<br>'+v1+'-'+v2+'<span aria-hidden="true" class="remove-landarea">×</span>\
					</div>';
			$('#search_filter_list').prepend(tr);
			$('#land_area').modal('hide');
			loadPaginationForViewSearch(0);
		}
	}
	if(RelV=='saledate'){
		var v1 = $("#from").val();
		var v2 = $("#to").val();
		if(v1=='' && v2==''){
			$("#from,#to").addClass('error-class');
		}
		else if(v1==''){
			$("#from").addClass('error-class');
		}
		else if(v2==''){
			$("#to").addClass('error-class');
		}
		else{
			$('.saledatecls').remove();
			$('.close_filter').trigger('click');
			var tr='<div class="remove-additionals-filters-div csf saledatecls">\
				Sale Date Range:<br>'+v1+'<br>'+v2+'<span aria-hidden="true" class="remove-sale-date">×</span>\
					</div>';
			$('#search_filter_list').prepend(tr);
			$('#last_sale_date').modal('hide');
			loadPaginationForViewSearch(0);
		}
	}	
	if(RelV=='saleprice'){
		var v1 = $("#sale_price_start").val();
		var v2 = $("#sale_price_end").val();
		if(v1=='' && v2==''){
			$("#sale_price_start,#sale_price_end").addClass('error-class');
		}
		else if(v1==''){
			$("#sale_price_start").addClass('error-class');
		}
		else if(v2==''){
			$("#sale_price_end").addClass('error-class');
		}
		else{
			$('.salepricecls').remove();
			$('.close_filter').trigger('click');
			var tr='<div class="remove-additionals-filters-div csf salepricecls">\
				Sale Price Range:<br>'+v1+'<br>'+v2+'<span aria-hidden="true" class="remove-sale-price">×</span>\
					</div>';
			$('#search_filter_list').prepend(tr);
			$('#sale_price').modal('hide');
			loadPaginationForViewSearch(0);
		}
	}
	if(RelV=='taxablevalue'){
		var v1 = $("#taxable_value_start").val();
		var v2 = $("#taxable_value_end").val();
		if(v1=='' && v2==''){
			$("#taxable_value_start,#taxable_value_end").addClass('error-class');
		}
		else if(v1==''){
			$("#taxable_value_start").addClass('error-class');
		}
		else if(v2==''){
			$("#taxable_value_end").addClass('error-class');
		}
		else{
			$('.taxablevaluecls').remove();
			$('.close_filter').trigger('click');
			var tr='<div class="remove-additionals-filters-div csf taxablevaluecls">\
				Taxable Value Range:<br>'+v1+'<br>'+v2+'<span aria-hidden="true" class="remove-taxable-value">×</span>\
					</div>';
			$('#search_filter_list').prepend(tr);
			$('#taxable_value').modal('hide');
			loadPaginationForViewSearch(0);
		}
	}
	if(RelV=='unitrange'){
		var v1 = $("#count_start").val();
		var v2 = $("#count_end").val();
		if(v1=='' && v2==''){
			$("#count_start,#count_end").addClass('error-class');
		}
		else if(v1==''){
			$("#count_start").addClass('error-class');
		}
		else if(v2==''){
			$("#count_end").addClass('error-class');
		}
		else{
			$('.unitrangecls').remove();
			$('.close_filter').trigger('click');
			var tr='<div class="remove-additionals-filters-div csf unitrangecls">\
				Number of units Range:<br>'+v1+'-'+v2+'<span aria-hidden="true" class="remove-unitrange">×</span>\
					</div>';
			$('#search_filter_list').prepend(tr);
			$('#count').modal('hide');
			loadPaginationForViewSearch(0);
		}
	}
	if(RelV=='squarefeet'){
		var v1 = $("#square_feet_start").val();
		var v2 = $("#square_feet_end").val();
		if(v1=='' && v2==''){
			$("#square_feet_start,#square_feet_end").addClass('error-class');
		}
		else if(v1==''){
			$("#square_feet_start").addClass('error-class');
		}
		else if(v2==''){
			$("#square_feet_end").addClass('error-class');
		}
		else{
			$('.squarefeetcls').remove();
			$('.close_filter').trigger('click');
			var tr='<div class="remove-additionals-filters-div csf squarefeetcls">\
				Square Foot Range :<br>'+v1+'-'+v2+'<span aria-hidden="true" class="remove-squarefeet">×</span>\
					</div>';
			$('#search_filter_list').prepend(tr);
			$('#square_feet').modal('hide');
			loadPaginationForViewSearch(0);
		}
	}
	if(RelV=='pricepersquarefeet'){
		var v1 = $("#price_per_square_feet_start").val();
		var v2 = $("#price_per_square_feet_end").val();
		if(v1=='' && v2==''){
			$("#price_per_square_feet_start,#price_per_square_feet_end").addClass('error-class');
		}
		else if(v1==''){
			$("#price_per_square_feet_start").addClass('error-class');
		}
		else if(v2==''){
			$("#price_per_square_feet_end").addClass('error-class');
		}
		else{
			$('.pricepersquarefeetcls').remove();
			$('.close_filter').trigger('click');
			var tr='<div class="remove-additionals-filters-div csf pricepersquarefeetcls">\
				Price Per Square Foot :<br>'+v1+'-'+v2+'<span aria-hidden="true" class="remove-pricepersquarefeet">×</span>\
					</div>';
			$('#search_filter_list').prepend(tr);
			$('#price_per_square_feet').modal('hide');
			loadPaginationForViewSearch(0);
		}
	}
	if(RelV=='yearrenovated'){
		var v1 = $("#year_renovated_start").val();
		var v2 = $("#year_renovated_end").val();
		if(v1=='' && v2==''){
			$("#year_renovated_start,#year_renovated_end").addClass('error-class');
		}
		else if(v1==''){
			$("#year_renovated_start").addClass('error-class');
		}
		else if(v2==''){
			$("#year_renovated_end").addClass('error-class');
		}
		else{
			$('.yearrenovatedcls').remove();
			$('.close_filter').trigger('click');
			var tr='<div class="remove-additionals-filters-div csf yearrenovatedcls">\
				Year Renovated Range :<br>'+v1+'-'+v2+'<span aria-hidden="true" class="remove-yearrenovated">×</span>\
					</div>';
			$('#search_filter_list').prepend(tr);
			$('#year_renovated').modal('hide');
			loadPaginationForViewSearch(0);
		}
	}
	if(RelV=='yearbuilt'){
		var v1 = $("#year_built_start").val();
		var v2 = $("#year_built_end").val();
		if(v1=='' && v2==''){
			$("#year_built_start,#year_built_end").addClass('error-class');
		}
		else if(v1==''){
			$("#year_built_start").addClass('error-class');
		}
		else if(v2==''){
			$("#year_built_end").addClass('error-class');
		}
		else{
			$('.yearbuiltcls').remove();
			$('.close_filter').trigger('click');
			var tr='<div class="remove-additionals-filters-div csf yearbuiltcls">\
				Year Built Range :<br>'+v1+'-'+v2+'<span aria-hidden="true" class="remove-yearbuilt">×</span>\
					</div>';
			$('#search_filter_list').prepend(tr);
			$('#year_built').modal('hide');
			loadPaginationForViewSearch(0);
		}
	}

	return false;
});
	$("#land_range_start,\
		#land_range_end,\
		#sale_price_start,\
		#sale_price_end,\
		#taxable_value_start,\
		#taxable_value_end,\
		#count_start,\
		#count_end,\
		#square_feet_start,\
		#square_feet_end,\
		#price_per_square_feet_start,\
		#price_per_square_feet_end,\
		#year_renovated_start,\
		#year_renovated_end,\
		#year_built_start,\
		#year_built_end\
		").keyup(function() { 
        $("#land_range_start,\
				#land_range_end,\
				#sale_price_start,\
				#sale_price_end,\
				#taxable_value_start,\
				#taxable_value_end,\
				#count_start,\
				#count_end,\
				#square_feet_start,\
				#square_feet_end,\
				#price_per_square_feet_start,\
				#price_per_square_feet_end,\
				#year_renovated_start,\
				#year_renovated_end,\
				#year_built_start,\
				#year_built_end\
				").removeClass('error-class'); 
	});
$("#from,#to").change(function() { 
        $("#from,#to").removeClass('error-class'); 
});





//Pagination Start//

var pagearr = [];
$('body').on("click", "input[name='checkrecords[]']", function() {
	var allcount =$('#allcount').val();
	var Chkallcount =$('#Chkallcount').val();
	
		var checked = $(this).val();
		if ($(this).is(':checked')) { 
			if (arr.indexOf(checked) === -1) { 
					arr.push(checked);
				var leftChkallcount = parseInt(Chkallcount)+parseInt(1);
				$('#Chkallcount').val(leftChkallcount)
			}
			if($('#allcount').val()==$('#Chkallcount').val()){
					$('.CheckAll').prop("checked", true);
				}
		}else{ arr.splice($.inArray(checked, arr),1);  uncheckarr.push(checked); 
		var leftChkallcount = parseInt(Chkallcount)-parseInt(1);
		$('#Chkallcount').val(leftChkallcount);
		
				if($('#allcount').val()!=$('#Chkallcount').val()){
					$('.CheckAll').prop("checked", false);
				}
		}
});

 




 $('.CheckAll').change(function () {
	 
	 
	  var id=  $(".CheckAll").attr('id');
	  var rel=  $(".CheckAll").attr('rel');
	  var allcount =$('#allcount').val();
	  if(id=='CheckAll_'+rel){
		if($('#CheckAll_'+rel).is(":checked")) { 
				if (pagearr.indexOf(rel) === -1) { pagearr.push(rel);}
				$('.checkboxesrec').prop("checked", true); 
				var checkrecords = $("input[name='checkrecords[]']").filter(":checked").map(	function(){
					if (arr.indexOf($(this).val()) === -1) {
						arr.push($(this).val());
					}
					return $(this).val();
					}).get();
					$('#Chkallcount').val(allcount);
		          $('#Chkall').val(1); 
				
			}else {   
				$('.checkboxesrec').prop("checked", false);
				var px = pagearr.indexOf(rel);
				   pagearr.splice(px,1);
					
				var checkrecords = $("input[name='checkrecords[]']").filter(":not(:checked)").map(function(){
						var x = arr.indexOf($(this).val());
						arr.splice(x,1);
						return $(this).val();
					}).get();
					$('#Chkallcount').val(0);
				$('#Chkall').val(0); 
				arr.splice(0,arr.length);
				
			}
	  }
	
	});






var pageURL = $(location).attr("href");
	var searchViewData = baseUrl+'search-view-data';
	if(pageURL==searchViewData){ 
	  $(".CheckAll").attr("rel",1);
		loadPaginationForViewSearch(0);
		
	}
	
	
	$('#pagination_search').on('click','a',function(e){
		e.preventDefault(); 
				var pageno = $(this).attr('data-ci-pagination-page');
				$(".CheckAll").attr("rel",pageno);
				 $(".CheckAll").attr("id","CheckAll_"+pageno);
				if (pagearr.indexOf(pageno) === -1) {
						pagearr.push(pageno);
					}
				loadPaginationForViewSearch(pageno);
	});
	// Load pagination
			function loadPaginationForViewSearch(pagno){
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
						createTable(response.result,response.row,pagno);
						//Extra Field
						$('#allcount').val(response.allcount);
						//$('#Chkallcount').val(response.allcount);
						$('#record_span').text(response.allcount);
					}
				});
			}
	// Create table list
			function createTable(result,sno,pagno){
				var Chkall = $('#Chkall').val(); 
					
				//$('#CheckAll_'+pagno).prop("checked", false);
				if ($.inArray(pagno, pagearr)!='-1') {
					//$('#CheckAll_'+pagno).prop("checked", true);
				}
				if (Chkall==1) {
						$checked ="checked";
					}else{
						
						if(arr.length >0){
							$checked ="";
						}else{
							$checked ="";
						}
						
					}
				var countTable =result.length;
				sno = Number(sno);
				
				//var arr = [ '53054', '53044','53036'];
				$('#postsList').find('tbody').find('tr').empty();
				if(countTable > 0){
					for(index in result){
						var sid  = result[index].id ;
						var correct_address = result[index].correct_address;
						var short_address = result[index].short_address;
						var long_address = result[index].long_address;
						var zoning = result[index].zoning;
						var pro_use = result[index].pro_use;
						var zip = result[index].zip;
						var land_area = result[index].land_area;
						
						sno+=1;
						var b64 = btoa(sid);
						var urlLink =baseUrl+'view-single-record/'+b64;
						
						var tr='<tr>';
						
						if ($.inArray(sid, arr)!='-1') {
							
							tr+='<th class="thcheckboxclss"><input class="checkboxesrec" type="checkbox" name="checkrecords[]" value="'+sid+'"  checked '+$checked+'></th>';
						}else{
							tr+='<th class="thcheckboxcls"><input class="checkboxesrec" type="checkbox" name="checkrecords[]" value="'+sid+'"  '+$checked+'></th>';
						}
						
						
						
						
						tr +='<td>'+correct_address+'</td>\
							<td>'+zoning+'</td>\
							<td>'+pro_use+'</td>\
							<td>'+zip+'</td>\
							<td>'+land_area+'</td>\
							</tr>';
						
						$('#postsList').find('tbody').append(tr);
					}	
				}else{
					var tr = '<tr><td colspan="8">No Data Found</td></tr>';
						$('#postsList').find('tbody').append(tr);
				}
				
			}


/********* Document End here *********/



	$( "#register-frm" ).submit(function( event ){ //on form submit       
        var proceed = true;
	    $("#register-frm input[required]").each(function(){
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
			 var pa =$('#reg-password').val();	
			 var cp =$('#confirm_password').val();	
			 if(pa!=cp){
				 $('.error-p').show();
				proceed = false; //
			 }else{
				 $('.error-p').hide();
			 }
			 
			});
        if(proceed){
			H5_loading.show();
			var formData = $("#register-frm").serialize();
			$.ajax({
				type: "POST",
				url: baseUrl+'login/userRegistartionWithAjax',
				data: {
					formdata : formData
				},
				success: function(msgData) {
					H5_loading.hide();
					if(msgData==2){
						$('#reg-form-warning').removeClass('hidecls');
					}
					if(msgData==1){
						$('#reg-name,\
						#reg-email,\
						#reg-password,\
						#confirm_password').val('');
						$('#reg-form-success').removeClass('hidecls');
						$('#register-frm').css('display','none');
						$('#myTabContent').css('min-height','173px');
					}
					return false;
				}
			});
		}
        event.preventDefault(); 
		return false;
    });
	$("#register-frm input[required]").keyup(function() { 
        $(this).css('border-color',''); 
		 $('.error-p').hide();
		 $('#reg-form-warning').addClass('hidecls');
	});
	$( "#login-frm" ).submit(function( event ){ //on form submit       
        var proceed = true;
	    $("#login-frm input[required]").each(function(){
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
			var formData = $("#login-frm").serialize();
			var logintype =$('#login-type').val();
			$.ajax({
				type: "POST",
				url: baseUrl+'login/userloginWithAjax',
				data: {
					formdata : formData
				},
				success: function(msgData) {
					H5_loading.hide();
					var obj = JSON.parse(msgData);
					var pricing = baseUrl+'pricing';
				    
				  if((obj.subscription==null) || (obj.subscription=='')){
					  window.location.href= pricing;
					  return false;
				  }
					if(obj.msg==1){
						
						var pageURLpricing = $(location).attr("href");
						
						if(pageURLpricing==pricing){
							window.location.href= pricing;
						}
						$('#save-search-popup-btn,#add_to_cart_btn').remove();
						if(obj.subscription!=null){
							
							$('#add_to_cart_div').append('<button type="button" class="add_to_cart" id="add_to_cart_subscription">Buy Search</button>');
						}else{
							$('#add_to_cart_div').append('<a  class="add_to_cart"  href="'+baseUrl+'pricing">Buy Search</a>');
						}
						
						$('#add_to_cart_div').append('<button type="button" id="save-search-model-id" data-toggle="modal" data-target="#save-search-model-popup" class="save_search">Save This Search</button>');
						
						
						$('#login-li').remove();
						
						$('#login_popup').modal('hide');
						$('#ui-div').append('<li class="nav-item"><a class="nav-link" href="'+baseUrl+'dashboard">My Account</a></li><li class="nav-item"><a class="nav-link" href="'+baseUrl+'logout">Logout</a></li>');
						if(obj.connects >0){
						 $('#connect_span').text(obj.connects);
						 
							var usersessionid = $('#usersessionid').val();
							var checkrecords = arr;
							var checkrecordCount = arr.length; 
							var uncheckarrCount = uncheckarr.length; 
							var allcount =$('#allcount').val();
							var connects =$('#connects').val();
							var Chkallcount =$('#Chkallcount').val();
			
							var formData = $("#search-form").serialize();
											//H5_loading.show(); 
											$.ajax({
												type: "POST",
												url: baseUrl+'dashboard/buySearch',
												data: {
													formdata : formData,
													allcount: allcount,
													checkrecordIds : arr,
													Chkallcount: Chkallcount,
													uncheckarrCount :uncheckarrCount,
													uncheckarr : uncheckarr

												},
												success: function(msgData) {
												 H5_loading.hide();
												 if(msgData==1){
													 window.location.href = baseUrl+'search-view-data';
													 
													}
												}
										});
				
						 
						 
						 
						}else{
							 $('#connect_span').text(0);
						}
						
						$('#usersessionid').val(obj.user_id);
					}else{
						$('#login-form-warning').show();
					}
					
					return false;
				}
			});
		}
        event.preventDefault(); 
    });
	$("#login-frm input[required").keyup(function() { 
        $(this).css('border-color',''); 
	});
	
	$( "#forgot-frm" ).submit(function( event ){ //on form submit       
        var proceed = true;
	    $("#forgot-frm input[required]").each(function(){
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
			var formData = $("#forgot-frm").serialize();
			console.log(formData);
			$.ajax({
				type: "POST",
				url: baseUrl+'login/userForgotWithAjax',
				data: {
					formdata : formData
				},
				success: function(msgData) {
					H5_loading.hide();
					
					if(msgData==1){
						$('#forgot-form-success').show();
						$('#forgot_email').val('');
					}else{
						$('#forgot-form-warning').show();
					}
					
					return false;
				}
			});
		}
        event.preventDefault(); 
    });
	$("#login-frm input[required").keyup(function() { 
        $(this).css('border-color',''); 
	});
	
	
	
	
	
	$("#save-search-submit").click(function() {
			
		var searchName =$('#searchName').val();
		if(searchName==''){
			$('#searchName').css('border-color','red'); 
			return false;
		}
			H5_loading.show();
			var formData = $("#search-form").serialize();
			$.ajax({
				type: "POST",
				url: baseUrl+'advancedsearch/saveSearch',
				data: {
					formdata : formData,
					searchName :searchName
				},
				success: function(msgData) {
					H5_loading.hide();
					$("#searchName").val('');
					$('#save-search-success').removeClass('hidecls');
					$('#searchNameDiv').addClass('hidecls');
					return false;
				}
			});
			return false;
	});
    $("#searchName").keyup(function() { 
        $(this).css('border-color',''); 
	});

   // Add To cart Process
   $('body').on('click', '#add_to_cart', function() {
			H5_loading.show();
			var formData = $("#search-form").serialize();
			$.ajax({
				type: "POST",
				url: baseUrl+'dashboard/addcart',
				data: {
					formdata : formData
				},
				success: function(msgData) {
					H5_loading.hide();
					
					return false;
				}
			});
			return false;
	});
   
   $(".login_popup_search").click(function() { 
        $('#save-search-popup,#add-to-cart-popup,#pricing-popup').modal('hide');
		$('#login_popup').modal('show');
	});
	
		$( "#member-register-frm" ).submit(function( event ){ //on form submit       
        var proceed = true;
	    $("#member-register-frm input[required]").each(function(){
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
			 var pa =$('#member-password').val();	
			 var cp =$('#mconfirm_password').val();	
			 if(pa!=cp){
				 $('.error-p').show();
				proceed = false; //
			 }else{
				 $('.error-p').hide();
			 }
			 
			});
        if(proceed){
			H5_loading.show();
			var formData = $("#member-register-frm").serialize();
			$.ajax({
				type: "POST",
				url: baseUrl+'login/memberRegistartionWithAjax',
				data: {
					formdata : formData
				},
				success: function(msgData) {
					H5_loading.hide();
					if(msgData==3){
						$('#member-form-count').removeClass('hidecls');
					}
					if(msgData==2){
						$('#member-form-warning').removeClass('hidecls');
					}
					if(msgData==1){
						$('#member-name,\
						#member-email,\
						#member-password,\
						#mconfirm_password').val('');
						$('#member-form-success').removeClass('hidecls');
						var urlink = $(location).attr("href");
						window.location.href =urlink;
					}
					return false;
				}
			});
		}
        event.preventDefault(); 
		return false;
    });
	$("#member-register-frm input[required]").keyup(function() { 
        $(this).css('border-color',''); 
		 $('.error-p').hide();
		 $('#member-form-warning').addClass('hidecls');
	});
	
	
	
	 $('body').on('click', '#add_to_cart_subscription', function() {
		
		var usersessionid = $('#usersessionid').val();
		var checkrecords = arr;
		var checkrecordCount = arr.length; 
		var uncheckarrCount = uncheckarr.length; 
		var allcount =$('#allcount').val();
		var connects =$('#connects').val();
		var Chkallcount =$('#Chkallcount').val();
					
		if(parseInt(Chkallcount) > parseInt(connects)){
					 $('#add-to-cart-popup-subscription').modal('show');
				 }else{
					if(Chkallcount==0){
						swal({
						title: "Please select atleast 1 buy record",
						icon: "warning",
						});
						return false;
					} 
						if(usersessionid!=''){
							swal({
							 title: "Are you sure you want to buy "+Chkallcount+" search records",
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
							  title: 'Buy!',
							  text: 'This search has been buy successfully!',
							  icon: 'success'
							}).then(function() {
							var formData = $("#search-form").serialize();
								//H5_loading.show(); 
								$.ajax({
									type: "POST",
									url: baseUrl+'dashboard/buySearch',
									data: {
										formdata : formData,
										allcount: allcount,
										checkrecordIds : arr,
										Chkallcount: Chkallcount,
										uncheckarrCount :uncheckarrCount,
										uncheckarr : uncheckarr

									},
									success: function(msgData) {
									 H5_loading.hide();
									 if(msgData==1){
										 window.location.href = baseUrl+'search-view-data';
										 
									    }
									}
							});

							});
						  } else {
							swal("Cancelled", "", "error");
						  }
						});
							
							
							
							
						
						}else{
							swal({
							 title: "Are you sure you want to buy "+Chkallcount+" search records",
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
							  title: '',
							  text: 'Now this time You can not buy this search,beacuse you are not login.',
							  icon: 'warning'
							}).then(function() {
							var formData = $("#search-form").serialize();
								//H5_loading.show(); 
								$.ajax({
									type: "POST",
									url: baseUrl+'dashboard/buySearch',
									data: {
										formdata : formData,
										allcount: allcount,
										checkrecordIds : arr,
										Chkallcount: Chkallcount,
										uncheckarrCount :uncheckarrCount,
										uncheckarr : uncheckarr

									},
									success: function(msgData) {
									 H5_loading.hide();
									 if(msgData==1){
										$('#add-to-cart-popup').modal('show');
										return false;
										 
									    }
									}
							});

							});
						  } else {
							swal("Cancelled", "", "error");
						  }
						});
							
						
						}
					 
					
					 
				 }
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
										url: baseUrl+'dashboard/downloadBuySearchRecord',
										data: {
											sid:relVal
										},
										success: function(msgData) {
											$('#loading').hide(); 
										 window.location.href = baseUrl+'assets/csv/'+msgData;
										}
										});

							});
						  } else {
							swal("Cancelled", "", "error");
						  }
						});
});




$('body').on('click', '.delete-member', function() {
	var relVal = $(this).attr('rel');
	swal({
							 title: "Are you sure you want to delete this member",
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
							  title: 'Member Deleted!',
							  text: 'This member has been deleted successfully!',
							  icon: 'success'
							}).then(function() {
							   $('#loading').show(); 
										$.ajax({
										type: "POST",
										url: baseUrl+'dashboard/deleteMember',
										data: {
											mid:relVal
										},
										success: function(msgData) {
											
										 window.location.href = baseUrl+'members';
										}
										});

							});
						  } else {
							swal("Cancelled", "", "error");
						  }
						});
});


$('body').on('click', '#save-search-model-id', function() {
    $('#searchNameDiv').removeClass('hidecls');
    $('#save-search-success').addClass('hidecls');

});

$('body').on('click', '#forget-p-btn', function() {
    $('#forgot-frm').removeClass('hidecls');
    $('#login-frm').addClass('hidecls');
});

$('body').on('click', '#login-p-btn', function() {
    $('#forgot-frm').addClass('hidecls');
    $('#login-frm').removeClass('hidecls');
});



   // End Here//

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


jQuery(document).ready(function($) {
  var alterClass = function() {
    var ww = document.body.clientWidth;
    if (ww < 992) {
      $('.chiller-theme').removeClass('toggled');
    } else if (ww >= 992) {
      $('.chiller-theme').addClass('toggled');
    };
  };
  $(window).resize(function(){
    alterClass();
  });
  //Fire it when the page first loads:
  alterClass();
});

var fixmeTop = $('.search-listing thead').offset().top;
$(window).scroll(function() {
    var currentScroll = $(window).scrollTop();
    if (currentScroll >= fixmeTop) {
        $('.search-listing thead').addClass("fixedtop");
    } else {
        $('.search-listing thead').removeClass("fixedtop");
    }
});

