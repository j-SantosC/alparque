import Swal from '../node_modules/sweetalert2/src/sweetalert2.js'

let btnsBorrar = document.querySelectorAll(".btnsBorrar");

for (let i = 0; i < btnsBorrar.length; i++) {

    btnsBorrar[i].addEventListener('click', estasSeguro)

}

function estasSeguro(e) {

    Swal.fire({
        title: 'Estas Seguro?',
        text: 'La mascota se borrara de forma definitiva',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar Mascota'
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: 'Lo sentimos',
                text: 'Tu mascota ha sido borrada!',
                icon: 'success',
                showConfirmButton: false,
            })
            setTimeout(() => {
                window.location.href = `../php/borrar.php?id=${e.target.getAttribute("data-value")}`
            }, 1000)

        }
    })
}