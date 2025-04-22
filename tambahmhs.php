<?php
include 'db.php';  

if (isset($_POST['submit'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $query = "INSERT INTO mahasiswa (npm, nama, jurusan, alamat) VALUES ('$npm', '$nama', '$jurusan', '$alamat')";
    
    if (mysqli_query($conn, $query)) {  
        echo '<div class="alert alert-success mt-3">Data berhasil ditambah!</div>';
    } else {
        echo '<div class="alert alert-danger mt-3">Gagal menambahkan data: ' . mysqli_error($conn) . '</div>';  
    }
}
?>
<?php include 'index.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5 p-4 shadow rounded bg-white pb-4">
    <h3 class="mb-4">Tambah Mahasiswa</h3>
    <form method="POST">
        <div class="mb-4">
            <label for="npm" class="form-label">NPM</label>
            <input type="text" name="npm" class="form-control" required>
        </div>
        <div class="mb-4">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-4">
            <label for="jurusan" class="form-label">Jurusan</label>
            <select name="jurusan" class="form-control" required>
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Tambah</button>
    </form>
</div>
</body>
</html>
