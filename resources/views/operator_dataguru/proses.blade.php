<script>

  // CREATE DATA GURU
  $(document).ready(function() {
    $(document).on('submit', '#guru-form-tambah', function(e) {
      event.preventDefault();
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

  });
  
  // EDIT & UPDATE DATA GURU
  $(document).ready(function() {
    // simpan value lama dari setiap input
    $('#guru-form-edit').find('input, input[type=number], select, textarea').each(function() {
      $(this).data('original-value', $(this).val());
    });

    // cek apakah ada perubahan saat submit
    $(document).on('submit', '#guru-form-edit', function(e) {
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
  })

  // SHOW DATA PROFILE GURU
  $(document).ready(function() {
    $(document).on('click', '.guru-button-detail-info', function(){
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
          swallFailedGetData().then(() => {
            $('#guru-modal-detail-info').modal('hide');
          });
        }
      })
    })
  })

  // PREVIEW IMAGE PROFILE GURU
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

  // HIDE AND REMOVE PREVIEW IMAGE & BUTTON
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