function showDriver() {
  document.getElementById('Admin-table').style.display = 'block';
  document.getElementById('Passengers-table').style.display = 'none';
}
function showCostumer() {
  document.getElementById('Admin-table').style.display = 'none';
  document.getElementById('Passengers-table').style.display = 'block';
}




















function showSweetAlert() {
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.isConfirmed) {
        Swal.fire(
          'Deleted!',
          'Record has been successfully deleted.',
          'success'
        )
      }
    })
  }
  