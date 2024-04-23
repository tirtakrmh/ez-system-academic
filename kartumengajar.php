<!DOCTYPE html>
<html>
<head>
    <!-- <title>CRUD dengan AJAX dan jQuery</title> -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
</head>
<body>
    <?php 
    
        include 'index.php';

    ?>
    <form id="kartuMengajarForm" style="margin-bottom: 20px;">
        <!-- <input type="hidden" name="id_dosen" id="id_dosen"> -->
        <input type='text' name='id_dosen' id="id_dosen" placeholder='ID Dosen' style="padding: 10px; width: 200px;"><br>
        <input type='text' name='id_matkul' id='id_matkul' placeholder='ID Mata Kuliah' style="padding: 10px; width: 200px;"><br>
        <input type='text' name='semester' id='semester' placeholder='Semester' style="padding: 10px; width: 200px;"><br>
        <input type="submit" value="Submit" id="submitBtn" style="padding: 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">
        <input type="button" value="Clear" id="clearBtn" style="padding: 10px; background-color: #f44336; color: white; border: none; cursor: pointer;">
    </form>

    <table id="kartuMengajar" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th style="padding: 10px; background-color: #f2f2f2; border: 1px solid #ddd;">ID Dosen</th>
                <th style="padding: 10px; background-color: #f2f2f2; border: 1px solid #ddd;">ID Mata Kuliah</th>
                <th style="padding: 10px; background-color: #f2f2f2; border: 1px solid #ddd;">Semester</th>
                <th style="padding: 10px; background-color: #f2f2f2; border: 1px solid #ddd;">Aksi</th>
            </tr>
        </thead>
        <tbody id="kartuMengajarBody">
        </tbody>
    </table>

    <script>
        // Fungsi untuk menampilkan data dosen
        function viewKartuMengajar() {
            $.ajax({
                url: 'kartumengajar/view_kartumengajar.php',
                type: 'GET',
                success: function(response) {
                    $('#kartuMengajarBody').html(response);
                }
            });
        }

        // Mengambil data dosen saat halaman dimuat
        $(document).ready(function() {
            viewKartuMengajar();
        });

        // Mengirim data dosen menggunakan AJAX saat form disubmit
        $('#kartuMengajarForm').submit(function(e) {
            e.preventDefault();

            var id_dosen = $('#id_dosen').val();
            var id_matkul = $('#id_matkul').val();
            var semester = $('#semester').val();

            $.ajax({
                url: 'kartumengajar/insert_update_kartumengajar.php',
                type: 'POST',
                data: {
                    id_dosen: id_dosen,
                    id_matkul: id_matkul,
                    semester: semester
                },
                success: function(response) {
                    alert(response);
                    viewKartuMengajar();
                    $('#kartuMengajarForm')[0].reset();
                }
            });
        });

        // Menghapus data dosen menggunakan AJAX
        $(document).on('click', '.deleteBtn', function() {
            var id_dosen = $(this).data('id');
            var id_matkul = $(this).closest('tr').find('.idMatkul').text();
            console.log(id_dosen);
            console.log(id_matkul);

            $.ajax({
                url: 'kartumengajar/delete_kartumengajar.php',
                type: 'POST',
                data: {
                    id_dosen: id_dosen,
                    id_matkul: id_matkul
                },
                success: function(response) {
                    alert(response);
                    viewKartuMengajar();
                }
            });
        });

        // Mengisi form dengan data dosen saat tombol Edit diklik
        $(document).on('click', '.editBtn', function() {
            var id_dosen = $(this).data('id');
            var id_matkul = $(this).closest('tr').find('.idMatkul').text();
            var semester = $(this).closest('tr').find('.semester').text();

            $('#id_dosen').val(id_dosen);
            $('#id_matkul').val(id_matkul);
            $('#semester').val(semester);
        });

        // Mengosongkan form saat tombol Clear diklik
        $('#clearBtn').click(function() {
            $('#kartuMengajarForm')[0].reset();
            $('#id_dosen').val('');
        });
    </script>
</body>
</html>
