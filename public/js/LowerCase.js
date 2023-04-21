$(document).ready( function () {
    $(".LowerCase").on("keypress", function () {
    $input=$(this);
    setTimeout(function () {
    $input.val($input.val().toLowerCase());
    },50);
    })
})
