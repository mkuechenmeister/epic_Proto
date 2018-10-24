var strength = {
    0: "Schlecht ☹\n" +
    "Dein Passwort muss aus mindestens 6 zeichen bestehen, mindestens einen Großbuchstaben und eine Ziffer besitzen",
    1: "Immer noch nicht gut ☹",
    2: "Naja ☹\n" +
    "Besser wären mindestens 8 zeichen \+ Sonderzeichen",
    3: "Wenns denn sein muss ☺",
    4: "Perfekt ☻"
}

var password = document.getElementById('password');
var meter = document.getElementById('password-strength-meter');
var text = document.getElementById('password-strength-text');

var pw1 = document.getElementById("password");
var pw2 = document.getElementById("password2");
var pattern = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.{6,})");
//https://www.thepolyglotdeveloper.com/2015/05/use-regex-to-test-password-strength-in-javascript/
var patternStrong = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[?!@#\$%\^&\*])(?=.{8,})");

window.onload = function () {
    document.getElementById("submit").style.display='none';
    document.getElementById("submitLeer").style.display='block';

}

pw2.addEventListener('input', function () {
    if (pw1.value != pw2.value) {
        text.innerHTML = "Passwörter stimmen nicht überein";



    }else{
        text.innerText="Ok leg los.";
        document.getElementById('pwdhint').style.display='none';
        document.getElementById("submitLeer").style.display='none';
        document.getElementById("submit").style.display='block';


    }

})



password.addEventListener('input', function()
{
    var val = password.value;
    var result;
    //var result = zxcvbn(val);

    if(val.length<6){
        result = 0;

    }
    if(pattern.test(val))
    {
        result = 2;
    }
    if (patternStrong.test(val)){
        result = 4;
    }


    //todo KM: implementiere eigene Ampelmetrik

    //Rot wenn pwd ungültig
    //Gelb wenn 6Zeichen und 1 Buchstabe
    //Grün wenn >6 Zeichen und 1 Buchstabe



    // Update the password strength meter
    meter.value = result;
   // meter.value = result.score;

    // Update the text indicator
    if(val !== "") {
        text.innerHTML = "Level: " + "<strong>" + strength[result];
    }
    else {
        text.innerHTML = "";
    }
});