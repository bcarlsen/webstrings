//////////////////////////
//      Radio Pills     //
//////////////////////////

$(document).on("click", ".roles-editor", function() {
	
});

$(document).on("click", ".roles-owner", function() {
});

$(document).on("click", ".roles-remove", function() {
	$.ajax({
		url: siteURL + "modals/contributor_remove/" + $(this).attr('data-sid') + "/" + $(this).attr('data-uid')
	});
	$(this).parents(".contributor-container").animate( {width: 0}, "fast");
});
