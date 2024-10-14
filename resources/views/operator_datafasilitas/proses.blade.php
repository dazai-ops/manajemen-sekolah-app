<script>
  $(document).ready(function() {
    // get data fasilitas
    $(document).on('click', '.fasilitas-button-edit', function(){
      var fasilitasId = $(this).data('id')
      $.ajax({
        url: '/fasilitas/' + fasilitasId,
        method: 'GET',
        success: function(response){
          $('#fasilitas-field-input-nama').val(response.data.fasilitas_nama)
          $('#fasilitas-form-edit').data('id', fasilitasId)

          $('#fasilitas-form-edit').find('input').each(function() {
            $(this).data('original-value', $(this).val());
          });
        },
        error: function(){
          swallFailedGetData().then(() => {
            $('#fasilitas-modal-edit').modal('hide');
          })
        }
      })
    })
  })

  // set data mapel
  $(document).ready(function() {
    $(document).on('submit', '#fasilitas-form-edit', function(e){
      e.preventDefault();
      const form = this;
      var isChanged = false;
      var isEmpty = false;
      $(this).find('input').each(function() {
        if (!$(this).val()) {
          isEmpty = true;
        }
      });
      if (isEmpty) {
        swallUncompleteData();
        return
      }
      // membandingkan value lama dengan value baru
      $(form).find('input').each(function() {
        const originalValue = $(this).data('original-value');
        const currentValue = $(this).val();
        if (String(originalValue) !== String(currentValue)) {
          isChanged = true;
        }
      });
      if(!isChanged) {
        swallNothingChange().then((result) => {
          $('#fasilitas-modal-edit').modal('hide');
        });
        return;
      }else{
        swallConfirmUpdateJs(form).then((result) => {
          if (result.isConfirmed) {
            var fasilitasId  = $(this).data('id');
            var fasilitasBaru = $('#fasilitas-field-input-nama').val();
            $.ajax({
              url: '/fasilitas/' + fasilitasId,
              method: 'PUT',
              data: {
                _token: $('input[name="_token"]').val(),
                _method: 'PUT',
                fasilitas: fasilitasBaru
              },
              success: function(response){
                swallSuccessUpdateData()
              },
              error: function(){
                swallFailedUpdateData().then(() => {
                  $('#fasilitas-modal-edit').modal('hide');
                })  
              }
            });
          }
        });
      }
    });
  });

  // create new data
  $(document).ready(function() {
    $(document).on('submit', '#fasilitas-form-tambah', function(e){
      e.preventDefault();
      let isEmpty = false;
      let form = $(this).serialize()

      $(this).find('input').each(function() {
        if (!$(this).val()) {
          isEmpty = true;
        }
      });
      if (isEmpty) {
        swallUncompleteData();
      }else{
        swallConfirmSaveJs().then((result) => {
          if (result.isConfirmed) {
            let fasilitasBaru = $('#fasilitas-field-input-nama-baru').val();
            $.ajax({
              url: '/fasilitas',
              method: 'POST',
              data: {
                _token: $('input[name="_token"]').val(),
                fasilitas: fasilitasBaru
              },
              success: function(response){
                swallSuccessSaveData()
              },
              error: function(){
                swallFailedSaveData().then(() => {
                  $('#fasilitas-modal-tambah').modal('hide');
                })
              }
            })
          }
        });
      }
    });
  });

  

</script>