$(document).ready(function(){
	if ($("#dp-start").length) {
	    var href = window.location.href;
	    var parameters = href.split('?')[1].split('&');
	    var p = {};

	    for (var i = 0; i < parameters.length; i++) {
		p[parameters[i].split('=')[0]] = parameters[i].split('=')[1];
	    }
	    
	    if (typeof p['end'] !== "undefined" && typeof p['start'] !== "undefined") {
		var start = new Date(p['start']-0);
		var start_str = (start.getMonth()+1 < 10 ? '0' + (start.getMonth() + 1) : start.getMonth() + 1);
		start_str += '/' + (start.getDate() < 10 ? '0' + (start.getDate()) : start.getDate());
		start_str += '/' + start.getFullYear();
		    
		$("#dp-start").val(start_str);

		var start = new Date(p['end']-0);
		var start_str = (start.getMonth()+1 < 10 ? '0' + (start.getMonth() + 1) : start.getMonth() + 1);
		start_str += '/' + (start.getDate() < 10 ? '0' + (start.getDate()) : start.getDate());
		start_str += '/' + start.getFullYear();

		$("#dp-end").val(start_str);
	    }
	}

	google.setOnLoadCallback(drawChart);
	function drawChart() {
	    //linechart
	    var charts = $('.chart');

	    $(charts).each(function (curr) {
		    var thisc = $(this);
		    var di = $(this).attr("data-index");
		    var sid = $(this).attr("data-sid");

		    var href = window.location.href;
		    var parameters = href.split('?')[1].split('&');
		    var p = {};
		    
		    for (var i = 0; i < parameters.length; i++) {
			p[parameters[i].split('=')[0]] = parameters[i].split('=')[1];
		    }
		    
		    var end = (new Date()).getTime();
		    var start = "-7";
		    if (typeof p['end'] !== "undefined" && typeof p['start'] !== "undefined") {
			end = (p['end']-0)/1000;
			start = (p['start']-0)/1000;
		    }
		    
		    $.get("./include/views/graphs/exportData/ExportCSVServiceData.php?index="+di+"&end="+end+"&start="+start+"&sid="+sid, function(result) {
			    var data = null;
			    data = new google.visualization.DataTable();
			    var r = result.split('\n');
			    var type = "memory";
			    
			    for (var i = 0; i < r.length; i++) {
				r[i] = r[i].split(';');
			    }
			
			    if (r.length < 1) return;
			    
			    data.addColumn('datetime', 'Date'); 
			    for (var i = 2; i < r[0].length; i++) {
				data.addColumn('number', r[0][i]);
				if (r[0][i] !== "used" && r[0][i] !== "size") {
				    type = "fequency";
				}
			    }
			    
			    var temp_data = []

			    for (var i = 1; i < r.length; i++) {
				var temp = [];

				if (r[i].length !== r[0].length) {
				    continue;
				}
				for (var j = 1; j < r[i].length; j++) {
				    if (j == 1) {
					temp.push(new Date(r[i][j]));
				    } else {
					temp.push(r[i][j]-0);
				    }
				}
				temp_data.push(temp);
			    }
			    data.addRows(temp_data);

			    $.post('./modules/drawMyReport/Contenu/php/dataChart.php', {type: type, data: temp_data}, function(analyses) {
				    analyses = analyses.split(';');
				    var _target = thisc.siblings('.prevision')[0];

				    if (analyses[0] !== '-1') $(_target).find('.beginning').html(analyses[0]);
				    if (analyses[1] !== '-1') $(_target).find('.seven').html(analyses[1]);
				    if (analyses[2] !== '-1') $(_target).find('.month').html(analyses[2]);
				});

			    var options = {};
			    var chart = new google.visualization.LineChart($(thisc)[0]);

			    if ($(thisc).hasClass('area-chart')) {
				var chart = new google.visualization.AreaChart($(thisc)[0]);
			    }
			    
			    chart.draw(data, options); 
			});
		});//end each
	}//end drawchart
    
	$('body').on('click', ".date-picker-btn", function (e) {
		e.preventDefault();
		var href = window.location.href;
		var parameters = href.split('?')[1].split('&');
		var start = $("#dp-start").val();
		var end = $("#dp-end").val();
		var p = {};

		for (var i = 0; i < parameters.length; i++) {
		    if (parameters[i].split('=')[0].length) p[parameters[i].split('=')[0]] = parameters[i].split('=')[1];
		}
		p['start'] = (new Date(start)).getTime();
		p['end'] = (new Date(end)).getTime();
		console.log(p);
		
		var url = 'main.php?';

		for (var key in p) {
		    url += "&" + key + "=" + p[key];
		}
		window.location.href = url; 
		//TODO passer les arguments dans url et refresh
	    });


});//ferme le fichier