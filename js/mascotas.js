import Swal from '../node_modules/sweetalert2/src/sweetalert2.js'

let btnBorrar = document.querySelector("#btnBorrar");

btnBorrar.addEventListener('click', estasSeguro);

function estasSeguro(e) {

    Swal.fire({
        title: 'Estas Seguro?',
        text: "El se modificara de forma definitiva",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Cambiar email'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Buen Trabajo!',
                text: 'Has cambiado tu email!',
                icon: 'success',
                showConfirmButton: false,
            })
        }
    })
}