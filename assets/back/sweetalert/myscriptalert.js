const flashData = $('.flash-data').data('flashdata');

if( flashData ) {
  swal({
    title: "Data Berhasil " + flashData,
    icon: "success",
    button: "Ok",
    });
}

// if( flashData) {
//   swal({
//    title: "Maaf Data" + flashData,
//   button: false,
//   });
// } 

$('.tombol-hapus').on('click', function(e){
  e.preventDefault(); //cancel default action

  //Recuperate href value
  var href = $(this).attr('href');
  var message = $(this).data('confirm');

  //pop up
  swal({
      title: "Yakin Menghapsus ddData ini?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
        document.location.href = href;  
    }else {
      swal("Data Batal Dihapus", {
        icon: "error",  
      });
    } 
  });
});

$('.tombol-konfirmasiJudul').on('click', function(e){
  e.preventDefault(); //cancel default action

  //Recuperate href value
  var href = $(this).attr('href');
  var message = $(this).data('confirm');

  //pop up
  swal({
      title: "Apakah anda yakin memilih judul ini?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
        document.location.href = href;  
    }else {
      swal("Judul Batal Dipilih", {
        icon: "error",  
      });
    } 
  });
});

// $('.terima').on('click', function(e){
//   e.preventDefault(); //cancel default action

//   //Recuperate href value
//   var href = $(this).attr('href');
//   var message = $(this).data('confirm');

//   //pop up
//   swal({
//       title: "Apakah anda yakin memilih judul ini?",
//       icon: "warning",
//       buttons: true,
//       dangerMode: true,
//   })
//   .then((willDelete) => {
//     if (willDelete) {
//         document.location.href = href;  
//     }else {
//       swal("Judul Batal Dipilih", {
//         icon: "error",  
//       });
//     } 
//   });
// });

// $('.tombol-pernyataanSeminar').on('click', function(e){
//   e.preventDefault(); //cancel default action

//   //Recuperate href value
//   var href = $(this).attr('href');
//   var message = $(this).data('confirm');

//   //pop up
//   swal({
//       title: "Apakah anda yakin memilih judul ini?",
//       icon: "warning",
//       buttons: true,
//       dangerMode: true,
//   })
//   .then((willDelete) => {
//     if (willDelete) {
//         document.location.href = href;  
//     }else {
//       swal("Judul Batal Dipilih", {
//         icon: "error",  
//       });
//     } 
//   });
// });



