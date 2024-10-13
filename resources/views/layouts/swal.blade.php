<script>

    // Update
    function swallConfirmUpdate(formElement){
        return Swal.fire({
          title: 'Ubah data!',
          text: 'Yakin ingin mengubah data ini?',
          icon: 'info',
          width: 350,
          heightAuto: true,
          backdrop: `rgba(0,0,0,0.5)`,
          showCancelButton: true,
          confirmButtonText: 'Yakin',
          cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
                formElement.submit();
            }
        });
    }
    function swallConfirmUpdateJs(){
        return Swal.fire({
          title: 'Ubah data!',
          text: 'Yakin ingin mengubah data ini?',
          icon: 'info',
          width: 350,
          heightAuto: true,
          backdrop: `rgba(0,0,0,0.5)`,
          showCancelButton: true,
          confirmButtonText: 'Yakin',
          cancelButtonText: 'Batal'
      })
    }
    function swallSuccessUpdateData(){
        return Swal.fire({
          title: 'Success :)',
          text: 'Berhasil mengubah data',
          icon: 'success',
          width: 350,
          heightAuto: true,
          backdrop: `rgba(0,0,0,0.5)`,
          confirmButtonText: 'Oke'
        }).then(()=> {
            location.reload();
        });
    }
    function swallFailedUpdateData(){
        return Swal.fire({
          title: 'Error :(',
          text: 'Gagal mengubah data',
          icon: 'error',
          width: 350,
          heightAuto: true,
          backdrop: `rgba(0,0,0,0.5)`,
          confirmButtonText: 'Oke'
        })
    }

    // Delete
    function swallConfirmDelete(title, text, url, csrfToken){
        return Swal.fire({
            title: title,
            text:text,
            icon: 'warning',
            width: 350,
            heightAuto: true,
            backdrop: `rgba(0,0,0,0.5)`,
            showCancelButton: true,
            confirmButtonText: 'Yakin',
            cancelButtonText: 'Batal'
        })
    }
    function swallSuccessDeleteData(){
        return Swal.fire({
          title: 'Success :)',
          text: 'Berhasil menghapus data',
          icon: 'success',
          width: 350,
          heightAuto: true,
          backdrop: `rgba(0,0,0,0.5)`,
          confirmButtonText: 'Oke'
        }).then(()=> {
            location.reload();
        });;
    }
    function swallFailedDeleteData(){
        return Swal.fire({
          title: 'Oh no..',
          text: 'Gagal menghapus data',
          icon: 'error',
          width: 350,
          heightAuto: true,
          backdrop: `rgba(0,0,0,0.5)`,
          confirmButtonText: 'Oke'
        })
    }

    // Save & store
    function swallConfirmSave(formElement){
        return Swal.fire({
          title: 'Tambah data!',
          text: 'Yakin ingin menyimpan data ini?',
          icon: 'info',
          width: 350,
          heightAuto: true,
          backdrop: `rgba(0,0,0,0.5)`,
          showCancelButton: true,
          confirmButtonText: 'Yakin',
          cancelButtonText: 'Batal'
        }).then((result) => {
          if (result.isConfirmed) {
            formElement.submit();
          }
        });
    }
    function swallConfirmSaveJs(){
        return Swal.fire({
          title: 'Tambah data!',
          text: 'Yakin ingin menyimpan data ini?',
          icon: 'info',
          width: 350,
          heightAuto: true,
          backdrop: `rgba(0,0,0,0.5)`,
          showCancelButton: true,
          confirmButtonText: 'Yakin',
          cancelButtonText: 'Batal'
        })
    }
    function swallSuccessSaveData(){
        return Swal.fire({
          title: 'Success :)',
          text: 'Berhasil menyimpan data',
          icon: 'success',
          width: 350,
          heightAuto: true,
          backdrop: `rgba(0,0,0,0.5)`,
          confirmButtonText: 'Oke'
        }).then(()=> {
            location.reload();
        });
    }
    function swallFailedSaveData(){
        return Swal.fire({
          title: 'Error :(',
          text: 'Gagal menyimpan data',
          icon: 'error',
          width: 350,
          heightAuto: true,
          backdrop: `rgba(0,0,0,0.5)`,
          confirmButtonText: 'Oke'
        })
    }

    // Get data
    function swallFailedGetData(){
        return Swal.fire({
            title: 'Opss..!',
            text: 'Gagal mengambil data',
            icon: 'error',
            width: 350,
            heightAuto: true,
            backdrop: `rgba(0,0,0,0.5)`,
            showCancelButton: false,
            confirmButtonText: 'Tutup'
        })
    }

    // Other
    function swallNothingChange(){
        return Swal.fire({
          title: 'Hmm..!',
          text: 'Tidak ada perubahan',
          icon: 'warning',
          width: 350,
          heightAuto: true,
          backdrop: `rgba(0,0,0,0.5)`,
          showCancelButton: false,
          confirmButtonText: 'Oke'
        })
    }
    function swallUncompleteData(){
        return Swal.fire({
          title: 'Tunggu..!',
          text: 'Data masih belum lengkap!',
          width: 350,
          heightAuto: true,
          backdrop: `rgba(0,0,0,0.5)`,
          icon: 'warning',
          confirmButtonText: 'Tutup'
        });
    }

    function swallInvalidTime(){
        return Swal.fire({
          title: 'Hey..!',
          text: 'Jam selesai tidak boleh kurang dari jam mulai!',
          width: 350,
          heightAuto: true,
          backdrop: `rgba(0,0,0,0.5)`,
          icon: 'info',
          confirmButtonText: 'Tutup'
        });
    }
</script>