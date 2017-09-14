$("#udob").Zebra_DatePicker({
    direction: ['1980-01-01', '1998-01-01']
});

function ageCalculate() {
    var inputDay = document.getElementById("udob").value;
    var birthDay = new Date(inputDay);
    var birthyear = birthDay.getFullYear();
    var birthmonth = birthDay.getMonth();
    var birthday = birthDay.getDate();
    var today = new Date();
    var nowyear = today.getFullYear();
    var nowmonth = today.getMonth();
    var nowday = today.getDate();
    var age = nowyear - birthyear;
    var age_month = nowmonth - birthmonth;
    var age_day = nowday - birthday;
    if (age_month < 0 || (age_month == 0 && age_day < 0)) {
        age = parseInt(age) - 1;
    }
    if (inputDay == "") {
        productPrompt("Please supply your date of birth in upper", "uagePrompt", "red");
        return false;
        
    }
    else {
        productPrompt("Ok", "uagePrompt", "green");
        uage.value = age;
        return true;
    }

}

function productPrompt(message, promtlocation, color) {
    document.getElementById(promtlocation).innerHTML = message;
    document.getElementById(promtlocation).style.color = color;
}

function validatePassword() {
    var password = document.getElementById("password"),
        confirm_password = document.getElementById("confirm_password");
    if (confirm_password.value == 0) {
        productPrompt("Please re-enter password", "repasswordPrompt", "red");
        return false;
    }
    if (password.value != confirm_password.value || confirm_password.value != password.value) {
        productPrompt("Password not matched", "repasswordPrompt", "red");
        return false;
    }
    productPrompt("Matched", "repasswordPrompt", "green");
    return true;
}

function validateFirstName() {
    var name = document.getElementById("first_name").value;
    if (name.length == 0) {
        productPrompt("Please supply your first name", "ufirstnamePrompt", "red");
        return false;
    }
    if (!name.match(/^[A-Z][a-z]{1,30}$/)) {
        productPrompt("Please enter value between 2 and 30 characters long", "ufirstnamePrompt", "red");
        return false;
    }
    productPrompt("Ok", "ufirstnamePrompt", "green");
    return true;
}

function validateLastName() {
    var name = document.getElementById("last_name").value;
    if (name.length == 0) {
        productPrompt("Please supply your last name", "ulastnamePrompt", "red");
        return false;
    }
    if (!name.match(/^[A-Z][a-z]{1,30}$/)) {
        productPrompt("Please enter value between 2 and 30 characters long", "ulastnamePrompt", "red");
        return false;
    }
    productPrompt("Ok", "ulastnamePrompt", "green");
    return true;
}

function validateRoll() {
    var roll = document.getElementById("uroll").value;
    if (roll.length == 0) {
        productPrompt("Please supply roll number", "urollPrompt", "red");
        return false;
    }
    if (!uroll.value.match(/^[0-9][0-9](\/|-)?[A-Z][A-Z](\/|-)?[0-9][0-9]?[0-9]?$/)) {
        productPrompt("Please supply a valid roll number like 14/MM/44", "urollPrompt", "red");
        return false;
    }
    productPrompt("Ok", "urollPrompt", "green");
    return true;
}

function Roll() {
    var dept = document.getElementById("udepartment").selectedIndex;
    var reg = document.getElementById("uregnumber").value;
    var rl = parseInt(reg / 10000) % 100;
    var url;
    var a;
    if (dept == 1) {
        url = rl + "/BT/";
        uroll.value = url;
    } else if (dept == 2) {
        url = rl + "/CH/";
        uroll.value = url;
    } else if (dept == 3) {
        url = rl + "/CHEM/";
        uroll.value = url;
    } else if (dept == 4) {
        url = rl + "/CE/";
        uroll.value = url;
    } else if (dept == 5) {
        url = rl + "/CA/";
        uroll.value = url;
    } else if (dept == 6) {
        url = rl + "/CSE/";
        uroll.value = url;
    } else if (dept == 7) {
        url = rl + "/EVS/";
        uroll.value = url;
    } else if (dept == 8) {
        url = rl + "/EE/";
        uroll.value = url;
    } else if (dept == 9) {
        url = rl + "/ECE/";
        uroll.value = url;
    } else if (dept == 10) {
        url = rl + "/HS/";
        uroll.value = url;
    } else if (dept == 11) {
        url = rl + "/IT/";
        uroll.value = url;
    } else if (dept == 12) {
        url = rl + "/MS/";
        uroll.value = url;
    } else if (dept == 13) {
        url = rl + "/MA/";
        uroll.value = url;
    } else if (dept == 14) {
        url = rl + "/ME/";
        uroll.value = url;
    } else if (dept == 15) {
        url = rl + "/MM/";
        uroll.value = url;
    } else if (dept == 16) {
        url = rl + "/PH/";
        uroll.value = url;
    }
}

function validateEmail() {
    var email = document.getElementById("uemail").value;
    if (email.length == 0) {
        productPrompt("Please supply your email address", "uemailPrompt", "red");
        return false;
    }
    if (!email.match(/^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i)) {
        productPrompt("Please supply a valid email address", "uemailPrompt", "red");
        return false;
    }
    productPrompt("Ok", "uemailPrompt", "green");
    return true;
}

function validatePass() {
    var pass = document.getElementById("password").value,
        repass = document.getElementById("confirm_password").value;
    if (pass.length == 0) {
        productPrompt("Please supply your password", "passwordPrompt", "red");
        return false;
    }
    if (!pass.match(/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/)) {
        productPrompt("Please supply a alpha-numeric password with a special character(!@#$%^&*)", "passwordPrompt", "red");
        return false;
    }
    productPrompt("Ok", "passwordPrompt", "green");
    return true;
}



function validateReg() {
    var reg = document.getElementById("uregnumber").value;
    if (reg.length == 0) {
        productPrompt("Please supply your registration number", "uregPrompt", "red");
        return false;
    }
    if (!reg.match(/^[0-9]{8}$/)) {
        productPrompt("Please supply a valid registration number", "uregPrompt", "red");
        return false;
    }
    productPrompt("Ok", "uregPrompt", "green");
    return true;
}

function validatePhn() {
    var phn = document.getElementById("uphn").value;
    if (phn.length == 0) {
        productPrompt("Please supply your phone number", "uphnPrompt", "red");
        return false;
    }
    if (!phn.match(/^[0-9]{10}$/)) {
        productPrompt("Please supply a vaild phone number", "uphnPrompt", "red");
        return false;
    }
    productPrompt("Ok", "uphnPrompt", "green");
    return true;
}

function validateAdd() {
    var add = document.getElementById("uaddress").value,
        required = 8,
        left = required - add.length;

    if (add.length == 0) {
        productPrompt("Please supply your street address", "uaddressPrompt", "red");
        return false;
    }
    if (left > 0) {
        productPrompt("Please enter more than 8 characters", "uaddressPrompt", "red");
        return false;
    }
    productPrompt("Ok", "uaddressPrompt", "green");
    return true;
}

function validateGender() {
    var male = document.getElementById("male").checked;
    var female = document.getElementById("female").checked;
    if ((male == false) && (female == false)) {
        productPrompt("Required", "ugenderPrompt", "red");
        return false;
    }
    productPrompt("Ok", "ugenderPrompt", "green");
    return true;

}

function validateDepartment() {
    var dept = document.getElementById("udepartment").selectedIndex;
    if (dept == 0) {
        productPrompt("Please supply your department", "udeptPrompt", "red");
        return false;
    }
    productPrompt("Valid", "udeptPrompt", "green");
    return true;
}

function validateState() {
    var state = document.getElementById("ustate").selectedIndex;
    if (state == 0) {
        productPrompt("Please supply your state", "ustatePrompt", "red");
        return false;
    }
    productPrompt("Valid", "ustatePrompt", "green");
    return true;
}


function validateCountry() {
    var country = document.getElementById("ucountry").selectedIndex;
    if (country == 0) {
        productPrompt("Please supply your department", "ucountryPrompt", "red");
        return false;
    }
    productPrompt("Valid", "ucountryPrompt", "green");
    return true;
}


function validateDob() {
    var dob = document.getElementById("udob").value;
    if (dob.length == 0) {
        productPrompt("Please supply your date of birth", "udobPrompt", "red");
        return false;
    }
    productPrompt("Ok", "udobPrompt", "green");
    return true;
}
function validateCgpa() {
    var cgpa = document.getElementById("ucgpa").value;
    if (cgpa.length == 0) {
        productPrompt("Please supply your CGPA", "ucgpaPrompt", "red");
        return false;
    }
    if (!cgpa.match(/^[0-9](.)[0-9][0-9]$/)) {
        productPrompt("Please supply a vaild CGPA like 9.80", "ucgpaPrompt", "red");
        return false;
    }
    productPrompt("Ok", "ucgpaPrompt", "green");
    return true;
}
function validateTwelve() {
    var twelve = document.getElementById("utwelve").value;
    if (twelve.length == 0) {
        productPrompt("Please supply your 12th standard marks", "utwelvePrompt", "red");
        return false;
    }
    if (!twelve.match(/^[0-9][0-9](.)[0-9][0-9]$/)) {
        productPrompt("Please supply a vaild marks like 95.80", "utwelvePrompt", "red");
        return false;
    }
    productPrompt("Ok", "utwelvePrompt", "green");
    return true;
}
function validateTen() {
    var ten = document.getElementById("uten").value;
    if (ten.length == 0) {
        productPrompt("Please supply your 10th standard marks", "utenPrompt", "red");
        return false;
    }
    if (!ten.match(/^[0-9][0-9](.)[0-9][0-9]$/)) {
        productPrompt("Please supply a vaild marks like 95.80", "utenPrompt", "red");
        return false;
    }
    productPrompt("Ok", "utenPrompt", "green");
    return true;
}
function validateZip() {
    var zip = document.getElementById("uzip").value;
    if (zip.length == 0) {
        productPrompt("Please supply your zip code", "uzipPrompt", "red");
        return false;
    }
    if (!zip.match(/^\d{6}$/)) {
        productPrompt("The India zipcode must contain 6 digits", "uzipPrompt", "red");
        return false;
    }
    productPrompt("Ok", "uzipPrompt", "green");
    return true;
}
function validateCity() {
    var city = document.getElementById("ucity").value;
    if (city.length == 0) {
        productPrompt("Please supply your city", "ucityPrompt", "red");
        return false;
    }
    if (!city.match(/[a-zA-Z]{4,15}$/)) {
        productPrompt("Please enter more than 4 characters", "ucityPrompt", "red");
        return false;
    }
    productPrompt("Ok", "ucityPrompt", "green");
    return true;
}
function submitForm() {
    if (!validateFirstName() && !validateLastName() && !validateDob() && !validateDepartment() && !validateReg() && !validateRoll() && !Roll() && !validateEmail() && !validatePhn() && !validatePass() && !validatePassword() && !validateAdd() && !validateZip() && !validateCity() &&
        !validateState() && !validateCountry() && !validateGender() && !ageCalculate() && !validateCgpa() && !validateTwelve() && !validateTen()) {
        errorShow("submitPrompt");
        productPrompt("Form must be valid", "submitPrompt", "red");
        setTimeout(function () {
            errorHide("submitPrompt");
        }, 2000);
    }
}


function errorShow(id) {
    document.getElementById(id).style.display = "block";

}

function errorHide(id) {
    document.getElementById(id).style.display = "none";
}
