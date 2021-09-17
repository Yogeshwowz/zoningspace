$( function() {
    //var dateFormat = "mm/dd/yy",
    var dateFormat = "yy-mm-dd",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
		  changeYear: true,
		  yearRange: '1900:+0',
          numberOfMonths: 1,
		  dateFormat : "yy-mm-dd"
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
		changeYear: true,
        numberOfMonths: 1,
		yearRange: '1900:+0',
		 dateFormat : "yy-mm-dd"
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
 $( function() {
    $( ".datepicker" ).datepicker({dateFormat: "yy-mm-dd"});
  } );