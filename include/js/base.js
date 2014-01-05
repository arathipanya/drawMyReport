    $(document).ready(function(){ 
	function cleanHTML() {
	    var divToClean = $('.untarget');
	    
	    for (var i = 0; i < divToClean.length; i++) {
		console.log(divToClean[i]);
		divToClean.html("");
	    }
	}
	
	function convertCharts(canvases, charts) {
	    var canvases = $(".canvases");
	    var charts = $('svg');
	    
	    for (var i = 0; i < charts.length; i++) {
		var chart = $('svg:eq(' + i + ')');
		canvg(canvases[i], chart.parent().html());
	    }
	    $(".untarget-after").html("");
	}

	$('#cmd').click(function () {
	    cleanHTML();
	    convertCharts();

/*
	    $.ajax({
	        url: "http://172.16.128.129/centreon/modules/drawMyReport/data/chart2canvas.php",
	        data: {},
	        type: 'get',
	        success: function (result) {
		    console.log(result);
		}});
*/
	    var capture = {};
	    var target = $('#target');
	    html2canvas(target, {
		onrendered: function(canvas) {
		    var img = canvas.toDataURL("image/png")
//		    window.open(img);
		    capture.img = canvas.toDataURL( "image/png" );
		    capture.data = { 'image' : capture.img };
                    /* save the image on the server */
		    $.ajax({
			url: "http://172.16.128.129/centreon/modules/drawMyReport/include/php/ajax.php",
			data: capture.data,
			type: 'post',
			success: function( result ) {
			    console.log( result );
			}
		    });
		}
	    });

	});
    });
