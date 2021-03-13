let btnEnviar = document.querySelector("#btnEnviar");
let parque = document.querySelector("#parque");

let vparque = false;

btnEnviar.disabled = true;

parque.addEventListener('blur', verificarParque);

function verificarParque(e) {
    if (e.target.value != "default") {
        e.target.classList.remove("is-invalid")
        e.target.classList.add("is-valid")

        vparque = true

        activarBoton()

    } else {
        e.target.classList.remove("is-valid")
        e.target.classList.add("is-invalid")

        vparque = false

        desactivarBoton()

    }
}



function activarBoton() {
    if (vparque) {

        btnEnviar.disabled = false;

    }
}

function desactivarBoton() {
    if (!vaparque) {

        btnEnviar.disabled = true;

    }
}