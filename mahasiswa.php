<?php
include 'db.php';

$result = mysqli_query($conn, "SELECT * FROM mahasiswa");
if (!$result) {
    die('Query gagal: ' . mysqli_error($conn));
}
?>

<?php include 'index.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <h3>Data Mahasiswa</h3>
    </div>
    <div class="mb-3 text-end">
        <a href="tambahmhs.php" class="btn btn-primary">Tambah Mahasiswa</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>NPM</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $row['npm'] ?></td>
                    <td><?= $row['nama'] ?></td>
                    <td><?= $row['jurusan'] ?></td>
                    <td><?= $row['alamat'] ?></td>
                    <td>
                        <div class="d-flex">
                            <a href="editmhs.php?npm=<?= $row['npm'] ?>" class="btn btn-warning btn-sm me-2">Edit</a>
                            <a href="hapusmhs.php?npm=<?= $row['npm'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
