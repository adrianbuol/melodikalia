var password = document.getElementById("password");
var confirm_password = document.getElementById("confirmPassword");
var pass_input = document.getElementById("passInput");


function validatePassword() {
    if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Las contraseñas no coinciden");

        pass_input.classList("border border-danger");
    } else {
        confirm_password.setCustomValidity('');
        pass_input.classList("border border-success");
    }
}

password.addEventListener("change", validatePassword);
confirm_password.addEventListener("keyup", validatePassword);

