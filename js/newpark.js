let btnEnviar = document.querySelector('#btnEnviar');


let nombre = document.querySelector('#nombre');
let ciudad = document.querySelector('#ciudad');
let direccion = document.querySelector('#direccion');


let vnom = false;
let vciud = false;
let vdir = false;


let nomhaserror = false;
let ciudhaserror = false;
let dirhaserror = false;

arrancarListeners();
btnEnviar.disabled = true;



function arrancarListeners() {

    nombre.addEventListener('blur', verificarnombre)
    direccion.addEventListener('blur', verificaredire)
    ciudad.addEventListener('blur', verificarciud)
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

function verificaredire(e) {
    if (e.target.value.length > 0) {
        e.target.classList.remove("is-invalid")
        e.target.classList.add("is-valid")

        vdir = true

        activarBoton()

        eliminarError(e)

        dirhaserror = false;
    } else {
        e.target.classList.remove("is-valid")
        e.target.classList.add("is-invalid")


        mostrarError(e, "Especifica la ubicacion del parque", dirhaserror)

        dirhaserror = true;

        vdir = false

        desactivarBoton()

    }
}

function verificarciud(e) {
    if (e.target.value != "default") {
        e.target.classList.remove("is-invalid")
        e.target.classList.add("is-valid")

        vciud = true

        activarBoton()

        eliminarError(e)

        ciudhaserror = false;
    } else {
        e.target.classList.remove("is-valid")
        e.target.classList.add("is-invalid")


        mostrarError(e, "Selecciona una ciudad", ciudhaserror)

        ciudhaserror = true;

        vciud = false

        desactivarBoton()

    }
}



function activarBoton() {
    if (vnom && vdir && vciud) {

        btnEnviar.disabled = false;

    }
}

function desactivarBoton() {
    if (vnom == false || vdir == false || vciud == false) {

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