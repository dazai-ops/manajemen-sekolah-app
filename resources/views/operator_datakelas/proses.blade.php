<script>
    // Tambah & detail kelas
    $(document).ready(function() {
      $(document).on('click', '.kelas-button-detail-info', function(){
        let kelasId = $(this).data('id')
        $('.list-data-fasilitas-kelas').remove()
        $.ajax({
          url: '/datakelas/' + kelasId,
          method: 'GET',
          success: function(response){
            $('#kelas-info-nama').text(response.data.detail_kelas.kelas_nama)
            $('#kelas-info-wali-kelas').text(response.data.detail_kelas.nama_wali_kelas)
            $('#kelas-info-fasilitas').append(
              response.data.fasilitas.map(fasilitas => `<li class="list-data-fasilitas-kelas">${fasilitas.fasilitas_nama}</li>`
            ))
          },
          error: function(err){
            swallFailedGetData().then(() => {
              $('#kelas-modal-detail-info').modal('hide');
            });
          }
        })
      })

      $(document).on('submit', '#kelas-form-tambah', function(event) {
        event.preventDefault();
        let isEmpty = false;
        let form = $(this).serialize()
        console.log(form)

        $(this).find('input, select').each(function() {
          if($(this).is('select') && $(this).prop('multiple')) {
            if ($(this).val() === null || $(this).val().length === 0) {
              isEmpty = true;
            }
          }else if (!$(this).val()) {
            isEmpty = true;
          }
        });

        if (isEmpty) {
          swallUncompleteData();
        } else {
          swallConfirmSaveJs().then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: '/datakelas',
                method: 'POST',
                data: form,
                success: function(response){
                  location.reload()
                },
                error: function(err){
                  console.log(err, 'eror bang')
                }
              })
            }
          });
        }
      });
    })

    // Edit data kelas
    $(document).ready(function() {
      $(document).on('click', '.kelas-button-edit', function(){
        let kelasId = $(this).data('id')

        $.ajax({
          url: '/datakelas/' + kelasId + '/get-data',
          method: 'GET',
          success: function(response){
            console.log(response)
            $('#kelas-nama-edit').val(response.data.detail_kelas.kelas_nama)
            $('#nama-guru-edit').val(response.data.detail_kelas.wali_kelas.id)
            fasilitasIds = response.data.fasilitas.map(fasilitas => fasilitas.id)
            $('#kelas-fasilitas-edit').val(fasilitasIds)
            $('.selectpicker').selectpicker('refresh')

            $('#kelas-form-edit').data('id', kelasId)

            // simpan value lama dari setiap input
            $('#kelas-form-edit').find('input, select[multiple], select').each(function() {
              $(this).data('original-value', $(this).val());
            });
            
          },
          error: function(err){
            swallFailedGetData().then(() => {
              $('#kelas-modal-edit').modal('hide');
            });
          }
        })
      })

      
    });

    // cek apakah ada perubahan saat submit
    $(document).on('submit', '#kelas-form-edit', function(e) {
      e.preventDefault();
      console.log($(this).data('original-kelas-nama'))

      const form = this;
      let isChanged = false;
      let isEmpty = false;
      $(this).find('input, select[multiple], select').each(function() {
        if($(this).is('select') && $(this).prop('multiple')) {
          if ($(this).val() === null || $(this).val().length === 0) {
            isEmpty = true;
          }
        }else if (!$(this).val()) {
          isEmpty = true;
        }
      });
      if (isEmpty) {
        swallUncompleteData();
        return;
      }
      
      // membandingkan value lama dengan value baru
      $(form).find('input, select').each(function() {
        const originalValue = $(this).data('original-value');
        const currentValue = $(this).is('select') ? $(this).val() : $(this).val();
        console.log('awal',originalValue, 'akhir',currentValue)
        if (JSON.stringify(originalValue) !== JSON.stringify(currentValue)) {
          isChanged = true;
        }
      });
      if (!isChanged) {
        swallNothingChange();
        return;
      }

      swallConfirmUpdateJs().then((result) => {
        if (result.isConfirmed) {
          let form = $(this).serialize()
          let id = $(this).data('id')
          $.ajax({
            url: '/datakelas/' + id,
            method: 'PUT',
            data: form,
            success: function(response){
              location.reload()
            },
            error: function(err){
              console.log(err, 'eror bang')
            }
          })
        }
      });
    });

    $(document).ready(function() {
        $('.selectpicker').selectpicker();
    });
  </script>