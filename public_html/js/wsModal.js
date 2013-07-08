
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
		// need to also load in forms.js
		formatForms();
	});
}

function closeModal(){
    $(".modal-wrapper").fadeOut("fast", function() { $(this).html(""); });
    $(".dimmedOverlay").fadeOut("fast", function() { $(this).remove(); });
}

function submitModalForm(cb, params) {
	var form = $("#modalForm");
	$(".modal-bottom").html("<div class=\"loader-gif\"><img src=\"" + baseURL + "public_html/images/loader.gif\" /></div>");
	$.ajax( {
		type: "POST",
		url: form.attr('action'),
		data: form.serialize(),
		dataType: "html",
		success: function(response) {
			if(typeof cb != 'undefined')
				cb(params);
			$(".modal").html(response);//.fadeIn("slow");
			formatForms();
		}
	});
	return false;
}

function refreshModal(path, data) {
	$(".modal").html("<div class=\"loader-gif\"><img src=\"" + baseURL + "public_html/images/loader.gif\" /></div>").load(siteURL + "modals/" + path, { 'data': data}, function() {
		$(".modal").append("<div class=\"modal-close-corner\"><span>&times;</span></div>");
		formatForms();
	});
}

function addContributor() {	
	var form = $("#modalForm");
		
	if ($("#contributor-hidden").attr('value') == '') { // No user ID selected for invite
		console.log("No valid ID selected");
		
		var email = $('#ac-contributors').val(); // get current email address 
		console.log("Current email:" + email);
		
		if (isValidEmailAddress(email)) { // valid email
			console.log("Valid email");
			// search users and retrieve id
			$.ajax( {
				type: "POST",
				url: siteURL + "modals/is_member_by_email",
				data: {"email": email},
				dataType: "json",
				success: function(response) {
					var isMem = response.result;
					if (isMem === "true") { // // email found for member
						var id = response.id; 
						var string_id = form.attr('action').split('/')
						string_id = string_id[string_id.length - 1];  console.log(string_id); 
						
						// is member is already part of the string
						$.ajax( {
							type: "GET",
							url: siteURL + "modals/get_string_contributors_id/" + string_id,
							dataType: "json",
							success: function(response) {
								if (response.indexOf(id) < 0) { // member not part of string
									$('#contributor-hidden').val(id);
									send_contributor_invite();
								}
								else {// member already belongs to string
									console.log("member already belongs to string")
									return false;
								}
							},
							error : function(xhr, status, err) {
								console.log(err + "; " + status + " (add_contributor)");
							}
						} );
					} // -- end is member --
					else { // user email not found, invite them via email
						console.log("not a member");
						return false
					}
				},
				error: function(xhr, status, err){
					console.log(err + '; ' + status + " (add_contributor)");
					return false;
				}
			} );
		}
		else { // invalid email
			console.log("invalid email");
		}		
		
		return false;
	} else { // valid user ID selected
		console.log("Valid ID selected");
		//$(".contributors-box").html("<div class=\"loader-gif\"><img src=\"" + baseURL + "public_html/images/loader.gif\" /></div>");
		send_contributor_invite();
		return false;
	}
	
	//
	function send_contributor_invite() {
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
	}
	
}

function switchToCropper(path, data){
	$(".modal").animate({'width': '900px'}, "slow", function() {
		
	});
	refreshModal(path, data);
}

$(document).on("change", ".settings-change-photo-container input[type=file]", function() {
		var $form = $(this).closest("form");
		$form.submit();
	});
	