<script>
    $(document).ready(function() {
      $('.siswa-button-detail-info').on('click', function(){
        console.log('clicked')
        var guruId = $(this).data('id')
        
        console.log('clicked', guruId)
  
        $.ajax({
          url: '/datasiswa/' + guruId,
          method: 'GET',
          success: function(response){
            console.log(response)
            $('#siswa-info-nama').text(response.data.siswa.siswa_nama)
            $('#siswa-info-nisn').text(response.data.siswa.siswa_nisn)
            $('#siswa-info-kelas').text(response.data.siswa.kelas.kelas_nama)
            $('#siswa-info-tempat-lahir').text(response.data.siswa.siswa_tempat_lahir)
            $('#siswa-info-tanggal-lahir').text(response.data.siswa.siswa_tanggal_lahir)
            $('#siswa-info-jenis-kelamin').text(response.data.siswa.siswa_jenis_kelamin)
            $('#siswa-info-nomor-telepon').text(response.data.siswa.siswa_nomor_telepon)
            $('#siswa-info-alamat').text(response.data.siswa.siswa_alamat)
          },
          error: function(err){
            console.log(err)
          }
        })
      })
    })
  
    function previewImage(){
      const image = document.querySelector('#siswa-foto');
      const imagePreview = document.querySelector('#siswa-foto-preview');
      const buttonPreview = document.querySelector('#siswa-btn-preview-foto');
      const buttonRemove = document.querySelector('#siswa-btn-remove-preview-foto');
  
      if(image.files && image.files[0]){
        buttonPreview.style.display = 'inline';
        buttonRemove.style.display = 'inline';
      }
  
      imagePreview.style.display = 'block';
    
      const oFReader = new FileReader();
      oFReader.readAsDataURL(image.files[0]);
    
      oFReader.onload = function(oFRevent){
        imagePreview.src = oFRevent.target.result;
      }
    }
  
    function removePreviewImage(){
      document.getElementById('siswa-foto').value = '';
      const imagePreview = document.getElementById('siswa-foto-preview');
      imagePreview.src = '';
  
      const buttonPreview = document.querySelector('#siswa-btn-preview-foto');
      const buttonRemove = document.querySelector('#siswa-btn-remove-preview-foto');
  
      buttonPreview.style.display = 'none';
      buttonRemove.style.display = 'none';
    }
  
    $(document).ready(function() {
        $('.selectpicker').selectpicker();
    });
  </script>