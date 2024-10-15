<script>
  $(document).ready(function() {
    // simpan value lama dari setiap input
    $('#operator-form-edit').find('input, select, textarea').each(function() {
      $(this).data('original-value', $(this).val());
    });

    // cek apakah ada perubahan saat submit
    $(document).on('submit', '#operator-form-edit', function(e) {
      e.preventDefault();
      const form = this;
      var isChanged = false;
      
      // membandingkan value lama dengan value baru
      $(form).find('input, select, textarea').each(function() {
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

  $(document).ready(function() {
    // cek apakah ada perubahan saat submit
    $(document).on('submit', '#operator-form-edit-password', function(e) {
      e.preventDefault();
      var formData = $(this).serializeArray();
      var isEmpty = false;
      let form = this
      var excludedField = ['password_lama']

      $.each(formData, function(i, field){
        if(!field.value && !excludedField.includes(field.name)) {
          isEmpty = true;
        }
      })
      if (isEmpty) {
        swallUncompleteData()
      } else {
        swallConfirmUpdate(form);
      }
    });
  });
    
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