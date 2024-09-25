<script>
  $(document).ready(function() {
    $('.mapel-button-edit').on('click', function(){
      var mapelId = $(this).data('id')
      console.log('clicked', mapelId)

      $.ajax({
        url: '/datamapel/' + mapelId,
        method: 'GET',
        success: function(response){
          console.log(response)
          $('#mapel-field-input-nama').val(response.data.mapel_nama)
          $('#mapel-form-edit').data('id', mapelId)
        },
        error: function(err){
          console.log(err)
        }
      })
    })
  })

  $(document).ready(function(){
    $('#mapel-form-edit').on('submit', function(e){
      e.preventDefault();

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
            console.log('Status berhasil diubah');
            location.reload();
          },
          error: function(){
            console.log('Gagal mengubah status operator');  
          }
      });
    });
  });

  $(document).ready(function(){
    $('#mapel-form-tambah').on('submit', function(e){
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
            console.log('Status berhasil ditambahkan');
            location.reload();
          },
          error: function(){
            console.log('Gagal menambahkan status operator');  
          }
      })
  })
})
</script>