<?php
include 'config.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $location = trim($_POST['location']);
    $capacity = intval($_POST['capacity']); 
    $status = trim($_POST['status']); 
    $opening_hour = $_POST['opening_hour'];
    $closing_hour = $_POST['closing_hour'];
    $id = $_GET['id']; 


    if ($status !== 'aktif' && $status !== 'tidak_aktif') {
        die("Status tidak valid. Harus 'aktif' atau 'tidak_aktif'.");
    }

    $query = "UPDATE gudang SET name = ?, location = ?, capacity = ?, status = ?, opening_hour = ?, closing_hour = ? WHERE id = ?"; 

    // Persiapkan dan bind statement
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssisssi", $name, $location, $capacity, $status, $opening_hour, $closing_hour, $id);


    if ($stmt->execute()) {
        echo "Data berhasil diperbarui.";

        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $stmt->error; 
    }

    $stmt->close();
}

$conn->close();
?>
