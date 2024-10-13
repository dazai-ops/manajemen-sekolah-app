<script>
  $(document).ready(function() {
    $(document).on('submit', '#siswa-form-tambah', function(e) {
      e.preventDefault();
      var formData = $(this).serializeArray();
      var isEmpty = false;
      var excludedField = ['guru_alamat']

      $.each(formData, function(i, field){
        if(!field.value && !excludedField.includes(field.name)) {
          isEmpty = true;
        }
      })

      if (isEmpty) {
        swallUncompleteData();
      } else {
        swallConfirmSave(this);
      }
    });
  })

  $(document).ready(function() {
    // simpan value lama dari setiap input
    $('#siswa-form-edit').find('input, input[type=number], select, textarea').each(function() {
      $(this).data('original-value', $(this).val());
    });

    // cek apakah ada perubahan saat submit
    $(document).on('submit', '#siswa-form-edit', function(e) {
      e.preventDefault();
      const form = this;
      var isChanged = false;
      
      // membandingkan value lama dengan value baru
      $(form).find('input, select, input[type=number],  textarea').each(function() {
        const originalValue = $(this).data('original-value');
        const currentValue = $(this).val();
        if (String(originalValue) !== String(currentValue)) {
          isChanged = true;
        }
      });
      if (!isChanged) {
        swallNothingChange();
        return;
      } else {
        swallConfirmUpdate(form);
      }
    });
  });

  $(document).on('click', '.siswa-button-detail-info', function(){
    var siswaId = $(this).data('id')
    $.ajax({
      url: '/datasiswa/' + siswaId,
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
        swallFailedGetData().then(() => {
            $('#siswa-modal-detail-info').modal('hide');
          });
      }
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