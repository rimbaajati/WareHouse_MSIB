<?php
include 'config.php'; // Pastikan path ini benar

// Ambil id dari query string
$id = $_GET['id'] ?? null; // Dapatkan id dari URL

// Inisialisasi variabel
$name = '';
$location = '';
$capacity = 0;
$status = '';
$opening_hour = '';
$closing_hour = '';

if ($id) {
    // Query untuk mengambil data berdasarkan id
    $query = "SELECT name, location, capacity, status, opening_hour, closing_hour FROM gudang WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Set variabel dengan data dari database
        $name = $row['name'];
        $location = $row['location'];
        $capacity = $row['capacity'];
        $status = $row['status'];
        $opening_hour = $row['opening_hour'];
        $closing_hour = $row['closing_hour'];
    } else {
        echo "Data tidak ditemukan.";
    }

    // Tutup statement
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/stock.png">
    <link rel="stylesheet" href="edit.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <title>WARE HOUSE MSIB</title>
</head>
<body>
    <!-- Header Start -->
    <header>
        <div class="judul">
            <h1>WARE HOUSE MSIB</h1>
        </div>

        <nav>
            <ul>
                <li><a href="index.php">Daftar Gudang</a></li>
                <li><a href="tambah.php">Tambah Gudang</a></li>
                <li><a href="laporan.php">Laporan</a></li>
                <li><a href="pengaturan.php">Pengaturan</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <!-- Header End -->

    <!-- Main Start -->
    <main>
        <div class="container">
            <h3 class="namaForm">Edit Data</h3>
            <form action="prosesedit.php?id=<?php echo $id; ?>" method="POST"> <!-- Arahkan ke file PHP untuk memproses -->
                <div class="formGrup">
                    <label for="namaGudang">Nama Gudang :</label>
                    <input type="text" id="namaGudang" name="name" value="<?php echo htmlspecialchars($name); ?>" required> <!-- Pre-fill data -->
                </div>

                <div class="formGrup">
                    <label for="lokasiGudang">Lokasi Gudang :</label>
                    <input type="text" id="lokasiGudang" name="location" value="<?php echo htmlspecialchars($location); ?>" required> <!-- Pre-fill data -->
                </div>

                <div class="formGrup">
                    <label for="kapasitasGudang">Kapasitas :</label>
                    <input type="number" id="kapasitasGudang" name="capacity" value="<?php echo $capacity; ?>" required> <!-- Pre-fill data -->
                </div>

                <div class="formGrup">
                    <label for="status">Pilih Status</label>
                    <select id="status" name="status" required>
                        <option value="" disabled>Pilih Status</option>
                        <option value="aktif" <?php echo ($status == 'aktif') ? 'selected' : ''; ?>>AKTIF</option>
                        <option value="tidak_aktif" <?php echo ($status == 'tidak_aktif') ? 'selected' : ''; ?>>NON - AKTIF</option>
                    </select>
                </div>

                <div class="formGrup">
                    <label for="jamBuka">Jam Operasional:</label>
                    <div class="jamContainer">
                        <input type="time" id="jamBuka" name="opening_hour" value="<?php echo $opening_hour; ?>" required> <!-- Pre-fill data -->
                        <span>sampai</span>
                        <input type="time" id="jamTutup" name="closing_hour" value="<?php echo $closing_hour; ?>" required> <!-- Pre-fill data -->
                    </div>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-pen-to-square"></i> Simpan Perubahan
                </button>

                <button type="button" class="btn btn-danger" onClick="window.location.href='index.php'">
                    <i class="fa-solid fa-delete-left"></i> Cancel
                </button>
            </form>
        </div>
    </main>
    <!-- Main End -->

    <!-- Footer Start -->
    <footer>
        <p> Made By Audysa Rimba Jati 2024</p>
    </footer>
    <!-- Footer End -->
</body>
</html>
