document.getElementById("updateAccount").addEventListener("submit", function (event) {

    if (!validateForm()) {  // if the validation of the form fails, we will not submit the form.                             
        event.preventDefault(); // prevents the form from submitting.
    }
    else {
        if (!confirm("Confirm Submission of Feedback Form?")) { // if form not confirmed to submit , we will not submit the form         
            event.preventDefault(); // prevents the form from submitting.
        }
    }
})

function validateForm() {
    var formOK = true;
    var email = document.getElementById("email").value;
    var mobile = document.getElementById("mobile").value;
    clearErrorMsgs();


    // email field validations
    if (email.length == 0) {
        formOK = false;
        document.getElementById("email_err").innerHTML = "Please enter an email address.";
    } else {
        if (!validateEmail(email)) {
            formOK = false;
            document.getElementById("email_err").innerHTML = "Please enter a valid email address.";
        }
    }

    // mobile field validations
    if (mobile.length == 0) {
        formOK = false;
        document.getElementById("mobile_err").innerHTML = "Please enter a mobile number.";
    }
    else if (!validateMobile(mobile)){
            formOK = false;
            document.getElementById("mobile_err").innerHTML = "Mobile number must be 8 digits.";
        }
    else {
        if(!validateStartingNumber(mobile)){
            formOK = false;
            document.getElementById("mobile_err").innerHTML = "Mobile number must begin with 8 or 9.";
        }
    }

    
    return formOK;
}

function validateMobile(str) {
    // a shorter way to test regex
    return /^\d{8}$/.test(str); // using regex to ensure all 8 characters in string are numbers.
}

function validateStartingNumber(str) {
    // a shorter way to test regex
    return /^[89]\d{7}$/.test(str); // using regex to ensure all 8 characters in string are numbers.
}

function validateEmail(str) {
    // using regex again to validate email address: go to https://regexr.com/ and see the meaning of this regex expression below
    return /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(str);
}

// clears the error messages
function clearErrorMsgs() {
    var labels = document.getElementsByClassName("err_label");

    for (let i = 0; i < labels.length; i++) {
        labels[i].innerHTML = "";
    }
}