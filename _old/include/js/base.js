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
		    //capture.img = canvas.toDataURL( "image/jpeg" );

		    w.window.location.href = img;
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
                var target = $("#form-create-graph");
		target.show();
		$("body").animate({ scrollTop: target.scrollTop() + target.offset().top - $("body").offset().top }, { duration: 'ease', easing: 'swing'});
	});

	$("body").on("click", ".close-create-graph", function(e){
		e.preventDefault();

		$(".create-graph").show();
		var target = $(this).attr('href');
		$(target).hide();
	});

	$("body").on("click", ".add-graph-report", function(e){
		e.preventDefault();
		var target = $(this).attr('target');
		var model = $(target + " .select-parent .form-control");
		
		$(target).prepend(model.parent().html());
	});

	$("body").on("click", ".edit-graph, .edit-report", function(e){
		e.preventDefault();
	
		var path = $(this).attr("href");
		$.get(path, function(dataResult) {
			if (!$("#form-edit-graph").length) {
				$("#form-create-graph").parent().append(dataResult);
		                var target = $("#form-edit-graph");
				$("body").animate({ scrollTop: target.scrollTop() + target.offset().top - $("body").offset().top }, { duration: 'ease', easing: 'swing'});
			} else {
				$("#form-edit-graph").parent().html(dataResult);
				var target = $("#form-edit-graph");
				$("body").animate({ scrollTop: target.scrollTop() + target.offset().top - $("body").offset().top }, { duration: 'ease', easing: 'swing'});
			}
		});
	});	

	$("body").on("click", ".remove-graph", function(e){
		e.preventDefault();

		var confirm = window.confirm("Are you sure?");

		if (confirm) {
			var path = $(this).attr("href");
			$.get(path, function(dataResult) {
				location.reload();
			});
		} else {

		}
	});

	$("body")
		.on("mouseover mouseout", ".label-report-graph-edit", function (e) {
			if ($(this).attr('disabled')) {
				$(this).attr('disabled', false);
			} else {
				$(this).attr('disabled', true);
			}
		})
		.on("click", ".label-report-graph-edit", function (e) {
			if ($(this).attr('disabled')) {
                                $(this).attr('disabled', false);
			} else {
		                $(this).attr('disabled', true);
                        }
                });

	$("body").on("submit", ".to-be-checked.report-edit-form", function (e) {
		$.each($(".label-report-graph-edit"), function(key, label) {
			if ($(label).attr("disabled") == undefined) {
				var forattr = $(label).attr("for");
				$(forattr).attr("name", "");
			}
		})
	});

	$("body").on("change", ".select-parent select", function(e) {
		var thisElem = $(this);
		var thisName = thisElem.attr('name');
		var path = "./modules/drawMyReport/include/php/getIndexData.php?raz=false";
		var selects = $(".select-parent select");

		$.each(selects, function(key, thisSelect) {
			var thisValue = $(thisSelect).val();
			if ($(thisSelect).attr("name") == "sg" && thisValue !== '-')	path += "&sg_id=" + thisValue;
			if ($(thisSelect).attr("name") == "service" && thisValue !== '-') path += "&service_id=" + thisValue;
			if ($(thisSelect).attr("name") == "host" && thisValue !== '-') path += "&host_id=" + thisValue;
		});
		
		$.get(path, function(dataResult) {
			$("#index-data-select").html(dataResult);
		});
	});

	$("body").on("click", ".open-form", function (e) {
		e.preventDefault();

		var target = $(this).attr("href");
		$(target).parent().attr("hidden", false);
	});

	$("body").on("click", ".close-form", function (e) {
		e.preventDefault();

		var target = $(this).attr("href");
		$(target).parent().attr("hidden", true);
	});

	$("body").on("submit", "#create-user-form", function (e) {
		e.preventDefault();
		
		var str = $(this).serialize();
		console.log(str);
		$.post("./modules/drawMyReport/include/php/create-user.php", str, function(dataResult) {
			console.log("dataResult", dataResult);
			$("#select-graph-report-model").prepend(dataResult);
		});
	});

	$("body").on("click", ".remove-user", function(e) {
		e.preventDefault();

		var thisElem = $(this);
		var path = thisElem.attr("href");
		$.get(path, function(dataResult) {
			thisElem.parent().parent().remove();
		});
	});
});