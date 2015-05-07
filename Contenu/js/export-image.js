    $(document).ready(function(){
	function cleanHTML() {
	    var divToClean = $('.untarget');
	    
	    for (var i = 0; i < divToClean.length; i++) {
		divToClean.hide();
	    }
	}

	function convertCharts(canvases, charts) {
	    $(".canvases").show();
	    var canvases = $(".canvases");
	    var charts = $('svg');
	    
	    for (var i = 0; i < charts.length; i++) {
		var chart = $('svg:eq(' + i + ')');
		canvg(canvases[i], chart.parent().html());
	    }
	    $(".untarget-after").hide();
	}

	$('#cmd').click(function () {
	    cleanHTML();
	    convertCharts();

	    var capture = {};
	    var target = $('#target');
	    var w = window.open("");

	    html2canvas(target, {
		onrendered: function(canvas) {
		    var img = canvas.toDataURL("image/png")
		    //capture.img = canvas.toDataURL( "image/jpeg" );

		    w.window.location.href = img;

		    $('.untarget').show();
		    $(".untarget-after").show();
		    $(".canvases").hide();
		/*
		    capture.data = { 'image' : capture.img };
          		$.ajax({
			url: "modules/drawMyReport/include/php/ajax.php",
			data: capture.data,
			type: 'post',
			success: function( result ) {
				window.location.href = capture.img;
			}
		    });
		*/
		}
	    });
	});
});