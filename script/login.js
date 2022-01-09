var button = document.getElementById("submit");
button.addEventListener('click', (e)=> {
    const login = document.getElementById("email");
    const password = document.getElementById("password");
    if(!login.validity.valid || !password.validity.valid){
        document.getElementById("msg").innerHTML = "Format polozek E-mail nebo Heslo neni validni";
        e.preventDefault();
    }
}, false);