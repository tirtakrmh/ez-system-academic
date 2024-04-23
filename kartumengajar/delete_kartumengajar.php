<?php
include '../koneksi.php';

if (isset($_POST['id_dosen'])) {
    $id_dosen = $_POST['id_dosen'];
    $id_matkul = $_POST['id_matkul'];

    // Query untuk menghapus data dosen
    $query = "DELETE FROM kartu_mengajar WHERE id_dosen='$id_dosen'AND id_matkul='$id_matkul' ";
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
