<script>
    function swalConfirmDelete(title, text, url, csrfToken){
        Swal.fire({
            title: title,
            text:text,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    url: url,
                    method: 'DELETE',
                    data: {
                        _token: csrfToken
                    },
                    success: function(response){
                        Swal.fire(
                            'Terhapus',
                            'Data berhasil dihapus',
                            'success'
                        ).then(()=> {
                            window.location.reload()
                        })
                    },
                    error: function(xhr){
                        Swal.fire(
                            'Error',
                            'Data gagal dihapus',
                            'error'
                        )
                    }
                })
            }
        })
    }

    function showJadwal() {
        const selectElement = document.getElementById('jadwal-pelajaran-select');
        const selectedClassId = selectElement.value;

        if (selectedClassId) {
            window.location.href = `/jadwal-pelajaran/${selectedClassId}`;
        }
    }

    $(document).ready(function() {

        $('.jadwal-list-button-edit').on('click', function(){
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
                },
                error: function(err){
                    console.log(err)
                }
            })
        })

        $('#jadwal-list-form-edit').on('submit', function(e){
            e.preventDefault();

            var mapelId  = $(this).data('id');
            var mapel = $('#mata-pelajaran').val();
            var guruPengajar = $('#guru-pengajar').val();
            var jamMulai = $('#jam-mulai').val();
            var jamSelesai = $('#jam-selesai').val();

            console.log(mapelId, mapel, guruPengajar, jamMulai, jamSelesai)
            $.ajax({
                url: '/jadwal-pelajaran/' + mapelId,
                method: 'PUT',
                data: {
                _token: $('input[name="_token"]').val(),
                _method: 'PUT',

                // kelas: ,
                mapel: mapel,
                guru: guruPengajar,
                jam_mulai: jamMulai,
                jam_selesai: jamSelesai,
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

        $('#jadwal-list-modal-tambah').on('show.bs.modal', function(e){
            var button = $(e.relatedTarget)
            var kelasId = button.data('kelas-id')
            var hari = button.data('hari')
            $('#kelas-id').val(kelasId)
            $('#hari').val(hari)

            console.log(kelasId, hari)
        })

        $('#jadwal-list-form-tambah').on('submit', function(e){
            e.preventDefault();

            var kelasId = $('#kelas-id').val();
            var hari = $('#hari').val();
            var mapel = $('#mata-pelajaran-tambah').val();
            var guruPengajar = $('#guru-pengajar-tambah').val();
            var jamMulai = $('#jam-mulai-tambah').val();
            var jamSelesai = $('#jam-selesai-tambah').val();

            console.log(kelasId, hari,  guruPengajar, jamMulai, jamSelesai)
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
                    console.log('Status berhasil diubah');
                    location.reload();
                },
                    error: function(){
                    console.log('Gagal mengubah status operator');  
                }
            });
        });

        $('.jadwal-list-button-hapus').on('click', function(e){
            e.preventDefault()
            var jadwalId = $(this).data('id')
            var url = '/jadwal-pelajaran/' + jadwalId;
            var csrfToken = $('meta[name="csrf-token"]').attr('content')

            swalConfirmDelete('Hapus data jadwal!', 'Apakah anda yakin menghapus data ini?', url, csrfToken)

        })
    })
</script>