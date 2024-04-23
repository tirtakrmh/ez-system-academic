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
    <form id="dosenForm" style="margin-bottom: 20px;">
        <!-- <input type="hidden" name="id_dosen" id="id_dosen"> -->
        <input type='text' name='id_dosen' id="id_dosen" placeholder='ID Dosen' style="padding: 10px; width: 200px;"><br>
        <input type="text" name="nama_dosen" id="nama_dosen" placeholder="Nama Dosen" style="padding: 10px; width: 200px;"><br>
        <input type="text" name="no_telp" id="no_telp" placeholder="Nomor Telepon" style="padding: 10px; width: 200px;"><br>
        <input type="submit" value="Submit" id="submitBtn" style="padding: 10px; background-color: #4CAF50; color: white; border: none; cursor: pointer;">
        <input type="button" value="Clear" id="clearBtn" style="padding: 10px; background-color: #f44336; color: white; border: none; cursor: pointer;">
    </form>

    <table id="dosenTable" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th style="padding: 10px; background-color: #f2f2f2; border: 1px solid #ddd;">ID Dosen</th>
                <th style="padding: 10px; background-color: #f2f2f2; border: 1px solid #ddd;">Nama Dosen</th>
                <th style="padding: 10px; background-color: #f2f2f2; border: 1px solid #ddd;">Nomor Telepon</th>
                <th style="padding: 10px; background-color: #f2f2f2; border: 1px solid #ddd;">Aksi</th>
            </tr>
        </thead>
        <tbody id="dosenTableBody">
        </tbody>
    </table>

    <script>
        // Fungsi untuk menampilkan data dosen
        function viewDosen() {
            $.ajax({
                url: 'dosen/view_dosen.php',
                type: 'GET',
                success: function(response) {
                    $('#dosenTableBody').html(response);
                }
            });
        }

        // Mengambil data dosen saat halaman dimuat
        $(document).ready(function() {
            viewDosen();
        });

        // Mengirim data dosen menggunakan AJAX saat form disubmit
        $('#dosenForm').submit(function(e) {
            e.preventDefault();

            var id_dosen = $('#id_dosen').val();
            var nama_dosen = $('#nama_dosen').val();
            var no_telp = $('#no_telp').val();

            $.ajax({
                url: 'dosen/insert_update_dosen.php',
                type: 'POST',
                data: {
                    id_dosen: id_dosen,
                    nama_dosen: nama_dosen,
                    no_telp: no_telp
                },
                success: function(response) {
                    alert(response);
                    viewDosen();
                    $('#dosenForm')[0].reset();
                }
            });
        });

        // Menghapus data dosen menggunakan AJAX
        $(document).on('click', '.deleteBtn', function() {
            var id_dosen = $(this).data('id');
            console.log(id_dosen);

            $.ajax({
                url: 'dosen/delete_dosen.php',
                type: 'POST',
                data: {
                    id_dosen: id_dosen
                },
                success: function(response) {
                    alert(response);
                    viewDosen();
                }
            });
        });

        // Mengisi form dengan data dosen saat tombol Edit diklik
        $(document).on('click', '.editBtn', function() {
            var id_dosen = $(this).data('id');
            var nama_dosen = $(this).closest('tr').find('.namaDosen').text();
            var no_telp = $(this).closest('tr').find('.noTelp').text();

            $('#id_dosen').val(id_dosen);
            $('#nama_dosen').val(nama_dosen);
            $('#no_telp').val(no_telp);
        });

        // Mengosongkan form saat tombol Clear diklik
        $('#clearBtn').click(function() {
            $('#dosenForm')[0].reset();
            $('#id_dosen').val('');
        });
    </script>
</body>
</html>
