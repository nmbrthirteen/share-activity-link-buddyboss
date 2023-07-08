'use strict';
jQuery(document).ready(function($) {
	setTimeout(function(){
		$(".bb-activity-more-options").append(
			$('<div/>', {'class': 'generic-button'}).append(
				$('<a/>', {'class': 'button item-button bp-secondary-action copy-link'}).append(
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
			showCopyModal();
			// elementorFrontend.documentsManager.documents[13103].showModal();
		});
	}, 2000);
});

function createModal() {
      const modal = document.createElement('div');
      modal.id = 'modal';
      modal.className = 'modal';
      document.body.appendChild(modal);
}

function showCopyModal() {
      createModal();
      const modal = document.getElementById('modal');
      modal.textContent = 'Link copied';
      modal.classList.add('show');
      setTimeout(function() {
        modal.classList.remove('show');
      }, 1000);
}
