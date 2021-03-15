import { mostrarError, eliminarError } from '../js/funcionesval.js';

let btnEnviar = document.querySelector('#btnEnviar');

let email = document.querySelector('#email');

let vmail = false;

let mailhaserror = false;

btnEnviar.disabled = true;


email.addEventListener('blur', verificarMail)

function verificarMail(e) {

    const re = /^\S+@\S+\.\S+$/;

    if (re.test(e.target.value)) {

        e.target.classList.remove("is-invalid")
        e.target.classList.add("is-valid")
        vmail = true

        activarBoton()

        eliminarError(e)

        mailhaserror = false;

    } else {
        e.target.classList.remove("is-valid")
        e.target.classList.add("is-invalid")

        vmail = false

        desactivarBoton()

        mostrarError(e, "El email no es correcto", mailhaserror)

        mailhaserror = true;
    }
}

function activarBoton() {
    if (vmail) {

        btnEnviar.disabled = false;

    }
}

function desactivarBoton() {
    if (vmail) {

        btnEnviar.disabled = true;

    }
}