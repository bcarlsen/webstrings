
/**
 * This file contains all the javascript needed to control the
 * pop up boxes.
 */

$(document).ready(function(){
	
    $("body").append("<div class=\"modal-wrapper\"></div>");
    $(".modal-wrapper").hide();

    $(".modal-wrapper").click(function(e){
        if($(e.target).parents(".modal").length < 1){
            if(!$(e.target).is(".modal")){
                closeModal();
            }
        }
    });

    $(".modal-close-corner").live("click", function(){
        closeModal();
    });

	$(".switch").live("click", function(e) {
		$(this).toggleClass("on");
		var checkbox = $("input[type=checkbox]", this);
		checkbox.prop("checked", checkbox.prop("checked"));
	});
	
});

function buildModal(fname, type){
	
	$("body").append("<div class=\"dimmedOverlay\"></div>").fadeIn("slow");
	
	var modalDiv = '<div class="modal';
	if(typeof type !== 'undefined') modalDiv += ' ' + type;
	modalDiv +='"></div>';
	
	$(".modal-wrapper").append(modalDiv);
	$(".modal").load(fname, function() {
		$(".modal").append("<div class=\"modal-close-corner\"><span>&times;</span></div>");
		$(".modal-wrapper").fadeIn("slow");
		$("#loginEmail").focus();
	});
}

function closeModal(){
    $(".modal-wrapper").fadeOut("fast", function() { $(this).html(""); });
    $(".dimmedOverlay").fadeOut("fast", function() { $(this).remove(); });
}

function submitModalForm() {
	var form = $("#modalForm");
	$(".modal-bottom").html("<div class=\"loader-gif\"><img src=\"" + baseURL + "public_html/images/loader.gif\" /></div>");
	$.ajax( {
		type: "POST",
		url: form.attr('action'),
		data: form.serialize(),
		dataType: "html",
		success: function(response) {
			$(".modal").html(response).fadeIn("slow");
		}
	});
	return false;
}

function refreshModal(path) {
	$(".modal").html("<div class=\"loader-gif\"><img src=\"" + baseURL + "public_html/images/loader.gif\" /></div>").load(siteURL + "modals/" + path, function() {
		$(".modal").append("<div class=\"modal-close-corner\"><span>&times;</span></div>");
	});
}

function addContributor() {
	
	if ($("#contributor-hidden").attr('value') == '') {
		
		return false;
	} else {
		var form = $("#modalForm");
		$(".contributors-box").html("<div class=\"loader-gif\"><img src=\"" + baseURL + "public_html/images/loader.gif\" /></div>");
		$.ajax( {
			type: "POST",
			url: form.attr('action'),
			data: form.serialize(),
			dataType: "html",
			success: function(response) {
				$(".contributors-box").html(response).fadeIn("slow");
				$("#ac-contributors").val('');
				$("#contributor-hidden").val('');
			}
		});
		return false;
	}
}