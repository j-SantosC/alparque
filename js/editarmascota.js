let btnEnviar = document.querySelector('#btnEnviar');


let nombre = document.querySelector('#nombre');
let edad = document.querySelector('#edad')
let imagen = document.querySelector('#imagen')
let descripcion = document.querySelector('#descripcion')


let vnom = true;
let vedad = true;
let vdesc = true;


let nomhaserror = false;
let edadhaserror = false;
let deschaserror = false;


arrancarListeners();




function arrancarListeners() {

    nombre.addEventListener('blur', verificarnom)
    edad.addEventListener('blur', verificaredad)
    imagen.addEventListener('blur', verificarimg)
    descripcion.addEventListener('blur', verificardesc)

}

function verificaredad(e) {
    if (e.target.value.length > 0 && Number(e.target.value)) {
        e.target.classList.remove("is-invalid")
        e.target.classList.add("is-valid")

        vedad = true

        activarBoton()

        eliminarError(e)

        edadhaserror = false;
    } else {
        e.target.classList.remove("is-valid")
        e.target.classList.add("is-invalid")


        mostrarError(e, "Indica una edad correcta", edadhaserror)

        edadhaserror = true;

        vedad = false

        desactivarBoton()

    }
}

function verificarnom(e) {
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


        mostrarError(e, "Indica el nombre nuevo", nomhaserror)

        nomhaserror = true;

        vnom = false

        desactivarBoton()

    }
}


function verificardesc(e) {
    if (e.target.value.length > 0) {
        e.target.classList.remove("is-invalid")
        e.target.classList.add("is-valid")

        vdesc = true

        activarBoton()

        eliminarError(e)

        deschaserror = false;
    } else {
        e.target.classList.remove("is-valid")
        e.target.classList.add("is-invalid")


        mostrarError(e, "Indica una descripcion", deschaserror)

        deschaserror = true;

        vdesc = false

        desactivarBoton()

    }
}




function activarBoton() {
    if (vnom && vedad && vdesc) {

        btnEnviar.disabled = false;

    }
}

function desactivarBoton() {
    if (vnom == false || vedad == false || vdesc == false) {

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