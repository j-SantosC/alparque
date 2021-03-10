console.log("no me jodas")


let pass1 = document.querySelector('#contra');
let pass2 = document.querySelector('#confirma');

let btnEnviar = document.querySelector('#btnEnviar');



let vcontra = false;


arrancarListeners();
btnEnviar.disabled = true;



function arrancarListeners() {


    pass1.addEventListener('blur', verificarPass)
    pass2.addEventListener('blur', verificarPass)


}



function verificarPass(e) {

    if (e.target.value == pass2.value && e.target.value == pass1.value && e.target.value.length > 0) {

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
}


function activarBoton() {
    if (vcontra) {

        btnEnviar.disabled = false;

    }
}

function desactivarBoton() {
    if (vcontra == false) {

        btnEnviar.disabled = true;

    }
}