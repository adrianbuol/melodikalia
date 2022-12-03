$(document).ready(function () {
    $("#buttonSub").prop('disabled', true);
    $("#password").add("#confirmPassword").on("input", function () {
        if ($("#confirmPassword").val() == $("#password").val() && $("#password").val().length >= 6) {
            console.log($("#password").val().length);
            $("#password").css("background-color", "#268e0f");
            $("#confirmPassword").css("background-color", "#268e0f");
            $("#buttonSub").prop('disabled', false);
        } else {
            $("#confirmPassword").css("background-color", "#8e0f11");
            $("#password").css("background-color", "#8e0f11");
            $("#buttonSub").prop('disabled', true);
        }
    });
    $("buttonSub").on("click", function () {
        if ($("#password").val().length < 6) {
            $("#pass-msg").show();

        } else if ($("#confirmPassword").val() == $("#password").val()) {
            $("#confirm-pass-msg").show();
        }
    });
});



