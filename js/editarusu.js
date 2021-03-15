import { mostrarError, eliminarError, verificarMail } from '../js/funcionesval.js';

let btnEnviar = document.querySelector('#btnEnviar');

let email = document.querySelector('#email');

let vmail = false;

let mailhaserror = false;

btnEnviar.disabled = true;


email.addEventListener('blur', verificarMail(e, mailhaserror, vmail))


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