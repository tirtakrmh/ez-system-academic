<?php
include '../koneksi.php';

if (isset($_POST['id_dosen'])) {
    $id_dosen = $_POST['id_dosen'];
    $id_matkul = $_POST['id_matkul'];
    $semester = $_POST['semester'];

    $query = "SELECT * FROM kartu_mengajar WHERE id_dosen='$id_dosen' AND id_matkul='$id_matkul'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Data kartu_mengajar dengan id_dosen sudah ada, lakukan update
        $query = "UPDATE kartu_mengajar SET semester='$semester' WHERE id_dosen='$id_dosen' AND id_matkul='$id_matkul'";
        if (mysqli_query($conn, $query)) {
            echo "Data berhasil diupdate";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    } else {
        // Data kartu_mengajar dengan id_dosen belum ada, lakukan insert
        $query = "INSERT INTO kartu_mengajar (id_dosen, id_matkul, semester) VALUES ('$id_dosen', '$id_matkul', '$semester')";
        if (mysqli_query($conn, $query)) {
            echo "Data berhasil dimasukkan ke tabel dosen";
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>
