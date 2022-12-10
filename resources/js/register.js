$(document).ready(function () {
    $("#button-sub").prop('disabled', true);
    $("#password").add("#confirm-password").on("input", function () {
        if ($("#confirm-password").val() == $("#password").val() && $("#password").val().length >= 6) {
            console.log($("#password").val().length);
            $("#password").css("background-color", "#268e0f");
            $("#confirm-password").css("background-color", "#268e0f");
            $("#button-sub").prop('disabled', false);
        } else {
            $("#confirm-password").css("background-color", "#8e0f11");
            $("#password").css("background-color", "#8e0f11");
            $("#button-sub").prop('disabled', true);
        }
    });
    $("button-sub").on("click", function () {
        if ($("#password").val().length < 6) {
            $("#pass-msg").show();

        } else if ($("#confirm-password").val() == $("#password").val()) {
            $("#confirm-pass-msg").show();
        }
    });
});



