    $(document).ready(function(){
	function loadGraph() {
		var image = $("#graph");
		var thisSrc = image.attr("data-path");
		image.attr("src", thisSrc);
	}
	function loadGraphs() {
		var images = $(".graph");
		$.each(images, function(index, value){
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
	    var w = window.open("");

	    html2canvas(target, {
		onrendered: function(canvas) {
		    var img = canvas.toDataURL("image/png")

		    capture.img = canvas.toDataURL( "image/png" );

		    w.window.location.href = capture.img;
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

	$("body").on("click", ".create-graph", function(e) {
	    	e.preventDefault();

		$(this).hide();
		$("#form-create-graph").show();
	});

	$("body").on("click", ".close-create-graph", function(e){
		e.preventDefault();

		$(".create-graph").show();
		var target = $(this).attr('href');
		$(target).hide();
	});

	$("body").on("click", ".add-graph-report", function(e){
		e.preventDefault();
		var model = $("#select-graph-report-model .select-parent .form-control");
		
		$("#select-graph-report-model").prepend(model.parent().html());
	});

	$("body").on("click", ".edit-graph", function(e){
		e.preventDefault();
	
		var path = $(this).attr("href");
		$.get(path, function(dataResult) {
			if (!$("#form-edit-graph").length) {
				$("#form-create-graph").parent().append(dataResult);
			} else {
				$("#form-edit-graph").parent().html(dataResult);
			}
		});
	});	

	$("body").on("click", ".remove-graph", function(e){
		e.preventDefault();

		var confirm = window.confirm("Are you sure?");

		if (confirm) {
			var path = $(this).attr("href");
			$.get(path, function(dataResult) {console.log(dataResult)});
			location.reload();
		} else {

		}
	});	
});