<script>

  function swallConfirmSave(icon, title, form){
    Swal.fire({
        title: title,
        icon: icon,
        showCancelButton: true,
        confirmButtonText: 'Yakin',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
  }
  $(document).ready(function() {
    $('#guru-form-tambah').on('submit', function(e) {
      e.preventDefault();
      const form = this
      swallConfirmSave('info', 'Yakin tambah data ini?', form)
    });

    $('#guru-form-edit').on('submit', function(e) {
      e.preventDefault();
      const form = this
      swallConfirmSave('info', 'Yakin mengubah data ini', form)
    });
  });

  $(document).ready(function() {
    $('.guru-button-detail-info').on('click', function(){
      var guruId = $(this).data('id')

      $.ajax({
        url: '/dataguru/' + guruId,
        method: 'GET',
        success: function(response){
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
    const image = document.querySelector('#guru-foto');
    const imagePreview = document.querySelector('#image-preview');
    const buttonPreview = document.querySelector('#btn-preview-image');
    const buttonRemove = document.querySelector('#btn-remove-preview-image');

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
    document.getElementById('guru-foto').value = '';
    const imagePreview = document.getElementById('image-preview');
    imagePreview.src = '';

    const buttonPreview = document.querySelector('#btn-preview-image');
    const buttonRemove = document.querySelector('#btn-remove-preview-image');

    buttonPreview.style.display = 'none';
    buttonRemove.style.display = 'none';
  }

  $(document).ready(function() {
      $('.selectpicker').selectpicker();
  });
</script>