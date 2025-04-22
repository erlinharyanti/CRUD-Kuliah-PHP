<?php
include 'db.php';

// Ambil data dari tabel KRS
$result = mysqli_query($conn, "SELECT krs.id, mahasiswa.nama AS nama_mahasiswa, matakuliah.nama AS nama_matakuliah, matakuliah.jumlah_sks 
                               FROM krs 
                               JOIN mahasiswa ON krs.mahasiswa_npm = mahasiswa.npm
                               JOIN matakuliah ON krs.matakuliah_kodemk = matakuliah.kodemk");

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
    <title>Data KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .nama-mahasiswa {
            color: #007bff; /* Biru */
            font-weight: bold;
        }
        .nama-matakuliah {
            color: #dc3545; /* Merah */
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <h3>Data KRS</h3>
    </div>
    <div class="mb-3 text-end">
        <a href="tambahkrs.php" class="btn btn-primary">Tambah KRS</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Mata Kuliah</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1; 
            while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $row['nama_mahasiswa'] ?></td>
                    <td><?= $row['nama_matakuliah'] ?></td>
                    <td>
                        <span class="nama-mahasiswa"><?= $row['nama_mahasiswa'] ?></span> Mengambil Mata Kuliah 
                        <span class="nama-matakuliah"><?= $row['nama_matakuliah'] ?></span> 
                        (<?= $row['jumlah_sks'] ?> SKS)
                    </td>
                    <td>
                        <div class="d-flex">
                            <a href="editkrs.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm me-2">Edit</a>
                            <a href="hapuskrs.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
