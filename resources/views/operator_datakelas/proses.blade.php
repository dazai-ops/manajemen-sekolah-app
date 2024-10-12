<script>
    // Tambah & detail kelas
    $(document).ready(function() {
      $(document).on('click', '.kelas-button-detail-info', function(){
        var kelasId = $(this).data('id')
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
            console.log(err)
          }
        })
      })

      $(document).on('submit', '#kelas-form-tambah', function(event){
        event.preventDefault()
        var form = $(this).serialize()
        console.log(form)
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
      })
    })

    // Edit data kelas
    $(document).ready(function() {
      $(document).on('click', '.kelas-button-edit', function(){
        var kelasId = $(this).data('id')

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
            
          },
          error: function(err){
            console.log(err)
          }
        })
      })

      $(document).on('submit', '#kelas-form-edit', function(event){
        event.preventDefault()
        var form = $(this).serialize()
        var id = $(this).data('id')
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
      })

    });

    $(document).ready(function() {
        $('.selectpicker').selectpicker();
    });
  </script>