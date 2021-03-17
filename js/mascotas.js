 import Swal from '../node_modules/sweetalert2/src/sweetalert2.js'

 function estasSeguro(id) {

     Swal.fire({
         title: 'Estas Seguro?',
         text: 'El email se modificara de forma definitiva',
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
             setTimeout(() => {
                 window.location(`../php/borrar.php?id=${id}`)
             }, 1500)

         }
     })
 }