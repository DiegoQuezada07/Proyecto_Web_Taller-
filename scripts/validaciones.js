//FINAL validacion contraseñas iguales formulario cambiar contraseña

const ver = document.getElementById('ver');
const ver2 = document.getElementById('ver2');
const pass1 = document.getElementById('pass1');
const pass2 = document.getElementById('pass2');
const error1 = document.getElementById('error1');
const error2 = document.getElementById('error2');
const error3 = document.getElementById('error3');
const btnSubmit = document.getElementById('btnSubmit');
const noVerIcon = document.getElementById('fa-eye-slash');
const siVerIcon = document.getElementById('fa-eye');


ver.addEventListener('click', () => {
    mostrarPassword();
});
ver2.addEventListener('click', () => {
    mostrarPassword2();
});
pass2.addEventListener('keyup', () => {
    validarContras();
});
pass1.addEventListener('keyup', () => {
    validarContrasSeguridad();
    validarContras();
    validarSeguridad();
});

function mostrarPassword() {
    if (pass1.type == "password") {
        pass1.type = "text";
        ver.classList.remove('fa-eye');
        ver.classList.add('fa-eye-slash');
        // setTimeout("ocultar()", 3000);
    } else {
        pass1.type = "password";
        ver.classList.remove('fa-eye-slash');
        ver.classList.add('fa-eye');


    }
}

function mostrarPassword2() {
    if (pass2.type == "password") {
        pass2.type = "text";
        ver2.classList.remove('fa-eye');
        ver2.classList.add('fa-eye-slash');
        // setTimeout("ocultar2()", 3000);
    } else {
        pass2.type = "password";
        ver2.classList.remove('fa-eye-slash');
        ver2.classList.add('fa-eye');
    }
}

function ocultar() {
    pass1.type = "password";
}

function ocultar2() {
    pass2.type = "password";
}



function validarContras() {

    if (pass2.value != pass1.value) {
        pass2.style.borderColor = "red";
        error1.style.display = "block";
        btnSubmit.disabled = true;
    } else {
        pass2.style.borderColor = "";
        error1.style.display = "none";

        if (error2.style.display == "none" || error3.style.display == "none") {
            btnSubmit.disabled = false;
        } else {
            btnSubmit.disabled = true;
        }
    }
}

function validarContrasSeguridad() {
    
    if (pass1.value.length < 8) {
        pass1.style.borderColor = "red";
        error2.style.display = "block";
        btnSubmit.disabled = true;
    } else {
        pass1.style.borderColor = "";
        error2.style.display = "none";
        btnSubmit.disabled = true;
    }

    return error2.style.display, error3.style.display;
}

function validarSeguridad(){
    if(!pass1 .match([A-Z])){
        pass1.style.borderColor = "red";
        error3.style.display = "block";
    }else{
        btnSubmit.disabled = true;
    }
    return error3.style.display;

}
//FINAL validacion contraseñas iguales formulario cambiar contraseña