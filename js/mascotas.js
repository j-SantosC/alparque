import Swal from '../node_modules/sweetalert2/src/sweetalert2.js'

let btnBorrar = document.querySelector("#btnBorrar");

btnBorrar.addEventListener('click', estasSeguro);

function estasSeguro() {

    Swal.fire({
        title: 'Estas Seguro?',
        text: "Seguro que quieres eliminar a tu mascota",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar Mascota'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Lo sentimos!',
                text: 'Tu mascota ha sido eliminada!',
                icon: 'error',
                showConfirmButton: false,
            })
        }
    })
}