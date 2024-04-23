<?php
include '../koneksi.php';

if (isset($_POST['id_matkul'])) {
    $id_matkul = $_POST['id_matkul'];
    $nama_matkul = $_POST['nama_matkul'];
    // $no_telp = $_POST['no_telp'];

    $query = "SELECT * FROM matkul WHERE id_matkul='$id_matkul'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Data matkul dengan id_matkul sudah ada, lakukan update
        $query = "UPDATE matkul SET nama_matkul='$nama_matkul' WHERE id_matkul='$id_matkul'";
        if (mysqli_query($conn, $query)) {
            echo "Data berhasil diupdate";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        // Data matkul dengan id_matkul belum ada, lakukan insert
        $query = "INSERT INTO matkul (id_matkul, nama_matkul) VALUES ('$id_matkul', '$nama_matkul')";
        if (mysqli_query($conn, $query)) {
            echo "Data berhasil dimasukkan ke tabel matkul";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>
