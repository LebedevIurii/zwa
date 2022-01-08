const password = document.getElementById("signup-password");
const confirmPassword = document.getElementById("confirm-password");

var compare = (()=> {
    if (password.value !== confirmPassword.value) {
        alert("Hesla se liší!");
    }
});

password.onchange = compare();
confirmPassword.onkeyup = compare();