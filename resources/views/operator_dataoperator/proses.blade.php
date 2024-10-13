
<script>

  // Add new data confirm
  $(document).ready(function() {
    $(document).on('submit', '#operator-form-tambah', function(event) {
      event.preventDefault();
      var formData = $(this).serializeArray();
      var isEmpty = false;
      var excludedField = ['operator_alamat']

      $.each(formData, function(i, field){
        if(!field.value && !excludedField.includes(field.name)) {
          isEmpty = true;
        }
      })

      if (isEmpty) {
        swallUncompleteData();
      } else {
        swallConfirmSave(this)
      }

    });
  });

  $(document).ready(function(){
    // get status operator
    $(document).on('click', '.operator-button-set-status', function(){
      var operatorId = $(this).data('id')
      $.ajax({
        url: '/dataoperator/' + operatorId + '/get-status',
        method: 'GET',
        success: function(response){
          $('#operator-modal-info-nama').text(response.data.operator_nama)
          $('#operator-checkbox-set-status').data('status', response.data.operator_is_aktif);
          if(response.data.operator_is_aktif == 1){
            $('#operator-checkbox-set-status').prop('checked', true)
          }else{
            $('#operator-checkbox-set-status').prop('checked', false)
          }
          $('#operator-form-set-status').data('id', operatorId)
        },
        error: function(){
          swallFailedGetData().then(() => {
            $('#operator-modal-set-status').modal('hide');
          });
        }
      })
    })

    // set status operator
    $(document).on('submit', '#operator-form-set-status', function(e) {
      e.preventDefault();
      var operatorId  = $(this).data('id');
      var statusBaru = $('#operator-checkbox-set-status').is(':checked') ? 1 : 0;
      var statusLama = $('#operator-checkbox-set-status').data('status');

      if(statusBaru == statusLama){
        swallNothingChange().then((result) => {
          $('#operator-modal-set-status').modal('hide');
        })
        return;
      }

      swallConfirmUpdate('Ubah status!', 'Yakin ubah status operator ini?')
      .then((result) => {
        if (result.isConfirmed) {
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
              swallFailedGetData().then(() => {
                $('#operator-modal-set-status').modal('hide');
              });
            }
          });
        }
      });
    });

    // get detail info operator
    $(document).on('click', '.operator-button-detail-info', function(){
      var operatorId = $(this).data('id')
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
          swallFailedGetData().then(() => {
            $('#operator-modal-detail-info').modal('hide');
          });
        }
      })
    })
  })
</script>