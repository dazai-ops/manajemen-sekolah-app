
<script>

  // Add new data confirm
  $(document).ready(function() {
    $('#operator-form-tambah').on('submit', function(e) {
      e.preventDefault();

      Swal.fire({
        title: 'Yakin menambahkan data ini?',
        icon: 'info',
        showCancelButton: true,
        confirmButtonText: 'Yakin',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          this.submit();
        }
      });
    });
  });

  $(document).ready(function(){
    // get data status operator
    $('.operator-button-set-status').on('click', function(){
      var operatorId = $(this).data('id')

      $.ajax({
        url: '/dataoperator/' + operatorId + '/get-status',
        method: 'GET',
        success: function(response){
          $('#operator-modal-info-nama').text(response.data.operator_nama)

          if(response.data.operator_is_aktif == 1){
            $('#operator-checkbox-set-status').prop('checked', true)
          }else{
            $('#operator-checkbox-set-status').prop('checked', false)
          }

          $('#operator-form-set-status').data('id', operatorId)
        },
        error: function(){
          console.log('Gagal mengambil data operator')
        }
      })
    })

    // set status operator
    $('#operator-form-set-status').on('submit', function(e) {
      e.preventDefault();

      Swal.fire({
          title: 'Yakin mengubah status?',
          icon: 'info',
          showCancelButton: true,
          confirmButtonText: 'Ya, ubah',
          cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          var operatorId  = $(this).data('id');
          var statusBaru = $('#operator-checkbox-set-status').is(':checked') ? 1 : 0;

          $.ajax({
            url: '/dataoperator/' + operatorId + '/set-status',
            method: 'PUT',
            data: {
              _token: $('input[name="_token"]').val(),
              _method: 'PUT',
              status: statusBaru
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

    // get detail info operator
    $('.operator-button-detail-info').on('click', function(){
      var operatorId = $(this).data('id')
      console.log(operatorId)
      $.ajax({
        url: '/dataoperator/' + operatorId,
        method: 'GET',
        success: function(response){
          $('#operator-info-nama').text(response.data.operator_nama)
          $('#operator-info-jenis-kelamin').text(response.data.operator_jenis_kelamin)
          $('#operator-info-username').text(response.data.operator_username)
          $('#operator-info-email').text(response.data.operator_email)
          $('#operator-info-telepon').text(response.data.operator_nomor_telepon)
          $('#operator-info-kode').text(response.data.operator_kode)
          $('#operator-info-alamat').text(response.data.operator_alamat)
        },
        error: function(){
          console.log('Gagal mengambil data operator')
        }
      })
    })
  })
</script>