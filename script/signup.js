const password = document.getElementById("signup-password");
const confirmPassword = document.getElementById("confirm-password");

var compare = (()=> {
    if (password.value !== confirmPassword.value) {
        alert("Hesla se liší!");
    }
});


const emailElement = document.getElementById("e-mail");
if(emailElement){
    emailElement.addEventListener('change', (e) => {
        const email = emailElement.value;
        if(email){
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                const wrg = "Takovy email jiz existuje v db";
                if (this.responseText == 1){
                    document.getElementById("txtHint").innerHTML = wrg;
                    e.preventDefault();
                } else{
                    document.getElementById("txtHint").innerHTML = "";
                }
            }
            xhttp.open("GET", "check-email.php?email=" + email, true);
            xhttp.send();
        }
    }, false);
}

password.onchange = compare();
confirmPassword.onkeyup = compare();