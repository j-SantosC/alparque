console.log("no me jodas")


let pass1 = document.querySelector('#contra');
let pass2 = document.querySelector('#confirma');

let btnEnviar = document.querySelector('#btnEnviar');

let vcontra = false;
let vcontra2 = false;

let firstime = true;

arrancarListeners();
btnEnviar.disabled = true;



function arrancarListeners() {


    pass1.addEventListener('blur', verificarPass)
    pass2.addEventListener('blur', verificarPass2)


}



function verificarPass(e) {
    if (e.target.value.length > 0 && firstime) {

        pass1.classList.add("is-valid")
        pass1.classList.remove("is-invalid")

        vcontra = true

        activarBoton()


    } else if (!firstime) {

        if (e.target.value.length > 0 && e.target.value == pass2.value) {

            pass1.classList.add("is-valid")
            pass1.classList.remove("is-invalid")
            pass2.classList.add("is-valid")
            pass2.classList.remove("is-invalid")

            vcontra = true

            activarBoton()

        } else {
            pass1.classList.remove("is-valid")
            pass1.classList.add("is-invalid")
            pass2.classList.remove("is-valid")
            pass2.classList.add("is-invalid")

            vcontra = false

            desactivarBoton()

        }

    } else {

        pass1.classList.remove("is-valid")
        pass1.classList.add("is-invalid")

        vcontra = false

        desactivarBoton()

    }
}

function verificarPass2(e) {

    if (e.target.value == pass1.value && e.target.value.length > 0) {

        firstime = false;

        pass1.classList.add("is-valid")
        pass1.classList.remove("is-invalid")
        pass2.classList.add("is-valid")
        pass2.classList.remove("is-invalid")

        vcontra2 = true

        activarBoton()

    } else {

        firstime = false;

        pass1.classList.remove("is-valid")
        pass1.classList.add("is-invalid")
        pass2.classList.remove("is-valid")
        pass2.classList.add("is-invalid")

        vcontra2 = false

        desactivarBoton()

    }
}


function activarBoton() {
    if (vcontra && vcontra2) {

        btnEnviar.disabled = false;

    }
}

function desactivarBoton() {
    if (vcontra == false || vcontra2 == false) {

        btnEnviar.disabled = true;

    }
}