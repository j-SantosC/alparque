import Swal from '../node_modules/sweetalert2/src/sweetalert2.js'

let btnsBorrar = document.querySelectorAll(".btnBorrar");

for (let i = 0; i < btnsBorrar.length; i++) {

    btnsBorrar[i].addEventListener('click', estasSeguro)

}

function estasSeguro(e) {

    console.log(e.target.getAttribute("data-value"))

    Swal.fire({
        title: 'Estas Seguro?',
        text: 'La mascota se borrara de forma definitiva',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#33b5e5',
        cancelButtonColor: '#B85C47',
        confirmButtonText: 'Eliminar Mascota'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Mascota Borrada',
                text: 'Lo sentimos mucho por el perro!',
                icon: 'error',
                showConfirmButton: false,
            })
            setTimeout(() => {
                window.location.href = `../php/borrar.php?id=${e.target.getAttribute("data-value")}`
            }, 1500)

        }
    })
}