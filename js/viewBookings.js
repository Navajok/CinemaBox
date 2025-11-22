$('#checkbutton').on('click', function() {
    if (!validateForm()) { 
        ; // prevents the form from submitting.
    }
    else {
        var userid = $('#Particulars').val();

        window.location.href = 'viewBookings.php?userID=' + userid;
    }
    
})

function validateForm() {
    var formOK = true;
    var userid = document.getElementById("Particulars").value;
    clearErrorMsgs();

    // name field validations
    if (userid.length == 0) {
        formOK = false;
        document.getElementById("error").innerHTML = "<h1>Please enter a UserID.</h1>";
    }
    return formOK;
}


function clearErrorMsgs() {
    var labels = document.getElementsByClassName("err_label");

    for (let i = 0; i < labels.length; i++) {
        labels[i].innerHTML = "";
    }
}