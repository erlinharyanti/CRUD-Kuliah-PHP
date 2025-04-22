<?php
include 'db.php';

$npm = $_GET['npm'];
$result = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE npm = '$npm'");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $query = "UPDATE mahasiswa SET nama = '$nama', jurusan = '$jurusan', alamat = '$alamat' WHERE npm = '$npm'";
    if (mysqli_query($conn, $query)) {  
        echo '<div class="alert alert-success mt-3">Data berhasil diedit!</div>';
    } else {
        echo '<div class="alert alert-danger mt-3">Gagal mengedit data: ' . mysqli_error($conn) . '</div>';  
    }
}
?>
<?php include 'index.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 p-4 shadow rounded bg-white pb-4">
    <h3 class="mb-4">Edit Mahasiswa</h3>
    <form method="POST">
        <div class="mb-4">
            <label for="npm" class="form-label">NPM</label>
            <input type="text" name="npm" class="form-control" value="<?= $data['npm'] ?>" readonly>
        </div>
        <div class="mb-4">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
        </div>
        <div class="mb-4">
            <label for="jurusan" class="form-label">Jurusan</label>
            <select name="jurusan" class="form-control" required>
                <option value="Teknik Informatika" <?= $data['jurusan'] == 'Teknik Informatika' ? 'selected' : '' ?>>Teknik Informatika</option>
                <option value="Sistem Informasi" <?= $data['jurusan'] == 'Sistem Informasi' ? 'selected' : '' ?>>Sistem Informasi</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control"><?= $data['alamat'] ?></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-warning">Simpan</button>
    </form>
</div>
</body>
</html>
