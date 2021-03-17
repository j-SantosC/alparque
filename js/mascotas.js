import Swal from '../node_modules/sweetalert2/src/sweetalert2.js'

let btnBorrar = document.querySelector(".btnBorrar");


function estasSeguro(id) {

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
            setTimeout(() => {
                window.location = `../php/borrar.php?id=${id}`
            }, 1500)
        }
    })
}