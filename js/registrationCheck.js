
function checkRegex(obj, regex) {
    if (obj.value.match(regex)){
        obj.setAttribute("class", "good");
        return true;
    }
    else if(obj.value == ""){
        obj.setAttribute("class", "empty");
        return false;
    }
    else{
        obj.setAttribute("class", "bad");
        return false;
    }
}

function checkPass(obj) {
    var regex= /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
    checkRegex(obj, regex);
    return checkPassMatch();
}
function checkPassMatch() {
    var pass = document.getElementById("pass");
    var confirmPass = document.getElementById("confirmPass");

    if (pass.value == confirmPass.value){
        confirmPass.setAttribute("class", "good");
        return true;
    }
    else if (confirmPass.value == ""){
        confirmPass.setAttribute("class", "empty");
        return false;
    }
    else {
        confirmPass.setAttribute("class", "bad");
        return false;
    }
}

function checkID(obj) {
    var regex = /^[a-zA-Z0-9]{1,20}$/;
    return checkRegex(obj, regex);
}
function checkEmail(obj) {
    var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return checkRegex(obj, regex);
}
function checkName(obj) {
    var regex = /^[a-z ,.'-]+$/i;
    return checkRegex(obj, regex);
}
function checkStreet(obj) {
    var regex = /^[a-zA-Z0-9 ,.'-]{1,50}$/;
    return checkRegex(obj, regex);
}
function checkCity(obj) {
    var regex = /^[a-zA-Z ,.'-]{1,30}$/;
    return checkRegex(obj, regex);
}
function checkState(obj) {
    if (obj.value!= NULL){
        return true;
    }
    else{
        return false;
    }
}

function validateForm() {
    if (!checkID(document.getElementById("userid"))){
        alert("Userid is required. Length must be no more that 20 characters and contain only letters and numbers.");
        return false;
    }
    else if (!checkPass(document.getElementById("pass"))){
        alert("Passwords do not match or do not meet the requirements.");
        return false;
    }
    else if (!checkName(document.getElementById("first"))){
        alert("First name contains inappropriate charaters.");
        return false;
    }
    else if (!checkName(document.getElementById("last"))){
        alert("Last name contains inappropriate charaters.");
        return false;
    }
    else if (!checkEmail(document.getElementById("email"))){
        alert("Please enter a valid email address.");
        return false;
    }
    else if (!checkStreet(document.getElementById("address"))){
        alert("Please re-enter street address");
        return false;
    }
    else if (!checkCity(document.getElementById("city"))){
        alert("Please re-enter city");
        return false;
    }
    else if (!checkState(document.getElementById("state"))){
        alert("Please select a state.");
        return false;
    }
    else {
        return true;
    }
}