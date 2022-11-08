//Target the input elements
var form = document.querySelector(".auth-form form");
var username = document.getElementById("username");
var email = document.getElementById("email");
var password = document.getElementById("password");
var confirmPassword = document.getElementById("confirm-password");

form.addEventListener('submit', e => {
    validateData();

    if(isFormValid()) {
        form.submit();
    } else {
        e.preventDefault();
    }
});

function isFormValid() {
    const inputContainers = form.querySelectorAll('.form-control');
    let result = true;
    inputContainers.forEach((container) => {
        if(container.classList.contains('error')) {
            result = false;
        }
    })

    return result;
}

function validateData() {
    //Store input data
    const usernameData = username.value.trim();
    const emailData = email.value.trim();
    const passwordData = password.value.trim();
    const confirmPasswordData = confirmPassword.value.trim();

    //Check if all input fields are filled and the data is valid
    //username
    if(usernameData === '') {
        setErrorFor(username, "username cannot be empty")
    } else {
        setSuccessFor(username);
    }

    //email
    if(emailData === '') {
        setErrorFor(email, "email cannot be empty");
    } else if(!isEmailValid(emailData)) {
        setErrorFor(email, "email not valid");
    } else if(isEmailTaken(emailData)) {
        setErrorFor(email, "email already exists");
    } else {
        setSuccessFor(email)
    }

    //password
    if(passwordData === '') {
        setErrorFor(password, "password cannot be empty");
    } 
    
    // else if(passwordData.length < 8) {
    //     setErrorFor(password, "password must contain a minimum of 8 characters");
    // } 
    
    else {
        setSuccessFor(password);
    }

    //Confirm Password
    if(confirmPasswordData === '') {
        setErrorFor(confirmPassword, "Confirm Password cannot be empty");
    } else if(confirmPasswordData !== passwordData) {
        setErrorFor(confirmPassword, "Passwords do not match");
    } else {
        setSuccessFor(confirmPassword);
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

function isEmailValid(email) {
    const regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(email);
}

function isEmailTaken(emailData) {
    let result = false;
    let count = 0;
    $.post('register.php', {email: emailData}, function(data,status) {
        // trget the result div nd plce the dt html on it
        //count = emailInput.dataset.name;
        //$('.email').empty().append(count);
        //console.log(email.dataset.name)
        console.log(count);
    });

    //let count = email.dataset.name;
    console.log(count);
    if(count === 1) {
        result = true;
    }

    return result;
}