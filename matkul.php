<!DOCTYPE html>
<html>
<head>
    <!-- <title>CRUD dengan AJAX dan jQuery</title> -->
    
</head>
<body>
    <?php 
     
        include 'index.php';

    ?>
    <form id="matkulForm" style="margin-bottom: 20px;">
        <!-- <input type="hidden" name="id_matkul" id="id_matkul"> -->
        <!-- <input type='text' name='id_matkul' id="id_matkul" placeholder='ID matkul' style="padding: 10px; width: 200px;"><br> -->
        <input type='text' name='id_matkul' id='id_matkul' placeholder='ID Matkul' style="padding: 10px; width: 200px;"><br>
        <input type='text' name='nama_matkul' id='nama_matkul' placeholder='Nama matkul' style="padding: 10px; width: 200px;"><br>
        <input type="submit" value="Submit" id="submitBtn" style="padding: 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">
        <input type="button" value="Clear" id="clearBtn" style="padding: 10px; background-color: #f44336; color: white; border: none; cursor: pointer;">
    </form>

    <table id="matkulTable" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th style="padding: 10px; background-color: #f2f2f2; border: 1px solid #ddd;">ID Matkul</th>
                <th style="padding: 10px; background-color: #f2f2f2; border: 1px solid #ddd;">Nama Matkul</th>
                <!-- <th style="padding: 10px; background-color: #f2f2f2; border: 1px solid #ddd;">Nomor Telepon</th> -->
                <th style="padding: 10px; background-color: #f2f2f2; border: 1px solid #ddd;">Aksi</th>
            </tr>
        </thead>
        <tbody id="matkulTableBody">
        </tbody>
    </table>

    <script>
        // Fungsi untuk menampilkan data matkul
        function viewMatkul() {
            $.ajax({
                url: 'matkul/view_matkul.php',
                type: 'GET',
                success: function(response) {
                    $('#matkulTableBody').html(response);
                }
            });
        }

        // Mengambil data matkul saat halaman dimuat
        $(document).ready(function() {
            viewMatkul();
        });

        // Mengirim data matkul menggunakan AJAX saat form disubmit
        $('#matkulForm').submit(function(e) {
            e.preventDefault();

            var id_matkul = $('#id_matkul').val();
            var nama_matkul = $('#nama_matkul').val();
            // var no_telp = $('#no_telp').val();

            $.ajax({
                url: 'matkul/insert_update_matkul.php',
                type: 'POST',
                data: {
                    id_matkul: id_matkul,
                    nama_matkul: nama_matkul,
                    // no_telp: no_telp
                },
                success: function(response) {
                    alert(response);
                    viewMatkul();
                    $('#matkulForm')[0].reset();
                }
            });
        });

        // Menghapus data matkul menggunakan AJAX
        $(document).on('click', '.deleteBtn', function() {
            var id_matkul = $(this).data('id');
            console.log(id_matkul);

            $.ajax({
                url: 'matkul/delete_matkul.php',
                type: 'POST',
                data: {
                    id_matkul: id_matkul
                },
                success: function(response) {
                    alert(response);
                    viewMatkul();
                }
            });
        });

        // Mengisi form dengan data matkul saat tombol Edit diklik
        $(document).on('click', '.editBtn', function() {
            var id_matkul = $(this).data('id');
            var nama_matkul = $(this).closest('tr').find('.namaMatkul').text();
            // var no_telp = $(this).closest('tr').find('.noTelp').text();

            $('#id_matkul').val(id_matkul);
            $('#nama_matkul').val(nama_matkul);
            // $('#no_telp').val(no_telp);
        });

        // Mengosongkan form saat tombol Clear diklik
        $('#clearBtn').click(function() {
            $('#matkulForm')[0].reset();
            $('#id_matkul').val('');
        });
    </script>
</body>
</html>
