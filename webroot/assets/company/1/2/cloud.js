loadJquery = false;
if (typeof jQuery != 'undefined') {  
	// jQuery is loaded => print the version
	//alert(jQuery.fn.jquery);
	loadedJquery();
} else {
  var jq = document.createElement('script');
  jq.type = 'text/javascript';
  jq.src = '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js';
  document.getElementsByTagName('head')[0].appendChild(jq);
  jqueryAvailable();
}

function jqueryAvailable(){
	if (typeof jQuery != 'undefined') {  
		loadedJquery();
	} else {
	        setTimeout("jqueryAvailable()", 50);
	}
}


function loadedJquery(){
	$('head').append('<link href="//admin.monsterboost.com/assets/company/TinyTotShop/styles.css" type="text/css" rel="stylesheet" />');
	$('<div id="cc-wrap" class="cc-right" style="height:40px;display:block;"><div id="cc-header"><a href="javascript:;" id="cc-header-slider">Win Win Win Loads</a></div><iframe id="cc-iframe" src="//d1713560.u299.pipeten.co.uk/iframe.html"></iframe></div>').appendTo('body');

	$('#cc-header-slider').click(function() {
		theHeight = ($('#cc-wrap').height() > 50 ? "40px" : "180px");
		$('#cc-wrap').animate({
			height: theHeight
		}, 200, null)
	  /*
	  if ( $('#cc-iframe').is( ":hidden" ) ) {
	    $('#cc-iframe').show( "slow" );
	  } else {
	    $('#cc-iframe').slideUp();
	  }
	  */
	});

	//$( "#cc-wrap" ).slideUp( "slow", function() {
    // Animation complete.
	//});
	
}