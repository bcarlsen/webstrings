//////////////////////////
//    Event Listeners   //
//////////////////////////

$(document).on("click", ".single-line-form-ajax input[type=submit]", function(e){
	e.preventDefault();
	var $submit = $(e.target);
	var $form = $submit.parents('form').first();
	var url = $form.attr('action');
	
	// begin form submit
	$form.find('.single-line-form-ajax').addClass("loading");
	$submit.val("Saving..");
	formatForms();
	$.ajax(url, {
		type: "POST",
		data: $form.serialize(),
		dataType: "json",
		success: function(data) {
			var $errorBox = $form.find(".form-errors").first();
			$form.find("input[type=password]").val('');
			$form.find('.single-line-form-ajax').removeClass('loading');
			$submit.val("Saved");
			if(data.errors){
				// form submission failed
				$errorBox.append("<p>" + data.errors + "</p>");
				$form.find('.single-line-form-ajax').addClass('error');
				$submit.val("Error");
			} else {
				// form submitted successfully
				$form.find('.single-line-form-ajax').addClass('done');
				$submit.val("Saved");
			}
			formatForms();
			setTimeout(function() {
				$errorBox.html('');
				$form.find('.single-line-form-ajax').removeClass('done error');
				$submit.val("Change");
				formatForms();
			}, 2500);
		}
	});
});

//////////////////////////
//      Formatting      //
//////////////////////////
$(document).ready(function() {
	
	formatForms();
});

function formatForms() {
	
	// fix button width on single line forms
	$(".single-line-form, .single-line-form-ajax").each(function() {
		var $control = $(this);
		var textWidth = $control.find("input[type=submit]").first().width() + 10;
		$control.find(".input-wrapper").css('margin-right', textWidth).val(textWidth);
	});
	
	// normalize input labels
	var widthArr = new Array();
	$("form").each(function(index){
		var index = parseInt($(this).data("form-group"));
		if(typeof index == 'undefined')
			index = 0;
		var boolTest = index in widthArr;
		if(!(index in widthArr))
			widthArr[index] = 0;
		$("label", this).each(function(){
			if($(this).width() > widthArr[index])
				widthArr[index] = $(this).width();
		});
	});
	$("form").each(function(index){
		var index = parseInt($(this).data("form-group"));
		if(typeof index == 'undefined')
			index = 0;
		$("label", this).width(widthArr[index]);
	});
	
	// format file upload button
	$(".file-input-wrapper").each(function() {
		var $button = $(this).find("input[type=button]:first");
		var $file_input = $(this).find("input[type=file]:first");
		$file_input.width($button.outerWidth()).height($button.outerHeight());
		$file_input.css("z-index", 1);
		$button.css("z-index", 0);
	});
	
	// hide file upload iframe
	$(".settings-upload-target").hide();
}

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


//////////////////////////
//       Functions      //
//////////////////////////

function setSaveInProgress($this){
	$this.parents('.single-line-form-ajax').addClass("loading");
	$this.val("Saving..");
	formatForms();
	setTimeout(function() {
		setSaveFinished(e);
	}, 2000);
}

function setSaveFinished(e){
	var $this = $(e.target);
	var $container = $this.parents('.single-line-form-ajax');
	$container.removeClass('loading').addClass('done');
	$this.val("Saved");
	formatForms();
	setTimeout(function() {
		$container.removeClass('done');
		$this.val("Save");
		formatForms();
	}, 2500);
}
