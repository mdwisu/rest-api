const flashData = $('.flash-data').data('flashdata');

if (flashData) {
  Swal.fire({
    title: 'Data Mahasiswa',
    text: 'Berhasil ' + flashData,
    type: 'success',
  });
}

$('.tombol-hapus a').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

  Swal.fire({
    title: 'Apakah anda yakin?',
    text: "Data mahasiswa akan dihapus!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus Data!',
  }).then((result) => {
    if (result.isConfirmed) {
        document.location.href = href;
    }
  });
});
