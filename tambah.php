<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/stock.png">
    <link rel="stylesheet" href="tambah.css">
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
                <li><a href="laporan.html">Laporan</a></li>
                <li><a href="pengaturan.html">Pengaturan</a></li>
                <li><a href="logout.html">Logout</a></li>
            </ul>
        </nav>
    </header>
    <!-- Header End -->

    <!-- Main Start -->
    <main>
        <div class="container">
            <h3 class="namaForm">Tambah Data Gudang</h3>
            <form action="prosestambah.php" method="POST">
                <!-- form input data -->
                <div class="form-group">
                    <label for="name">Nama Gudang :</label>
                    <input type="text" id="name" name="name" required>
                </div>

                <div class="form-group">
                    <label for="location">Lokasi Gudang :</label>
                    <input type="text" id="location" name="location" required>
                </div>

                <div class="form-group">
                    <label for="capacity">Kapasitas :</label>
                    <input type="number" id="capacity" name="capacity" required>
                </div>

                <div class="form-group">
                    <label for="status">Pilih Status</label>
                    <select id="status" name="status" required>
                        <option value="" disabled selected>Pilih Status</option>
                        <option value="aktif">AKTIF</option>
                        <option value="tidak_aktif">NON - AKTIF</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="jamBuka">Jam Operasional:</label>
                    <div class="jamContainer">
                        <input type="time" id="opening_hour" name="opening_hour" required>
                        <span>sampai</span>
                        <input type="time" id="closing_hour" name="closing_hour" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-success">
                    <i class="fa-solid fa-pen-to-square"></i> Simpan Data
                </button>
                <a href="index.php" class="btn btn-danger">
                    <i class="fa-solid fa-delete-left"></i> Cancel
                </a>
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
