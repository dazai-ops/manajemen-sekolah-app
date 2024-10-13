<script>
    function showJadwal() {
        const selectElement = document.getElementById('jadwal-pelajaran-select');
        const selectedClassId = selectElement.value;

        if (selectedClassId) {
            window.location.href = `/jadwal-pelajaran/${selectedClassId}`;
        }
    }

    $(document).ready(function() {

        $(document).on('click', '.jadwal-list-button-edit', function(){
            var jadwalListId = $(this).data('id')
            console.log('clicked', jadwalListId)

            $.ajax({
                url: '/jadwal-pelajaran-list/' + jadwalListId,
                method: 'GET',
                success: function(response){
                    console.log(response)
                    $('#mata-pelajaran').val(response.data.mapel_id)
                    $('#guru-pengajar').val(response.data.guru_id)
                    $('#jam-mulai').val(response.data.jam_mulai)
                    $('#jam-selesai').val(response.data.jam_selesai)

                    $('#jadwal-list-form-edit').data('id', jadwalListId)

                    $('#jadwal-list-form-edit').find('input, select').each(function() {
                        $(this).data('original-value', $(this).val());
                    });
                },
                error: function(err){
                    swallFailedGetData().then(() => {
                        $('#jadwal-list-modal-edit').modal('hide');
                    });
                }
            })
        })

        $(document).on('submit', '#jadwal-list-form-edit', function(e){
            e.preventDefault();
            let mapelId  = $(this).data('id');
            let mapel = $('#mata-pelajaran').val();
            let guruPengajar = $('#guru-pengajar').val();
            let jamMulai = $('#jam-mulai').val();
            let jamSelesai = $('#jam-selesai').val();
            let isChanged = false;
            let isEmpty = false;
            const form = this;

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

            $(this).find('input, select').each(function() {
                if (!$(this).val()) {
                    isEmpty = true;
                }
            });
            if (isEmpty) {
                swallUncompleteData();
                return;
            }

            swallConfirmSaveJs().then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/jadwal-pelajaran/' + mapelId,
                        method: 'PUT',
                        data: {
                        _token: $('input[name="_token"]').val(),
                        _method: 'PUT',
                        mapel: mapel,
                        guru: guruPengajar,
                        jam_mulai: jamMulai,
                        jam_selesai: jamSelesai,
                    },
                    success: function(response){
                        swallSuccessUpdateData()
                    },
                    error: function(){
                        swallFailedUpdateData().then(() => {
                            $('#jadwal-list-modal-edit').modal('hide');
                        })
                    }
                    });
                }
            })
        });

        $(document).on('show.bs.modal', '#jadwal-list-modal-tambah', function(e){
            var button = $(e.relatedTarget)
            var kelasId = button.data('kelas-id')
            var hari = button.data('hari')
            $('#kelas-id').val(kelasId)
            $('#hari').val(hari)
            console.log(kelasId, hari)
        })

        $(document).on('submit', '#jadwal-list-form-tambah', function(e){
            e.preventDefault();
            let kelasId = $('#kelas-id').val();
            let hari = $('#hari').val();
            let mapel = $('#mata-pelajaran-tambah').val();
            let guruPengajar = $('#guru-pengajar-tambah').val();
            let jamMulai = $('#jam-mulai-tambah').val();
            let jamSelesai = $('#jam-selesai-tambah').val();
            let isEmpty = false;

            $(this).find('input, select').each(function() {
                if (!$(this).val()) {
                isEmpty = true;
                }
            });
            if (isEmpty) {
                swallUncompleteData();
            }else{
                swallConfirmSaveJs().then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/jadwal-pelajaran',
                        method: 'POST',
                        data: {
                            _token: $('input[name="_token"]').val(),        
                            kelas: kelasId,
                            hari: hari,
                            mapel: mapel,
                            guru: guruPengajar,
                            jam_mulai: jamMulai,
                            jam_selesai: jamSelesai,
                        },
                        success: function(response){
                            swallSuccessSaveData();
                        },
                        error: function(){
                            swallFailedSaveData();  
                        }
                    });
                }
                });
            }
        });

        $(document).on('click', '.jadwal-list-button-hapus', function(e){
            e.preventDefault()
            var jadwalId = $(this).data('id')
            var url = '/jadwal-pelajaran/' + jadwalId;
            var csrfToken = $('meta[name="csrf-token"]').attr('content')

            swallConfirmDelete('Hapus data jadwal!', 'Apakah anda yakin menghapus data ini?', url, csrfToken)
            .then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    url: url,
                    method: 'DELETE',
                    data: {
                        _token: csrfToken
                    },
                    success: function(response){
                        swallSuccessDeleteData();
                        location.reload();
                    },
                    error: function(xhr){
                        swallFailedDeleteData();
                    }
                })
            }
        })

        })
    })
</script>