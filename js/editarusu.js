import { mostrarError, eliminarError } from '../js/funcionesval.js';

import Swal from '../node_modules/sweetalert2/src/sweetalert2.js'


let btnEnviar = document.querySelector('#btnEnviar');

let miform = document.querySelector('#miform');

let email = document.querySelector('#email');

let vmail = false;

let mailhaserror = false;

btnEnviar.disabled = true;


email.addEventListener('blur', verificarMail)
miform.addEventListener('submit', estasSeguro)

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

function estasSeguro(e) {

    e.preventDefault();

    Swal.fire({
        title: 'Estas Seguro?',
        text: "El se modificara de forma definitiva",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Cambiar Contraseña'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Buen Trabajo!',
                text: 'Has cambiado tu email!',
                icon: 'success',
                showConfirmButton: false,
            })
            setTimeout(() => {
                miform.submit()
            }, 1500)

        }
    })
}