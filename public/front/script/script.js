(function ($) {
  $(document).ready(function () {
    var $chatbox = $(".chatbox"),
      $chatboxTitle = $(".chatbox__title"),
      $chatboxTitleClose = $(".chatbox__title__close"),
      $chatboxCredentials = $(".chatbox__credentials");
    $chatboxTitle.on("click", function () {
      $chatbox.toggleClass("chatbox--tray");
    });
    $chatboxTitleClose.on("click", function (e) {
      e.stopPropagation();
      $chatbox.addClass("chatbox--closed");
    });
    $chatbox.on("transitionend", function () {
      if ($chatbox.hasClass("chatbox--closed")) $chatbox.remove();
    });
    $chatboxCredentials.on("submit", function (e) {
      e.preventDefault();
      $chatbox.removeClass("chatbox--empty");
    });
  });
})(jQuery);

// step wizard
$(document).ready(function () {
  var navListItems = $("div.setup-panel div a"),
    allWells = $(".setup-content"),
    allNextBtn = $(".nextBtn");

  allWells.hide();

  navListItems.click(function (e) {
    e.preventDefault();
    var $target = $($(this).attr("href")),
      $item = $(this);

    if (!$item.hasClass("disabled")) {
      navListItems.removeClass("btn-primary").addClass("btn-default");
      $item.addClass("btn-primary");
      allWells.hide();
      $target.show();
      $target.find("input:eq(0)").focus();
    }
  });

  allNextBtn.click(function () {
    var curStep = $(this).closest(".setup-content"),
      curStepBtn = curStep.attr("id"),
      nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]')
        .parent()
        .next()
        .children("a"),
      curInputs = curStep.find("input[type='text'],input[type='url']"),
      isValid = true;

    $(".form-group").removeClass("has-error");
    for (var i = 0; i < curInputs.length; i++) {
      if (!curInputs[i].validity.valid) {
        isValid = false;
        $(curInputs[i]).closest(".form-group").addClass("has-error");
      }
    }

    if (isValid) nextStepWizard.removeAttr("disabled").trigger("click");
  });

  $("div.setup-panel div a.btn-primary").trigger("click");
});
