import { mostrarError, eliminarError } from '../js/funcionesval.js';
import Swal from '/sweetalert2/dist/sweetalert2';


console.log("linked");

let nombre = document.querySelector('#nom');
let edad = document.querySelector('#edad');
let foto = document.querySelector('#foto');
let descripccion = document.querySelector('#desc');

let btnEnviar = document.querySelector('#btnEnviar');
let sweet = document.querySelector('#sweet');

let vnom = false;
let vedad = false;
let vfoto = true;
let vdesc = false;

let nomhaserror = false;
let edadhaserror = false;
let fotohaserror = false;
let deschaserror = false;

arrancarListeners();
btnEnviar.disabled = true;



function arrancarListeners() {

    nombre.addEventListener('blur', verificarnombre)
    edad.addEventListener('blur', verificaredad)
    descripccion.addEventListener('blur', verificardesc)
    sweet.addEventListener('click', exitomsg)
}

function verificarnombre(e) {
    if (e.target.value.length > 0) {


        e.target.classList.remove("is-invalid")
        e.target.classList.add("is-valid")

        vnom = true
        console.log("vnom =" + vnom);

        activarBoton()

        eliminarError(e)

        nomhaserror = false;
    } else {

        e.target.classList.remove("is-valid")
        e.target.classList.add("is-invalid")


        mostrarError(e, "El nombre es Obligatorio", nomhaserror)

        nomhaserror = true;

        vnom = false

        desactivarBoton()

    }
}

function verificaredad(e) {
    if (e.target.value.length > 0 && Number(e.target.value)) {
        e.target.classList.remove("is-invalid")
        e.target.classList.add("is-valid")

        vedad = true

        console.log("vedad =" + vedad);

        activarBoton()

        eliminarError(e)

        edadhaserror = false;
    } else {
        e.target.classList.remove("is-valid")
        e.target.classList.add("is-invalid")


        mostrarError(e, "La edad tiene que ser un numero", edadhaserror)

        edadhaserror = true;

        vedad = false

        desactivarBoton()

    }
}


function verificardesc(e) {
    if (e.target.value.length > 0) {
        e.target.classList.remove("is-invalid")
        e.target.classList.add("is-valid")

        vdesc = true
        console.log("vdesc =" + vdesc);

        activarBoton()

        eliminarError(e)

        deschaserror = false;
    } else {
        e.target.classList.remove("is-valid")
        e.target.classList.add("is-invalid")


        mostrarError(e, "La descripcion es obligatoria", deschaserror)

        deschaserror = true;

        vdesc = false

        desactivarBoton()

    }
}



function activarBoton() {
    if (vnom && vedad && vfoto && vdesc) {

        btnEnviar.disabled = false;

    }
}

function desactivarBoton() {
    if (vnom == false || vedad == false || vfoto == false || vdesc == false) {

        btnEnviar.disabled = true;

    }
}

function exitomsg() {

    Swal.fire(
        'Buen Trabajo!',
        'Has registrado a tu Mascota!',
        'success'
    )
}