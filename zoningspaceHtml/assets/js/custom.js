$(document).ready(function() {
	$('.bbox1').show();
});
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
// End Dashboard

// Toggle Filter Class 
    var showfilter = document.getElementById('additionals_filters');
    document.getElementById('view_add_filter').onclick = function() {
        if (showfilter.className == "hide"){
            showfilter.className = "show";
        } else {
            showfilter.className ='hide';
        }
    }



