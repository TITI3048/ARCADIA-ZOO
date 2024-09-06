const mailInput = document.getElementById('EmailInput');
const passwordlInput = document.getElementById('PasswordInput');
const btnSignin = document.getElementById('btnSignin');

btnSignin.addEventListener("click", checkCredentials);

function checkCredentials(){
    if(mailInput.value == "josé@mail.com"  && passwordlInput.value == "123456"){
        alert("vous êtes bien connecté");
    window.location.replace("/pages/dashboard.html");

    const token = "okokokok";
    setToken(token);
    }
    else{
        mailInput.classList.add("is-invalid");
        passwordlInput.classList.add("is-invalid");
        alert("identifiant ou mot de passe incorrect");
    }
}

