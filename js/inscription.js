const namInput = document.getElementById('NameInput'); 
const usernameInput = document.getElementById('UsernameInput');
const mailInput = document.getElementById('EmailInput');
const passwordlInput = document.getElementById('PasswordInput');
const btnSignin = document.getElementById('btnSignin');

btnSignin.addEventListener("click", checkCredentials);

function checkCredentials(){


    if(mailInput.value == "vétérinaire1@mail.com"  && passwordlInput.value == "vet123"){
        alert("vous êtes bien connecté");
    if(namInput.value === "Docteur") {
            console.log("le nom est Docteur");
        }
    if(usernameInput.value === "Dolittle") {
            console.log("le nom d'utilisateur est Dolittle");
        }
    window.location.replace("/pages/dashvet.html");

    const token = "okokokok";
    setToken(token);
    }
    else{
        mailInput.classList.add("is-invalid");
        passwordlInput.classList.add("is-invalid");
        alert("identifiant ou mot de passe incorrect");
    }
}


