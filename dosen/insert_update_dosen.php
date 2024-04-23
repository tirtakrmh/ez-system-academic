<?php
include '../koneksi.php';

if (isset($_POST['id_dosen'])) {
    $id_dosen = $_POST['id_dosen'];
    $nama_dosen = $_POST['nama_dosen'];
    $no_telp = $_POST['no_telp'];

    $query = "SELECT * FROM dosen WHERE id_dosen='$id_dosen'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Data dosen dengan id_dosen sudah ada, lakukan update
        $query = "UPDATE dosen SET nama_dosen='$nama_dosen', no_telp='$no_telp' WHERE id_dosen='$id_dosen'";
        if (mysqli_query($conn, $query)) {
            echo "Data berhasil diupdate";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        // Data dosen dengan id_dosen belum ada, lakukan insert
        $query = "INSERT INTO dosen (id_dosen, nama_dosen, no_telp) VALUES ('$id_dosen', '$nama_dosen', '$no_telp')";
        if (mysqli_query($conn, $query)) {
            echo "Data berhasil dimasukkan ke tabel dosen";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>
