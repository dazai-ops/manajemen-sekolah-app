<script>
  $(document).ready(function() {
    // get data mapel
    $(document).on('click', '.mapel-button-edit', function(){
      var mapelId = $(this).data('id')
      $.ajax({
        url: '/datamapel/' + mapelId,
        method: 'GET',
        success: function(response){
          $('#mapel-field-input-nama').val(response.data.mapel_nama)
          $('#mapel-form-edit').data('id', mapelId)

          $('#mapel-form-edit').find('input').each(function() {
            $(this).data('original-value', $(this).val());
          });
        },
        error: function(err){
          console.log(err)
        }
      })
    })
  })
// set data mapel
  $(document).ready(function() {
    $(document).on('submit', '#mapel-form-edit', function(e){
      e.preventDefault();
      const form = this;
      var isChanged = false;
      
      // membandingkan value lama dengan value baru
      $(form).find('input').each(function() {
        const originalValue = $(this).data('original-value');
        const currentValue = $(this).val();
        console.log('pertama', originalValue, 'kedua',currentValue)
        if (String(originalValue) !== String(currentValue)) {
          isChanged = true;
        }
      });
      if(!isChanged) {
        swallNothingChange().then((result) => {
          $('#mapel-modal-edit').modal('hide');
        });
        return;
      }else{
        swallConfirmUpdateJs(form).then((result) => {
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
      }
    });
  });

  // create new data
  $(document).ready(function() {
    $(document).on('submit', '#mapel-form-tambah', function(e){
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
            let mapelBaru = $('#mapel-field-input-nama-baru').val();
            $.ajax({
              url: '/datamapel',
              method: 'POST',
              data: {
                _token: $('input[name="_token"]').val(),
                mapel: mapelBaru
              },
              success: function(response){
                swallSuccessSaveData()
              },
              error: function(){
                swallFailedSaveData().then(() => {
                  $('#mapel-modal-tambah').modal('hide');
                })
              }
            })
          }
        });
      }
    });
  });

  

</script>