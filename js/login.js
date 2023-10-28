$('[data-function=create]').on( "click", function() {
    $(".formbg").addClass("moveright");
    $(".loginform").addClass("hide");
    $(".createform").addClass("show");
});

$('[data-function=login]').on( "click", function() {
    $(".formbg").removeClass("moveright");
    $(".loginform").removeClass("hide");
    $(".createform").removeClass("show");
});