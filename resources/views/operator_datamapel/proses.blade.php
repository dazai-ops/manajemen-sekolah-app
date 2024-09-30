<script>

// set data mapel
  $(document).ready(function() {
    $('#mapel-form-edit').on('submit', function(e){
      e.preventDefault();

      Swal.fire({
        title: 'Yakin ubah data ini?',
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Yakin',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          var mapelId  = $(this).data('id');
          var mapelBaru = $('#mapel-field-input-nama').val();
          $.ajax({
            url: '/datamapel/' + mapelId,
            method: 'PUT',
            data: {
              _token: $('input[name="_token"]').val(),
              _method: 'PUT',
              mapel: mapelBaru
            },
            success: function(response){
              location.reload();
            },
            error: function(){
              console.log('Gagal mengubah status operator');  
            }
          });
        }
      });
    });
  });

  // create new data
  $(document).ready(function() {
    $('#mapel-form-tambah').on('submit', function(e){
      e.preventDefault();

      Swal.fire({
        title: 'Yakin tambah data ini?',
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Yakin',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          e.preventDefault();
          var mapelBaru = $('#mapel-field-input-nama-baru').val();

          $.ajax({
            url: '/datamapel',
            method: 'POST',
            data: {
              _token: $('input[name="_token"]').val(),
              mapel: mapelBaru
            },
            success: function(response){
              location.reload();
            },
            error: function(){
              console.log('Gagal menambahkan status operator');  
            }
          })
        }
      });
    });
  });

  $(document).ready(function() {
    // get data mapel
    $('.mapel-button-edit').on('click', function(){
      var mapelId = $(this).data('id')
      $.ajax({
        url: '/datamapel/' + mapelId,
        method: 'GET',
        success: function(response){
          $('#mapel-field-input-nama').val(response.data.mapel_nama)
          $('#mapel-form-edit').data('id', mapelId)
        },
        error: function(err){
          console.log(err)
        }
      })
    })
  })

</script>