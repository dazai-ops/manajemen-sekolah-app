<script>
    function showJadwal() {
        const selectElement = document.getElementById('jadwal-pelajaran-select');
        const selectedClassId = selectElement.value; // Get the selected class ID

        if (selectedClassId) {
            window.location.href = `/jadwal-pelajaran/${selectedClassId}`; // Adjust the URL as necessary
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
    })

    $(document).ready(function(){
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
    });
</script>