<?php
include '../koneksi.php';

if (isset($_POST['id_matkul'])) {
    $id_matkul = $_POST['id_matkul'];

    // Query untuk menghapus data matkul
    $query = "DELETE FROM matkul WHERE id_matkul='$id_matkul'";
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
