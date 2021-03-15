import { mostrarError, eliminarError } from '/funcionesval.js';

document.addEventListener('DOMContentLoaded', arrancar)


function arrancar() {


    arrancarListeners();

    btnEnviar.disabled = true;

}

let btnEnviar = document.querySelector('#btnEnviar');


let nombre = document.querySelector('#nombre');

let nomhaserror = false;

let vnom = false;



function arrancarListeners() {

    nombre.addEventListener('blur', verificarciudad)

}

function verificarciudad(e) {
    if (e.target.value != "default") {
        e.target.classList.remove("is-invalid")
        e.target.classList.add("is-valid")

        vnom = true

        activarBoton()

        eliminarError(e)

        nomhaserror = false;
    } else {
        e.target.classList.remove("is-valid")
        e.target.classList.add("is-invalid")


        mostrarError(e, "Selecciona una ciudad", nomhaserror)

        nomhaserror = true;

        vnom = false

        desactivarBoton()

    }
}



function activarBoton() {
    if (vnom) {

        btnEnviar.disabled = false;

    }
}

function desactivarBoton() {
    if (vnom == false) {

        btnEnviar.disabled = true;

    }
}