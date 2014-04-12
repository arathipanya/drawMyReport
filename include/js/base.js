    $(document).ready(function(){
	function loadGraph() {
		var image = $("#graph");
		var thisSrc = image.attr("data-path");
		image.attr("src", thisSrc);
	}
	function loadGraphs() {
		var images = $(".graph");
		$.each(images, function(index, value){
console.log(value);
			var thisSrc = $(value).attr("data-path");
			$(value).attr("src", thisSrc);
		});
	}
        loadGraphs();
 
	function cleanHTML() {
	    var divToClean = $('.untarget');
	    
	    for (var i = 0; i < divToClean.length; i++) {
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
	    //convertCharts();

	    var capture = {};
	    var target = $('#target');
	    html2canvas(target, {
		onrendered: function(canvas) {
		    var img = canvas.toDataURL("image/png")

		    capture.img = canvas.toDataURL( "image/png" );
		    capture.data = { 'image' : capture.img };
                    /* save the image on the server */
		    $.ajax({
			url: "modules/drawMyReport/include/php/ajax.php",
			data: capture.data,
			type: 'post',
			success: function( result ) {
			    console.log( result );
			}
		    });
		}
	    });

	});

	$(".create-graph").click(function(e) {
	    	e.preventDefault();
	    	
		$(this).hide();
		$("#form-create-graph").show();
	});

	$(".close-create-graph").click(function(e) {
	    	e.preventDefault();
	    	
		$(".create-graph").show();
		$("#form-create-graph").hide();
	});

	$("body").on("click", ".add-graph-report", function(e){
		e.preventDefault();
		var model = $("#select-graph-report-model .select-parent .form-control");
		
		$("#select-graph-report-model").prepend(model.parent().html());
	});
});