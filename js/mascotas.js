import Swal from '../node_modules/sweetalert2/src/sweetalert2.js'

function estasSeguro(id) {

    Swal.fire({
        title: 'Estas Seguro?',
        text: 'La mascota se borrara de forma definitiva',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Cambiar email'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Lo sentimos',
                text: 'Tu mascota ha sido borrada!',
                icon: 'error',
                showConfirmButton: false,
            })
            setTimeout(() => {
                window.location(`../php/borrar.php?id=${id}`)
            }, 1500)

        }
    })
}