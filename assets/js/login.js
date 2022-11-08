//Target the input elements
var form = document.querySelector(".auth-form form");
var username = document.getElementById("username");
var password = document.getElementById("password");

form.addEventListener('submit', e => {
    e.preventDefault();
    validateData();
});

function validateData() {
    //Store input data
    const usernameData = username.value.trim();
    const passwordData = password.value.trim();

    //username
    if(usernameData === '') {
        setErrorFor(username, "username cannot be empty");
    } else {
        setSuccessFor(username);
    }

    //password
    if(passwordData === '') {
        setErrorFor(password, "password cannot be empty");
    } else {
        setSuccessFor(password);
    }
}

function setErrorFor(input, message) {
    const formControl = input.parentElement;
    const small = formControl.querySelector("small");

    formControl.className = "form-control error";
    small.textContent = message;
}

function setSuccessFor(input) {
    const formControl = input.parentElement;
    formControl.className = "form-control success";
}