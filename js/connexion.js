alert("salut");

const inputMail = document.getElementById('EmailInput');
const inputPassword = document.getElementById('PasswordlInput');

inputEmail.addEventListener("keyup", validationform);
inputPassword.addEventListener("keyup", validationform);

function validationform(){
    validationRequired(inputMail);
    validationRequired(inputPassword);
}

function validationRequired(input){
    if(input.value !=''){
        input.classList.add("is-valid");
        input.classList.remove("is-invalid");
    }
    else{
        input.classList.add("is-invalid");
        input.classList.remove("is-valid");
    }
}