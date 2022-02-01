var pswd1 = document.getElementById("haslo1")
var pwdmsg = document.getElementById("pwdmsg")

pswd1.onkeyup = function() {
    var lowerCaseLetters = /[a-z]/g;
    if (pswd1.value.match(lowerCaseLetters)) {
        pwdmsg.value = ""
    } else {
        pwdmsg.value = "Hasło musi zawierać przynajmniej jedną małą literę."
    }

    var upperCaseLetters = /[A-Z]/g;
    if (pswd1.value.match(upperCaseLetters)) {
        pwdmsg.value = ""
    } else {
        pwdmsg.value = "Hasło musi zawierać przynajmniej jedną wielką literę."
    }

    var numbers = /[0-9]/g;
    if (pswd1.value.match(numbers)) {
        pwdmsg.value = ""
    } else {
        pwdmsg.value = "Hasło musi zawierać przynajmniej jedną cyfrę."
    }

    if (pswd1.value.length >= 8) {
        pwdmsg.value = ""
    } else {
        pwdmsg.value = "Hasło powinno mieć przynajmniej 8 znaków."
    }
}