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
function checkName(obj) {
    var regex= /^[a-zA-ZÀ-ÿ ,.'-]+$/;
    return checkRegex(obj, regex);
}

function checkDesc(obj) {
    var regex = /^[a-zA-Z0-9 ,.'-]+$/;
    return checkRegex(obj, regex);
}

function checkAddress(obj) {
    var regex = /^[a-zA-Z0-9 ,.'-]{1,100}$/;
    return checkRegex(obj, regex);
}

function checkDate(obj) {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); 
    var yyyy = today.getFullYear();

    today = mm + '/' + dd + '/' + yyyy;
    if (new Date(obj.value) < new Date(today)){
        obj.setAttribute("class", "bad");
        return false;
    }
    else if (new Date(obj.value) >= new Date(today)) {
        obj.setAttribute("class", "good");
        return true;
    }
    else{
        obj.setAttribute("class", "empty");
        return false;
    }
}

function validateForm() {
    if (!checkName(document.getElementById("eventName"))){
        alert("Event name is required. Length must be no more that 60 characters and contain only letters.");
        return false;
    }
    else if (!checkName(document.getElementById("sponsor"))){
        alert("Sponsor is required. Length must be no more that 50 characters and contain only letters.");
        return false;
    }
    else if (!checkAddress(document.getElementById("location"))){
        alert("Location is required. Length must be no more that 100 characters and only contain alphanumeric charaters.");
        return false;
    }
    else if (!checkDate(document.getElementById("date"))){
        alert("Future date of the event is required.");
        return false;
    }
    else if (!checkDesc(document.getElementById("description"))){
        alert("Description of the event is require and must not contain any special characters.");
        return false;
    }
    else {
        return true;
    }
}