<?php
include '../koneksi.php';

if (isset($_POST['id_dosen'])) {
    $id_dosen = $_POST['id_dosen'];

    // Query untuk menghapus data dosen
    $query = "DELETE FROM dosen WHERE id_dosen='$id_dosen'";
    if (mysqli_query($conn, $query)) {
        echo "Data berhasil dihapus";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
