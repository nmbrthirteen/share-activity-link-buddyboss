'use strict';
jQuery(document).ready(function($) {
	setTimeout(function(){
		$(".bb-activity-more-options").append(
			$('<div/>', {'class': 'generic-button'}).append(
				$('<a/>', {'class': 'button item-button bp-secondary-action copy-link', 
						   'href': '#'}).append(
					$('<span/>', { 'class': 'delete-label', text: 'Copy Link'})
				).append(
					$('<span/>', { 'class': 'bp-screen-reader-text', text: 'Copy Link'})
				)
			)
		);
		$(".copy-link").click(function() {
			var activity_id = $(this).closest(".activity-item").attr("id").replace("activity-", "");
			var activity_link = custom_activity_options.activity_permalink + 'p/' + activity_id;
			navigator.clipboard.writeText(activity_link);
		});
	}, 1000);
});