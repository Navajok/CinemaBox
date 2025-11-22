document.getElementById("edit").addEventListener("submit", function (event) {
    if (!validateForm()) {  // if the validation of the form fails, we will not submit the form.                             
        event.preventDefault(); // prevents the form from submitting.
    }
    else {
        if (!("Confirm Submission of Sign Up Form?")) { // if form not confirmed to submit , we will not submit the form         
            event.preventDefault(); // prevents the form from submitting.
        }
    }
})

function validateForm() {
    var formOK = true;
    var poster = document.getElementById("poster").value;
    var title = document.getElementById("title").value;
    var plot = document.getElementById("plot").value;
    var price = document.getElementById("price").value;
    var runtime = document.getElementById("runtime").value;
    clearErrorMsgs();

    if (poster.length == 0) {
        formOK = false;
        document.getElementById("poster_err").innerHTML = "Please enter a valid File name.";
    }

    if (title.length == 0) {
        formOK = false;
        document.getElementById("title_err").innerHTML = "Please enter a valid Movie Title.";
    }

    if (plot.length == 0) {
        formOK = false;
        document.getElementById("plot_err").innerHTML = "Please enter a valid Plot.";
    }

    if (price.length == 0) {
        formOK = false;
        document.getElementById("price_err").innerHTML = "Please enter a valid price.";
    } else {
        if (!validatePrice(price)) {
            formOK = false;
            document.getElementById("price_err").innerHTML = "Please enter a valid price";
        }
    }

    if (runtime.length == 0) {
        formOK = false;
        document.getElementById("runtime_err").innerHTML = "Please enter a Runtime.";
    }
    return formOK;
}

function validatePrice(str) {
    let pattern = /^[0-9]+(\.[0-9]+)?$/;
    return pattern.test(str);

}

// clears the error messages
function clearErrorMsgs() {
    var labels = document.getElementsByClassName("err_label");

    for (let i = 0; i < labels.length; i++) {
        labels[i].innerHTML = "";
    }
}