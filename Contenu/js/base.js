$(document).ready(function(){
	$("body").on("change", ".relation-select", function (e) {
		console.log("hey");
		var selectedOption = $(this).find("option:selected:first");
		var selectedOptionValue = selectedOption.val();
		var query = $(this).attr('data-query');
		var targetHTML = $("#targetHTML");
		
		$.get(query + "&id=" + selectedOptionValue, function(result, b, c) {
			targetHTML.append($(result).find("#partial-target").html());
		});
	});
});