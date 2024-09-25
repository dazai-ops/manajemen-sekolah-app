<script>

  $(document).ready(function() {
    $('.guru-button-detail-info').on('click', function(){
      console.log('clicked')
      var guruId = $(this).data('id')
      
      console.log('clicked', guruId)

      $.ajax({
        url: '/dataguru/' + guruId,
        method: 'GET',
        success: function(response){
          console.log(response)
          $('#guru-info-nama').text(response.data.detail_guru.guru_nama)
          $('#guru-info-nip').text(response.data.detail_guru.guru_nip)
          $('#guru-info-tempat-lahir').text(response.data.detail_guru.guru_tempat_lahir)
          $('#guru-info-tanggal-lahir').text(response.data.detail_guru.guru_tanggal_lahir)
          $('#guru-info-jenis-kelamin').text(response.data.detail_guru.guru_jenis_kelamin)
          $('#guru-info-nomor-telepon').text(response.data.detail_guru.guru_nomor_telepon)
          $('#guru-info-alamat').text(response.data.detail_guru.guru_alamat)
          $('#guru-info-mapel').text(response.data.mapel_diampu)
        },
        error: function(err){
          console.log(err)
        }
      })
    })
  })

  function previewImage(){
    const image = document.querySelector('#guru_foto');
    const imagePreview = document.querySelector('#image_preview');
    const buttonPreview = document.querySelector('#btn-preview-image');
    const buttonRemove = document.querySelector('#remove-preview-image');

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
    document.getElementById('guru_foto').value = '';
    const imagePreview = document.getElementById('image_preview');
    imagePreview.src = '';

    const buttonPreview = document.querySelector('#btn-preview-image');
    const buttonRemove = document.querySelector('#remove-preview-image');

    buttonPreview.style.display = 'none';
    buttonRemove.style.display = 'none';
  }

  $(document).ready(function() {
      $('.selectpicker').selectpicker();
  });
</script>