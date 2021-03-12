let btnEnviar = document.querySelector('#btnEnviar');


let hora = document.querySelector('#hora');
let parque = document.querySelector('#parque')


let vhora = false;
let vpark = false;
let vdir = false;


let horahaserror = false;
let parkhaserror = false;


arrancarListeners();
btnEnviar.disabled = true;



function arrancarListeners() {

    hora.addEventListener('blur', verificarhora)
    parque.addEventListener('blur', verificarparque)

}

function verificarhora(e) {
    if (e.target.value != "default") {
        e.target.classList.remove("is-invalid")
        e.target.classList.add("is-valid")

        vhora = true

        activarBoton()

        eliminarError(e)

        horahaserror = false;
    } else {
        e.target.classList.remove("is-valid")
        e.target.classList.add("is-invalid")


        mostrarError(e, "Inica una hora", horahaserror)

        horahaserror = true;

        vhora = false

        desactivarBoton()

    }
}

function verificarparque(e) {
    if (e.target.value != "default") {
        e.target.classList.remove("is-invalid")
        e.target.classList.add("is-valid")

        vpark = true

        activarBoton()

        eliminarError(e)

        parkhaserror = false;
    } else {
        e.target.classList.remove("is-valid")
        e.target.classList.add("is-invalid")


        mostrarError(e, "Especifica el parque", parkhaserror)

        parkhaserror = true;

        vpark = false

        desactivarBoton()

    }
}



function activarBoton() {
    if (vhora && vpark) {

        btnEnviar.disabled = false;

    }
}

function desactivarBoton() {
    if (vhora == false || vpark == false) {

        btnEnviar.disabled = true;

    }
}

function mostrarError(e, error, haserror) {

    if (!haserror) {

        let midiv = document.createElement("p");
        midiv.innerText = `${error}`;
        midiv.classList.add("text-danger");
        e.target.parentElement.append(midiv);

    } else {
        return
    }
}

function eliminarError(e) {
    if (e.target.nextSibling) {
        while (e.target.nextSibling) {
            let error = e.target.nextSibling;
            error.remove()
        }

    }
}