document.addEventListener('DOMContentLoaded', arrancar)


function arrancar() {


    console.log("Esto funciona jodidamente bien")

    arrancarListeners();

    btnEnviar.disabled = true;

}

let btnEnviar = document.querySelector('#btnEnviar');


let nombre = document.querySelector('#nombre');

let nomhaserror = false;

let vnom = false;



function arrancarListeners() {

    nombre.addEventListener('blur', verificarnombre)

}

function verificarnombre(e) {
    if (e.target.value.length > 0) {
        e.target.classList.remove("is-invalid")
        e.target.classList.add("is-valid")

        vnom = true

        activarBoton()

        eliminarError(e)

        nomhaserror = false;
    } else {
        e.target.classList.remove("is-valid")
        e.target.classList.add("is-invalid")


        mostrarError(e, "El nombre  es Obligatorio", nomhaserror)

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