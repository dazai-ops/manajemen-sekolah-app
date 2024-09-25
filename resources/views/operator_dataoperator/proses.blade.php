
<script>
  $(document).ready(function(){
    $('.operator-button-set-status').on('click', function(){
      var operatorId = $(this).data('id')

      $.ajax({
        url: '/dataoperator/' + operatorId + '/get-status',
        method: 'GET',
        success: function(response){
          console.log(response)
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
  })

  $(document).ready(function(){
    $('#operator-form-set-status').on('submit', function(e){
      e.preventDefault();

      var operatorId  = $(this).data('id');
      var statusBaru = $('#operator-checkbox-set-status').is(':checked') ? 1 : 0;

      $.ajax({
          url: '/dataoperator/' + operatorId + '/set-status',
          method: 'POST',
          data: {
            _token: $('input[name="_token"]').val(),
            _method: 'PUT',
            status: statusBaru
          },
          success: function(response){
            console.log('Status berhasil diubah');
            location.reload();
          },
          error: function(){
            console.log('Gagal mengubah status operator');
          }
      });
  });

  $(document).ready(function(){
    $('.operator-button-detail-info').on('click', function(){
      var operatorId = $(this).data('id')
      $.ajax({
        url: '/dataoperator/' + operatorId,
        method: 'GET',
        success: function(response){
          console.log(response)
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
});

</script>