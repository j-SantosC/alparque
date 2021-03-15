import { mostrarError, eliminarError } from '../js/funcionesval.js';

console.log("prueba linkado")

let usuario = document.querySelector('#usu');
let mail = document.querySelector('#mail');
let pass1 = document.querySelector('#pass1');
let pass2 = document.querySelector('#pass2');
let ciudad = document.querySelector('#ciud');
let btnEnviar = document.querySelector('#btnEnviar');

let emaildiv = document.querySelector("#emaildiv");
let usudiv = document.querySelector("#usudiv");

let vusu = false;
let vcontra = false;
let vcontra2 = false
let vmail = false;
let vciudad = false;

let usuhaserror = false;
let mailhaserror = false;
let cityhaserror = false;
let contrahaserror = false;

let firstime = true;

arrancarListeners();
btnEnviar.disabled = true;



function arrancarListeners() {

    usuario.addEventListener('blur', verificarUsuario)
    mail.addEventListener('blur', verificarMail)
    pass1.addEventListener('blur', verificarPass)
    pass2.addEventListener('blur', verificarPass2)
    ciudad.addEventListener('blur', verificarCiudad)

}

function verificarUsuario(e) {
    if (e.target.value.length > 0) {
        e.target.classList.remove("is-invalid")
        e.target.classList.add("is-valid")

        vusu = true

        activarBoton()

        eliminarError(e)

        usuhaserror = false;
    } else {
        e.target.classList.remove("is-valid")
        e.target.classList.add("is-invalid")


        mostrarError(e, "El usuario es Obligatorio", usuhaserror)

        usuhaserror = true;

        vusu = false

        desactivarBoton()

    }
}


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
            vcontra2 = true

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

        vcontra1 = true
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

function verificarCiudad(e) {
    if (e.target.value != "default") {
        e.target.classList.remove("is-invalid")
        e.target.classList.add("is-valid")

        vciudad = true

        activarBoton()

        eliminarError(e)

        cityhaserror = false;

    } else {
        vciudad = false
        e.target.classList.add("is-invalid")
        e.target.classList.remove("is-valid")
        desactivarBoton()

        mostrarError(e, "Debes de seleccionar una opccion", cityhaserror)

        cityhaserror = true;
    }
}

function activarBoton() {
    if (vusu && vmail && vcontra && vcontra2 && vciudad) {

        btnEnviar.disabled = false;

    }
}

function desactivarBoton() {
    if (vusu == false || vmail == false || vcontra == false || vcontra2 == false || vciudad == false) {

        btnEnviar.disabled = true;

    }
}