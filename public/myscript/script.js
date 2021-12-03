const flashDataSuccess = $('.flash-data-success').data('flashdata');
const flashDataWarning = $('.flash-data-warning').data('flashdata');
var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: true,
    timer: 3000
  });
if (flashDataSuccess){
    Toast.fire({
        icon: 'success',
        title: flashDataSuccess,
      })
}
if (flashDataWarning){
    Toast.fire({
        icon: 'warning',
        title: flashDataWarning
      })
}
