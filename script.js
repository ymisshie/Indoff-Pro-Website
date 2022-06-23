//Tooltip
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

//Registro Categorias

function validateUser() {
    var user_input_value = document.getElementById("floatinguser").value;
    var user_input = document.getElementById("floatinguser");
    var message_user = document.getElementById("user-message");

    if (user_input_value.length == 0) {
        message_user.innerHTML = 'Por favor ingrese el nombre de usuario';
        message_user.className = "text-red m-0 pt-1 pb-2 fw-500";

        user_input.className = "form-control bg-light is-invalid"
    }

    if (user_input_value.length > 0) {
        message_user.innerHTML = "";
        message_user.className = "";
        user_input.className = "form-control bg-light is-valid"
    }


}

function validatePassword() {

    var user_input_value = document.getElementById("floatinguser").value;
    var user_input = document.getElementById("floatinguser");

    var password_input_value = document.getElementById("floatingpassword").value;
    var password_input = document.getElementById("floatingpassword");
    var message_password = document.getElementById("password-message");

    if (password_input_value.length == 0) {
        message_password.innerHTML = 'Por favor ingrese el nombre de usuario';
        message_password.className = "text-red m-0 pt-1 pb-2 fw-500";

        password_input.className = "form-control bg-light is-invalid"
    }

    if (password_input_value.length > 0) {
        message_password.innerHTML = "";
        message_password.className = "";
        password_input.className = "form-control bg-light is-valid"
    }

    /*
    if (user_input_value.length > 0 && password_input_value.length > 0) {
        submit.className = "btn btn-primary w-100";
    }
    */

}

function recaptchaCallback() {
    submit.className = "btn btn-primary w-100";
};
