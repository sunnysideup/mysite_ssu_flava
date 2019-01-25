/*
 *@author nicolaas[at]sunnysideup.co.nz
 *
 **/

;(function($) {
	$(document).ready(function() {
		initFunctions.imageFixes();
		initFunctions.setupRemoveDefault();
		initFunctions.externalLinks();
		initFunctions.removeTypographyWithinTypography();
		initFunctions.smoothScrolling();
	});

	var initFunctions = {
		imageFixes: function() {
			$(".typography img[align='left']").css("float", "left");
			$(".typography img[align='right']").css("float", "right");
			$("img").removeAttr("title", "").removeAttr("align");
		},

		setupRemoveDefault: function () {
			$("input.nolabel").bind("click focus",
				function () {
			 		if(!$(this).attr("rel") || $(this).attr("rel") == $(this).val()) {
						if(!$(this).attr("rel")) {
				 			$(this).attr("rel", $(this).val());
						}
						$(this).val("");
						$(this).blur(
							function() {
								if(!$(this).val()) {
					 				$(this).val($(this).attr("rel"));
								}
				 			}
						);
			 		}
				}
		 	);
		},

		externalLinks: function () {
			jQuery("a[href^='http://'], a[href^='https://'], a.externalLink").each(
				function(i, el){
					var link = "" + jQuery(el).attr("href");
					var currentSite = "" + window.location;
					var cutOff = 0 + currentSite.indexOf( "/", 10 );
					if(link.substring(0, cutOff) != currentSite.substring(0,cutOff)) {
						jQuery(el).attr("target", "_blank");
						jQuery(el).addClass("externalLink");
					}
				}
			);
		},

		removeTypographyWithinTypography: function() {
			jQuery(".typography .typography").each(
				function() {
					jQuery(this).removeClass("typography");
				}
			);
		},

		smoothScrolling: function() {
			jQuery(function() {
				jQuery('a[href*=#]:not([href=#])').click(function(event) {
					event.preventDefault();
					if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
						var target = jQuery(this.hash);
						target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
						if (target.length) {
							jQuery('html,body').animate(
								{scrollTop: target.offset().top}
								, 1000
							);
							return false;
						}
					}
				});
			})
		}
	}
})(jQuery);



var ss_formfield_labels = {

	fieldsSelector: ".typography input, .typography textarea, .typography select",

	hasFocusClass: "hasFocus",

	hasTextClass: "hasText",

	init: function() {

		jQuery(ss_formfield_labels.fieldsSelector).each(
			function() {
				jQuery(this).focus(
					function() {
						var id = jQuery(this).attr("id");
						var labelSelector = "label[for='" + id + "'], #" + id;
						jQuery(labelSelector).addClass(ss_formfield_labels.hasFocusClass);
					}
				);
				jQuery(this).blur(
					function() {
						var id = jQuery(this).attr("id");
						var labelSelector = "label[for='" + id + "'], #" + id;
						jQuery(labelSelector).removeClass(ss_formfield_labels.hasFocusClass);
						if(jQuery(this).val().length == 0) {
							jQuery(labelSelector).removeClass(ss_formfield_labels.hasTextClass);
						}
						else {
							jQuery(labelSelector).addClass(ss_formfield_labels.hasTextClass);
						}
					}
				);
				jQuery(this).keyup(
					function(event) {
						var id = jQuery(this).attr("id");
						var labelSelector = "label[for='" + id + "'], #" + id;
						if(jQuery(this).val().length > 0) {
							jQuery(labelSelector).addClass(ss_formfield_labels.hasTextClass);
						}
						else {
							jQuery(labelSelector).removeClass(ss_formfield_labels.hasTextClass);
						}
					}
				);
			}
		);
	}
}
