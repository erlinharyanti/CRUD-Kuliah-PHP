<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data KRS berdasarkan ID
    $query_hapus = "DELETE FROM krs WHERE id = '$id'";
    if (mysqli_query($conn, $query_hapus)) {
        echo '<div class="alert alert-success mt-3">Data KRS berhasil dihapus!</div>';
        header("Refresh: 2; url=krs.php");
    } else {
        echo '<div class="alert alert-danger mt-3">Gagal menghapus data: ' . mysqli_error($conn) . '</div>';
    }
} else {
    echo '<div class="alert alert-danger mt-3">ID KRS tidak ditemukan!</div>';
}
?>

<?php include 'index.php'; ?>
