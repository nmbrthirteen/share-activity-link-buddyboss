"use strict";

jQuery(function ($) {
  function injectButtons() {
    $(".bb-activity-more-options").each(function () {
      var $options = $(this);

      if ($options.find(".copy-link").length) {
        return;
      }

      $options.append(
        $("<div/>", { class: "generic-button" }).append(
          $("<button/>", {
            type: "button",
            class: "button item-button bp-secondary-action copy-link",
          }).append($("<span/>", { text: custom_activity_options.copy_label }))
        )
      );
    });
  }

  injectButtons();
  $(document).ajaxComplete(injectButtons);

  $(document).on("click", ".copy-link", function () {
    var activity_id = $(this)
      .closest(".activity-item")
      .attr("id")
      .replace("activity-", "");

    var activity_link =
      custom_activity_options.activity_permalink + "p/" + activity_id;

    // Wrapped so a missing navigator.clipboard (insecure context) reaches catch.
    Promise.resolve()
      .then(function () {
        return navigator.clipboard.writeText(activity_link);
      })
      .then(function () {
        showToast(custom_activity_options.copied_message);
      })
      .catch(function () {
        showToast(custom_activity_options.error_message);
      });
  });
});

function createToast() {
  if (document.getElementById("sal-toast")) {
    return;
  }

  const toast = document.createElement("div");
  toast.id = "sal-toast";
  toast.className = "sal-toast";
  document.body.appendChild(toast);
}

function showToast(message) {
  createToast();
  const toast = document.getElementById("sal-toast");
  toast.textContent = message;
  toast.classList.add("show");
  setTimeout(function () {
    toast.classList.remove("show");
  }, 1000);
}
